<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClassRequest;
use App\Http\Requests\UpdateCalendarRequest;
use App\Models\ClassRoom;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Course;
use App\Models\Place;
use App\Models\Attendance;
use App\Models\AttendanceDetail;
use App\Models\SampleForm;
use App\Models\Tuition;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;

class ClassController extends Controller
{
    public function index(){
		$classes = ClassRoom::with('students')->orderBy('id', 'desc')->get();
		$now = Carbon::now()->toDateString();
		foreach($classes as $class) {
			if($class->status == 1 && $class->start_day <= $now) {
				$class->status = 2;
				$class->save();
			}
			if($class->status == 2 && $class->end_day < $now) {
				$class->status = 3;
				$class->save();
			}
		}

		return view('classes.danh_sach_lop', [
			'classes' => $classes,
		]);
    }

    public function create(){
		$schedules = Schedule::all();
		$weekdays = config('common.weekdays');
		$teachers = Teacher::all();
		$filteredTeacher = [];
		foreach($teachers as $teacher) {
			foreach($teacher->classes as $class) {
				if($class->status == 1 || $class->status == 2) {
					$arrayClass = $teacher->classes;
				}
			}
			if(count($arrayClass) < 4) {
				array_push($filteredTeacher, $teacher);
			}
		}
    	$courses = Course::all();        
    	$places = Place::all();

    	return view('classes.tao_lop', [
			'schedules' => $schedules,
			'weekdays' => $weekdays,
            'filteredTeacher' => $filteredTeacher,
    		'courses' => $courses,
    		'places' => $places,
    	]);
    }

    public function store(){
		$data = request()->all();
		$params = \Arr::except($data, ['_token', 'weekday']);
		$params['status'] = 1;

		$start_day = Carbon::create($params['start_day']);
		$course = Course::find($params['course_id']);
		$number_course = $course->number_course;
		$teacher = Teacher::find($params['teacher_id']);
		$error = [];
		// if($teacher->course_id != $params['course_id']) {
		// 	$error = 'Vui lòng chọn giảng viên đúng chuyên môn';
		// }
		// foreach($teacher->classes as $class) {
		// 	if($params['schedule_id'] == $class->schedule_id && ($class->status == 1 || $class->status == 2)) {
		// 		$error = 'Giảng viên '.$teacher->user->name.' đang dạy lớp có cùng ca học';
		// 	}
		// }
		// if(!empty($error)) {
		// 	return redirect()->back()->with('error', $error);
		// }

		$dayOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
		$days = request()->get('weekday');

		for($i=0; $i<=$number_course*4; $i++) {
			$dates[] = (clone $start_day)->addDays($i)->toDateString();
		}
		foreach($dates as $date) {
			foreach($days as $day) {
				$dayLearns[] = date('Y-m-d', strtotime($dayOfWeek[$day], strtotime($date)));
			}
		}
		foreach($dates as $date) {
			foreach($dayLearns as $dayLearn) {
				if($dayLearn <= $date) {
					$dayLearnPop[] = $dayLearn;
				}
			}
		}
		$dayLearnUni = array_unique($dayLearnPop);
		foreach($dayLearnUni as $value) {
			$dayLearnSort[] = date('Y-m-d', strtotime($value));
			sort($dayLearnSort);
		}
		$calendar = array_slice($dayLearnSort, 0, $number_course+1);

		$params['end_day'] = array_pop($calendar);
		$result = ClassRoom::create($params);

		foreach($calendar as $value) {
			$attendance['date'] = $value;
			$attendance['teacher_id'] = $params['teacher_id'];
			$attendance['class_id'] = $result['id'];
			$attendance['schedule_id'] = $params['schedule_id'];
			Attendance::create($attendance);
		}

		return redirect()->route('classes.index')->with('success', 'Tạo lớp thành công');
	}

	public function getStudentByClass($id){
		$classes = ClassRoom::find($id);
		$students = Student::where('class_id', $classes->id)->get();
		return view('classes/chi_tiet_lop_hoc', [
			'students' => $students,
			'classes' => $classes
		]);
	}

	public function getClassByTeacher(){
		$teacher = Auth::user()->teacher->id;
		$classes = ClassRoom::where('teacher_id', $teacher)->get();

		return view('admin/teacher/dashboard', compact('classes'));
	}
	
	public function classTransferList() {
		$sampleForms = SampleForm::orderBy('id', 'desc')->get();

		return view('admin/staff/danh_sach_chuyen_lop', [
			'sampleForms' => $sampleForms,
    	]);
	}

	public function classTransferById($id) {
		$sampleForm = SampleForm::find($id);
		$countStuInClass = Student::where('class_id', $sampleForm->class_id)->get()->count();
		
		return view('admin/staff/single_chuyen_lop', [
			'sampleForm' => $sampleForm,
			'countStuInClass' => $countStuInClass
    	]);
	}

	public function storeTransfer($id) {
		$sampleForm = SampleForm::find($id);
		$sampleForm->status = 2;
		// $sampleForm->save();
		$student = Student::find($sampleForm->student_id);
		$tuition = Tuition::where([
            ['student_id', $student->id],
            ['class_id', $student->class_id]
		])->first();
		$tuition->class_id = $sampleForm->class_id;
		$tuition->save();

		$student->class_id = $sampleForm->class_id;
		$student->save();
		
		$att_old = AttendanceDetail::where('student_id', $student->id)->get();
		foreach($att_old as $value) {
			$value->delete();
		}

		$class = ClassRoom::find($student->class_id);

		Mail::send('email.chuyen_lop', [
            'class' => $class,
        ], function($mail) use($student){
            $mail->to($student->user->email);
            $mail->from('cheesehiep3110@gmail.com', 'Alibaba English Center');
            $mail->subject('Xác nhận đơn chuyển lớp!');
		});
		
		return redirect()->route('staff.classTransferList')->with('success', 'Chuyển lớp thành công');
	}

	public function getCalendarByClass($id) {
		$class = ClassRoom::find($id);
		$calendars = Attendance::where('class_id', $id)->get();

		return view('admin/staff/lich', [
			'class' => $class,
			'calendars' => $calendars,
    	]);
	}

	public function editCalendar($id) {
		$attendance = Attendance::find($id);
		$schedules = Schedule::all();
		$teachers = Teacher::where('course_id', $attendance->class->course_id)->get();

		return view('admin/staff/sua_lich', [
			'attendance' => $attendance,
			'schedules' => $schedules,
			'teachers' => $teachers
    	]);
	}

	public function updateCalendar($id, UpdateCalendarRequest $request) {
		$data = request()->all();
		$params = \Arr::except($data, ['_token']);
		$attendance = Attendance::find($id);
		$students = Student::where('class_id', $attendance->class_id)->get();
		$schedules = Schedule::all();
		$teachers = Teacher::all();
		foreach($students as $student) {
			Mail::send('email.doi_lich', [
				'attendance' => $attendance,
				'params' => $params,
				'schedules' => $schedules,
				'teachers' => $teachers
			], function($mail) use($student){
				$mail->to($student->user->email);
				$mail->from('cheesehiep3110@gmail.com', 'Alibaba English Center');
				$mail->subject('Thông báo thay đổi lịch học');
			});
		}
		$attendance->update($params);

		return redirect('lop-hoc/'.$attendance->class_id.'/lich')->with('success', 'Thay đổi lịch thành công');
	}
}

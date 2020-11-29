<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClassRequest;
use App\Models\ClassRoom;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Course;
use App\Models\Place;
use App\Models\Attendance;
use App\Models\AttendanceDetail;
use App\Models\SampleForm;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;

class ClassController extends Controller
{
    public function index(){
    	$classes = ClassRoom::with('students')->orderBy('id', 'desc')->get();

		return view('classes.danh_sach_lop', [
			'classes' => $classes,
		]);
    }

    public function create(){
		$schedules = Schedule::all();
		$weekdays = config('common.weekdays');
        $teachers = Teacher::with(['user'])->get();
    	$courses = Course::all();        
    	$places = Place::all();

    	return view('classes.tao_lop', [
			'schedules' => $schedules,
			'weekdays' => $weekdays,
            'teachers' => $teachers,
    		'courses' => $courses,
    		'places' => $places,
    	]);
    }

    public function store(ClassRequest $request){
		$data = request()->all();
		$params = \Arr::except($data, ['_token', 'weekday']);
		$params['status'] = 1;

		$start_day = Carbon::create($params['start_day']);
		$course = Course::find($params['course_id']);
		$number_course = $course->number_course;

		$dayOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
		$days = request()->get('weekday');

		for($i=0; $i<=$number_course; $i++) {
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

		$params['end_day'] = array_pop($dayLearnSort);
		$result = ClassRoom::create($params);

		foreach($dayLearnSort as $value) {
			$attendance['date'] = $value;
			$attendance['teacher_id'] = $params['teacher_id'];
			$attendance['class_id'] = $result['id'];
			$attendance['schedule_id'] = $params['schedule_id'];
			Attendance::create($attendance);
		}

		return redirect()->route('classes.index');
	}

	public function getStudentByClass($id){
		$classes = ClassRoom::find($id);
		$students = Student::where('class_id', $classes->id)->get();
		return view('classes/chi_tiet_lop_hoc', [
			'students' => $students,
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
		$sampleForm->save();
		$student = Student::find($sampleForm->student_id);
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
            $mail->from('cheesehiep3110@gmail.com');
            $mail->subject('Xác nhận đơn chuyển lớp!');
		});
		
		return redirect()->route('staff.classTransferList')->with('success', 'Chuyển lớp thành công');
	}
}

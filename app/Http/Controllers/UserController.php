<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaitList;
use App\Models\User;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Http\Requests\AddStudentRequest;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function dashboardStaff(){
		return view('admin/staff/dashboard');
    }

    public function dashboardAdmin(){
		return view('admin/dashboard');
    }

    public function dashboardTeacher(){
		return view('admin/teacher/dashboard');
    }

    public function getInfoHV($id){
        $waitList = Waitlist::find($id);
        $classes = CLassRoom::where('course_id',$waitList->course_id)->get();
		return view('admin/staff/them_hoc_vien_vao_lop', [
            'waitList' => $waitList,
            'classes' => $classes
		]);
    }

    public function store($id, AddStudentRequest $request){
        $data = $request->all();
		$param = \Arr::except($data,['_token','class_id','image','course_id']);
        $param['password'] = bcrypt(123456);
        $param['status'] = config('common.active.on');
        $param['role'] = config('common.role.student');
        $a = User::create($param);
        //insert students
        $del = WaitList::find($id);
        $student = \Arr::except($data,['_token', 'name', 'email', 'phone_number', 'sex', 'address', 'birthday']);
        $student['user_id'] = $a['id'];
        $student['course_id'] = $del->course_id;
        $student['status'] = config('common.active.on');
        if ($request->hasfile('image')) {
			$file = $request->file('image');
			$filename = $file->getClientOriginalName();
			$file->move(public_path('bill-image'), $filename);
			$student['image'] = 'bill-image/'.$filename;
		}else{
			return "không thành công!";
        }
        Student::create($student);
        $del->delete();
        Mail::send('email.email', [
            'email' => $param['email'],
        ], function($mail) use($param){
            $mail->to($param['email']);
            $mail->from('cheesehiep3110@gmail.com');
            $mail->subject('Tham gia lớp học thành công!');
        });
		return redirect()->route('users.dsHocVien');
    }

    public function indexStaff() {
        $staffs = User::where('role', 2)->get();
        return view('admin/account/danh_sach_nv', [
            'staffs' => $staffs,
        ]);
    }
    
    public function createStaff() {
        return view('admin/account/tao_tk_nv');
    }

    public function storeStaff(AddStudentRequest $request) {
        $data = request()->all();
        $param = \Arr::except($data, ['_token']);
        $param['status'] = 1;
        $param['password'] = bcrypt('123456');
        $param['role'] = 2;
        User::create($param);
        return redirect()->route('staff.index');
    }

    public function statusStaff($id){
    	$staff = User::find($id);
    	$staff->status = $staff->status == 1 ? 2 : 1;
    	$staff->save();
    	return redirect()->route('staff.index');
    }

    public function editStaff($id){
    	$staff = User::find($id);
		return view('admin/account/sua_tk_nv', [
			'staff' => $staff,
		]);
    }

    public function updateStaff($id){
        $data = request()->all();
        $params = \Arr::except($data, ['_token']);
    	$staff = User::find($id);
		$staff->update($params);
		return redirect()->route('staff.index');
    }

    public function indexTeacher() {
        $teachers = User::where('role', 3)->get();
        return view('admin/account/danh_sach_gv', [
            'teachers' => $teachers,
        ]);
    }
    
    public function createTeacher() {
        $courses = Course::all();
        return view('admin/account/tao_tk_gv', [
            'courses' => $courses
        ]);
    }

    public function storeTeacher(AddStudentRequest $request) {
        $data = request()->all();
        $param = \Arr::except($data, ['_token']);
        $param['status'] = 1;
        $param['password'] = bcrypt('123456');
        $param['role'] = 3;
        $result = User::create($param);
        $teacher['user_id'] = $result->id;
        $teacher['course_id'] = $param['course_id'];
        Teacher::create($teacher);
        return redirect()->route('teacher.index');
    }

    public function statusTeacher($id){
    	$teacher = User::find($id);
    	$teacher->status = $teacher->status == 1 ? 2 : 1;
    	$teacher->save();
    	return redirect()->route('teacher.index');
    }

    public function editTeacher($id){
    	$teacher = User::find($id);
		return view('admin/account/sua_tk_gv', [
			'teacher' => $teacher,
		]);
    }

    public function updateTeacher($id){
        $data = request()->all();
        $params = \Arr::except($data, ['_token']);
    	$teacher = User::find($id);
        $teacher->update($params);
        $save = Teacher::find($teacher->teacher->id);
        $save->course_id = $params['course_id'];
        $save->save();
		return redirect()->route('teacher.index');
    }
    public function dsHocVien(){
    	$students = Student::all();

		return view('admin/staff/ds_hoc_vien_co_lop', [
			'students' => $students,
		]);
    }
}

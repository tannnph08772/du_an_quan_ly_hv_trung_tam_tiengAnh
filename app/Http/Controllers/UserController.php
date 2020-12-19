<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaitList;
use App\Models\User;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Place;
use Illuminate\Support\Arr;
use App\Http\Requests\Users\ResetPasswordRequest;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Tuition;
use App\Models\TuitionDetail;
use App\Models\SampleForm;
use App\Exports\DSHocVienExport;
use App\Http\Requests\DkkhMoiRequest;
use App\Models\Reserve;
use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateAccount;
use Illuminate\Support\Facades\Mail;
use PhpParser\Builder\Class_;
use Symfony\Component\HttpKernel\DependencyInjection\ResettableServicePass;
use Excel;


class UserController extends Controller
{
    public function dashboardStaff(){
        $classes = ClassRoom::where('status', 2)->get();
        $waitList = WaitList::all();
        $tranferList = SampleForm::where('status', 1)->get();
        $reserves = Reserve::where('status', 1)->get();
        return view('admin/staff/dashboard',[
            'classes' => $classes,
            'waitList' => $waitList,
            'tranferList' => $tranferList,
            'reserves' => $reserves 
        ]);
    }

    public function dashboardAdmin(){
        $places = Place::all();
        $staffs = User::where('role',2)->get();
        $teachers = User::where('role',3)->get();
        $courses = Course::all();
		return view('admin/dashboard',[
            'places' => $places,
            'staffs' => $staffs,
            'teachers' => $teachers,
            'courses' => $courses
        ]);
    }

    public function dashboardTeacher(){
        $classes = ClassRoom::where('teacher_id', Auth::user()->teacher->id)
                              ->where('status', 2)->get();
        return view('admin/teacher/dashboard',[
            'classes' => $classes
        ]);
    }

    public function getInfoHV($id){
        $waitList = Waitlist::find($id);
        $classes = ClassRoom::where('classes.course_id','=',$waitList->course_id)
        ->where('classes.place_id',$waitList->place_id)
        ->where('classes.status',1)
        ->get();
        foreach ($classes as $key => $value) {
            $value->count_hs = count($value->students);
            $value->schedule;
        };
        $filteredArray = Arr::where($classes->toArray(), function ($value, $key) {
            return $value['count_hs'] < 25;
        });

		return view('admin/staff/them_hoc_vien_vao_lop', [
            'waitList' => $waitList,
            'classes' => $classes,
            'filteredArray' => $filteredArray
		]);
    }

    public function store($id, AddStudentRequest $request){
        $del = WaitList::find($id);
        $data = $request->all();
        if($del->student_id == 0){
            $param = \Arr::except($data,['_token','class_id','image','course_id']);
            $param['password'] = bcrypt(123456);
            $param['status'] = 1;
            $param['role'] = config('common.role.student');
            $a = User::create($param);
            //insert students
            $student = \Arr::except($data,['_token', 'name', 'email', 'phone_number', 'sex', 'address', 'birthday', 'image', 'sum_money']);
            $student['user_id'] = $a['id'];
            $student['course_id'] = $del->course_id;
            $student['status'] = 2;
            $stu = Student::create($student);
            $tuition = \Arr::except($data,['_token', 'name', 'email', 'phone_number', 'sex', 'address', 'birthday', 'class_id','image','course_id', 'sum_money']);
            $tuition['student_id'] = $stu['id'];
            $tuition['user_id'] = Auth::user()->id;
            $tuition['class_id'] = $stu['class_id'];
            $hp = Tuition::create($tuition);
            $tuitionDetail= \Arr::except($data,['_token', 'name', 'email', 'phone_number', 'sex', 'address', 'birthday', 'class_id','course_id']);;
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('bill-image'), $filename);
            $tuitionDetail['image'] = 'bill-image/'.$filename;
            $tuitionDetail['tuition_id'] = $hp['id'];
            $tuitionDetail['sum_money']= $request->get('sum_money');
            TuitionDetail::create($tuitionDetail);
            $link = route('auth.login');
            Mail::send('email.email', [
                'email' => $stu->user->email,
                'link' => $link
            ], function($mail) use($stu){
                $mail->to($stu->user->email);
                $mail->from('cheesehiep3110@gmail.com', 'Alibaba English Center');
                $mail->subject('Tham gia lớp học thành công!');
            });
        }else{
            $stu = Student::find($del->student_id);
            $stu['class_id'] = $request->class_id;
            $stu['course_id'] = $del->course_id;
            $stu['status'] = 2;
            $stu->save();
            $tuition = \Arr::except($data,['_token', 'name', 'email', 'phone_number', 'sex', 'address', 'birthday', 'class_id','image','course_id', 'sum_money']);
            $tuition['student_id'] = $stu['id'];
            $tuition['user_id'] = Auth::user()->id;
            $tuition['class_id'] = $stu['class_id'];
            $hp = Tuition::create($tuition);
            $tuitionDetail= \Arr::except($data,['_token', 'name', 'email', 'phone_number', 'sex', 'address', 'birthday', 'class_id','course_id']);;
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('bill-image'), $filename);
            $tuitionDetail['image'] = 'bill-image/'.$filename;
            $tuitionDetail['tuition_id'] = $hp['id'];
            $tuitionDetail['sum_money']= $request->get('sum_money');
            TuitionDetail::create($tuitionDetail);
            $link = route('auth.login');
            Mail::send('email.email', [
                'email' => $stu->user->email,
                'link' => $link
            ], function($mail) use($stu){
                $mail->to($stu->user->email);
                $mail->from('cheesehiep3110@gmail.com', 'Alibaba English Center');
                $mail->subject('Tham gia lớp học thành công!');
            });
        }
        $del->delete();
        
		return redirect("lop-hoc/chi-tiet-lop-hoc/".$stu['class_id'])->with('status','Đã thêm học viên vào lớp!');
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

    public function storeStaff(AddUserRequest $request) {
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

    public function updateStaff($id, UpdateAccount $request){
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

    public function storeTeacher(AddUserRequest $request) {
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

    public function updateTeacher($id, UpdateAccount $request){
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

    public function statusHV($id){
        $student = User::find($id);
        $student->status = $student->status == 1 ? 2 : 1;
    	$student->save();
    	return redirect()->route('users.dsHocVien');
    }

    public function viewProfile(){
        $user = Auth::user();
        return view('admin.student.profile',compact('user'));
    }

    public function resetPW(){
        return view('resetpassword');
    }

    public function ResetPassword(ResetPasswordRequest $request)
    {   
        $request->validate([
            'curr_password' => ['required', new MatchOldPassword($request)],
        ]);
        $curr_password = $request->input('curr_password');
        $new_password  = $request->input('new_password');
        if (!Hash::check($curr_password, Auth::user()->password)) {
            return redirect()->route('user.resetPW')->with('err-message', 'Mật khẩu cũ không chính xác')->withInput();
        } else {
            $request->user()->fill(['password' => Hash::make($new_password)])->save();
            return redirect()->route('user.viewProfile')->with('success-message', 'Đổi mật khẩu thành công');
        }
        return redirect()->back()->withInput();
    }  

    public function editStudent($id){
        $student = User::find($id);

        return view('admin/account/sua_tk_hv', [
            'student' => $student 
        ]);
    }

    public function updateStudent($id, UpdateAccount $request){
        $data = request()->all();
        $params = \Arr::except($data, ['_token']);
        $student = User::find($id);
		$student->update($params);
		return redirect()->route('users.dsHocVien')->with('success', 'Cập nhật thành công');
    }

    public function reset(){
        return view('admin.staff.resetpass');
    }

    public function Rspass(ResetPasswordRequest $request)
    {   
        $request->validate([
            'curr_password' => ['required', new MatchOldPassword($request)],
        ]);
        $curr_password = $request->input('curr_password');
        $new_password  = $request->input('new_password');
        if (!Hash::check($curr_password, Auth::user()->password)) {
            return redirect()->route('user.reset')->with('err-message', 'Mật khẩu cũ không chính xác')->withInput();
        } else {
            $request->user()->fill(['password' => Hash::make($new_password)])->save();
            return redirect()->route('user.reset')->with('success-message', 'Đổi mật khẩu thành công');
        }
        return redirect()->back()->withInput();
    }

    public function resetpass(){
        return view('admin.teacher.doi-mat-khau');
    }

    public function Resetspass(ResetPasswordRequest $request)
    {   
        $request->validate([
            'curr_password' => ['required', new MatchOldPassword($request)],
        ]);
        $curr_password = $request->input('curr_password');
        $new_password  = $request->input('new_password');
        if (!Hash::check($curr_password, Auth::user()->password)) {
            return redirect()->route('user.resetpass')->with('err-message', 'Mật khẩu cũ không chính xác')->withInput();
        } else {
            $request->user()->fill(['password' => Hash::make($new_password)])->save();
            return redirect()->route('user.resetpass')->with('success-message', 'Đổi mật khẩu thành công');
        }
        return redirect()->back()->withInput();
    }

    public function dkKhoaMoi(){
        $courses = Course::all();
        $places = Place::all();
        
        $waitList = WaitList::where('student_id', Auth::user()->student->id)->get();
		return view('students/dk_khoa_hoc_moi', [
            'courses' => $courses,
            'places' => $places,
            'waitList' => $waitList
		]);
    }

    public function storeKhoaHocMoi(DkkhMoiRequest $request) {
        $data = request()->all();
        $param = \Arr::except($data, ['_token']);
        $param['name'] = Auth::user()->name;
        $param['email'] = Auth::user()->email;
        $param['phone_number'] = Auth::user()->phone_number;
        $param['birthday'] = Auth::user()->birthday;
        $param['sex'] = Auth::user()->sex;
        $param['address'] = Auth::user()->address;
        $param['student_id'] = Auth::user()->student->id;

        WaitList::create($param);
        return redirect()->back()->with('success', 'Đăng ký thành công!');
    }

    public function xoaDk($id){
        $waitList = Waitlist::find($id);
        $waitList->delete();

        return redirect()->back()->with('success', 'Bạn đã hủy đăng ký thành công!');
    }

    public function exportDSHV(){
        return Excel::download(new DSHocVienExport, 'danh-sach-hoc-vien.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaitList;
use App\Models\User;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Http\Requests\AddStudentRequest;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{

    public function dsCho(){
        $waitLists = WaitList::all();
		return view('admin.index', [
		'waitLists' => $waitLists,
		]);
    }

    public function getInfoHV($id){
        $waitList = Waitlist::find($id);
        $classes = CLassRoom::where('course_id',$waitList->course_id)->get();
		return view('admin/them_hoc_vien_vao_lop', [
            'waitList' => $waitList,
            'classes' => $classes
		]);
    }

    public function store($id, AddStudentRequest $request){
        $data = $request->all();
		$param = \Arr::except($data,['_token','class_id','image','course_id']);
        $param['password'] = bcrypt(123456);
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

       Mail::send('email/email',[
           'email' => $param['email'],
           function ($mail) use($param){
               $mail->to($param['email']);
               $mail->from('tannnPH08772fpt.edu.vn');
               $mail->subject('Tham gia vào lớp học thành công!');
           }
       ]);
		return redirect()->route('classes.chiTietLophoc');
    }
}

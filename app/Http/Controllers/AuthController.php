<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\ClassRoom;
use App\Models\WaitList;
use App\Models\Student;
use App\Exports\ExcelExport;
use App\Imports\ExcelImport;
use Excel;
use Arr;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use Hash;
use Mail;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(LoginRequest $request)
    {
        $result = Auth::attempt([
            'email' => request()->get('email'),
            'password' => request()->get('password'),
            'status' => 1,
        ], request()->get('remember')); 
        if ($result) {                                   
            if(Auth::user()->role == 1){
                return redirect()->route('admin.dashboardAdmin');
            }else if(Auth::user()->role == 2){
                return redirect()->route('staffs.dashboardStaff');
            }else if(Auth::user()->role == 3){
                return redirect()->route('teachers.dashboardTeacher');
            }else{
                return redirect()->route('student.showCalendarStu');
            }
        }else{
            return view('auth.login', [
                'message' => "Đăng nhập không thành công.Vui lòng kiểm tra lại!",
            ]);
        }
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->all();
        $param = \Arr::except($data, ['_token']);
        WaitList::create($param);
        return redirect()->route('thankyou');
    }
    
    public function danhSachCho()
    {
        $waitList = WaitList::all();
        $classes = ClassRoom::where('status', 1)->get();

        foreach ($classes as $value) {
            $value->count_hs = count($value->students);
            $value->schedule;
            $value->place;
        };

        $filteredArray = Arr::where($classes->toArray(), function ($value, $key) {
            return $value['count_hs'] < 25;
        });

        return view('admin/staff/danh_sach_hoc_vien_dang_ky', [
            'waitList' => $waitList,  
            'classes' => $classes,
            'filteredArray' => $filteredArray
        ]);
    }
    
    public function remove(WaitList $id){
    	$id->delete() ;
		return back();
    }

    public function export_csv()
    {
        return Excel::download(new ExcelExport, 'danh_sach_hoc_vien.xlsx');
    }

    public function import_csv(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        return back();
    }

    public function addHocVien(Request $request)
    {
        $lop_id = $request->lop_id;
        $hoc_vien_chuyen = $request->danh_sach_hv;
        // dd($hoc_vien_chuyen);
        foreach ($hoc_vien_chuyen as $key => $value) {
            $hoc_vien = WaitList::find($value);
            $hoc_vien['role'] = 4;
            $hoc_vien['status'] = 1;
            $hoc_vien['password'] = Hash::make('123456');
            $id = User::create($hoc_vien->toArray())->id;
            
            $hoc_vien['class_id'] = $lop_id;
            $hoc_vien['user_id'] = $id;
            $hoc_vien['image'] = null;
            Student::create($hoc_vien->toArray());
            WaitList::destroy($value);
            Mail::send('email.email', [
                'email' => $hoc_vien['email'],
            ], function($mail) use($hoc_vien){
                $mail->to($hoc_vien['email']);
                $mail->from('cheesehiep3110@gmail.com');
                $mail->subject('Tham gia lớp học thành công!');
            });
        }  
    }
   
}

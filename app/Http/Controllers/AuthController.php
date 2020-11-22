<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\WaitList;
use App\Exports\ExcelExport;
use App\Imports\ExcelImport;
use Excel;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;

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
                return redirect()->route('home');
            }else if(Auth::user()->role == 3){
                return redirect()->route('teachers.dashboard');
            }else{
                return redirect()->route('staffs.dashboard');
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

    public function danhSachKhoaHoc()
    {
        $courses = Course::all();
        return view('client', [
            'courses' => $courses,
        ]);
    }
    public function chiTietKhoaHoc($id){
        $courses = Course::all();
        $course = Course::find($id);
		return view('clients/dang_ky_khoa_hoc', [
            'course' => $course,
            'courses' => $courses,
		]);
    }

    public function store(RegisterRequest $request, $id)
    {
        $data = $request->all();
        $course = Course::find($id);
        $param = \Arr::except($data, ['_token']);
        $params['course_id'] = $course;
        WaitList::create($param);
        
        dd($param);
        return redirect()->route('auth.danh_sach_cho');
    }
    
    public function danhSachCho()
    {
        $waitList = WaitList::all();
        return view('admin/danh_sach_hoc_vien_dang_ky', [
            'waitList' => $waitList,
        ]);
    }

    public function export_csv()
    {
        return Excel::download(new ExcelExport, 'danh_sach_hoc_vien_dang_ky.xlsx');
    }

    public function import_csv(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        return back();
    }
}

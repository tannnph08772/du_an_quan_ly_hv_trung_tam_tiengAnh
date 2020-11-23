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
                return redirect()->route('staffs.dashboardStaff');
            }else if(Auth::user()->role == 3){
                return redirect()->route('teachers.dashboardTeacher');
            }else{
                return redirect()->route('home');
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
        return view('admin/danh_sach_hoc_vien_dang_ky', [
            'waitList' => $waitList,  
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
}

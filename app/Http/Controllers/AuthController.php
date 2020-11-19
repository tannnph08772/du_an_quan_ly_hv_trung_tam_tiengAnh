<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
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
}
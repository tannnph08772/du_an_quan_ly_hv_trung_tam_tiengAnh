<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\WaitList;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        $courses = Course::all();
        return view('clients/dang_ki_khoa_hoc',[
            'courses' => $courses
        ]);
    }
    public function store(){
		$data = request()->all();
        $param = \Arr::except($data, ['_token']);
        dd($param);
		WaitList::create($param);
		
    }
    public function danh_sach_cho(){
        $waitList = WaitList::all();
		return view('admin/danh_sach_hoc_vien_dang_ky', [
		'waitList' => $waitList,
		]);
    }
}

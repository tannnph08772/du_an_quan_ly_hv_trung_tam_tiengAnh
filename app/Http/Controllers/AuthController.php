<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use App\Imports\ExcelImport;
use App\Models\Course;
use App\Models\WaitList;
use Excel;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
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

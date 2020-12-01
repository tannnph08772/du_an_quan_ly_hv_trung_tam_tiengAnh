<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeworkRequest;
use App\Models\ClassRoom;
use App\Models\Homework;
use Auth;

class HomeWorkController extends Controller
{
    public function index() {
        // $teacher = Auth::user()->class->id;
        // $classes = ClassRoom::where('teacher_id', $teacher)->get();
        // dd($classes[1]->id);
        $homework = Homework::all();
        
        return view('admin/teacher/ds_bai_tap', compact('homework'));
    }

    public function showFormHomework() {
        $teacher = Auth::user()->teacher->id;
        $classes = ClassRoom::where('teacher_id', $teacher)->get();
        
        return view('admin/teacher/giao_bai_tap_cho_hv', compact('classes'));
    }

    public function store(HomeworkRequest $request) {
        $data = request()->all();
        
        $param = \Arr::except($data, ['_token']);
        if ($request->hasfile('file')) {
			$file = $request->file('file');
			$filename =time().'.'.$file->getClientOriginalExtension();
			$file->move(public_path('bill-image'), $filename);
			$param['file'] = 'bill-image/'.$filename;
		}else{
			return "không thành công!";
        }
        Homework::create($param);
        dd('thành công');
	}
}

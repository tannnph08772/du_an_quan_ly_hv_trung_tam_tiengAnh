<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HomeworkRequest;
use App\Http\Requests\UpdateBTRequest;
use App\Models\ClassRoom;
use App\Models\Submit;
use App\Models\SubmitDetail;
use App\Models\Homework;
use App\Models\Student;
use App\Models\Point;
use App\Models\Attendance;
use App\Http\Requests\SubmitRequest;
use Auth;

class HomeWorkController extends Controller
{
    public function index() {
        $homework = Homework::where('teacher_id', Auth::user()->teacher->id)->orderBy('id', 'desc')->get();
        $arrayClass = ClassRoom::where('teacher_id', Auth::user()->teacher->id)->orderBy('id', 'desc')->get();
        return view('admin/teacher/ds_bai_tap', [
            'homework' => $homework,
            'arrayClass' => $arrayClass
        ]);
    }

    public function showFormHomework() {
        $teacher = Auth::user()->teacher->id;
        $classes = ClassRoom::where('teacher_id', $teacher)->get();
        
        return view('admin/teacher/giao_bai_tap_cho_hv', compact('classes'));
    }

    public function storeBT(HomeworkRequest $request) {
        $data = request()->all();
        $param = \Arr::except($data, ['_token']);
        $param['teacher_id'] = Auth::user()->teacher->id;
        if ($request->hasfile('file')) {
			$file = $request->file('file');
			$filename =time().'.'.$file->getClientOriginalExtension();
			$request->file->move(public_path('bill-image'), $filename);
			$param['file'] = $filename;
		}
        Homework::create($param);
        return redirect()->route('homework.index')->with('status', 'Tạo bài tập thành công!');
    }

    public function editBT($id) {
        $homework = Homework::find($id);
        return view('admin/teacher/sua_bai_tap',[
			'homework' => $homework
		]);
    }

    public function updateBT($id, UpdateBTRequest $request) {
        $homework = Homework::find($id);  
        $params = [];
        $params['title'] = request()-> get('title');
        $params['end_day'] = request()-> get('end_day');
        $params['note'] = request()-> get('note');
        $params['class_id'] = request()-> get('class_id');
        $file = $request->file('file');
        
        if ($request->hasFile('file')) {
            $filename =time().'.'.$file->getClientOriginalExtension();
			request()->file('file')->move(public_path('bill-image'), $filename);
			$params['file'] = $filename;
		}
        $homework -> update($params);
        return redirect()->route('homework.index')->with('status', 'Cập nhật bài tập thành công!');;
    }
    
    public function show() {
        $stu = Auth::user()->student->class_id;  
        $homeworks = Homework::where('class_id', $stu)->get();
        
        return view('students/bai_tap_cho_hv', compact('homeworks'));
    }

    public function chiTietBT($id) {
        $homework = Homework::find($id);
        
        return view('students/chi_tiet_bt', compact('homework'));
    }

    public function download($file){
        $file_path = public_path('bill-image/'.$file);
        return response()->download( $file_path);
    }

    public function nopBai($id, SubmitRequest $request) {
        $data = request()->all();
        $param = \Arr::except($data, ['_token', 'file']);
        $querySubmit = Submit::where([
            ['student_id', Auth::user()->student->id],
            ['homework_id', $id]
        ])->first();
        if(empty($querySubmit)) {
            $param['student_id'] = Auth::user()->student->id;
            $param['homework_id'] = $id;
            $sb = Submit::create($param);
            $sb_detail = [];
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move(public_path('bill-image'), $filename);
            $sb_detail['file'] = $filename;
            $sb_detail['submit_id'] = $sb['id'];
            $data = SubmitDetail::create($sb_detail);

        }else{
            $sb_detail = [];
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move(public_path('bill-image'), $filename);
            $sb_detail['file'] = $filename;
            $sb_detail['submit_id'] = $querySubmit->id;
            $data = SubmitDetail::create($sb_detail);
        }
        $message = !$data ? ['error' => 'Thêm thất bại'] : ['success'=> 'Thêm thành công'];
        return redirect()->back()->with($message);
    }

    public function dsNopBai($id) {
        $hw = Homework::find($id);
        $submit = Submit::where('homework_id', $hw['id'])->get();

        return view('admin/teacher/ds_hoc_vien_nop_bai',[
            'submit' => $submit,
            'hw' => $hw
        ]);
    }

    public function storePoint() {
        $dataAjax = request()->all();
        $data = json_decode($dataAjax['data']);

        foreach($data as $item) {
            $submit = Submit::find($item->id);
            $submit->point = $item->point;
            $submit->save();
        }
    }

    public function showPointByTeacher($id) {
        $class = ClassRoom::find($id);
        $homeworks = Homework::where('class_id', $id)->get();
        $students = Student::where('class_id', $id)->get();
        $attendances = Attendance::where('class_id', $id)->get();

        return view('admin/teacher/bang_diem', [
            'class' => $class,
            'homeworks' => $homeworks,
            'students' => $students,
            'attendances' => $attendances
        ]);
    }

    public function dsBaiTap() {
        $student = Auth::user()->student->id;  
        $submits = Submit::where('student_id', $student)->get();
        
        return view('students/ds_bai_tap_da_nop', compact('submits'));
    }
}

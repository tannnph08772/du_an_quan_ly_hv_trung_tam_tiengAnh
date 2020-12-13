<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Tuition;
use App\Http\Requests\TuitionRequest;
use App\Models\TuitionDetail;

use Illuminate\Http\Request;

class TuitionController extends Controller
{
    public function showFormHocPhi($id)
    {
       $student = Student::find($id);

        return view('admin/staff/thu_hoc_phi',[
            'student' => $student,
        ]);
    }

    public function nopHocPhi($id,TuitionRequest $request)
    {
        $data = $request->all();
        $student = Student::find($id);
        $tuition = \Arr::except($data,['_token', 'image','sum_money','name','email', 'address', 'class', 'sex','birthday']);
        $tuition['student_id'] = $id;
        $tuition['class_id'] = $student->class_id;
        $hp = Tuition::create($tuition);
        $tuitionDetail = \Arr::except($data,['_token','name','email', 'address', 'class', 'sex','birthday']);
		$file = $request->file('image');
		$filename = $file->getClientOriginalName();
		$file->move(public_path('bill-image'), $filename);  
        $tuitionDetail['image'] = 'bill-image/'.$filename;
        $tuitionDetail['tuition_id'] = $hp['id'];
        TuitionDetail::create($tuitionDetail);
        
        $params = [];
		$params['status'] = 2;
        $student -> update($params);

        return redirect()->back()->with('status','Đã thu học phí!');
    }

    public function hoaDon()
    {
       $tuition = Tuition::all();

        return view('admin/staff/ds_hoa_don',[
            'tuition' => $tuition,
        ]);
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Point;

class PointController extends Controller
{
    public function store() {
        $dataAjax = request()->all();
        $data = json_decode($dataAjax['data']);
        $points = Point::all();

        foreach($data as $item) {
            $id = $item->id;
            $params['exercise'] = $item->exercise;
            if($item->diligence == '') {
                $params['diligence'] = null;
            }else {
                $params['diligence'] = $item->diligence;
            }
            if($item->test == '') {
                $params['test'] = null;
            }else {
                $params['test'] = $item->test;
            }
            $params['student_id'] = $item->student;
            $params['class_id'] = $item->class;
            
            if($id != '') {
                $query = Point::find($id);
                $query->update($params);
            }else {
                Point::create($params);
            }
        }
    }
}

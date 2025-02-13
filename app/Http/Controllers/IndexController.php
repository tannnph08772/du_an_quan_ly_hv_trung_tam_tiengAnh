<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\DonChuyenLopRequest;
use App\Http\Requests\Auth\DonBaoLuuRequest;
use App\Models\ClassRoom;
use App\Models\SampleForm;
use App\Models\Reserve;
use App\Models\Student;
use App\Models\AttendanceDetail;
use App\Models\Attendance;
use App\Models\Tuition;
use App\Models\Homework;
use App\Models\Point;
use Carbon\Carbon;
use Auth;
use Arr;

class IndexController extends Controller
{
    public function showForm(){
        $start_day = Carbon::create(Auth::user()->student->class->start_day);
        $date = (clone $start_day)->addDays(7)->toDateString();
        $now = Carbon::now()->toDateString();
        $class_id = Auth::user()->student->class->id;
        $course_id = Auth::user()->student->class->course_id;
        $place_id = Auth::user()->student->class->place_id;
        $numberLesson = AttendanceDetail::where('student_id', Auth::user()->student->id)->get()->count();
        $classes = ClassRoom::where([
            ['id', '<>', $class_id],
            ['course_id', $course_id],
            ['place_id', $place_id]
        ])->get();
        foreach($classes as $value) {
            $value->count_student = count($value->students);
            $value->schedule;
        }
        $filteredArray = Arr::where($classes->toArray(), function($value) {
            return $value['count_student'] < 25;
        });
        // $arr_class_id = [];
        // $lop_chuyen = [];
        // foreach ($filteredArray as $key => $value) {
        //     array_push($arr_class_id, $value['id']);
        // }
        // $danh_sach_lop = ClassRoom::whereIn('id', $arr_class_id)->get();
        // foreach ($danh_sach_lop as $value) {
        //     $so_buoi = 0;
        //     foreach ($value->attendances as $diem_danh) {
        //         $so_buoi_diem_danh = $diem_danh->attendanceDetail->count();
        //         if($so_buoi_diem_danh > 0){
        //             $so_buoi++;
        //         }
        //         if($so_buoi == $numberLesson){
        //             array_push($lop_chuyen,$value);
        //         }
        //     }
        // }
        // $arrayClass = array_unique($lop_chuyen);

        return view('students/don_chuyen_lop', [
            'filteredArray' => $filteredArray,
            'start_day' => $start_day,
            'date' => $date,
            'now' => $now
		]);
    }

    public function storeForm(DonChuyenLopRequest $request){
        $data = request()->all();
        $params = \Arr::except($data, ['_token']);
        $params['status'] = 1;
        SampleForm::create($params);
        return redirect()->back()->with('success', 'Đơn đã được gửi đi, trung tâm sẽ sớm liên hệ với bạn');
    }

    public function formReserve(){
        $start_day = Carbon::create(Auth::user()->student->class->start_day);
        $date = (clone $start_day)->addDays(7)->toDateString();
        $now = Carbon::now()->toDateString();
        $reserveByStu = Reserve::where('student_id', Auth::user()->student->id)->get();

        return view('students/don_bao_luu', [
            'start_day' => $start_day,
            'date' => $date,
            'now' => $now,
            'reserveByStu' => $reserveByStu
		]);
    }

    public function storeReserve(DonBaoLuuRequest $request){
        $data = request()->all();
        $params = \Arr::except($data, ['_token']);
        $params['course_id'] = Auth::user()->student->course_id;
        $params['status'] = 1;
        if(Auth::user()->student->status == 1) {
            $error = 'Bạn cần hoàn thành học phí';
            return redirect()->back()->with('error', $error);
        }
        Reserve::create($params);
        return redirect()->back()->with('success', 'Đơn đã được gửi đi, trung tâm sẽ sớm liên hệ với bạn');
    }

    public function showPointByClass(){
        $student_id = Auth::user()->student->id;
        $tuitions = Tuition::where('student_id', $student_id)->orderBy('id', 'desc')->get();
        $points = Point::where('student_id', $student_id)->get();
        $class = ClassRoom::find(Auth::user()->student->class_id);
        $classes = [];
        foreach($tuitions as $tuition) {
            $data = ClassRoom::where('id', $tuition->class_id)->get();
            array_push($classes, $data);
        }

        return view('students/bang_diem_theo_lop', [
            'classes' => $classes,
            'points' => $points,
            'class' => $class
		]);
    }

    public function historyLesson(){
        $student_id = Auth::user()->student->id;
        $tuitions = Tuition::where('student_id', $student_id)->orderBy('id', 'desc')->get();
        $points = Point::where('student_id', $student_id)->get();
        $class = ClassRoom::find(Auth::user()->student->class_id);
        $classes = [];
        foreach($tuitions as $tuition) {
            $data = ClassRoom::where('id', $tuition->class_id)->get();
            array_push($classes, $data);
        }

        return view('students/lich_su_hoc', [
            'classes' => $classes,
            'points' => $points,
            'class' => $class
		]);
    }
}

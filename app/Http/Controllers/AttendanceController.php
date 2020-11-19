<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\AttendanceDetail;
use App\Models\Student;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index($id){
        $today = Carbon::now()->timezone('Asia/Ho_Chi_Minh')->toDateString();
    	$dates = Attendance::where([
            ['class_id', $id],
            ['date', $today]
        ])->get();
        $students = Student::where('class_id', $id)->get();
		return view('admin/attendance/ngay_diem_danh', [
            'dates' => $dates,
            'students' => $students
		]);
    }

    public function create($id){
        $attendance = Attendance::find($id);
        $students = Student::where('class_id', $attendance->class_id)->get();
        $count = AttendanceDetail::where('attendance_id', $id)->get();
        
        if (count($count) === 0) {
            foreach($students as $student) {
                $params['student_id'] = $student->id;
                $params['status'] = 1;
                $params['attendance_id'] = $id;
                AttendanceDetail::create($params);
            }
        } 

        $attendanceDetails = AttendanceDetail::where([
            ['attendance_id', $id],
        ])->get();

        return view('admin/attendance/diem_danh', [
            'attendanceDetails' => $attendanceDetails,
            'attendance' => $attendance
		]);
    }

    public function store(){
        $dataAjax = request()->all();
        $data = json_decode($dataAjax['data']);

        foreach($data as $item) {
            $result = AttendanceDetail::where([
                ['id', $item->id],
                ['attendance_id', $item->attendance_id],
            ])->first();
            $result->id = $item->id;
            $result->status = $item->status;
            $result->save();

            $att_id = $item->attendance_id;
        }

        $att = Attendance::find($att_id);
        $now = Carbon::now()->timezone('Asia/Ho_Chi_Minh')->toDateTimeString();
        $att->updated_at = $now;
        $att->save();
	}
}

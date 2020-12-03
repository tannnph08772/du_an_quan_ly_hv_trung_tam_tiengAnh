<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\AttendanceDetail;
use App\Models\Student;
use Carbon\Carbon;
use Auth;

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
    
    public function showCalendarStu(){
        $class_id = Auth::user()->student->class_id;
        $now = Carbon::now()->toDateString();
        $calendars = Attendance::where([
            ['class_id', $class_id],
            ['date', '>=', $now]
        ])->orderBy('date', 'asc')->get();

        return view('students/lich_hoc', [
            'calendars' => $calendars,
        ]);
    }

    public function showCalendarTea(){
        $teacher_id = Auth::user()->teacher->id;
        $now = Carbon::now()->toDateString();
        // $classes = ClassRoom::where('teacher_id', $teacher_id)->get();
        $calendars = Attendance::where([
            ['teacher_id', $teacher_id],
            ['date', '>=', $now]
        ])->orderBy('date', 'asc')->get();

        return view('admin/teacher/lich_day', [
            'calendars' => $calendars,
        ]);
    }

    public function showAttendance(){
        $student_id = Auth::user()->student->id;
        $class_id = Auth::user()->student->class_id;
        $attendances = Attendance::where([
            ['attendance.class_id', $class_id],
        ])->orderBy('date', 'asc')->get();

        $count_absent = AttendanceDetail::where([
            ['student_id', $student_id],
            ['status', 1]
        ])->get()->count();

        return view('students/diem_danh', [
            'attendances' => $attendances,
            'count_absent' => $count_absent
        ]);
    }
}

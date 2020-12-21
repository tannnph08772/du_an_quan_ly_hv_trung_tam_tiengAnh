<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Tuition;
use Arr;
use Mail;

class ReserveController extends Controller
{
    public function reserveList() {
		$reserves = Reserve::orderBy('id', 'desc')->get();

		return view('admin/staff/danh_sach_bao_luu', [
			'reserves' => $reserves,
    	]);
    }
    
    public function reserveById($id) {
		$reserve = Reserve::find($id);
		
		return view('admin/staff/single_bao_luu', [
			'reserve' => $reserve,
    	]);
    }
    
    public function updateReserve($id) {
        $reserve = Reserve::find($id);
		$reserve->status = 2;
        $reserve->save();
        Mail::send('email.tb_bao_luu', [
            'email' => $reserve->student->user->email,
        ], function($mail) use($reserve){
            $mail->to($reserve->student->user->email);
            $mail->from('cheesehiep3110@gmail.com', 'Alibaba English Center');
            $mail->subject('Bảo lưu khóa học!');
        });
        
        return redirect()->route('staff.reserveList')->with('success', 'Bảo lưu thành công cho học viên!');
    }

    public function getInfoLearnAgain($id) {
        $reserve = Reserve::find($id);
        $classes = ClassRoom::where([
            ['id', '<>', $reserve->class_id],
            ['course_id', $reserve->course_id],
            ['status', 1]
        ])->get();
        foreach ($classes as $key => $value) {
            $value->count_hs = count($value->students);
            $value->schedule;
            $value->place;
        };
        $filteredArray = Arr::where($classes->toArray(), function ($value, $key) {
            return $value['count_hs'] < 25;
        });

        return view('admin/staff/xep_lop_hoc_lai', [
            'reserve' => $reserve,
            'filteredArray' => $filteredArray
    	]);
    }

    public function updateLearnAgain($id) {
        $data = request()->all();
        $params = \Arr::except($data, ['_token']);
        $reserve = Reserve::find($id);
        $class = ClassRoom::find(request()->get('class_id'));

        $student = Student::find($reserve->student_id);
        $student['class_id'] = request()->get('class_id');

        $tuition = Tuition::where([
            ['student_id', $reserve->student_id],
            ['class_id', $reserve->student->class_id]
        ])->first();
        $tuition['class_id'] = request()->get('class_id');

        $tuition->save();
        $student->save();
        Mail::send('email.UpdateKH', [
            'email' => $student->user->email,
            'class' => $class,
        ], function($mail) use($student){
            $mail->to($student->user->email);
            $mail->from('cheesehiep3110@gmail.com', 'Alibaba English Center');
            $mail->subject('Thông báo lịch đi học lại!');
        });
        $reserve->delete();

        return redirect("lop-hoc/chi-tiet-lop-hoc/".$class->id)->with('status','Đã thêm học viên vào lớp!');
    }
}

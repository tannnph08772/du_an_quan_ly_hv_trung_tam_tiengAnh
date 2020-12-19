<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Tuition;
use Arr;

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
        
        return redirect()->route('staff.reserveList')->with('success', 'Bảo lưu thành công');
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

        $student = Student::find($reserve->student_id);
        $student['class_id'] = request()->get('class_id');

        $tuition = Tuition::where([
            ['student_id', $reserve->student_id],
            ['class_id', $reserve->student->class_id]
        ])->first();
        $tuition['class_id'] = request()->get('class_id');

        $tuition->save();
        $student->save();
        $reserve->delete();

        return redirect()->route('staff.reserveList')->with('updateLearnAgain', 'Xếp lớp thành công');
    }
}

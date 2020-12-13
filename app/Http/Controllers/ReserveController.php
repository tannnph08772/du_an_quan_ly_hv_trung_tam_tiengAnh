<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;

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
}

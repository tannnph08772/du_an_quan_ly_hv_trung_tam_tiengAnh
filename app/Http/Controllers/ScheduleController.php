<?php

namespace App\Http\Controllers;

use App\Http\Requests\Place\CreatePlaceRequest;
use App\Http\Requests\Place\EditPlaceRequest;
use App\Http\Requests\Schedule\CreateScheduleRequest;
use App\Http\Requests\Schedule\EditScheduleRequest;
use App\Services\ScheduleServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Whoops\Run;

class ScheduleController extends Controller
{
    protected $ScheduleServices;
    public function __construct(ScheduleServices $ScheduleServices)
    {
        $this->ScheduleServices = $ScheduleServices;    
    }
    public function index()
    {
        $list = $this->ScheduleServices->getSchedule();
        return view('admin.schedule.index',compact('list'));
    }
    public function add()
    {
        return view('admin.schedule.component.create');
    }
    public function create(CreateScheduleRequest $request)
    {
        $this->ScheduleServices->create($request);
        Session::flash('message','Thêm thành công');
        return redirect()->route('schedule.index');
    }
    public function delete()
    {
        $id = request()->get('id');
        $this->ScheduleServices->delete($id);
        return redirect()->route('schedule.index');
    }
    public function edit($id)
    {
        $edit = $this->ScheduleServices->findById($id);
        return view('admin.schedule.component.edit', compact('edit'));
        
    }
    public function update(EditScheduleRequest $request, $id )
    {
        $data = $this->ScheduleServices->updateSchedule($id,$request->all());
        Session::flash('message','Cập nhật thành công');
        return redirect()->route('schedule.index')->withInput();
    }
}

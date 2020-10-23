<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Services\ScheduleServices;
use Illuminate\Http\Request;
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
    public function create(Request $request)
    {
        $this->ScheduleServices->create($request);
        return redirect()->route('schedule.index');
    }
    public function delete($id)
    {
        $this->ScheduleServices->delete($id);
        return redirect()->route('schedule.index');
    }
    public function update(Request $request)
    {
        $id = request()->get('id');
        $edit = $this->ScheduleServices->findById($id);
        return view('admin.schedule.component.edit', compact('edit'));
        
    }
}

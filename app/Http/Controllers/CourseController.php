<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Requests\Course\EditCourseRequest;
use App\Services\CourseServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Whoops\Run;

class CourseController extends Controller
{
    protected $CourseServices;
    public function __construct(CourseServices $CourseServices)
    {
        $this->CourseServices = $CourseServices;    
    }
    public function index()
    {
        $list = $this->CourseServices->getCourse();
        return view('admin.course.index',compact('list'));
    }
    public function add()
    {
        return view('admin.course.component.create');
    }
    public function create(CreateCourseRequest $request)
    {
        $this->CourseServices->create($request);       
        Session::flash('message','Thêm thành công');
        return redirect()->route('course.index');
    }
    public function delete()
    {
        $id = request()->get('id');
        $this->CourseServices->delete($id);
        return redirect()->route('course.index');
    }
    public function edit($id)
    {
        $edit = $this->CourseServices->findById($id);
        return view('admin.Course.component.edit', compact('edit'));
        
    }
    public function update(EditCourseRequest $request, $id )
    {
        $data = $this->CourseServices->updateCourse($id,$request->all());
        Session::flash('message','Cập nhật thành công');
        return redirect()->route('course.index')->withInput();
    }
    
    public function single(Request $request)
    {   
        $listMenu = $this->CourseServices->getCourse();
        $id = $request->id;
        $list = $this->CourseServices->getSingleCourse($id);
        return view('admin/course/single',compact('list', 'listMenu'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\Place\CreatePlaceRequest;
use App\Http\Requests\Place\EditPlaceRequest;
use App\Services\PlaceServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Whoops\Run;

class PlaceController extends Controller
{
    protected $PlaceServices;
    public function __construct(PlaceServices $PlaceServices)
    {
        $this->PlaceServices = $PlaceServices;    
    }
    public function index()
    {
        $list = $this->PlaceServices->getPlace();
        return view('admin.place.index',compact('list'));
    }
    public function add()
    {
        return view('admin.place.component.create');
    }
    public function create(CreatePlaceRequest $request)
    {
        $this->PlaceServices->create($request);
        Session::flash('message','Thêm thành công !');
        return redirect()->route('place.index');
    }
    public function delete()
    {
        $id = request()->get('id');
        $this->PlaceServices->delete($id);
        return redirect()->route('place.index');
    }
    public function edit($id)
    {
        $edit = $this->PlaceServices->findById($id);
        return view('admin.Place.component.edit', compact('edit'));
        
    }
    public function update(EditPlaceRequest $request, $id )
    {
        $data = $this->PlaceServices->updatePlace($id,$request->all());
        Session::flash('message','Cập nhật thành công !');
        return redirect()->route('place.index')->withInput();
    }
}

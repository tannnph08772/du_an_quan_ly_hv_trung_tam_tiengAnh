<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Services\PlaceServices;
use Illuminate\Http\Request;
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
    public function create(Request $request)
    {
        $this->PlaceServices->create($request);
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
    public function update(Request $request, $id )
    {
        $data = $this->PlaceServices->updatePlace($id,$request->all());
        return redirect()->route('place.index')->withInput();
    }
}

<?php

namespace App\Http\Controllers;
use App\Http\Requests\Contact\CreateContactRequest;
use App\Services\ContactServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    protected $ContactServices;
    public function __construct(ContactServices $ContactServices)
    {
        $this->ContactServices = $ContactServices;    
    }
    public function index()
    {
        
        $list = $this->ContactServices->getContact();
        return view('admin.contact.lien-he',compact('list'));
    }
    public function create(CreateContactRequest $request)
    {
        $this->ContactServices->create($request);
        Session::flash('message','Bạn đã liên hệ thành công !');
        return redirect()->route('contact');
    }
    public function delete()
    {
        $id = request()->get('id');
        $this->ContactServices->delete($id);
        return redirect()->route('contact.index');
    }
}

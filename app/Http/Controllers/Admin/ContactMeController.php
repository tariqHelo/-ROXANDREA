<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactMe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactMeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $contact=ContactMe::all();
        return view('admin.contactme.index',compact('contact'));
    }
    public function create(){
        return view("frontend.home.contact");
    }
    public function destroy($id){
        ContactMe::destroy($id);
        session()->flash("msg", "w: Deleted Successfully");
        return redirect(route("contact_me.index"));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

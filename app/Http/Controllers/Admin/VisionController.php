<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visions = Vision::orderBy('id');

        $q=request()->get("q")??"";
        $published=request()->get("published");

        if($q){
            $visions->where('title','like',"%{$q}%");
        }
        if($published!=null){
            $visions->where('published',$published);
        }

        $visions = $visions->paginate(5)->appends([
            "q"=>$q,
            "published"=>$published,
            ]);
    
            return view('admin.vision.index')->withVisions($visions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vision.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->published){
            $request['published']=0;
        }
        Vision::create($request->all());
        Session::flash("msg","vision created successfully");
        return redirect(route('vision.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visions = Vision::find($id);
        if(!$visions){
           session()->flash("msg", "The vision was not found");
           return redirect(route("vision.index"));
        }
        return view("admin.vision.edit")->withVisions($visions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$request->published){
            $request['published']=0;
        }
        Vision::find($id)->update($request->all());
        session()->flash("msg", "The vision was updated");
        return redirect(route("vision.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visions = Vision::find($id);
        if(!$visions){  
            Session()->flash('msg','vision not found');
            return redirect(route('vision.index'));
        }
        Vision::destroy($id);
        session()->flash("msg", " vision Deleted Successfully");
        return redirect(route("vision.index"));
    }
}

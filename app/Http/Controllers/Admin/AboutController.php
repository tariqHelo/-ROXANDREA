<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\about\EditRequest;
use App\Http\Requests\about\CreateRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::orderBy('id');

        $q=request()->get("q")??"";
        $published=request()->get("published");

        if($q){
            $abouts->where('title','like',"%{$q}%");
        }
        if($published!=null){
            $abouts->where('published',$published);
        }

        $abouts = $abouts->paginate(5)->appends([
            "q"=>$q,
            "published"=>$published,
            ]);
    
            return view('admin.about.index')->withAbouts($abouts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.about.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        if(!$request->published){
            $request['published']=0;
        }
        About::create($request->all());
        Session::flash("msg","About created successfully");
        return redirect(route('about.index'));
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
        
        $abouts = About::find($id);
        if($abouts==null){
           session()->flash("msg", "The blog was not found");
           return redirect(route("about.index"));
        }
        return view("admin.about.edit")->withAbouts($abouts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        if(!$request->published){
            $request['published']=0;
        }
        if($request->imageFile){
            $image = basename($request->imageFile->store("public"));
            $request['image'] = $image;
        }
        About::find($id)->update($request->all());
        session()->flash("msg", "The About was updated");
        return redirect(route("about.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts = Blog::find($id);
        if(!$abouts){
            Session()->flash('msg','blogs not found');
            return redirect(route('abouts.index'));
        }
        About::destroy($id);
        session()->flash("msg", " blogs Deleted Successfully");
        return redirect(route("abouts.index"));
    }
}

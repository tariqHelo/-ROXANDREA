<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id');

        $q=request()->get("q")??"";
        $published=request()->get("published");

        if($q){
            $services->where('title','like',"%{$q}%");
        }
        if($published!=null){
            $services->where('published',$published);
        }

        $services = $services->paginate(5)->appends([
            "q"=>$q,
            "published"=>$published,
            ]);

            return view('admin.service.index')->withServices($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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

        Service::create($request->all());
        Session::flash("msg","About created successfully");
        return redirect(route('service.index'));
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
        $services = Service::find($id);
        if($services==null){
            session()->flash("msg", "The service was not found");
            return redirect(route("service.index"));
        }
        return view('admin.service.edit')->withServices($services);
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
        if($request->imageFile){
            $image = basename($request->imageFile->store("public"));
            $request['image'] = $image;
        }
        Service::find($id)->update($request->all());
        session()->flash("msg", "The About was updated");
        return redirect(route("service.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::find($id);
        if(!$services){
            Session()->flash('msg','blogs not found');
            return redirect(route('service.index'));
        }
        Service::destroy($id);
        session()->flash("msg", " blogs Deleted Successfully");
        return redirect(route('service.index'));
    }
}

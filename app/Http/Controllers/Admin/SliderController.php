<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Http\Requests\slider\EditRequest;
use Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::whereRaw('true');

        $q=request()->get('q')?? "";
        $published=request()->get('published');
       
        if($q){
            $sliders->where("title","like","%$q%");
        }
        if($published!=null){
            $sliders->where("published",$published);

        }
        $sliders=$sliders->paginate(5)->appends([
            "q"=>$q,
            "published"=>$published,
        ]);
        return view("admin.slider.index")->with("sliders",$sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders=Slider::all();
        return view("admin.slider.create")->withSliders($sliders);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        if(!$request->published ){
            $request['published']=0;
        }

        $imageName= basename($request->imageFile->store("public"));
        $request['image']=$imageName;

        Slider::create($request->all());
        session()->flash("msg", "s: Created Successfully");
        return redirect(route("sliders.index"));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sliders = Slider::find($id);
        if(!$sliders){
            session()->flash("msg", "e: The Slider was not found");
            return redirect(route("sliders.index"));
        }

        return view("admin.slider.show")->withSliders($sliders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = Slider::find($id);
        if($sliders==null){
            session()->flash("msg", "e: The Slider was not found");
            return redirect(route("sliders.index"));
        }

        return view("admin.slider.edit")->withSliders($sliders);
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
            $request['published'] = 0;
        }
        if($request->imageFile){
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }
        //dd($request->all());
        Slider::find($id)->update($request->all());
        session()->flash("msg", "i: Slider Updated Successfully");
        return redirect(route("sliders.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = Slider::find($id);
        if(!$sliders){
            session()->flash("msg", "e: Slider was not found");
            return redirect(route("sliders.index"));
        }
        $sliders->delete();
        session()->flash("msg", "w: Slider Deleted Successfully");
        return redirect(route("sliders.index"));
    }
}

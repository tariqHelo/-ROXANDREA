<?php

namespace App\Http\Controllers\Admin;

use session;
use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\food\EditRequest;
use App\Http\Requests\food\CreateRequest;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $foods = Food::whereRaw('true');
       
        $q=request()->get('q')?? "";
        $published=request()->get('published');

        if ($q) {
            $foods->where('title','like',"%{$q}%");
        }
        if ($published!=null) {
            $foods->where('published',$published);
        }
       
        $foods =$foods->paginate(10)->appends([
            "q"=>$q,
            "published"=>$published,
        ]);
       
      return  view('admin.foods.index')->withFoods($foods);


}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        if (!$request->published) {
            $request['published'] = 0;
        }

        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;
        Food::create($request->all());
        session()->flash("msg", "s: Created Successfully");
        return redirect(route("foods.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $foods=food::find($id);
        return view('admin.foods.edit')->withFoods($foods);
        
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
       /// $foods=food::find($id);

        if (!$request->published) {
            $request['published'] = 0;
        }
        if($request->imageFile) {
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }

        Food::find($id)->update($request->all());
        session()->flash("msg", "i: Foods Updated Successfully");
        return redirect(route("foods.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::find($id)->delete();
        session()->flash("msg", "w: Foods Deleted Successfully");
        return redirect(route("foods.index"));
    }
}

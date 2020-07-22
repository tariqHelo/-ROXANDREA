<?php

namespace App\Http\Controllers\Admin;

use session;
use App\Models\CateFoods;
use App\Models\Food;
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
        $foods=Food::orderBy('id','desc');
       
        $q=request()->get('q')?? "";
        $published=request()->get('published');
        $category=request()->get("category");

        if($q){
            $foods->where('title','like',"%{$q}%");
        }
        if($published!=null) {
            $foods->where('published',$published);
        }
        if($category){
            $foods->where('category_id',$category);
        }
        $foods =$foods->paginate(10)->appends([
            "q"=>$q,
            "published"=>$published,
            "category"=>$category
        ]);
      return view('admin.foods.index')->withFoods($foods);


}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=CateFoods::orderBy('title')->get();
        return view('admin.foods.create')->withCategories($categories);
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
    public function edit($id)
    {
        $foods=food::find($id);
        if($foods==null){
            session()->flash("msg", "The blog was not found");
            return redirect(route("foods.index"));
        }
         $categories = CateFoods::all();
         return view("admin.foods.edit", compact(['foods','categories']));
        
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

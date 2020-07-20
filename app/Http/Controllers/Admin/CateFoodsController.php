<?php

namespace App\Http\Controllers\Admin;

use App\Models\CateFoods;
use App\Models\Food;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CateFoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $foods = CateFoods::orderBy('id','desc');

        $q=request()->get("q")??"";
        $published=request()->get("published");

        if($q){
            $foods->where('title','like',"%{$q}%");
        }
        if($published!=null){
            $foods->where('published',$published);
        }
        $categories=CateFoods::orderBy('title')->get();
        $foods = $foods->paginate(5)->appends([
            "q"=>$q,
            "published"=>$published
            ]);
        return view('admin.foodcategory.index')->withFoods($foods)->withCategories($categories);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.foodcategory.create');

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
        CateFoods::create($request->all());
        Session::flash("msg","category created successfully");
        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = CateFoods::find($id);
        if(!$category){
           session()->flash("msg", "The category was not found");
           return redirect(route("category.index"));
        }
        return view("admin.foodcategory.show")->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CateFoods::find($id);
        if($category ==null){
           session()->flash("msg", "The category was not found");
           return redirect(route("category.index"));
        }
        return view("admin.foodcategory.edit")->withCategory($category);
    }
    public function active($id){
        $category_active=CateFoods::find($id);
        $category_active->update(['published'=>1]);
        session()->flash('msg','s: Category has been confirmed');
        return redirect()->back();
    }
    public function pending($id){
        $category_pending=CateFoods::find($id);
        $category_pending->update(['published'=>0]);
        session()->flash('msg','w: Category has been Pending');
        return redirect()->back();
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
        CateFoods::find($id)->update($request->all());
        session()->flash("msg", "The category was updated");
        return redirect(route("category.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CateFoods::find($id);
        if(!$category){  
            Session()->flash('msg','category not found');
            return redirect(route('category.index'));
        }
        CateFoods::destroy($id);
        session()->flash("msg", " category Deleted Successfully");
        return redirect(route("category.index"));
    }
}

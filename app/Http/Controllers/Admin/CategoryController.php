<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::orderBy('id');

        $q=request()->get("q")??"";
        $published=request()->get("published");

        if($q){
            $categories->where('title','like',"%{$q}%");
        }
        if($published!=null){
            $categories->where('published',$published);
        }

        $categories = $categories->paginate(5)->appends([
            "q"=>$q,
            "published"=>$published
            ]);
        return view('admin.category.index')->withCategories($categories);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');

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
        Category::create($request->all());
        Session::flash("msg","category created successfully");
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if(!$category){
           session()->flash("msg", "The category was not found");
           return redirect(route("category.index"));
        }
        return view("admin.category.show")->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if($category ==null){
           session()->flash("msg", "The category was not found");
           return redirect(route("category.index"));
        }
        return view("admin.category.edit")->withCategory($category);
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
        Category::find($id)->update($request->all());
        session()->flash("msg", "The category was updated");
        return redirect(route("categories.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category){  
            Session()->flash('msg','category not found');
            return redirect(route('categories.index'));
        }
        Category::destroy($id);
        session()->flash("msg", " category Deleted Successfully");
        return redirect(route("categories.index"));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\EditRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Blog\CreateRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $blogs=Blog::orderBy('id');

       $q=request()->get('q')?? "";
       $published=request()->get('published');
       $category=request()->get('category');

    if($q){
        $blogs->where('title','like',"%{$q}%");
    }
    if($published!=null){
        $blogs->where('published',$published);
    }
    if($category){
        $blogs->where('category_id',$category);
    }

    /*if($user){
        $blogs->where('user_id',$user);
    }*/

    $categories=Category::orderBy('title')->get();
    $blogs = $blogs->paginate(5)->appends([
        "q"=>$q,
        "published"=>$published,
        "category"=>$category,
      //  "user"=>$user
        ]);

        return view('admin.blog.index')
        ->withCategories($categories)
        ->withBlogs($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.blog.create")->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
         $request['user_id'] = 1;

        if(!$request->published){
            $request['published']=0;
        }

        $image = basename($request->imageFile->store("public"));
        $request['image']  = $image;
        Blog::create($request->all());
        Session::flash("msg","Blog created succesfully");
        return redirect(route('blogs.index'));


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
        $blogs = Blog::find($id);

        if($blog == null){
            session()->flash("msg", "The blog was not found");
            return redirect(route("blogs.index"));
        }

        $categories = Category::all();
        return view("admin.blog.edit" , compact(['blogs' , 'categories']));
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
         Blog::find($id)->update(request()-all());
         session()->flash("msg", "The blog was updated");
         return redirect(route("blogs.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = Blog::find($id);
        if(!$blogs){  
            Session()->flash('msg','blogs not found');
            return redirect(route('blogs.index'));
        }

         Blog::destroy($id);
       // Blog::find($id)->delete();
       session()->flash("msg", " blogs Deleted Successfully");
       return redirect(route("blogs.index"));
    }
}

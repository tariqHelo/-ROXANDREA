<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\EditRequest;
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
       $blogs=Blog::orderBy('id','desc');

       $q=request()->get("q")??"";
       $published=request()->get("published");
       $category=request()->get("category");
       $user=request()->get("user");

        if($q){
            $blogs->where('title','like',"%{$q}%");
        }
        if($published!=null){
            $blogs->where('published',$published);
        }
        if($category){
            $blogs->where('category_id',$category);
        }

        if($user){
            $blogs->where('user_id',$user);
        }
        $categories=Category::orderBy('title')->get();
        $blogs = $blogs->paginate(5)->appends(["q"=>$q,"published"=>$published,"category"=>$category,"user"=>$user]);

        return view('admin.blog.index', compact(['blogs','categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
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
        $request['image'] = $image;
        Blog::create($request->all());
        \Session::flash("msg","Blog created succesfully");
        return redirect(route('blogs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        if($blog==null){
           session()->flash("msg", "The blog was not found");
           return redirect(route("blogs.index"));
        }
        $categories = Category::all();
        return view("admin.blog.edit", compact(['blog','categories']));
    }

    public function active($id){
        $blog_active=Blog::find($id);
        $blog_active->update(['published'=>1]);
        session()->flash('msg','s: Blog has been Confired');
        return redirect()->back();

    }
    public function pending($id){
        $blog_pending=Blog::find($id);
        $blog_pending->update(['published'=>0]);
        session()->flash('msg','w: Blog has been Pending');
        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
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
        Blog::find($id)->update($request->all());
        session()->flash("msg", "The blog was updated");
        return redirect(route("blogs.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
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
        session()->flash("msg", " blogs Deleted Successfully");
        return redirect(route("blogs.index"));
    }
}

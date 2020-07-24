<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogs(Request $request)
    {
        $q = $request->get("q") ?? "";
        $category = $request->get("category");
        $blogs = Blog::whereRaw('true');

        if($q) {
            $blogs->where("title", "like", "%$q%");
        }
        if($category) {
            $category->where("category_id", $category);
        }
        $blogs = $blogs->paginate(3)->appends(["q" => $q,
            "category" => $category,]);
        $categories = Category::orderBy("title")->get();

        return view("frontend.blogs.blogs", compact(["blogs", "categories"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeComment(CommentsRequest $request, $id)
    {
        $blog = Blog::find($id);
        $data = $request->all();
        $data['blog_id'] = $blog->id;
        Comment::create($data);
        Session::flash('msg','s:Added Successfuly...');
        return redirect()->back();
    }

    
    public function blog($id)
    {
        $blog = Blog::find($id);
        $category = Category::where("published",1)->get();
        $comments = Comment::where('blog_id' , $id)('published','=','1')->get();
        $next_post=Blog::where('id' ,'>', $blog->id)->where('published','1')->min('id');
        $prev_post=Blog::where('id' ,'<', $blog->id)->where('published','1')->max('id');
        $blogs=Blog::where('published','=','1')->orderBy('id','desc')->where('id','!=',$id)->limit(3)->get();
        return view('frontend.blogs.blogs')
        ->with('blog',$blog)
            ->with('category',$category)
            ->with('blogs',$blogs)
            ->with('comments',$comments)
            ->with('next_post',Blog::find($next_post))
            ->with('prev_post',Blog::find($prev_post));
        
    }

   
}

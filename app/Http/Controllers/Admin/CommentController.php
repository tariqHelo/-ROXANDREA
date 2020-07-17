<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id');

        $published = \request()->get('published');
        $blog = \request()->get('blog');
        $name = \request()->get('name');
        $website = \request()->get('website');

        if(isset($published)){

            $comments->where('published' , $published);
        }
        if ($name){

            $comments->where('name' , 'like' , "%{$name}%");
        }
        if($blog != null){

            $comments->where('blog' , $blog);
        }
        if ($website != null){

            $comments->where('website' , 'like' , "%{$website}%");
        }
      
        $comments = $comments->paginate(10)->appends([
          $name => "name",
          $published => "published",
          $blog => "blog",
          $website => "website",
        ]);
        $comment = Comment::first();
         return view('admin.comments.comments')->withComments($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentsRequest $request)
    {
        $request['published'] = $request->get('published')?1:0;
        Comment::create($request->all());
        session()->flash('msg' , 's: comment created successfully');
       return redirect(route('comments.index'));
    }
    public function status($id)
    {
        $comment_active=Comment::find($id);
        $comment_active->update(['published'=>!$comment_active->published]);
        session()->flash('msg','s: Comment has been confirmed');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
      $comments =  Comment::find($comment->id);
      return view('admin.comments.show')->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments = Comment::find($id);
       
        if(!$comments){
            session()->flash('msg' , 'w: comment no found');
            return redirect(route('comments.index'));
        }

        return view('admin.foods.edit')->withComments($comments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentsRequest $request, $id)
    {
        $request['published'] = $request->get('published')?1:0;
        Comment::find($id)->update($request->all());
        session()->flash('msg' , 's: comment updated successfully');
        return redirect(route('comments.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments  = Comment::find($id);

        if(!$comments){
            Session()->flash('msg','comment not found');
            return redirect(route('comments.index'));
        }

        Comment::destroy($id);
        session()->flash("msg", "s:  comments Deleted Successfully");
        return redirect(route("comments.index"));

    }
}

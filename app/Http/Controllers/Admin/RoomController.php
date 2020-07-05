<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\room\EditRequest;
use App\Http\Requests\room\CreateRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::whereRaw('true');

         $q=request()->get('q')?? "";
         $published=request()->get('published');

     
        if($q)
        {
         $rooms->where("title","like","%$q%");
        }
        if($published!=null)
        {
             $rooms->where("published",$published);  
        }
       
        $rooms=$rooms->paginate(10)->appends([
            "q"=>$q,
            "published"=>$published
        ]);
        return view("admin.rooms.index")->withRooms($rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        if (!$request->published){
            $request['published']=0;
        }

        $imageName=basename($request->imageFile->store("public"));
        $request['image']=$imageName;
        Room::create($request->all());
        return redirect(route('rooms.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rooms = Room::find($id);
        
        if(!$rooms){
            session()->flash("msg", "e: Room was not found");
            return redirect(route("rooms.index"));
        }

        return view("rooms.edit")->withRooms($rooms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
        
        //dd(20);

        $rooms = Room::find($id);
        if(!$rooms){
            session()->flash("msg", "e: Room was not found");
            return redirect(route("rooms.index"));
        }

        return view("admin.rooms.edit")->withRooms($rooms);
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
        if(!$request->published ){
            $request['published']=0;
        }
     
        if($request->imageFile){
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }
    
        Room::find($id)->update($request->all());
       
        session()->flash("msg", "Room Updated Successfully");
        return redirect(route("rooms.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::destroy($id);
        session()->flash("msg", "w: Room Deleted Successfully");
        return redirect(route("rooms.index"));
    }
}

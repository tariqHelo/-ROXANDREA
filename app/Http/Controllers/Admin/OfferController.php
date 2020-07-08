<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Offer\CreateRequest;
use App\Http\Requests\Offer\EditRequest;


class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $offers = Offer::whereRaw('true');

         $q = request()->q ?? "";
         $published = request()->published ?? "";

       if ($q) {
           $offers->where('title','like',"%{$q}%");
       }
       if ($published!=null) {
           $offers->where('published',$published);
       }

       $offers =$offers->paginate(10)->appends([
           "q"=>$q,
           "published"=>$published

       ]);
        return view("admin.offer.index")->with("offers", $offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.offer.create");

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
        Offer::create($request->all());
        session()->flash("msg", "s: Created Successfully");
        return redirect(route("offers.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer=Offer::find($id);
        return view('admin.offer.edit')->with('offer',$offer);
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
        if($request->imageFile) {
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }
        Offer::find($id)->update($request->all());
        session()->flash("msg", "i: News Updated Successfully");
        return redirect(route("offers.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offer::find($id)->delete();
        session()->flash("msg", "w: offer Deleted Successfully");
        return redirect(route("offers.index"));
    }
}

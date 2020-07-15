<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Link;
use App\Models\UserLink;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q=$request->get("q")??"";

        $users=User::whereRaw('true');

        if($q){
            $users->where("name","like","%$q%");
        }
        $users=$users->paginate(3)->appends(["q"=>$q,]);
        return view("admin.user.index")->with("users",$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view("admin.user.create")->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());

        session()->flash("msg", "s: Created Successfully");
        return redirect(route("users.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        if(!$users){
            session()->flash("msg", "e: User was not found");
            return redirect(route("users.index"));
        }
        return view("admin/user.show")->withuser($users);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        if($users==null){
            session()->flash("msg", "e: USer was not found");
            return redirect(route("users.index"));
        }

        return view("admin/user.edit")->withUsers($users);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $request['password'] = bcrypt($request['password']);
        User::find($id)->update($request->all());

        session()->flash("msg", "i:User Updated Successfully");
        return redirect(route("users.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user){
            session()->flash("msg", "e: USer was not found");
            return redirect(route("users.index"));
        }
        if($user->id == auth()->user()->id){
            session()->flash("msg", "w: You can't delete logged in user");
            return redirect(route("users.index"));
        }
        $user->delete();
        session()->flash("msg", "w:User Deleted Successfully");
        return redirect(route("users.index"));
    }


    public function changePassword(){
        return view('admin.user.change_password');
    }

  public function postChangePassword(ChangePasswordRequest $request){

        $hasher = app('hashe');

        if($hasher->check($request->current_password , auth()->user()->password)){

            $user  = User::find(auth()->user()->id);
            $user->update(['password'=>bcrypt($request->new_password)]);

            session()->flash("msg", "s:Password updated Successfully");
                return redirect(route("change-password"));
        }
        else 
        {
            session()->flash("msg", "e:Invalid Current Password");
            return redirect(route("change-password"));
         }
    }

    public function permissions($id){

        $user = User::find($id);
        if(!$user){
            session()->flash("msg", "e: User was not found");
            return redirect(route("users.index"));
        }
        return view("admin/user.permissions")
            ->withuser($user)
            ->withLinks(Link::all());
     }
     
     public function postPermissions(Request $request, $id){
        //delete all current permissios for this user
        UserLink::where("user_id", $id)->delete();
        if(!empty($request['permissions'])){
            foreach($request->permissions as $permission){
                UserLink::create([
                    'user_id' => $id,
                    'link_id' => $permission
                ]);
            }
        }
        session()->flash("msg", "i: User Permissions Updated Successfully");
        return redirect(route("users.index"));
    }


}

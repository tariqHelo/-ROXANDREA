<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index')->withMenus($menus);
    }

    public function create()
    {
        $menus = Menu::where('parent_id' , 0)->get();
        return view('admin.menu.create')->withMenus($menus);
    }

    public function store(MenuRequest $request)
    {
        $request['active'] = $request['active']??0;
        if($request->is_route){
            $request['url'] = $request['routes']; 
        }
        Menu::create($request->all());
        session()->flash('msg' , 's: menu created successfully');
        return redirect(route('menus.index'));

    }
    public function edit($menu)
    {
        $menu = Menu::find($menu);
        $menus = Menu::where('parent_id' , 0)->get();
        if($menu == null){
            session()->flash('msg' , 'w: Oops , cannot find your request');
            return redirect(route('menus.index'));
        }else{

            return view('admin.menu.edit')->withMenu($menu)->withMenus($menus);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Menu $menu , MenuRequest $request)
    {
        if($request->is_route){
            $request['url'] = $request['routes']; 
        }
        $request['active'] = $request->get('active')?1:0 ;
       Menu::find($menu->$id)->update($request->all());
       session()->flash('msg' , 's: menu updated successfully');
       return redirect(route('menus.index'));
    }
    public function destroy($menu)
    {
        $menu = Menu::find($menu);
        if($menu == null){
            session()->flash('msg' , 'w: sorry we have not menu');
            return redirect(route('menus.index'));
        }
        Menu::destroy($menu);
        session()->flash('msg' , 's: menu deleted successfully');
            return redirect(route('menus.index'));

    }
}

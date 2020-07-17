<?php

use Illuminate\Database\Seeder;
use App\Models\Link;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            //Blogs Sesction
            $link = Link::create(['title'=>'Blogs','icon'=>'icon-home','route'=>'#']);
            Link::create(['title'=>'Manage Blogs','icon'=>'icon-list','route'=>'blogs.index','parent_id'=>$link->id]);
            Link::create(['title'=>'Create New Blog','icon'=>'icon-plus','route'=>'blogs.create','parent_id'=>$link->id]);
            Link::create(['title'=>'Manage Categories','icon'=>'icon-list','route'=>'categories.index','parent_id'=>$link->id]);
            Link::create(['title'=>'Comments','icon'=>'fa fa-list','route'=>'comments.index','parent_id'=>$link->id]);
    
            //Rooms        
            $link = Link::create(['title'=>'Rooms','icon'=>'fa fa-tv','route'=>'#']);
            Link::create(['title'=>'Manage Rooms','icon'=>'icon-list','route'=>'rooms.index','parent_id'=>$link->id]);
            Link::create(['title'=>'Create New Room','icon'=>'icon-plus','route'=>'rooms.create','parent_id'=>$link->id]);
           
          
            //Site Setup        
            $link = Link::create(['title'=>'Site Setup','icon'=>'fa fa-cog','route'=>'#']);
            Link::create(['title'=>'Manage Sliders','icon'=>'icon-list','route'=>'sliders.index','parent_id'=>$link->id]);
            Link::create(['title'=>'Settings','icon'=>'icon-plus','route'=>'settings','parent_id'=>$link->id]);
            Link::create(['title'=>'Manage Menus','icon'=>'icon-list','route'=>'menus.index','parent_id'=>$link->id]);
            Link::create(['title'=>'Bookings','icon'=>'icon-list','route'=>'bookings.index','parent_id'=>$link->id]);
            Link::create(['title'=>'Contacts','icon'=>'fa fa-info','route'=>'contact_me.index','parent_id'=>$link->id]);
    
            
            //Users        
            $link = Link::create(['title'=>'Users','icon'=>'fa fa-users','route'=>'#']);
            Link::create(['title'=>'Manage Users','icon'=>'icon-list','route'=>'users.index','parent_id'=>$link->id]);
            Link::create(['title'=>'Create New User','icon'=>'icon-plus','route'=>'users.create','parent_id'=>$link->id]);
            Link::create(['title'=>'Delete User','icon'=>'fa fa-trash','route'=>'users.destroy','parent_id'=>$link->id,'show_in_menu'=>0]);
            Link::create(['title'=>'Edit User','icon'=>'fa fa-edit','route'=>'users.edit','parent_id'=>$link->id,'show_in_menu'=>0]);
            Link::create(['title'=>'User Links','icon'=>'fa fa-lock','route'=>'permissions','parent_id'=>$link->id,'show_in_menu'=>0]);

           //Foods        
            $link = Link::create(['title'=>'Foods','icon'=>'fas fa-hamburger','route'=>'#']);
            Link::create(['title'=>'Manage Categories','icon'=>'icon-list','route'=>'Categories.index','parent_id'=>$link->id]);
            Link::create(['title'=>'Manage Foods','icon'=>'icon-list','route'=>'foods.index','parent_id'=>$link->id]);
            Link::create(['title'=>'Create New Foods','icon'=>'icon-plus','route'=>'foods.create','parent_id'=>$link->id]);

        
    
    }
}

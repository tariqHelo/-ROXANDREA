<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Link;
use App\Models\UserLink;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::where('email','admin@aa.com')->first()==null){

            $user = User::create(['email'=>'admin@aa.com','password'=>bcrypt('123456'),'name'=>'System Admin']);      

            $links = Link::all();
            
            foreach($links as $link){
                UserLink::create([
                    'user_id' => $user->id,
                    'link_id' => $link->id,
                ]);
            }

        }
    }
}

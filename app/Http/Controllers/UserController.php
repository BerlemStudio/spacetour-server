<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest; 
use App\User;
use App\Models\Story;
use App\User_story_list;
use App\Models\Scene;
use App\User_scene_list;

class UserController extends Controller {
    public function store(Request $request){
        $user = User::create([
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $scene = Scene::where('id' ,'>' ,0)->pluck('id')->toArray();
        for($x=0;$x<count($scene);$x++){
            User_scene_list::create([
                'user_id' => $user->id,
                'scene_id' => $scene[$x],
                'unlock' => false,
            ]);
        }
        
        return $user;
    }
    public function index(Request $request){
        return User::all();
    }
}
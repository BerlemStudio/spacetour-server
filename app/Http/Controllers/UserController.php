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
    public function user_scene_list(Request $request){
        return $request->user()->user_scene_list()->with('scene')->get(['user_id','scene_id','unlock']);
    }
    public function unlockScene(Request $request){
        $user_id = $request->user()->id;
        // $user_id = $request->user_id;
        $scene_id = $request->scene_id;
        $user_scene_list = User_scene_list::where('user_id',$user_id)->where('scene_id',$scene_id);
        $new_user_scene_list = array("unlock" => true);
        $user_scene_list->update($new_user_scene_list);
        return $user_scene_list->get();
    }
    public function user_scene_list_unlocked(Request $request){
        return $request->user()->user_scene_list()->with('scene')->where('unlock',true)->get(['user_id','scene_id','unlock']);
    }
    public function user(Request $request){
        return $request->user();
    }
    public function create_story(Request $request){
        $story = Story::create([
            'name' =>  $request->name,
            'description' => $request->description,
            'public' => 0,
            'created_by' => $request->user()->id,
        ]);
        return $story;
    }
    public function story(Request $request){
        return $request->user()->story()->get();
    }
}
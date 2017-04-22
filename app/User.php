<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User_story_list;
use App\Models\Story;
use App\Models\Scene;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function story(){
        return $this->hasMany(Story::class, 'user_story_lists', 'user_id' , 'story_id');
    }
    public function scene(){
        return $this->belongsToMany(Scene::class, 'user_scene_lists', 'user_id' , 'scene_id');
    }
    public function user_scene_list(){
        return $this->hasMany(User_scene_list::class);
    }
}

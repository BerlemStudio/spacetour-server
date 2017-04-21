<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scene;
use App\User;
class User_scene_list extends Model
{   
    protected $fillable = [
        'user_id',
        'scene_id',
        'unlock'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scene(){
        return $this->belongsTo(Scene::class);
    }
}

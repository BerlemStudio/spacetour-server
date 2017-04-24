<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{

    protected $fillable = ['name', 'description', 'public', 'created_by'];

    public function User() {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function Scene(){
        return $this->belongsToMany(Scene::class, 'stories_scene_lists', 'story_id' , 'scene_id');
    }
}

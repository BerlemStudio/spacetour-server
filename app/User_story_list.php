<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\User;
use app\Models\Story;
class User_story_lists extends Model
{
    protected $fillable = [
        'user_id',
        'story_id',
        'unlock'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function story(){
        return $this->belongsTo(Story::class);
    }
}

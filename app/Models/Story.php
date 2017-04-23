<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{

    protected $fillable = ['name', 'description', 'public', 'created_by'];

    public function User() {
        $this->belongsTo('App\User', 'created_by');
    }

    public function Scene(){

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller {
    public function store(Request $request){
        $this->authorize('create', User::class);
        // encrypt before insert to database
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        return User::create($input);
    }
}
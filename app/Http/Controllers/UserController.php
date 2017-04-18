<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {
    public function store(Request $request){
        // $this->authorize('create', User::class);
        // $User = new user();
        $input['name'] = $request->name;
        $input['password'] = bcrypt($request->input('password'));
        $input['email'] = $request->input('email');
        return User::create($input);
        
        
    }
}
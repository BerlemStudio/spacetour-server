<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scene;
use Storage;

class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Scene::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $scene;
        if($request->hasFile('image')){
                $path = $request->file('image')->store('public/images');

                $url = Storage::url($path);
                
                $scene = new Scene();
                $scene->name = $request->name;
                $scene->scene_name = $request->scene_name;
                $scene->description = $request->description;
                $scene->image_path = $request->url;
                $scene->save;
            }
        return Scene::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
                $path = $request->file('image')->store('public/images');
                $url = Storage::url($path);
                
                $scene = new Scene();
                $scene->name = $request->name;
                $scene->scene_name = $request->scene_name;
                $scene->description = $request->description;
                $scene->image_path = $url;
                $scene->save;
            }
        return $scene;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

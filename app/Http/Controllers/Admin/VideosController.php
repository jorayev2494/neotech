<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Video;
use Validator;
use Session;
use Config;

class VideosController extends AdminController
{
    public function __construct() {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return __METHOD__;
        // // проверка отношение многие ко многим
        // $alias = Alias::find(2);
        // $groups = $alias->groups;
        // foreach ($groups as $group) {
        //     dump($group->title);
        // }
        
        $this->title = "Aliases";
        $aliases = Video::paginate(Config::get("settings.admin_count_videos_column"));
        // dd($aliases->groups);
        $content = view(env("ADMIN") . ".pages.videos.index")->with(["aliases" => $aliases, "title" => $this->title])->render();
        $this->vars = array_add($this->vars, "content", $content);

        return $this->outputDashboard();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title = "Create Alias";

        $groups = \App\Group::all();     //->pluck("id", "title");
        $this->vars = array_add($this->vars, "groups", $groups);
        // dd($this->vars);

        $content = view(env("ADMIN") . ".pages.videos.create")->with(["title" => $this->title, "groups" => $groups])->render();
        $this->vars = array_add($this->vars, "content", $content);

        return $this->outputDashboard();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data = request()->except("_token");
        // dd($data);
        $validator = Validator::make($data, [            
            "title" => "required",                  // |unique:aliases",
            "video" => "required",                  // |mimes:jpeg,png|max:80000",
            "image" => "required|mimes:jpeg,png|max:80000",
            "body"  => "required",                  // |string|unique:aliases",   
            "group" => "required"        
        ]);
            
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        // Video
        $file = $request->file("video");        
        
        $video = $input["video"] = $file->getClientOriginalName();
        
        if ($request->hasFile("video")) {
            $file->move(public_path(env("THEME")) . "/video/post/", $input["video"]);
        }
        
        // Images
        $file = $request->file("image");        
        
        $input["image"] = $file->getClientOriginalName();
        
        if ($request->hasFile("image")) {
            $file->move(public_path(env("THEME")) . "/img/blog/", $input["image"]);
        }
        // dump($input["video"]);
        // dd($input["image"]);
        // dd(Video::get());

        
        if ($request->has('action')) {
            
            $alias = Video::create([
                "title" => $data["title"],
                "video" => $input["video"],
                "img"   => $input["image"],
                "body"  => $data["body"],
                "action" => 1,
            ]);  
                
                // dd($request->all());
            /*$alias_group = new \App\AliasGroup([
                "alias_id" => $alias->id,
                "group_id" => $data["group"],
                ]);
            $alias_group->save();*/

            // dd($request->all());

            Session::put('success_update_active', "И опубликована!");

        } else {
                
            $alias = Video::create([
                "title" => $data["title"],
                "video"   => $input["video"],
                "img"   => $input["image"],
                "body"  => $data["body"],
                "action" => 0,
            ]);

            /*$alias_group = new \App\AliasGroup([
                "alias_id" => $alias->id,
                "group_id" => $data["group"],
                ]);
            $alias_group->save();*/

            Session::put('success_update_active', "И не опубликована!");
        }

        Session::put('success_store', "Видео успешно создан!");

        return redirect()->route("videos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __METHOD__;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alias = Video::find($id);
        $this->title = "Update Alias: " . $alias->title;

        $groups = \App\Group::all();     //->pluck("id", "title");
        $this->vars = array_add($this->vars, "groups", $groups);
        // dd($this->vars);

        $content = view(env("ADMIN") . ".pages.videos.edit")->with(["alias" => $alias, "title" => $this->title, "groups" => $groups])->render();
        $this->vars = array_add($this->vars, "content", $content);

        return $this->outputDashboard();

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

        $alias = Video::find($id);

        $data = $request->except("_token", "_method");        
        
        $validator = Validator::make($data, [            
            "title" => "required",                  // |unique:aliases",
            "video" => "required",                   // |mimes:jpeg,png",
            "image" => "required|mimes:jpeg,png",
            "body"  => "required",                  // |string|unique:aliases",            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }
        
        // Video
        $file = $request->file("video");        
        
        $input["video"] = $file->getClientOriginalName();
        
        if ($request->hasFile("video")) {
            $file->move(public_path(env("THEME")) . "/video/post/", $input["video"]);
        }

        //  Image
        $file = $request->file("image");        
        
        $input["image"] = $file->getClientOriginalName();
        
        if ($request->hasFile("image")) {
            $file->move(public_path(env("THEME")) . "/img/blog/", $input["image"]);
        }

        // dd($data["title"]);
        
        $alias->update([
            "title" => $data["title"],
            "video" => $input["video"],
            "img" => $input["image"],
            "body" => $data["body"],
            ]);
            
            // dd($alias);
        if ($request->has('action')) {

            $alias->update([
                "action" => 1,
            ]);                
            Session::put('success_update_active', "И опубликована!");

        } else {
                
            $alias->update([
                "action" => 0,
            ]);
            Session::put('success_update_active', "И не опубликована!");
        }
            
        Session::put('success_update', "Статья успешно обновлена!");

        return redirect()->route("videos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $video = Video::find($id);
        if ($video) {
            // dd($alias);
            $groups = $video->groups()->detach();

            $video->delete();
            
            Session::put('success_deleted', "Видео успешно удален!");

            return redirect()->back();
        }
        abort(404);
    }
}

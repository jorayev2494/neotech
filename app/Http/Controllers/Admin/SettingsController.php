<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Alias;
use Validator;
use Session;
use Config;

class SettingsController extends AdminController
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
        
        // // проверка отношение многие ко многим
        // $alias = Alias::find(2);
        // $groups = $alias->groups;
        // foreach ($groups as $group) {
        //     dump($group->title);
        // }
        
        $this->title = "Settings";
        // $aliases = Alias::paginate(Config::get("settings.admin_count_alias_column"));
        // dd($aliases->groups);

        $configAll = Config::all();
        $settings = $configAll["settings"];
        // dd($configAll["settings"]);

        $content = view(env("ADMIN") . ".pages.settings.index")->with(["settings" => $settings, "title" => $this->title])->render();
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

        $content = view(env("ADMIN") . ".pages.aliases.create")->with(["title" => $this->title, "groups" => $groups])->render();
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
        // {{ (isset($request->has("site_logo"))) ? Config::set($settings["logo"], dd($request)) : "" }}
        // dd($request->all()); 

        $data = $request->except("_token");

        
        Config::set('site_logo', $data["site_logo"]);
        
        
        return redirect()->back()->with("success_update", "dawdadawdawd");
        

        dd($data["site_logo"]);

        $data = request()->except("_token");
        // dd($data);
        $validator = Validator::make($data, [            
            "title" => "required",                  // |unique:aliases",
            "image" => "required|mimes:jpeg,png|max:80000",
            "body"  => "required",                  // |string|unique:aliases",   
            "group" => "required"        
        ]);
            
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }
        
        $file = $request->file("image");        
        
        $input["image"] = $file->getClientOriginalName();
        
        if ($request->hasFile("image")) {
            $file->move(public_path(env("THEME")) . "/img/blog/", $input["image"]);
        }

        if ($request->has('action')) {

            $alias = Alias::create([
                "title" => $data["title"],
                "img"   => $input["image"],
                "body"  => $data["body"],
                "action" => 1,
            ]);  
            
            $alias_group = new \App\AliasGroup([
                "alias_id" => $alias->id,
                "group_id" => $data["group"],
                ]);
            $alias_group->save();

            Session::put('success_update_active', "И опубликована!");

        } else {
                
            $alias = Alias::create([
                "title" => $data["title"],
                "img"   => $input["image"],
                "body"  => $data["body"],
                "action" => 0,
            ]);

            $alias_group = new \App\AliasGroup([
                "alias_id" => $alias->id,
                "group_id" => $data["group"],
                ]);
            $alias_group->save();

            Session::put('success_update_active', "И не опубликована!");
        }

        Session::put('success_store', "Статья успешно создан!");

        return redirect()->route("aliases.index");
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
        $alias = Alias::find($id);
        $this->title = "Update Alias: " . $alias->title;

        $content = view(env("ADMIN") . ".pages.aliases.edit")->with(["alias" => $alias, "title" => $this->title])->render();
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

        $alias = Alias::find($id);

        $data = $request->except("_token", "_method");        
        
        $validator = Validator::make($data, [            
            "title" => "required",                  // |unique:aliases",
            "image" => "required|mimes:jpeg,png",
            "body"  => "required",                  // |string|unique:aliases",            
        ]);
          
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }
        
        $file = $request->file("image");        
        
        $input["image"] = $file->getClientOriginalName();
        
        if ($request->hasFile("image")) {
            $file->move(public_path(env("THEME")) . "/img/blog/", $input["image"]);
        }

        $alias->update([
            "title" => $data["title"],
            "img" => $input["image"],
            "body" => $data["body"],
        ]);

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

        return redirect()->route("aliases.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $alias = Alias::find($id);
        if ($alias) {
            // dd($alias);
            $groups = $alias->groups()->detach();

            $alias->delete();
            
            Session::put('success_deleted', "Статья успешно удален!");

            return redirect()->back();
        }
        abort(404);
    }
}

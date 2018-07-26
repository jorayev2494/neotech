<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Group;
use Validator;
use Session;
use Config;
use phpDocumentor\Reflection\Types\This;
use App\Alias;

class GroupsController extends AdminController
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
        
        $this->title = "Groups";
        $groups = Group::all();

        // dd($this->vars);
        // dd($groups);
        $content = view(env("ADMIN") . ".pages.groups.index")->with(["groups" => $groups, "title" => $this->title])->render();
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
        $this->title = "Create Groups";

        $groups = \App\Group::all();     //->pluck("id", "title");
        $this->vars = array_add($this->vars, "groups", $groups);
        // dd($this->vars);

        $content = view(env("ADMIN") . ".pages.groups.create")->with(["title" => $this->title, "groups" => $groups])->render();
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
            "title" => "required|unique:groups",                  // |unique:aliases",
        ]);
            
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }
        // dd($data["title"]);
        if ($request->has('action')) {

            $group = Group::create([
                "title" => $data["title"],
                "action" => 1,
            ]);  
            
            Session::put('success_update_active', "И опубликована!");

        } else {
                
            $group = Group::create([
                "title" => $data["title"],
                "action" => 0,
            ]);

            Session::put('success_update_active', "И не опубликована!");
        }

        Session::put('success_store', "Группа успешно создан!");

        return redirect()->route("groups.index");
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
        $group = Group::find($id);
        $this->title = "Update Group: " . $group->title;

        $content = view(env("ADMIN") . ".pages.groups.edit")->with(["group" => $group, "title" => $this->title])->render();
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

        $group = Group::find($id);
        $data = $request->except("_token", "_method");        

        // dd($data);
        
        $validator = Validator::make($data, [            
            "title" => "required|unique:groups",                  // |unique:aliases",
        ]);
          
        if ($request->has('action')) {

            $group->update([
                "title" => $data["title"],
                "action" => 1,
            ]);                
            Session::put('success_update_active', "И опубликована!");

        } else {
                
            $group->update([
                "title" => $data["title"],
                "action" => 0,
            ]);
            Session::put('success_update_active', "И не опубликована!");
        }
            
        Session::put('success_update', "Группа успешно обновлена!");

        return redirect()->route("groups.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        

        $group = Group::find($id);
        if ($group) {

            foreach ($group->aliases as $alias) {
                $aliasID = $alias->id;

                $aliasGroup = \App\AliasGroup::where("group_id", "=", $group->id)->delete();
                
                $alias = Alias::find($aliasID)->delete();
                
                // dd($alias);
            }

            
            // $aliasGroup = \App\AliasGroup::where("group_id", "=", $group->id)->delete();


            // $alias = Alias::find($group->aliases[0]->id);
            // dd($group->aliases);
            // dd($aliasGroup);
            $group->delete();
            
            Session::put('success_deleted', " Группа успешно удален!");

            return redirect()->back();
        }
        abort(404);
    }
}

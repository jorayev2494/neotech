<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Subscribe;
use Validator;
use Session;
use Config;

class SubscribesController extends AdminController
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
        
        $this->title = "Subscribes";
        $subscribes = Subscribe::paginate(Config::get("settings.admin_count_subscribes_column"));
        // dd($aliases->groups);
        // dd($subscribes);
        $content = view(env("ADMIN") . ".pages.subscribes.index")->with(["subscribes" => $subscribes, "title" => $this->title])->render();
        $this->vars = array_add($this->vars, "content", $content);
        // dd($this->vars);

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

        // $groups = \App\Group::all();     //->pluck("id", "title");
        /*$this->vars = array_add($this->vars, "groups", $groups);*/
        // dd($this->vars);

        $content = view(env("ADMIN") . ".pages.subscribes.create")->with(["title" => $this->title, /*"groups" => $groups*/])->render();
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
            "email" => "required|email|unique:subscribes,email",   // |unique:aliases,title",               
        ]);
            
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }
        
        if ($request->has('action')) {

            $subscribe = Subscribe::create([
                "email" => $data["email"],
                "action" => 1,
            ]);  
            
            Session::put('success_update_active', "И активирован!");

        } else {
                
            $subscribe = Subscribe::create([
                "email" => $data["email"],
                "action" => 0,
            ]);

            Session::put('success_update_active', "И не активирован!");
        }

        Session::put('success_store', "Почта успешно подписан!");

        return redirect()->route("subscribes.index");
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
        $subscribe = Subscribe::find($id);
        $this->title = "Update Subscribes: " . $subscribe->email;

        $content = view(env("ADMIN") . ".pages.subscribes.edit")->with(["subscribe" => $subscribe, "title" => $this->title])->render();
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

        $subscribe = Subscribe::find($id);

        $data = $request->except("_token", "_method");        
        
        $validator = Validator::make($data, [            
            "email" => "required|unique:subscribes,email,$id",                  // |unique:aliases",
        ]);
          
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        if ($request->has('action')) {

            $subscribe->update([
                "email" => $subscribe["email"],
                "action" => 1,
            ]);          
                  
            Session::put('success_update_active', "И активировано!");

        } else {
                
            $subscribe->update([
                "email" => $subscribe["email"],
                "action" => 0,
            ]);

            Session::put('success_update_active', "И не активировано!");
        }
            
        Session::put('success_update', "Email успешно обновлена!");

        return redirect()->route("subscribes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $subscribe = Subscribe::find($id);
        if ($subscribe) {
            $subscribe->delete();
            Session::put('success_deleted', "Почта успешно удален!");
            return redirect()->back();
        }
        abort(404);
    }
}

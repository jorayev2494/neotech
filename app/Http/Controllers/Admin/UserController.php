<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Validator;
use App\User;
use Session;
use Config;

class UserController extends AdminController
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
        $this->title = "Users";
        $users = User::paginate(Config::get("settings.admin_count_user_column"));
        
        $content = view(env("ADMIN") . ".pages.users.index")->with(["users" => $users, "title" => $this->title])->render();
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
        $this->title = "Create user";

        $content = view(env("ADMIN") . ".pages.users.create")->with(["title" => $this->title])->render();
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
        $data = request()->except("_token");
        
        $validator = Validator::make($data, [
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|confirmed",
        ]);
            
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        Session::put('success_store', "Пользователь успешно создан!");

        return redirect()->route("users.index");

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
        $user = User::find($id);
        $this->title = "Update user: " . $user->name;

        $content = view(env("ADMIN") . ".pages.users.edit")->with(["user" => $user, "title" => $this->title])->render();
        $this->vars = array_add($this->vars, "content", $content);
        // return view(env("ADMIN") . ".index")->with($this->vars);
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

        $user = User::find($id);

        $data = request()->except("_token");
        
        $validator = Validator::make($data, [
            
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|confirmed",

        ]);
            
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $user->update([

            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])

        ]);

        Session::put('success_update', "Пользователь успешно обновлен!");

        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();

            Session::put('success_deleted', "Пользователь успешно удален!");

            return redirect()->back();
            
        }

        abort(404);
    }
}

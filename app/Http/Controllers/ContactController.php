<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactEmail;
use Validator;
use App\Menu;
use Session;
use Mail;
use Lang;
// use App\Email\ContactEmail;

class ContactController extends BasicController
{
    public function __construct() {
        parent::__construct(new \App\Repositories\MenusRepositories(new Menu));

        $this->title = Lang::get("lang.index_title_text");
        $this->template = env("THEME") . ".pages.contact";
    }

    public function show() {

        // dd($this->template);

        return $this->renderOutput();
    }

    public function post(Request $request) {
        $data = $request->except('_token');

        $validator = Validator::make($data, [
            "name" => "required",
            "email" => "required|email",
            "phone" => "required",
            "subject" => "required",
            "message" => "required|min:5|string"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $contEmail = ContactEmail::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "phone" => $data["phone"],
            "subject" => $data["subject"],
            "message" => $data["message"]
        ]);

        // dd($request->user());

        Mail::to(env('ADMIN_EMAIL'))->send(new \App\Mail\ContactEmail($data));
        
        // dd($contEmail);

        Session::put("email_to_success", " <strong>Спасибо:</strong> Ваш сообщение успешно отправлено! <br> Мы ответим вам как можно скорее.");
        
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Subscribe;

class SubscribeController extends Controller
{
    public function subscribe(Request $request) {

        $data = $request->except("_token");

        $validator = Validator::make($data, [
            "email" => "required|email"
        ]);

        if ($validator->fails()) {
            return redirect("http://neotech.com/#alert")->withErrors($validator)->withInput($data);
        }

        $subscibe = Subscribe::create([
            "email" => $data["email"]
        ]);

        return redirect("http://neotech.com/#alert")->with('subscribe-success', "Вы успешно подписались на нашу новости!");
    }
}

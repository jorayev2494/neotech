<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Comment;
use Session;

class CommentController extends BasicController
{
    public function comment(Request $request, User $user) {
        
        $data = $request->except("_token");

        
        $validator = Validator::make($data, [
            "comment" => "required|min:5|max:255",
        ]);
        
        if ($validator->fails()) {
            return redirect("http://neotech.com/alias/$request->_alias_id#comment")->withErrors($validator)->withInput($data);
        }

        // dd($request->all());
        
        Comment::create([
            "alias_id" => $data["_alias_id"],
            "name" => $user->name,
            "email" => $user->email,
            "text" => $data["comment"],
            "author" => $user->id,
            "parent_id" => null,
        ]);

        Session::put("comment_success", "Ваше комментарий успешно опубликован");

        return redirect("http://neotech.com/alias/$request->_alias_id#comment");

    }
}

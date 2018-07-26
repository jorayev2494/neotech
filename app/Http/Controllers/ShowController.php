<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alias;
use App\Menu;
use Config;
use Lang;
use App\Group;


class ShowController extends BasicController
{

    public function __construct(\App\Repositories\AliasRepositories $alias_r, \App\Repositories\VideosRepositories $video_r) {

        parent::__construct(new \App\Repositories\MenusRepositories(new Menu));

        $this->alias_r  = $alias_r;
        $this->videos_r = $video_r;
        
        // // Проверка связи
        // $alias = Alias::find(3);
        // $group = $alias->group->title;
        // // $title = $group->title;
        // dd($group);

        // // Проверка обратной связи
        // $group = \App\Group::find(1);
        // $alias = $group->alias;
        // $title = $alias->title;
        // dd($title);

        $this->title = Lang::get("lang.index_title_text");
    }

    public function show(Alias $alias) {

        // // проверка отношение многие ко многим
        // $alias = Alias::find(2);
        // $groups = $alias->groups;
        // foreach ($groups as $group) {
        //     dump($group->title);
        // }

        // // проверка отношение многие ко многим
        // $group = \App\Group::find(16);
        // $aliases = $group->aliases;

        // dd($aliases);
        // foreach ($aliases as $alias) {
        //     dump($alias->title);
        // }    
        // dd($alias);

        // $alias = Alias::find($alias);
        $this->vars = array_add($this->vars, "alias", $alias);

        if ($alias) {
            // $comments = $alias->comments;
            // $com = $comments->groupBy("id");
            // $com = $comments->groupBy("parent_id");

            $comments = $alias->comments->groupBy("id");
            $comment_parent_id = $alias->comments->where("parent_id", "!=", null)->groupBy("parent_id");

            // dd($comments);

            // $comment = \App\Comment::->get();   // find(1); 
            // dd($comment);

                // foreach ($comment as $key => $commen) {
                //     dd($commen->alias->user);
                // }
            // $alias = $comments->alias;
            // $user = $alias->user;

            // dd($comments);

            $user = \App\User::find(1)->aliases->where("action", 1);
            // dd($user);
            // dd($user);
            // $users = $user->aliases; 
            // dump($alias);
            // dd($user);
            // dump($com);
            // dd($comments);
        } else {
            $com = false;
        }
       
        $this->vars = array_add($this->vars,"comments", $comments);
        $this->vars = array_add($this->vars,"comment_parent_id", $comment_parent_id);
        // dd($this->vars);

        $popular_posts = $this->getPopular();
        $this->vars = array_add($this->vars, "popular_posts", $popular_posts);

        $this->template = env("THEME") . ".pages.single-post";
        return $this->renderOutput();

    }

    public function group($group) {

        // $aliases = Alias::orderBy("id", "created_at")->paginate(Config::get("settings.admin_count_alias_column"));
        $groups = Group::where("title", $group)->orderBy("id", "created_at")->paginate(Config::get("settings.admin_count_alias_column"));
        // $groups = Group::orderBy("id", "created_at")->paginate(5);// where("title", "=", $group)
        $this->vars = array_add($this->vars, "group", $groups);

        // $groups->orderBy("id", "created_at");
        // dd($groups);
        // dd($group);
        // dd($group[0]->aliases[0]->groups[0]->title);

        // dump($group->aliases[0]->title);
        // dd($group->aliases);

        // foreach($group->aliases as $alias){
        //     dump($alias->title);
        // }
        // dd($group);

        $popular_posts = $this->getPopular();
        $this->vars = array_add($this->vars, "popular_posts", $popular_posts);
        // dd($this->vars);
        
        $this->template = env("THEME") . ".pages.group";
        return $this->renderOutput();
    }
}

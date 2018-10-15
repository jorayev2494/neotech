<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Config;
use Lang;
use App;
use App\Alias;
use Gate;
use App\User;

class IndexController extends BasicController
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
        $this->template = env("THEME") . ".pages.index";
    }

    

    public function index() {
        // parent::__construct($lang);

        $sliders = $this->getSlider(); // ->toJson();
        $this->vars = array_add($this->vars, "sliders", $sliders);
        // dd($this->vars);

        $aliases = $this->getAlias();
        // dd($aliases[0]->comments);
        $this->vars = array_add($this->vars, "aliases", $aliases);
        // dd($aliases);

        $popular_posts = $this->getPopular();
        // dd($popular_posts);
        $this->vars = array_add($this->vars, "popular_posts", $popular_posts);

        $videos = $this->getVideo();
        $this->vars = array_add($this->vars, "videos", $videos);
        // dd($videos);

        /**
         * Надо найти Автар Пользователя
         */
        dd(auth()->user());

        return $this->renderOutput();
    }

   
}

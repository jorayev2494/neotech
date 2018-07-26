<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use Config;
use View;
use App;
use DB;

class BasicController extends Controller
{
    protected $title;                   // Титульный текст сайта
    protected $menus_r;                 // Меню Репозиторий
    // protected $footer_menus_r;                 // Меню Репозиторий
    protected $sidebars_r;              // Сайт-бар Репозиторий
    protected $alias_r;                  // Новостной Репозиторий
    protected $videos_r;                // Видео Репозиторий

    protected $template;                // Шаблоны к Виду view();
    protected $vars = array();          // Данные к Виду  view()->with();


    public function __construct(\App\Repositories\MenusRepositories $menu_r) {
        $this->menus_r = $menu_r;

        // $setLang = ($lang) ? $lang : Config::get("settings.lang_default");
        // App::setLocale($setLang);

        $menus = $this->getMenu();
        // $menus = DB::select('SELECT * FROM groups WHERE action = ?', [1]);
        // dd($menus);
        $this->vars = array_add($this->vars, "menus", $menus);

        $socials = DB::select('SELECT * FROM social WHERE action = ?', [1]);
        $this->vars = array_add($this->vars, "socials", $socials);

        $langs = DB::select('SELECT * FROM langues WHERE action = ?', [1]);
        $this->vars = array_add($this->vars, "langs", $langs);

        $footerMenus = $this->getFooterMenu();
        $this->vars = array_add($this->vars, "footerMenus", $footerMenus);
        
        // dd($footerMenu);
    }
    
    protected function renderOutput() {        
        $this->vars = array_add($this->vars, "title", $this->title);
        return View::make($this->template)->with($this->vars);
    }

    private function getMenu() {
        $menus = \App\Group::all();
        return $menus;
    }

    protected function getSlider() {
        // dd($this->alias_r);
        $slider = $this->alias_r->get(["id", "title", "img", "body"], Config::get("settings.count_sliders_alias"));
        return $slider;
    }

    protected function getAlias() {
        $aliases = $this->alias_r->get(["*"], false, Config::get("settings.pagination_content_alias")); // ->sortByDesc('created_at');
        // dd($aliases);
        return $aliases;
    }

    protected function getPopular() {
    $popular_posts = $this->alias_r->get(["id", "title", "img", "body", "created_at", "updated_at"], false, false, false);

    // dd($popular_posts[0]->orderBy("id")->get()); 
        
        $result = array();

        foreach ($popular_posts as $popular_post) {
            if (count($popular_post->comments->sortBy("created_at")) > 0) {
                $result[] = ($popular_post);  // ->toArray()
                // dump(count($result));
                if (count($result) == Config::get("settings.count_popular_alias") ) {
                    break;
                }
            }
        }

        // dd(collect($result));
        // dd($popular_posts);
        return collect($result);
    }

    protected function getVideo() {
        $videos = $this->videos_r->get(["title", "video", "img", "body", "created_at", "updated_at"], Config::get("settings.count_video_alias"));
        return $videos;
    }

    protected function getFooterMenu() {
        $footerMenu = $this->menus_r->get(["title", "link", "parent", "action"], false, false);
        return $footerMenu;
    } 
}

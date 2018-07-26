<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use View;

class ProfileController extends BasicController
{

    protected $title;                   // Титульный текст сайта
    protected $menus_r;                 // Меню Репозиторий
    protected $sidebars_r;              // Сайт-бар Репозиторий
    protected $alias_r;                  // Новостной Репозиторий
    protected $videos_r;                // Видео Репозиторий

    protected $template = array();                // Шаблоны к Виду view();
    protected $vars = array();          // Данные к Виду  view()->with();


    public function __construct() {
        
        
    }

    protected function show(User $user) {
               
        return View::make(env("THEME") . ".pages.profile");
    }
}

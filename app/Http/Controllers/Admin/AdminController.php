<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin\AdminMenu;
use View;

class AdminController extends Controller
{
    protected $title;                   // Титульный текст сайта
    protected $menus_r;                 // Меню Репозиторий
    protected $sidebars_r;              // Сайт-бар Репозиторий
    protected $alias_r;                  // Новостной Репозиторий
    protected $videos_r;                // Видео Репозиторий

    protected $template = array();                // Шаблоны к Виду view();
    protected $vars = array();          // Данные к Виду  view()->with();


    public function __construct() {
        $this->template = env("ADMIN") . ".index";

        $adminMenus = AdminMenu::all();
        $this->vars = array_add($this->vars, "adminMenus", $adminMenus);
    }

    protected function outputDashboard() {
        $this->vars = array_add($this->vars, "title", $this->title);        
        return View::make($this->template)->with($this->vars);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin\AdminMenu;

class IndexController extends AdminController
{

    public function __construct() {
        parent::__construct();
    }
    
    public function show() {
        
        $this->title = "Dashboard!";
        $content = view(env("ADMIN") . ".pages.content")->with("title", $this->title)->render();
        $this->vars = array_add($this->vars, "content", $content);

        return $this->outputDashboard();
    }
}

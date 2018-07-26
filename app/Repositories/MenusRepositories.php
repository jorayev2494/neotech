<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Menu;

class MenusRepositories extends Repositories
{
    public function __construct(Menu $menu) {
        // dd(Menu::find(5)->group->title);
        // dd( $menu::get()->group->title );
        $this->model = $menu;
    }
}

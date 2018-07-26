<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repositories 
{
    public $model = false;
    
    public function get($select = "*", $take = false, $pagination = false, $popular = false) {

        $builder = $this->model->select($select)->where("action", 1);

        if ($take) {
            return $builder = $this->model->get()->sortByDesc("created_at")->where("action", 1)->take($take);
            // return $builder = $this->model->where("action", 1)->get();
            // dd($builder);
        }

        if ($pagination) {
            return $builder = $this->model->where("action", 1)->orderBy("id", "created_at")->paginate($pagination);
            // return $links = $builder->appends(["sortby" => "id", "order" => "created_at"])->links();
            // dd($links);
            // return $builder = $this->model->select($select)->where("action", 1)->paginate($pagination);
            // return $builder = $this->model->where("action", 1)->paginate($pagination);
            // dd($builder);
        }

        /*if ($popular) {
            return $builder = $this->model->where("action", 1)->orderBy("id", "created_at")->get();
            dd($builder);
        }*/

        return $builder->get();     // ->toArray()
    }

    public static function sortAliases($arg) {
        return $builder->get()->sortByDesc($arg);
    }
    
}

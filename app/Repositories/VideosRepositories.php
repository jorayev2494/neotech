<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

use App\Video;

class VideosRepositories extends Repositories
{
    public function __construct(Video $video) {
        $this->model = $video;
    }
}

<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Alias;

class AliasRepositories extends Repositories
{
	public function __construct(Alias $alias) {
		return $this->model = $alias;
	}

	
}

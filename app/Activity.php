<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	protected $guarded = [];

	public function subject()
	{
		return $this->morphTo();
	}
}

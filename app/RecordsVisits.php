<?php

namespace App;

use Illuminate\Support\Facades\Redis;

trait RecordsVisits
{
    public function visits()
    {
        return Redis::get("threads.{$this->id}.visits") ?? 0;
    }

    public function recordVisit()
    {
        Redis::incr("threads.{$this->id}.visits");
        return $this;
    }
}
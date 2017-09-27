<?php

namespace Tests\Feature;

use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Redis;
use Tests\TestCase;

class TrendingThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        Redis::del('trending_threads');
    }
    /** @test */
    function it_increments_a_threads_score_each_time_its_read()
    {
        $this->assertEmpty(Redis::zrevrange('trending_threads',0,-1));
        $thread = create(Thread::class);
        $this->call('GET',$thread->path());
        $trending = Redis::zrevrange('trending_threads',0,-1);
        $this->assertCount(1,$trending);
        $this->assertEquals($thread->title,json_decode($trending[0])->title);

    }
}

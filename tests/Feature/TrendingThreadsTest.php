<?php

namespace Tests\Feature;

use App\Thread;
use App\Trending;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * @property \App\Trending trending
 */
class TrendingThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->trending = new Trending();
        $this->trending->reset();
    }
    /** @test */
    function it_increments_a_threads_score_each_time_its_read()
    {
        $this->assertEmpty($this->trending->get());
        $thread = create(Thread::class);
        $this->call('GET',$thread->path());
        $this->assertCount(1,$trending = $this->trending->get());
        $this->assertEquals($thread->title,$trending[0]->title);

    }
}

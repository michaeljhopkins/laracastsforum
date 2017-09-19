<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Spam;

class SpamTest extends TestCase
{
    /** @test */
    function it_validates_spam()
    {
        $spam = new Spam();
        $this->assertFalse($spam->detect('innocent'));
    }
}

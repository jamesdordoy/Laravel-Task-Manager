<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePage extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // 1. Visit Home Page
        $this->visit('/d')
            ->click('contact')
            ->see("Contact")
            ->seePageIs("/contact");
    }
}

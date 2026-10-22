<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error");
        Log::critical("Hello Critical");

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hello Info", ['User' => 'Hanif']);
        self::assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(['User' => 'Hanif']);

        Log::info("Hellow Info");
        Log::error("Hellow Error");

        self::assertTrue(true);
    }

    public function testWithChannel()
    {
        $slacklogger = Log::channel("slack");
        $slacklogger->error("Hellow Error"); //send to slack channel
        
        Log::info("Hello Laravel"); //send to default channel
        self::assertTrue(true);
    }
}

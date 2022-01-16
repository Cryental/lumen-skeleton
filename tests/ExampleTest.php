<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

class ExampleTest extends BaseTestCase
{
    use DatabaseMigrations;

    public function createApplication(): \Laravel\Lumen\Application
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }
}

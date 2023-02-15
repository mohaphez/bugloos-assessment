<?php

declare(strict_types=1);

namespace Tests\Feature\Commands;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogImportTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test log import artisan command
     */
    public function test_log_import()
    {
        $file = base_path('tests/Feature/Commands/resources/log.txt');
        $this->artisan('log:import', ['file' => $file])->assertSuccessful();
    }
}
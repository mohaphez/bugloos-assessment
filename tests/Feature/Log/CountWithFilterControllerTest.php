<?php
declare(strict_types=1);

namespace Tests\Feature\Log;

use App\Models\ServiceLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CountWithFilterControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test get Logs count with filter
     */
    public function test_logs_count_with_filter(): void
    {

        ServiceLog::factory(40)->create();

        $this->getJson(route('api:v1:logs:count', ['statusCode' => 200]))
            ->assertStatus(200)
            ->assertJson(function (AssertableJson $json) {
                $json->has('count');
                $json->etc();
            });
    }
}
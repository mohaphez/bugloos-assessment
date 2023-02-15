<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('service_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_name');
            $table->integer('status_code');
            $table->text('service_log');
            $table->timestamp('date');
            $table->timestamps();

            $table->index(['service_name', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_logs');
    }
};
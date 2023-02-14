<?php

declare(stric_type=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serviceNames');
            $table->integer('statusCode');
            $table->timestamp('date');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
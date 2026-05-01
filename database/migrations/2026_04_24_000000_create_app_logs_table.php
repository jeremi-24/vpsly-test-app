<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('app_logs', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('action');
            $blueprint->string('message');
            $blueprint->json('meta')->nullable();
            $blueprint->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('app_logs');
    }
};

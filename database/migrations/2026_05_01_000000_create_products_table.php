<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $row) {
            $row->id();
            $row->string('name');
            $row->string('category')->default('General');
            $row->integer('quantity')->default(0);
            $row->decimal('price', 10, 2)->default(0.00);
            $row->text('description')->nullable();
            $row->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

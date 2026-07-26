<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('implementation_phases', function (Blueprint $table) {
            $table->id();
            $table->string('phase');
            $table->string('timeline');
            $table->string('focus');
            $table->json('items');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('implementation_phases');
    }
};

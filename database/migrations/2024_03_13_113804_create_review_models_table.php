<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('review_models', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->string(column: 'email'); // string 0 - 255 symbols
            $table->string(column: 'subject');
            $table->text(column: 'message'); // text > 255 symbols
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_models');
    }
};

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
        Schema::create('reserve_models', function (Blueprint $table) {
            $table->date(column: 'data');
            $table->integer(column: 'slot_id');
            $table->integer(column: 'reserve_time');
            $table->text(column: 'UIDs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserve_models');
    }
};

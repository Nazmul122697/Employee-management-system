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
        Schema::create('ship_states', function (Blueprint $table) {
            $table->id();
            $table->string('state_name');
            $table->string('bn_name');
            $table->string('url');
            $table->foreignId('division_id')->references('id')->on('ship_divisions')->onDelete('cascade'); 
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ship_states');
    }
};

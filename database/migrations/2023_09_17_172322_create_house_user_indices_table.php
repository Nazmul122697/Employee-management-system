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
        Schema::create('house_user_indices', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->integer('nid');
            $table->string('privious_home');
            $table->string('relation');
            $table->date('start_staying_date');
            $table->date('end_staying_date');
            $table->foreignId('district_id')->references('id')->on('ship_districts')->onDelete('cascade'); 
            $table->integer('main_person_ind');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_user_indices');
    }
};

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
        Schema::create('soil_scans', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->double('moisture')->nullable();
            $table->double('temperature')->nullable();
            $table->integer('ec')->nullable();
            $table->double('ph')->nullable();
            $table->integer('nitrogen')->nullable();
            $table->integer('phosphorus')->nullable();
            $table->integer('potassium')->nullable();
            $table->double('soil_score')->nullable();
            $table->string('image_url')->nullable();
            $table->bigInteger('scan_timestamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soil_scans');
    }
};

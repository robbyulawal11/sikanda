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
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('seller');
            $table->integer('harga');
            $table->text('deskripsi')->nullable();
            $table->string('wa');
            $table->string('ig')->nullable();
            $table->string('image');
            $table->integer('user_id');
            $table->string('user_alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};

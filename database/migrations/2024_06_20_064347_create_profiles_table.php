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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('gambarHero')->nullable();
            $table->string('gambarAbout')->nullable();
            $table->string('gambarStrukturOrganisasi')->nullable();
            $table->string('videoYoutube')->nullable();
            $table->string('linkInstagram')->nullable();
            $table->string('linkFacebook')->nullable();
            $table->string('linkTwitter')->nullable();
            $table->string('alamatDeskanasda')->nullable();
            $table->string('emailDeskranasda')->nullable();
            $table->string('noTeleponDeskranasda')->nullable();
            $table->text('alamatPetaDeskranasda')->nullable();
            $table->text('tentang')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('demografi')->nullable();
            $table->text('geografi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

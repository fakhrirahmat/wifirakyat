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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('judul_situs');
            $table->string('whatsapp_url');
            $table->longText('alamat');
            $table->string('email');
            $table->string('phone');
            $table->string('facebook_url');
            $table->string('instagram_url');
            $table->string('logo_1');
            $table->string('logo_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

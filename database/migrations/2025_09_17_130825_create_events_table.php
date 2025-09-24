<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('event_date');
            $table->string('location');
            $table->string('fee')->default('Gratis'); // Ubah: tambah default value 'Gratis'
            // Field baru: kategori event atau lomba
            $table->enum('category', ['Event', 'Lomba']);
            // Field baru: sistem pendaftaran
            $table->enum('registration_system', ['Seleksi', 'Tanpa Seleksi']);
            // Field baru: kuota peserta
            $table->integer('quota');
            // Field baru: kategori acara (olahraga, budaya, dll)
            $table->string('event_category');
            $table->text('requirements');
            $table->date('registration_start');
            $table->date('registration_end');
            $table->text('prizes');
            $table->text('about');
            $table->string('image');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
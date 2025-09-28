<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registration_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->onDelete('cascade');
            $table->string('field_name'); // contoh: 'nama_lengkap'
            $table->text('field_value');  // jawaban dari peserta
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registration_data');
    }
};
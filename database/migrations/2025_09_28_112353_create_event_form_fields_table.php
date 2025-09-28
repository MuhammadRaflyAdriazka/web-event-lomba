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
        Schema::create('event_form_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade'); // Terhubung ke event
            $table->string('field_name');      // contoh: 'nama_lengkap'
            $table->string('field_label');     // contoh: 'Nama Lengkap'
            $table->string('field_type');      // contoh: 'text', 'file', 'textarea'
            $table->boolean('is_required')->default(true);
            $table->string('placeholder')->nullable();
            $table->integer('field_order')->default(0); // Untuk urutan field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_form_fields');
    }
};
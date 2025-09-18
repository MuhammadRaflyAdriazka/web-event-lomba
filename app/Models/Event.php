<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'event_date',
        'location',
        'fee',
        'requirements',
        'registration_start',
        'registration_end',
        'prizes',
        'about',
        'image',
        'status'
    ];

    protected $casts = [
        'event_date' => 'date',
        'registration_start' => 'date',
        'registration_end' => 'date',
    ];

    // Format tanggal Indonesia
    public function getFormattedEventDateAttribute()
    {
        return $this->event_date->format('d F Y');
    }

    // Format periode registrasi
    public function getRegistrationPeriodAttribute()
    {
        $start = $this->registration_start->format('d F');
        $end = $this->registration_end->format('d F Y');
        return $start . ' – ' . $end;
    }

    // Cek apakah registrasi masih buka
    public function getIsRegistrationOpenAttribute()
    {
        $now = Carbon::now()->format('Y-m-d');
        return $now >= $this->registration_start->format('Y-m-d') && 
               $now <= $this->registration_end->format('Y-m-d');
    }
}
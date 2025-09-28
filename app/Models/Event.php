<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

// TAMBAHKAN INI untuk mengenali model EventFormField
use App\Models\EventFormField;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'event_date',
        'location',
        'fee',
        'category',
        'registration_system',
        'quota',
        'event_category',
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

    // ... (method-method yang sudah ada sebelumnya tetap sama)

    public function getFormattedEventDateAttribute()
    {
        return $this->event_date->format('d F Y');
    }

    public function getRegistrationPeriodAttribute()
    {
        $start = $this->registration_start->format('d F');
        $end = $this->registration_end->format('d F Y');
        return $start . ' – ' . $end;
    }

    public function getIsRegistrationOpenAttribute()
    {
        $now = Carbon::now()->format('Y-m-d');
        return $now >= $this->registration_start->format('Y-m-d') && 
               $now <= $this->registration_end->format('Y-m-d');
    }

    public function getCategoryBadgeAttribute()
    {
        return $this->category === 'Event' 
            ? '<span class="badge badge-primary">Event</span>' 
            : '<span class="badge badge-success">Lomba</span>';
    }

    public function getRegistrationSystemBadgeAttribute()
    {
        return $this->registration_system === 'Seleksi' 
            ? '<span class="badge badge-warning">Seleksi</span>' 
            : '<span class="badge badge-info">Tanpa Seleksi</span>';
    }

    // ==================================================================
    // METHOD BARU UNTUK RELASI ONE-TO-MANY KE FORM FIELDS
    // ==================================================================
    
    /**
     * Mendefinisikan bahwa satu Event memiliki banyak EventFormField.
     */
    public function formFields()
    {
        // Relasi 'hasMany' berarti "memiliki banyak".
        // Kita juga langsung mengurutkannya berdasarkan 'field_order'
        // agar form pendaftaran tampil sesuai urutan yang dibuat admin.
        return $this->hasMany(EventFormField::class)->orderBy('field_order', 'asc');
    }
}
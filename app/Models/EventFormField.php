<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFormField extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'field_name',
        'field_label',
        'field_type',
        'is_required',
        'placeholder',
        'field_order',
    ];

    /**
     * Mendapatkan event yang memiliki form field ini.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
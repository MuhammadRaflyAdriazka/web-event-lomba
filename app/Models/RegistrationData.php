<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationData extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
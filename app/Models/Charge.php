<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'amount',
        'description',
    ];

    // Relación con el modelo Appointment
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
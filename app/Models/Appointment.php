<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'nurse_id',
        'client_id',
        'date',
        'status',
        'notes',
    ];

    // Relación con el modelo Nurse
    public function nurse()
    {
        return $this->belongsTo(Nurse::class, 'nurse_id');
    }

    // Relación con el modelo Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // Relación con el modelo AppointmentNote
    public function notes()
    {
        return $this->hasMany(AppointmentNote::class, 'appointment_id');
    }
}
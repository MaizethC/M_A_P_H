<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model 
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'full_name',
        'birthdate',
        'gender',
        'medical_history',
    ];

    /**
     * Obtener el cliente asociado con el paciente.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
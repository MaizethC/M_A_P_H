<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'address',
        'subscription_type',
        'subscription_start',
        'subscription_end',
        'is_active',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'subscription_start' => 'date',
        'subscription_end' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Obtener el usuario asociado con el cliente.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtener el asistente asociado con el cliente.
     */
    public function assistant()
    {
        return $this->hasOne(Assistant::class);
    }

    /**
     * Obtener los pacientes asociados con el cliente.
     */
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * Obtener las citas asociadas con el cliente.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Obtener los pagos asociados con el cliente.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
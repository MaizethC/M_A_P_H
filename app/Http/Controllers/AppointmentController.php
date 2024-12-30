<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        // Obtener todas las citas con sus notas
        $appointments = Appointment::with('notes')->get();
        return response()->json($appointments);
    }
}
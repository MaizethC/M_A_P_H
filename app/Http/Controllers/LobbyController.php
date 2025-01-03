<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LobbyController extends Controller
{
    public function index()
    {
        return view('lobby'); // Retorna la vista 'lobby.blade.php'
    }
}
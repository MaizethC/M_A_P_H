<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Obtener todos los clientes
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    // Crear un nuevo cliente
    public function store(Request $request)
    {
        $client = Client::create($request->all());
        return response()->json($client, 201);
    }

    // Obtener un cliente específico
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    // Actualizar un cliente
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());
        return response()->json($client);
    }

    // Eliminar un cliente
    public function destroy($id)
    {
        Client::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
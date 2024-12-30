<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailService; // Servicio para manejar correos
use App\Models\Message; // Si tienes un modelo para mensajes

class MessageController extends Controller
{
    protected $mailService;

    // Inyectar el servicio de correo en el constructor
    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * Mostrar la bandeja de entrada con todos los mensajes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener los mensajes del servidor de correo
        $messages = $this->mailService->getMessages();
        return view('messages.index', compact('messages'));
    }

    /**
     * Mostrar el detalle de un mensaje específico.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Obtener un mensaje específico
        $message = $this->mailService->getMessage($id);
        return view('messages.show', compact('message'));
    }

    /**
     * Enviar una respuesta a un mensaje.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reply(Request $request, $id)
    {
        // Validar la respuesta
        $request->validate([
            'response' => 'required|string',
        ]);
    
        // Obtener el mensaje original
        $message = $this->mailService->getMessage($id);
    
        // Enviar la respuesta al remitente
        $this->mailService->sendReply($message->fromAddress, $request->response);
    
        // Redirigir a la bandeja de entrada con un mensaje de éxito
        return redirect()->route('messages.index')
                         ->with('success', 'Respuesta enviada correctamente.');
    }
}
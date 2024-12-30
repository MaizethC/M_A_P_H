<?php

namespace App\Services;

use PhpImap\Mailbox as ImapMailbox;

class MailService
{
    protected $mailbox;

    public function __construct()
    {
        // Configurar la conexión IMAP
        $this->mailbox = new ImapMailbox(
            '{' . env('MAIL_HOST') . ':' . env('MAIL_PORT') . '/imap/ssl}INBOX',
            env('MAIL_USERNAME'),
            env('MAIL_PASSWORD')
        );
    }

    /**
     * Obtener todos los mensajes de la bandeja de entrada.
     *
     * @return array
     */
    public function getMessages()
    {
        $mailsIds = $this->mailbox->searchMailbox('ALL');
        $messages = [];

        foreach ($mailsIds as $mailId) {
            $messages[] = $this->mailbox->getMail($mailId);
        }

        return $messages;
    }

    /**
     * Obtener un mensaje específico por su ID.
     *
     * @param int $id
     * @return \PhpImap\IncomingMail
     */
    public function getMessage($id)
    {
        return $this->mailbox->getMail($id);
    }

    /**
     * Enviar una respuesta a un correo electrónico.
     *
     * @param string $to
     * @param string $response
     * @return void
     */
    public function sendReply($to, $response)
    {
        \Mail::to($to)->send(new \App\Mail\ReplyToMessage($response));
    }
}
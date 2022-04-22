<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contato extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {

        $this->from('automatico@stsemtag.com.br')->
        to('wedleys8@gmail.com')->
        subject('Formulario de contato - STSEMTAG')->
        view('mail.contato')
        ->with([
          'nome' => $request->nomeContato,
          'email' => $request->emailContato,
          'assunto' => $request->assuntoContato,
          'mensagem' => $request->mensagemContato
        ]);
        return redirect()->back();
    }
}

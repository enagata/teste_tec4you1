<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $marca;
    private $veiculo;
    private $peca;
    private $obs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $user, $marca,$veiculo,$peca,$obs)
    {
        $this->user = $user;
        $this->marca = $marca;
        $this->veiculo = $veiculo;
        $this->peca = $peca;
        $this->obs = $obs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Contato de cliente!') ;
        $this->to($this->user->mail,$this->user->name);
        return $this->view('mail.sendmail',["user" => $this->user, "marca"=> $this->marca, "veiculo"=> $this->veiculo, "peca"=> $this->peca, "obs"=> $this->obs]);

    }
}

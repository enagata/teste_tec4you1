<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\marca;
use App\Models\veiculo;
use App\Models\pecas;

class contatoController extends Controller
{
    public function listamarca()
    {
        //$marca = new Marca();
       //echo "<h1>Listagem de Marca</h1>";
        //$marca = marca::where('id_marca', '=', 1);
        $marcas = marca::all();
        $veiculo = veiculo::orderBy('id_marca', 'ASC')->get();
        $pecas = pecas::orderBy('id_Veiculo','ASC')->get();
        return view('contato', [
            'marcas' => $marcas,
            'veiculos' => $veiculo,
            'pecas'=> $pecas,
            'cont' => 0,
            'contp' => 0
        ]);
    }
    public function sendmail()
    {
        $user = new \stdClass();
        $st = new \stdClass();
        $user->name = "Erick";
        $user->mail = "erick.nagata@gmail.com";
        $marca=$_POST['vlmarca'];
        $veiculo=$_POST['vlvel'];
        $peca=$_POST['vlpeca'];
        $obs=$_POST['observacao'];
        //return new  \App\Mail\sendmail($user,$marca,$veiculo,$peca,$obs);
        Mail::send(new  \App\Mail\sendmail($user,$marca,$veiculo,$peca,$obs));
        $st->status= true;
        $st->message="E-mail enviado";
        return redirect()
                ->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {

        // var_dump($_POST);

      //  dd($_POST);
        return view('site.contato', ['titulo' => 'Contato - titulo vindo do controlador'], ['teste' => 'Alberto Gomes']);
    }
}

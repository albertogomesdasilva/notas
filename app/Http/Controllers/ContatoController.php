<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {

        var_dump($_GET);
        return view('site.contato', ['titulo' => 'Contato - titulo vindo do controlador'], ['teste' => 'Alberto Gomes']);
    }
}

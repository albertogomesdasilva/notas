<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2) {
       // echo 'A soma dos valores é: ' . $p1 + $p2;
       //return view('site.teste', ['x' => $p1 , 'y' => $p2 ] );   // MÉTODO ARRAY ASSOCIATIVO: ATRIBUI A VARIÁVEL RECEBIDA PARA UMA STRING QUALQUER 'x' => $p1, 'y' => $p2
       return view('site.teste', compact('p1', 'p2'));              // MÉTODO COMPACT: RECEBE A VARIÁVEL COMO UMA STRING 'p1', 'p2' E PASSA PARA A VIEW NOVAMENTE COMO VARIÁVEL $p1, $p2
      // return  view('site.teste')->with('a', $p1)->with('b', $p2);  // MÉTODO WITH: ATRIBUI O VALOR DA VARIÁVEL A UMA STRING QUALQUER 'a', 'b' E ESSA STRING SERÁ PASSADA PARA A VIEW COMO UMA VARÍÁVEL $a,$b

    }
}

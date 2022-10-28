<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
            'status' => 'N',
            'cnpj' => '00.000.000/0001/00',
            'ddd' => '85',
            'telefone' => '00000000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'ddd'  => '11',
                'telefone' => '0000.1111'
                ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'ddd'  => null,
                'telefone' => '0000.1111'
                ],
            ];

           // $fornecedores =[];
           
            $msg =  isset($fornecedores[0]['cnpj']) ? "Fornecedores 1 tem cnpj: " . $fornecedores[0]['cnpj']  : "cnpj não informado";
            echo $msg;

           

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}

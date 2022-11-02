<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

      // //  var_dump($_POST);
      // // dd($_POST);
      // echo '<pre>';
      //  print_r($request->all());
      //  echo '<hr>';
      //  print_r($_POST);
      // echo '</pre>';
      // echo $request->input('nome') . '<br>';
      // echo $request->input('email') . '<hr>';
       
      // $contato = new SiteContato;
      // $contato->nome = $request->input('nome');
      // $contato->telefone = $request->input('telefone');
      // $contato->email = $request->input('email');
      // $contato->motivo_contato = $request->input('motivo_contato');
      // $contato->mensagem = $request->input('mensagem');

    //  $contato->fill($request->all());      // PARA USAR ESTE MÉTODO 'fill' NA MODEL SiteContato.php ADICIONAR O ATTRUBUTO $fillable
       // $contato->create($request->all());      //TAMBÉM PARA USAR ESTE MÉTODO 'create' NA MODEL SiteContato.php ADICIONAR O ATTRUBUTO $fillable
      
       //   $contato->save();

   // print_r($contato->getAttributes());
    //  print_r($_POST);

      // $motivo_contatos = [
      // '1' => 'Dúvida',
      // '2' => 'Elogio',
      // '3' => 'Reclamação'
      // ];
      $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos ]);   // PASSANDO O TÍTULO POR VARIÁVEL COMO PARÂMETRO 
    }

    public function salvar(Request $request) {

      // REALIZAR A VALIDAÇÃO DOS DADOS RECEBIDOS - A VARIÁVEL $erros DO lARAVEL ESTÁ DISPONIVEL PARA ISSO EM QUALQUER VIEW
        $request->validate([
          'nome' => 'required|min:3|max:40',  //Nomes de 3 a 40 caracteres permitido nesse campo
          'telefone' => 'required',
          'email' => 'required',
          'motivo_contato' => 'required',
          'mensagem' => 'required',
        ]);

       // SiteContato::create($request->all()); 
        
       // return view('site.contato', ['titulo' => 'Contato (teste)']);


    }
}

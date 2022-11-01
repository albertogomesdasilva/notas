<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sitecontato = new SiteContato;

        $sitecontato->nome = 'Alberto Gomes';
        $sitecontato->telefone = '98981188434';
        $sitecontato->email = 'ags@silva.com.br';
        $sitecontato->motivo_contato = 2;
        $sitecontato->mensagem = 'Detalhes do produto';
        $sitecontato->save();

        SiteContato::create([
            'nome'=>'agsilva',
            'telefone' => '98988445577',
            'email'=> 'agsilva@gmail.com',
            'motivo_contato'=>1,
            'mensagem'=>'Mais informações.'
        ]);
       
        \App\Models\SiteContato::factory(100)->create();

    }
}

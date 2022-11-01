<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor;

        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'https://fornecedor100.com.br';
        $fornecedor->uf = 'MA';
        $fornecedor->email = 'fornecedor100@gmail.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome'=>'Fornecedor200',
            'site' => 'https://forn200.com.br',
            'uf'=> 'RS',
            'email'=>'forn200@gmail.com'
        ]);

        // DB::table('fornecedores')->insert([
        //     'nome'=>'Teste',
        //     'site'=>'teste.com.br',
        //     'uf'=>'RJ',
        //     'email'=>'teste@gma'
        // ]);
        
       // \App\Models\Fornecedor::factory(100)->create();
       factory(SiteContato::class, 100)->create();

    }
}

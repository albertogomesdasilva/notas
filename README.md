<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# composer 
# php artisan serve --port=9000  => Roda a aplicação na porta especificada
#  
###########################################################################################
ANOTAÇÕES
NOTAS
OBS
ROTAS

ROTA DE CONTINGÊNCIA (FALLBACK)

Route::fallback(function() {
    echo 'A Rota acessada não existe.  <a href=" ' .route('site.index').' "> clique aqui </a> para retornar';
  });

### PASSANDO VALORES DA ROTA PARA O CONTROLLER
<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'index'])->name('site.index');

Route::get('/sobre-nos', [\App\Http\Controllers\SobrenosController::class, 'sobrenos'])->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');



Route::get('/login', function (){ return 'Login'; })->name('site.login');


Route::prefix('/app')->group(function(){

    Route::get('/clientes', function (){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', function (){ return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function (){ return 'Produtos'; })->name('app.produtos');

});

Route::get('/teste/{param1?}/{param2?}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

Route::fallback(function() {
    echo 'A Rota acessada não existe.  <a href=" ' .route('site.index').' "> clique aqui </a> para retornar';
  });




CONTROLLER
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2) {
        echo 'A soma dos valores é: ' . $p1 + $p2;
    }
}


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 

Route::get('/', function(){
    return view('welcome');
});


Route::get('user/{user?}', [UserController::class, 'show'])->name('user');

CONTROLLER
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){
        
        return view('user', [
            'name' => 'Paulo',
            'user' => $user
        
        ]);       
    }
}

### PASSANDO VALORES DA ROTA PARA O CONTROLLER DAÍ PARA A VIEW
ROTA PASSANDO VALORES:
Route::get('/teste/{param1?}/{param2?}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

CONTROLLER RECEBENDO VALORES:
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


VIEW RECEBENDO VALORES:
<h1>Teste </h1>

{{ $x }} <br>
{{  $y }}

{{ $a }}    // MÉTODO WITH FICARIA ASSIM
{{ $b }}


### COMENTÁRIOS E CODIFICAÇÃO PHP NO BLADE:
<h2>Fornecedor</h2>

{{ 'Texto ou variável aqui'}} <br>

<?= 'Teste' $x ?>

{{-- Comentário no Blade --}}

@php
    // Comentários dentro de uma tab php no blade
   
    /*
        Comentários de múltiplas
        linhas...
    */

@endphp

### @if @elseif @else @endif

FornecedorController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = ['Fornecedor 1'];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
abaixo a view que recebe os valores do controller
****************************
view.blade.php


<h2>Fornecedor</h2>

@if(count($fornecedores) > 0 && count($fornecedores) <= 10)
    <h3>Existem alguns fornecedores cadastrados.
@elseif(count($fornecedores) > 10)
    <h3>São vários os fornecedores cadastrados</h3>
@else 
    <h3> Ainda não existem fornecedores cadastrados.</h3> 
@endif















/**************** */
BLADE.PHP
<h1>Passando variável direto: {{ $name }} </h1>
<hr>
<h1>Listando o Retorno da Model User</h1>
<h2>{{ $user }} </h2>
<p>Selecionando o nome fica: {{ $user->name }} </p>
<p>Selecionando o Email fica: {{ $user->email }} </p>

DATABASE SEED
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        //  \App\Models\User::factory()->create([
        //      'name' => 'Test User',
        //      'email' => 'test@example.com',
        //  ]);
    }
}

## REDIRECIONAMENTO DE ROTAS
web.php

Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');
Route::get('/rota2', function(){
    //echo 'Rota 2';
    return redirect()->route('site.rota1');
})->name('site.rota2');

//Route::redirect('/rota2', 'rota1');





/***************************** */

<!--  INÍCIO:

1 instalar o docker

2 abrir wsl2/Windows ou linux
 curl -s "https://laravel.build/olw?with=mysql,redis,mailhog,minio" | bash

3 cd olw
./vendor/bin/sail up -d
	ou
4 cd olw && ./vendor/bin/sail up -d

5 ATRIBUINDO PERMISSÃO PARA A PASTA
cd .. -> sai da pasta
sudo chmod 777 olw/ -R ou sem o 'sudo' chmod 777 olw/ -R

6 CRIANDO ALIAS PARA O COMANDO ANTERIOR
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
passa a usar assim: sail ps

7 CONFIGURAR PORTAS PARA A APLICAÇÃO NO NAVEGADOR E MYSQL
.env
APP_PORT=8000

*porta do myql
FORWARD_DB_PORT=3307

8 INSTALANDO DEPENDÊNCIA AO PROJETO
./vendor/bin/sail composer require laravel/breeze --dev 

e depois tem que 


9 DEIXAR TELA DE AUTENTICAÇÃO PRONTA, ROTA AUTENTICADA, TAWINDCSS INSTALADO E INERTIA INSTALADO
./vendor/bin/sail artisan breeze:install vue 
ou
./vendor/bin/sail art breeze:install vue




10 RODAR AS MIGRATES PADRÕES DO PROJETO AI JÁ PODE CADASTRAR USUÁRIOS PARA LOGIN:
./vendor/bin/sail art migrate

-->

 /***************************************** */
 Route::prefix('usuarios')->group(function() {
    Route::get('', function(){
        return 'usuarios';
    })->name('usuarios');
    
    Route::get('/{id}', function($id){
        return 'mostrar detalhes do usuário';
    })->name('usuario-detalhes');

    Route::get('/{id}/tags', function($id){
        return 'mostrar tags do usuário';
    })->name('usuario_tags');

});


/*******************************************/
2a AULA:

O PROJETO CONSISTE EM RECEBER DADOS DE UMA API (punkapi.com) DE INFORMAÇÕES SOBRE CERVEJAS, VAMOS CONSTRUIR AS ROTAS PARA CONSUMIR A API E CRIAR A ESTRUTURA PARA O RELATÓRIO QUE IREMOS GERAR EM EXCEL E ENVIAR PARA O STORAGE...
1 CRIAR ROTAS:
code .
olw/routes/web.php


sail up -d -> SOBE O CONTAINER localhost:8000 (nesse projeto)

Route::get('/beers', fn()=> 'Olw - testando a rota /beers');

**************************************************
obs:
- laravel.com/api -> acesso a documentação do código;
- in line paramets for vscode -> extensão para vscode para exibir o nome dos métodos na hora que codificar;
- fira code -> extensão para fonte no vscode

git Hub Copilot vs Tabnine -> (pesquisar sobre)
Link para extensões vscode:
https://github.com/icarojobs/vscode-useful-extensions
*************************************************


Route::get('/beers', fn()=> 'Olw - testando a rota /beers')
                             ->middleware(['auth']);

* FLUXO PADRÃO DO MVC-LARAVEL: 
life cicle: sai do usuário pelo navegador, insomnia ou postman -> passa pelo index.php(pasta public) -> passa pelos arquivos do bootstrap retornando uma instância da aplicação -> passa pelo kernel do http (carrega mais instâncias) -> Service provider -> despacha a requisição pro Router -> Cai no arquivo Web.php -> Middleware (se tiver, geralmente tem os globais) -> Controller (faz as regras de negócio e pode chamar outras classes como Serviços por exemplo)
-> Retorna uma view ou um json (No caso estamos usando inértia, ele não vai reinderizar a 'view.blade' padrão, ele vai reinderizar componente vue.js através do inértia.).


* EM VEZ DE USAR A FUNÇÃO AQUI NA ROTA CRIAMOS UM CONTROLLER:

* ROTAS:
Route::prefix('usuarios')->group(function() {
    Route::get('', function(){
        return 'usuário';
    })->name('usuarios');
    Route::get('/{id}', function($id){
        return $id;
    })->name('usuario_id');

});



Route::get('/users/{id?}', function ($id = null) {
    return $id;
});


obs.: ​dica: php artisan make:controller -r cria o Resource também.
dica: limpar o cache do container:
./vendor/bin/sail art config:cache 
./vendor/bin/sail art optimize:clear
ou
./vendor/bin/sail art config:cache && art optimize:clear

sail artisan make:controller BeerController
ou 
sail art make:controller BeerController -> CRIA O ARQUIVO BeerController.php na pasta app/Http/Controllers
->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index()
    {
    return 'Virgu & Beer & Code'
    }
}

* NO ARQUIVO DE ROTAS Web.php CHAMA O BeersController:

importante importar o Controller <nomeDoController>+<CTRL=ENTER:
use App\Http\Controllers\BeerController;

Route::get('/beers', [BeerController::class, 'index'])
                        ->middleware(['auth']);


* PRECISAMOS CRIAR UM MÉTODO PARA PEGAR A LISTA, LISTAR OS DADOS DA API (listar as bebidas de https://api.punkapi.com/v2 ->
VAMOS CRIAR UMA NOVA CLASSE de serviços em app/Sevices/PunkapiService.php

* O LARAVEL POSSUI UM RECURSO CHAMADO HTTPClient que abstrai o uso de uma ferramenta chama guzeo, esse guzeo é o client http mais comum para php, com ele fazemos requisições pra diversos serviços web dentro do php para outras url, ele é robusto, então o laravel simplifica importando o recurso que faz tudo por 'detrás dos panos':

PunkapiService.php

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::get('https://api.punkapi.com/v2/beers');
    }
}

E NO BeerController.php fica:
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index()
    {
    //return 'Virgu & Beer & Code';
    $service = new PunkapiService;

    return $service->getBeers();
    }
}

* TRATE É CARACTERÍSTICA QUE A CLASSE ADQUIRE (pode ter mesmos métodos e atributos substituindo o recurso de um classe extender várias classes que não tem no php, a trate é uma forma de fazer isso. O service  é uma outra camada na maioria das vezes abstrair seviços que vc vai consumir, por exemplo API.

Estando logado, os dados da api já serão exibidos em localhost:8000/beers, se usar um aplicativo cliente tipo insomnia pode apresentar os dados também, melhor comentar a linha de de autenticação da rota:
Route::get('/beers', [BeerController::class, 'index']);
linha de autenticação da rota // ->middleware(['auth']);

* ESSA API PERMITE FAZER FILTROS VIA PARÂMETROS NA PRÓPRIA ROTA. PRIMEIRO VAMOS REFATORAR O CÓDIO, A CLASSE PunkapiService.php:

USO DE CONFIG E MACRO


Vamos alterar a url, primeiro acessando a pasta config da raiz do projeto e criar o arquivo punkapi.php. O que acontece é que o config(pasta config da raiz) carrega todos os arquivos da pasta e permite que sejam acessados via funções simples(HELPERS), isso é muito legal porque podemos acessar esses arquivos de configurações de qualquer lugar do projeto: 

<?php

return [
    'url' => env('PUNK_BASE_URL', 'https://api.punkapi.com/v2')
];

Usando o helper env significa dizer que, se não houver a constante PUNK_BASE_URL setada no arquivo .env do projeto, seu valor será o segundo parâmetro: http://api.punkapi.com/v2 e no arquivo PunkapiService.php da pasta app/Services fica:

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::get('/beers');
    }
}

MACRO é uma forma de criar funções customizadas:
 em app\Providers vamos acessar o arquivo AppServiceProvider.php que é uma classe que tem dois métodos register e boot. No método boot vamos chamar o método Http do laravel e chamar o método macro, no primeiro parâmetro será um nome atribuído à função e e o segundo uma clausure (uma função).
Neste arquivo é passado o arquivo de configuração da url (em 'config/punkapi.php') além de tokens, headers,...
 

use Illuminate\Support\Facades\Http; -> deve ser importado
E a função boot fica:

  public function boot()
    {
        Http::macro('punkapi', function(){
            return Http::acceptJson()
            ->baseUrl(config('punkapi.url'));
        });
    }

Então criamos uma macro(uma função customizada) chamada punkapi que já retorna o client com accept/Json no Header e com o baseUrl configurado lá do arquivo /config/punkapi.php e se estiver setado no .env pegará de lá.

/app/Services/PunkapiService.php fica:

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::punkapi()->get('/beers');
    }
}

*obs.: a baseUrl poderia ser setada no construtor, que pode setar token também.(uma outra abordagem para versão sem macros);

->Testamos o retorno Json em localhost:8000/beers.

Refatorando o arquivo PunkapiService.php: O client Http não lança exceção e podemos forçar o retorno em modo Json:
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
       // return Http::punkapi()->get('/beers');
       return Http::punkapi()
            ->get('/beers')
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Podemos testar forçando um erro alterando a constante PUNKAPI_BASE_URL criada em /config/punkapi.php, vamos atribuir um valor diferente no arquivo .env:

PUNKAPI_BASE_URL="adfjklj878"

Podemos usar a função retry tem dois parâmetros, o número de tentativas pra buscar a requisição e o intervalo entre elas. Refatorando o código fica:
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
       // return Http::punkapi()->get('/beers');
       return Http::punkapi()
            ->get('/beers')
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

- Quando sai a exceção nao deveriamos retornar o erro em json por ser um api neste caso estamos usamos um app web e não uma api. E usaríamos o Route Api.

Refatorando o método boot de /app/Providers/AppServiceProvider.php, inserindo o retry():

     */
    public function boot()
    {
        Http::macro('punkapi', function(){
            return Http::acceptJson()
            ->baseUrl(config('punkapi.url'))
            ->retry(3,100);
        });
    }
}

comando de help

* ./vendor/bin/sail composer dump-autoload
* Verificar Nome do arquivo se bate com o nome das rotas(Classes criadas e importar o nome errado);
* inteliphense

Refatorando BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index()
    {

    $service = new PunkapiService();

    return $service->getBeers();
    }
}

Em vez de instanciar o método PunkapiService() dentro de index, vamos passar por parâmetro de index() declarando seu Próprio nome (PunkapiService) como tipo. Fica assim:

<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers();
    }
}

Assim usamos feactures do php(injeção de dependências) e ao mesmo tempo feactures do laravel. Em vez de criar uma instância dentro do método index, vamos injetar a classe como parâmetro para o método index(), ficando index($service) e a instância de dentro da função passa como parâmetro de 'tipo da variável'. Isso quebra a cadeia de dependência entre as classes.
Assim, o método index ganha independência não mais dependendo da instância de new PunkapiService e passamos a olhar a função index em si.
Assim, o Laravel tenta fazer um binding, um match, o laravel tenta encontrar alguma classe PunkapiService e cria uma instância dessa classe e usa ali como parâmetro. Se não fizer assim, lá em Rotas teria que ser passado como parâmetro o que fica desnecessário.
Não poderia ser feito se na classe PunkapiService existisse o construtor para atribuir valores automaticamente à classe. Assim podemos usar porque não precisamos passar nenhum valor.

ADICIONAR OS FILTROS:
Vamos filtrar o retorno api com os seguintes itens: beer_name, food, ibu_gt, malte:

var_dump($v)
die();
dd($variável)
benchmarck -> ?

/*****REFATORA PARA TESTE alterando BeerController.php e PunkapiService.php
BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(
        'heineken',
        'cheese',
        'corn',
        45
    );
    }
}

PunkapiService.php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers(
        string $beer_name,
        string $food,
        string $malt,
        string $ibu_gt
    )
    {
        $params = get_defined_vars();

        dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Resultado do debug no insomnia ou no navegador:
array:4 [▼ // app/Services/PunkapiService.php:18
  "beer_name" => "heineken"
  "food" => "cheese"
  "malt" => "corn"
  "ibu_gt" => "45"
]
//* fim teste

Refatorando:

class PunkapiService
{
    public function getBeers(
        string $beer_name = null,
        string $food = null,
        string $malt = null,
        string $ibu_gt = null
    )
    {
        $params = get_defined_vars();

        dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Assim quando não passar o valor para a chave ele exibirá a chave e o valor Null, vamos refatorar para não exibir nem a chave englobando get_defined_vers() com array_filter no arquivo PunkapiService.php:

$params = array_filter(get_defined_vars());

<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(
        'heineken',
        'cheese',
        'corn',
       // 45 -> Esse não é passado
    );
    }
}


array:3 [▼ // app/Services/PunkapiService.php:18
  "beer_name" => "heineken"
  "food" => "cheese"
  "malt" => "corn"
	Aqui não exibiu o valor 45
]


USANDO A FUNÇÃO NAMED_ARGS passamos só os parâmetros que precisamos retornar da api e o php com essa função saberá qual a posição dela no array de argumentos passados como parâmetro sem a necessidade de seguir a mesma sequência dos argumentos:
class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(food: 'cheese');
    }
}

REFATORANDO:
BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index( Request $request, PunkapiService $service)
    {
    return $service->getBeers(...$request->all());
    }
}

PunkapiService.php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers(
        string $beer_name = null,
        string $food = null,
        string $malt = null,
        string $ibu_gt = null
    )
    {
        $params = array_filter(get_defined_vars());

     //   dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

CRIANDO UMA REQUEST
sail artisan make:request BeerRequest
/app/Http/Requests/BeerRequest.php

* Funções anônimas, também conhecidas como closures , permitem a criação de funções que não tem o nome especificado. Elas são mais úteis como o valor de parâmetros callable, mas podem ter vários outros usos.. É uma função passada como parâmetro

CRIANDO NOVA ROTA PARA SALVAR COMO EXCEL
* https://docs.laravel-excel.com/3.1/getting-started/installation.html

Route::group([
    'prefix' => 'beers',
], function() {

    Route::get('/', [BeerController::class, 'index']); //-> Se houver necessidade de salvar dados por essa rota mudamos o método(verbo html) para post(os dados não serão expostos na url).
                          //  ->middleware(['auth']);
    Route::get('/export', [BeerController::class, 'export']);

});

Então passamos a ter duas rotas: localhost:8000/beers
localhost:8000/beers/export

No BeerController incluimos o método export():
class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
    // return $service->getBeers(...$request->all());
    return $service->getBeers(...$request->validated());
    }

    public function export()
    {
        return 'Relatório criado.';
    }
}



INSTALANDO PACOTE LARAVEL-EXCEL PARA GERAR OS RELATÓRIO EM EXCEL FILTRADOS DA API:

* https://docs.laravel-excel.com/3.1/getting-started/installation.html

COMANDO PARA INSTALAR VIA COMPOSER:
./vendor/bin/sail composer require psr/simple-cache:^2.0 maatwebsite/excel

CRIAR A CLASSE DO EXCEL
./vendor/bin/sail artisan make:export BeerExport  --> Cria o arquivo em  /app/Exports/BeerExport.php

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BeerExport implements FromCollection
{


    /**
    * @return \I¢lluminate\Support\Collection
    */
    public function collection()
    {
        //
    }
}

-> Dentro de colletion buscaremos as informações que serão salvas no arquivo do excel, um array de dados;

criamos um __construct() que vai ter uma propriedade privada do tipo array chamamos de $reportData.

O retorn será uma collection como informa o comentário:
 /**
    * @return \I¢lluminate\Support\Collection
    */

Na função colletion(), está recebendo um array return $this->reportData; 
Observe que não precisa mais declarar uma propriedade que vai se setada via construct(), basta defifinir o escopo junto do argumento e o php faz isso pra você. Como o retorno da função é um array usamos o helper collect para o $this->reportData:

BeerExport.php

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BeerExport implements FromCollection
{

    public function __construct(
        private array $reportData
    ){}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return collect($this->reportData);
    }
}
 

Consultamos a documentação do Laravel-excel em 'Exporting collections':
em Excel Store passa o nome da classe e o nome do arquivo:

BeerController.php
<?php

namespace App\Http\Controllers;


use App\Exports\BeerExport;
use App\Http\Requests\BeerRequest;
use App\Services\PunkapiService;
use Maatwebsite\Excel\Facades\Excel;


class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
    // return $service->getBeers(...$request->all());
    return $service->getBeers(...$request->validated());
    }

    public function export()
    {
      $params = [
        ['name' => 'Tom', 'age' => '30'],
        ['name' => 'Virgu', 'age' => '27']
       ];

       Excel::store(new BeerExport($params), 'olw-report.xlsx');
       return "Relatório criado";

    }


}

********************************************
* REFATORANDO E SALVANDO O ARQUIVO EXCEL EM /storage/app

BeerExport.php
<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BeerExport implements FromCollection
{

    public function __construct(
        private array $reportData
    ){}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return collect($this->reportData);
    }
}
*****************************

BeerController.php

<?php

namespace App\Http\Controllers;


use App\Exports\BeerExport;
use App\Http\Requests\BeerRequest;
use App\Services\PunkapiService;
use Maatwebsite\Excel\Facades\Excel;


class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
        return $service->getBeers(...$request->all());

    }

    public function export(BeerRequest $request, PunkapiService $service)
    {
        $beers = $service->getBeers(...$request->validated());

        $filteredBeers = collect($beers)->map(function($value, $key){
        return collect($value)
                ->only(['name', 'tagline', 'first_brewed', 'description'])
                ->toArray();
    })->toArray();

    //dd($filteredBeers);

      $params = [
        ['name' => 'Tom', 'age' => '30'],
        ['name' => 'Virgu', 'age' => '27']
       ];

       Excel::store(new BeerExport($filteredBeers), 'olw-report.xlsx');

           return "Relatório criado";

    }


}

PARA SALVAR O ARQUIVO EXCEL EM UM STORAGE S3:
ALTERA BeerController.php

<?php

namespace App\Http\Controllers;


use App\Exports\BeerExport;
use App\Http\Requests\BeerRequest;
use App\Services\PunkapiService;
use Maatwebsite\Excel\Facades\Excel;


class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
        return $service->getBeers(...$request->all());

    }

    public function export(BeerRequest $request, PunkapiService $service)
    {
        $beers = $service->getBeers(...$request->validated());

        $filteredBeers = collect($beers)->map(function($value, $key){
        return collect($value)
                ->only(['name', 'tagline', 'first_brewed', 'description'])
                ->toArray();
    })->toArray();


       Excel::store(
            new BeerExport($filteredBeers),
             'olw-report.xlsx',
             's3');

           return "Relatório criado";

    }


}

************
O REPOSITÓRIO DE ARQUIVOS minio:
NO DOCKER COMPOSER TEMOS O minio, um S3 que tem
MINIO_ROOT_USER: 'sail'
MINIO_ROOT_PASSWORD: 'password' e roda na porta 9000
localhost:9000
usuário: sail
senha: password

vamos criar um buncket(uma pasta)

e configurar o .env da raiz da aplicação:
originalmente é assim:
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

 e acrescentamos as informações para:


AWS_ACCESS_KEY_ID=sail
AWS_SECRET_ACCESS_KEY=password
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=local
AWS_ENDPOINT=http://minio:9000
AWS_URL=http://minio:9000/local
AWS_USE_PATH_STYLE_ENDPOINT=true

altera tambem:

FILESYSTEM_DISK=local 
para:
FILESYSTEM_DISK=s3

INSTALAR UMA DEPENDÊNCIA (ADAPTER) PARA FAZER CORRESPONDÊNCIA COM A AWS:

Flysystem 3.x em laravel.com/docs/9.x/upgrade
./vendor/bin/sail composer require -W league/flysystem-aws-s3-v3 "^3.0"

em caso de erro:
 artisan vendor:publish --tag=laravel-assets --ansi --force

.env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:UbVvTP6Cu+LF5GamJdB4dsZZvW05ep4bZqcCEhmiDCg=
APP_DEBUG=true
APP_URL=http://localhost
APP_PORT=8000

# PUNKAPI_BASE_URL="httpadfjkljdsdfdfasf878"

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
FORWARD_DB_PORT=3307
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=olw
DB_USERNAME=sail
DB_PASSWORD=password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=s3
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=memcached

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=sail
AWS_SECRET_ACCESS_KEY=password
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=local
AWS_ENDPOINT=http://minio:9000
AWS_URL=http://minio:9000/local
AWS_USE_PATH_STYLE_ENDPOINT=true

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

PRONTO. ENVIANDO PARA O MINIO.

/**** Criando as Migrations com Virgu e tabela de históricos

























 







/***********************************************************
QUINTA FEIRA: 20/10/22

Open Laravel Week | Deploy com Terraform, EC2 e RDS | Fermentação

****
https://portal.aws.amazon.com/billing/signup?nc2=h_ct&src=header_signup&redirect_url=https%3A%2F%2Faws.amazon.com%2Fregistration-confirmation&language=pt_br#/start/email

Com terraform pode mudar de infra e configurar no git.

PROGRMAR A CONFIGURAÇÃO DO SERVIDOR: É basicamente construir uma nova aplicação para fazer isso, mais fácil de entender.
Terraform serve para (linguagem HCL -> linguagem própria - linguagem descritiva, descreve o resultado e não como irá ser feito), ou seja, descrever o que queremos.
Terraspace é o framework pra terraform.
Quando criamos o Terraform, ele pode variar conforme a infra cloud (aws, azure, google cloud). sua estrutura é a mesma para todos. mas cada provider tem a sua forma de usar, não consegue usar o mesmo código para mais de uma cloud.
Vamos rodar Terraform via container:

1. clonar do git: git clone 
Criar uma pasta para a infraestrutura

sail   (script que vamos usar)
#!/usr/bin/env bash

docker run -rm -it
	-u $(id -u):$(id -g) \
	-v $PWD:/workspace \
	-w /workspace
	hashicorp/terraform:light "%@"


	<no terminal

Logar em: aws.amazon.com
busca: iam
iam dashboard -> mysecurity credencials (root user) -> Acces keys ->clicar em create access keys -> salva o access key e secret access key
e coloca no arquivo credencials na maquina local.. .aws/credencials
















































//////////////////////////////////////////////////////////////////////////////////////////////////////
CONTEÚDO QUE FALTA ORGANIZAR:



/**************************************/

sail share

sail artisan sail:publish ->coloca em uma pasta na raiz chamada docker

sail --help

sail artisan optimizer:clear

sail ps

sail build --no-cache -> faz o bild da aplicação. (dá um sail down  por precaução antes.)










/*********************************

root@DELLAGS:~# curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash

Dockerfile

root@DELLAGS:~/example-app# docker exec -it example-app-mysql-1 bash


FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
RUN chmod -R 755 /usr/share/nginx/storage/*
RUN ln -s public html

.env (do composer)

DB_CONNECTION=mysql
DB_HOST=mysql-app (serviço do mysql no docker-compose.yaml)
DB_PORT=3306
DB_DATABASE=laraveldockerdb
DB_USERNAME=root
DB_PASSWORD=123456



docker-compose.yaml

version: '3'

services:
  laraveldocker-app:
    build: .
    ports:
      - "3003:80"
    volumes:
      - ./:/usr/share/nginx
      - .docker/nginx:/etc/nginx/conf.d/
    networks:
      - app-network
  mysql-app:
    image: mysql:5.7.22
    ports:
      - "3306:3306"
    volumes:
      - .docker/dbdata:/var/lib/mysql
    environment:
      MYSQL_DATABASE: laraveldocker
      MYSQL_ROOT_PASSWORD: 123456
    networks:
      - app-network
networks:
  app-network:
    driver: bridge
    
https://calculator.aws/#/addService
################



/*************************************************
#criando um serviço com um nome qualquer
version: '3'

services:
  laravel-app:                    #criando um serviço com um nome qualquer
    build: . ou image: wyveo/nginx-php-fpm:latest -> neste caso sem Dockerfile.                    # endereço da imagem ou local do Dockerfile (neste caso o ponto siginifica a raiz do projeto)
    ports:
      - "8080:80"                 # 8080 porta do meu host: 80 é a porta do docker nginx
    volumes:                      # docker-compose up -d -> sobe a imagem e libera o terminal  
      - ./:/usr/share/nginx       # TUDO QUE ESTIVE NA RAIZ (na rais tem o meu projeto laravel) './' IRÁ SER REFLETIDO NA PASTA /usr/share/nginx (pasta de acesso da página html)
                                  # C:\Laravel-docker\laravel-docker>docker compose up -d --build atualiza a minha imagem

  mysql-app:
      image: mysql:5.7
      ports:
        - "3306:3306"
      volumes:
        - .docker/dbdata:/var/lib/mysql          # qualqer nome (para persistir -guardar os dados do banco de dados)


      environment:
        MYSQL_DATABASE: laravel
        MYSQL_ROOT_PASSWORD: laravel
    
      

      /***************************///


  
C:\Laravel-docker\laravel-docker>docker compose up -d --build

                                
                               

    

/******************************** Dockerfile
FROM wyveo/nginx-php-fpm:latest

/***************************///
  COMANDOS

docker compose down -> para todos os containers
C:\Laravel-docker\laravel-docker>docker exec -it laravel-docker-laravel-app-1 bash 
root@612ea0ea3340:/# cd /usr/share/nginx/
root@612ea0ea3340:/usr/share/nginx# php artisan migrate
root@612ea0ea3340:/usr/share/nginx# php artisan serve

		
/***********/
PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d mysql:5.7

docker inspect meu-mysql ou | grep IPAddress

PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d -p 3306:3306 mysql:5.7

docker ps
docker ps -l
docker ps -a
docker rm -f nome


/*** LARAVEL */
### CRIANDO UM PROJETO NO LARAVEL 
laravel new projeto_laravel_via_installer (ESTA É UM AOPÇÃO)
composer create-project --prefer-dist laravel/laravel app_controle_tarefas "8.5.9"
cd app_controle_tarefas
cd public
php -S localhost:8000

ou 
da raiz do projeto:
php artisan serve 
ou
php artisan serve --port=3000

### PARA ABRIR PORTA EM OUTRO SERVIDOR
php artisan serve --host test.com --port 8080

 **********************************************************************
cd app_controle_tarefas
cd public
php artisan serve
- acessa o navegador http://localhost:8000

### DENTRO DO PROJETO CRIADO INSTALAR O LARAVEL/UI:^3.2 - versão 3.2
composer require laravel/ui:^3.2

### SE OCORRER ERRO AUMENTAR A MEMÓRIA DISPONIVEL PARA O php

-php --ini -> localiza o arquivo de configuração do php
LOCALIZA memory_limit = 1000 e altera para 
         memory_limit  = -1 e Salva

### LISTA A RELAÇÃO DE COMANDOS 
php artisan list 

DEVERA SURGIR AS OPÇÕES ABAIXO:

 ui
  ui:auth               Scaffold basic login and registration views and routes
  ui:controllers        Scaffold the authentication controllers
 vendor

### ENTENDENDO O PACOTE UI E INICIANDO A AUTENTICAÇÃO WEB NATIVA DO LARAVEL

COMANDO PARA LISTAR ROUTES: 
php artisan route:list

### php artisan ui bootstrap --auth (bootstrap ou react ou vue)
aplicando o bootstrap incluindo os recursos de autenticação;
poderia ser aplicado o bootstrap sem os recursos de autenticação;

### php artisan route:list -> mostra as rotas - ver que aumentaram as rotas

### APÓS ESSE PROCESSO O SISTEMA PEDE PARA RODAR
npm install -> instala as dependências do package.json (inclusive o bootstrap)
npm run dev -> gera os assets da aplicação de acordo com a tecnologia selecionada (bootstrap, react ou vue) -> Geralmente roda mais de uma vez para compilar tudo.

### CRIA O BANCO DE DADOS NORMALMENTE

### EXECUTA AS MIGRATIONS PADRÕES CRIADAS PARA O SISTEMA DE login
php artisan migrate -> CRIA AS TABELAS NO BANCO DE DADOS


************************************** 
INSTALANDO O COMPOSER NO UBUNTU
**************************************
sudo apt update
sudo apt install php-cli unzip

cd ~

curl -sS https://getcomposer.org/installer -o composer-setup.php

HASH=`curl -sS https://composer.github.io/installer.sig`

echo $HASH ->saída: Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74



php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer





***********************

DigitalOcean Kubernetes: novo plano de controle é mais rápido e gratuito, habilita HA para SLA de 99,95% de tempo de atividade
Produtos
Preços

Documentos
divisa suspensa

Entrar
divisa suspensa

// Tutorial //
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Publicado em 21 de maio de 2020
Ubuntu
PHP
Ubuntu 20.04
Avatar padrão
Por Erika Heidi
Advogado Desenvolvedor
Português
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Introdução
O Composer é uma ferramenta popular de gerenciamento de dependências para o PHP, criado para facilitar a instalação e a atualização das dependências principalmente do projeto. Ele controla quais outros pacotes de projeto específico dependem e são instalados para você, usando as opções apropriadas de acordo com os requisitos do projeto. O Composer também é comumente utilizado para inicializar novos projetos em frameworks PHP populares, como o Symfon e o Laravel .

Neste tutorial, você instalará e começará a usar o Composer em um sistema Ubuntu 20.04.

Pré-requisitos
Para seguir este guia, você pode acessar um servidor como usuário Ubuntu20.04 como usuário sudonão-root um firewall habilitado em seu servidor Para configurar isto, siga nosso guia Configuração do servidor inicial para o Ubuntu 20.04

Passo 1 — Instalando o PHP e as Dependências Adicionais
Além das dependências que já devem estar incluídas em seu sistema Ubuntu 20.04, como o , o Composer exige ou gitexecuta scripts PHP na linha de comando e para extrair arquivos zipados. Vamos instalar essas dependências agora.curlphp-cliunzip

primeiro, atual, gerenciador de pacotes de soluções: o cache do gerenciador de pacotes

sudo apt update
Em seguida, o seguinte comando para instalar os pacotes, execute:

sudo apt install php-cli unzip
Você será solicitado a confirmar a instalação digitando Ye, depois, ENTER.

Assim que os pré-requisitos para instalação do Composer forem instalados, você poderá seguir.

Passo 2 — Baixando e Instalando o Compositor
O Composer fornece um instalador de script escrito em PHP. Vamos baixá-lo, verificar se ele não está danificado e, em seguida, o usaremos para instalar o Composer.

Certifique-se de estar em sua pasta home. Em seguida, baixe o instalador usando o curl:

cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
Em seguida, vamos verificar se o instalador baixado corresponde ao hash SHA-384 para o instalador mais recente encontrado na página Composer Public Keys / Signatures . Para facilitar o passo de seleção, você pode usar o seguinte comando para obter programaticamente o hash mais recente da página do Composer e armazená-lo em uma variável do shell:

HASH=`curl -sS https://composer.github.io/installer.sig`
Se você quiser verificar o valor realizado, execute:

echo $HASH
Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a
Agora o código PHP a seguir, execute conforme a página de download do Composer, para verificar se o script de instalação está seguro para ser executado:

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
Você verá o seguinte resultado:

Resultado
Installer verified
Se Installer corruptvocê estiver usando o hash correto, verifique se você está usando o hash correto. Em seguida, repita o processo de verificação. Quando você tiver um instalador selecionado, você pode continuar.

Para instalar o composerglobalmente, use o seguinte comando que baixará e instalará o Composer como um comando disponível em todo o sistema chamado composer, sob /usr/local/bin:

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
Você verá um resultado semelhante com este:

Output
All settings correct for using Composer
Downloading...

Composer (version 1.10.5) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer
Para testar sua instalação, execute:

composer
Output
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.10.5 2020-04-10 11:44:22

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
...
Isso verifica que o Composer foi instalado com sucesso em seu sistema e está disponível em todo o sistema.

Nota: se você preferirá ter-lhe-ão separados separados do Composer para projeto hospedado neste servidor, você pode instalar localmente, em uma base por projeto. Este método também é útil quando o usuário do sistema não possui permissão para instalar o software disponível em todo o sistema.

Para fazer isso, use o comando php composer-setup.php. Isso irá gerar um arquivo composer.pharem seu diretório atual, que pode ser executado com o seu atual php composer.phar.

Agora podemos dar uma dependência em como usar o Compose como gerenciar.

Passo 3 — Usando o Compositor em um Projeto PHP
Os projetos PHP geralmente dependentes de bibliotecas externas, e o gerenciamento de dependências e suas versões podem ser complicados. O Composer resolve esse problema de manter um controle de projeto de extensões e dependências, também facilita o processo de descoberta, instalação e atualização de pacotes que são definidos por enquanto.

Para usar o seu projeto, você pode compor um arquivo composer.json. O arquivo composer.jsonComposer quais dependências precisa para baixar seu projeto quais serão as versões de cada pacote tem permissão para instalações e instalações. Isso é muito importante para manter seu projeto consistente e evitar a instalação de versões instáveis ​​que podem causar problemas de compatibilidade retroativa.

Você não precisa criar este arquivo manualmente - é comum ocorrer erros de sintaxe quando fizer isso. O Composer oferece uma maneira de criar um novo arquivo composer.jsoncom base na entrada do usuário, o que é uma boa escolha se você planeja compartilhar seu projeto mais tarde como um pacote público no Packagist . O Composer gera automaticamente um arquivo básico composer.jsonquando você executa um comando composer requirepara incluir uma dependência em um projeto recém-criado.

O processo de uso do Composer para instalar um pacote como uma dependência em um projeto envolve os passos a seguir:

Identifique o tipo de biblioteca que o aplicativo precisa.
uma biblioteca de código aberto adequada no agist.org , o responsável oficial de pacotes para o Compose.
Escolha o pacote de dependência.
Execute composer requirepara incluir a dependência no arquivo composer.jsone instalar o pacote.
Vamos testar isso com uma aplicação de demonstração.

O objetivo desta aplicação é transformar uma determinação determinada em uma string de URL amigável - um slug . Isso é comumente usado para converter os títulos de página para caminhos de URL (Assim como a parte final da URL para este tutorial).

Vamos começar a criar um diretório para o nosso projeto. Vamos chamá-lo de slugify :

cd ~
mkdir slugify
cd slugify
Embora não seja necessário, você pode executar agora um comando composer init para criar um arquivo composer.json detalhado para seu projeto. Como o único objetivo do nosso projeto é demonstrar como instalar dependências com o Composer, usaremos um arquivo composer.json mais simples que será gerado automaticamente quando exigirmos nosso primeiro pacote.

Agora é hora de procurar no Packagist.org por um pacote que pode nos ajudar a gerar slugs. Se você procurar pelo termo “slug” no Packagist, receberá um resultado parecido com este:

Resultados da Pesquisa do Packagist para o termo "slug"

Você verá dois números no lado direito de cada pacote na lista. O número no topo representa quantas vezes o pacote foi instalado através do Composer, e o número em baixo mostra quantas vezes um pacote foi estrelado no GitHub. De um modo geral, os pacotes com mais instalações e mais estrelas tendem a ser mais estáveis, pois mais pessoas os utilizam. Também é importante verificar a descrição do pacote para relevância para garantir que ele é o que você precisa.

Precisamos de um conversor string-to-slug A partir dos resultados da pesquisa, o pacote cocur/slugify, que aparece como o primeiro resultado naquela página, parece ser um bom candidato, com uma quantidade razoável de instalações e estrelas.

Os pacotes no Packagist têm um nome de vendor e um nome de package. Cada pacote tem um identificador único (um namespace) no mesmo formato que o GitHub utiliza para seus repositórios: vendor/package. A biblioteca que queremos instalar utiliza o namespace cocur/slugify. Você precisa de um namespace do pacote para exigi-lo em seu projeto.

Agora que você sabe exatamente qual pacote deseja instalar, você pode executar o composer require para incluí-lo como uma dependência e gerar também o arquivo composer.json para seu projeto. Uma coisa importante é observar a exigência de pacotes. O Composer rastreia as dependências no nível da aplicação e do sistema. As dependências no nível do sistema são importantes para indicar de quais módulos PHP um pacote depende. No caso do pacote cocur/slugify, ele exige um módulo PHP que ainda não instalamos.

Quando um pacote necessário depende de uma biblioteca de sistema que não está atualmente instalada em seu servidor, você receberá um erro informando qual requisito está faltando:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Your requirements could not be resolved to an installable set of packages.

  Problem 1
    - Installation request for cocur/slugify ^4.0 -> satisfiable by cocur/slugify[v4.0.0].
    - cocur/slugify v4.0.0 requires ext-mbstring * -> the requested PHP extension mbstring is missing from your system.
...
Para resolver o problema de dependência do sistema, podemos procurar pelo pacote que falta usando o apt search:

apt search mbstring
Output
Sorting... Done
Full Text Search... Done
php-mbstring/focal 2:7.4+75 all
  MBSTRING module for PHP [default]

php-patchwork-utf8/focal 1.3.1-1 all
  UTF-8 strings handling for PHP

php7.4-mbstring/focal 7.4.3-4ubuntu1 amd64
  MBSTRING module for PHP
Após localizar o nome do pacote correto, você pode utilizar o apt novamente para instalar a dependência de sistema:

sudo apt install php-mbstring
Assim que a instalação terminar, você pode executar novamente o comando composer require:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing cocur/slugify (v4.0.0): Downloading (100%)         
Writing lock file
Generating autoload files
Como você pode ver na saída, o Composer decidiu automaticamente qual versão do pacote utilizar. Se você verificar o diretório do seu projeto agora, ele irá conter dois arquivos novos: composer.json e composer.lock, e um diretório vendor:

ls -l
Output
total 12
-rw-rw-r-- 1 sammy sammy   59 May  4 13:56 composer.json
-rw-rw-r-- 1 sammy sammy 3229 May  4 13:56 composer.lock
drwxrwxr-x 4 sammy sammy 4096 May  4 13:56 vendor
O arquivo composer.lock é usado para armazenar informações sobre quais versões de cada pacote estão instaladas, e garantir que as mesmas versões sejam usadas se outra pessoa clonar seu projeto e instalar suas dependências. O diretório vendor é onde as dependências do projeto estão localizadas. Você não deve fazer commit da pasta vendor no controle de versão - você precisa apenas incluir os arquivos composer.json e composer.lock.

Ao instalar um projeto que já contém um arquivo composer.json, execute o composer install para baixar as dependências do projeto.

Vamos dar uma olhada rápida em restrições de versão. Se você verificar o conteúdo do seu arquivo composer.json, verá algo parecido com isto:

cat composer.json
Output
{
    "require": {
        "cocur/slugify": "^4.0"
    }
}
Note que há o caractere especial ^ antes do número da versão no composer.json. O Composer suporta várias restrições diferentes e formatos para definir a versão necessária do pacote, para fornecer flexibilidade enquanto também mantém seu projeto estável. O operador circunflexo (^) utilizado pelo arquivo composer.json criado automaticamente é o operador recomendado para a interoperabilidade máxima, seguindo o versionamento semântico. Neste caso, ele define 4.0 como a versão mínima compatível e permite atualizações para qualquer versão futura abaixo de 5.0.

De um modo geral, você não precisará alterar as restrições de versão em seu arquivo composer.json. No entanto, algumas situações podem exigir que você edite manualmente as restrições – por exemplo, quando uma nova versão principal da sua biblioteca requerida é liberada e você deseja atualizar, ou quando a biblioteca que você deseja usar não segue o versionamento semântico.

Aqui estão alguns exemplos para lhe dar um melhor entendimento sobre como as restrições de versão do Composer funcionam:

Restrição	Significado	Exemplo de Versões Permitidas
^1.0	>= 1.0 < 2.0	1.0, 1.2.3, 1.9.9
^1.1.0	>= 1.1.0 < 2.0	1.1.0, 1.5.6, 1.9.9
~1.0	>= 1.0 < 2.0.0	1.0, 1.4.1, 1.9.9
~1.0.0	>= 1.0.0 < 1.1	1.0.0, 1.0.4, 1.0.9
1.2.1	1.2.1	1.2.1
1.*	>= 1.0 < 2.0	1.0.0, 1.4.5, 1.9.9
1.2. *	>= 1.2 < 1.3	1.2.0, 1.2.3, 1.2.9
Para uma visualização mais detalhada das restrições de versão do Composer, consulte a documentação oficial.

A seguir, vamos ver como carregar dependências automaticamente com o Composer.

Passo 4 — Incluindo o Script Autoload
Como o PHP por si só não carrega classes automaticamente, o Composer fornece um script autoload que você pode incluir em seu projeto para obter o carregamento automático para ele. Este arquivo é gerado automaticamente pelo Composer quando você adiciona sua primeira dependência.

A única coisa que você precisa fazer é incluir o arquivo vendor/autoload.php em seus scripts PHP antes de qualquer instância de classe.

Vamos testar isso em nossa aplicação de demonstração. Abra um novo arquivo chamado test.php em seu editor de texto:

nano test.php
Adicione o código a seguir que vem no arquivo vendor/autoload.php, carrega a dependência cocur/slugify, e o utiliza para criar um slug:

test.php
<?php
require __DIR__ . '/vendor/autoload.php';

use Cocur\Slugify\Slugify;

$slugify = new Slugify();

echo $slugify->slugify('Hello World, this is a long sentence and I need to make a slug from it!');
Salve o arquivo e saia do seu editor.

Agora, execute o script.

php test.php
Isso produz a saída hello-world-this-is-a-long-sentence-and-i-need-to-make-a-slug-from-it.

As dependências precisam de atualizações quando novas versões são liberadas. Dessa forma, vamos ver como lidar com isso.

Passo 5 — Atualizando as Dependências do Projeto
Sempre que você quiser atualizar suas dependências do projeto para versões mais recentes, execute o comando update:

composer update
Isso irá verificar por versões mais recentes das bibliotecas que você requer em seu projeto. Se uma versão mais recente for encontrada e ela for compatível com a restrição de versão definida no arquivo composer.json, o Composer substituirá a versão anterior instalada. O arquivo composer.lock será atualizado para refletir essas alterações.

Você também pode atualizar uma ou mais bibliotecas específicas, especificando-as desta forma:

composer update vendor/package vendor2/package2
Certifique-se de verificar em seus arquivos composer.json e composer.lock dentro do seu sistema de controle de versão após atualizar suas dependências de modo que outros também possam instalar essas versões mais recentes.

Conclusão





***********
Algoritmo "CalculoMedia2"
// Disciplina: Lógica de programação
// Professor : Antonio Carlos Nicolodi
// Descrição : calculo da média aritimética
// Autor     : Professor Antonio
// Data atual: 01/04/2015
var
// Seção de Declarações
   v1, v2, total: Real
   sinal : Caracter
Inicio
// Seção dos Comandos
   Escreva ("Digite o primeiro valor: ")
   Leia (v1)
   Escreva ("Digite a operação + - * / : ")
   Leia (sinal)
   Escreva ("Digite o segundo valor: ")
   Leia (v2)

   Se sinal = "+" entao
   total <- v1 + v2
   Escreva("O Resultado é: ", total)
   Senao
   Se sinal = "-" entao
   total <- v1 - v2
   Escreva("O Resultado é: ", total)
   Senao
   Se sinal = "*" entao
   total <- v1 * v2
   Escreva("O Resultado é: ", total)


   Senao
     Escreva("OPERAÇÃO INVÁLIDA! ")



      Escreval("total")
   fimse
Fimalgoritmo

****
COMANDOS DOCKER
root@DELLAGS:~# curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash

root@DELLAGS:~/example-app# ./vendor/bin/sail  artisan migrate --seed -> criar o banco de dados e copular dados;


### DatabaseSeeder.php
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        //  \App\Models\User::factory()->create([
        //      'name' => 'Test User',
        //      'email' => 'test@example.com',
        //  ]);
    }
}

### Rota get por id ou email
// Route::get('user/{user:email}', function(\App\Models\User $user){
Route::get('user/{user}', function(\App\Models\User $user){
    
  //  ddd($user);
  //  dd($user);
    var_dump($user);
    die();

    return $user;
})->name('user');

Dockerfile

root@DELLAGS:~/example-app# docker exec -it example-app-mysql-1 bash


FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
RUN chmod -R 755 /usr/share/nginx/storage/*
RUN ln -s public html

.env (do composer)

DB_CONNECTION=mysql
DB_HOST=mysql-app (serviço do mysql no docker-compose.yaml)
DB_PORT=3306
DB_DATABASE=laraveldockerdb
DB_USERNAME=root
DB_PASSWORD=123456



docker-compose.yaml

version: '3'

services:
  laraveldocker-app:
    build: .
    ports:
      - "3003:80"
    volumes:
      - ./:/usr/share/nginx
      - .docker/nginx:/etc/nginx/conf.d/
    networks:
      - app-network
  mysql-app:
    image: mysql:5.7.22
    ports:
      - "3306:3306"
    volumes:
      - .docker/dbdata:/var/lib/mysql
    environment:
      MYSQL_DATABASE: laraveldocker
      MYSQL_ROOT_PASSWORD: 123456
    networks:
      - app-network
networks:
  app-network:
    driver: bridge
    



/*************************************************
#criando um serviço com um nome qualquer
version: '3'

services:
  laravel-app:                    #criando um serviço com um nome qualquer
    build: . ou image: wyveo/nginx-php-fpm:latest -> neste caso sem Dockerfile.                    # endereço da imagem ou local do Dockerfile (neste caso o ponto siginifica a raiz do projeto)
    ports:
      - "8080:80"                 # 8080 porta do meu host: 80 é a porta do docker nginx
    volumes:                      # docker-compose up -d -> sobe a imagem e libera o terminal  
      - ./:/usr/share/nginx       # TUDO QUE ESTIVE NA RAIZ (na rais tem o meu projeto laravel) './' IRÁ SER REFLETIDO NA PASTA /usr/share/nginx (pasta de acesso da página html)
                                  # C:\Laravel-docker\laravel-docker>docker compose up -d --build atualiza a minha imagem

  mysql-app:
      image: mysql:5.7
      ports:
        - "3306:3306"
      volumes:
        - .docker/dbdata:/var/lib/mysql          # qualqer nome (para persistir -guardar os dados do banco de dados)


      environment:
        MYSQL_DATABASE: laravel
        MYSQL_ROOT_PASSWORD: laravel
    
      

      /***************************///


  
C:\Laravel-docker\laravel-docker>docker compose up -d --build

                                
                               

    

/******************************** Dockerfile
FROM wyveo/nginx-php-fpm:latest

/***************************///
  COMANDOS

docker compose down -> para todos os containers
C:\Laravel-docker\laravel-docker>docker exec -it laravel-docker-laravel-app-1 bash 
root@612ea0ea3340:/# cd /usr/share/nginx/
root@612ea0ea3340:/usr/share/nginx# php artisan migrate
root@612ea0ea3340:/usr/share/nginx# php artisan serve

		
/***********/
PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d mysql:5.7

docker inspect meu-mysql ou | grep IPAddress

PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d -p 3306:3306 mysql:5.7

docker ps
docker ps -l
docker ps -a
docker rm -f nome


/*** LARAVEL */
### CRIANDO UM PROJETO NO LARAVEL 
laravel new projeto_laravel_via_installer (ESTA É UM AOPÇÃO)
composer create-project --prefer-dist laravel/laravel app_controle_tarefas "8.5.9"
cd app_controle_tarefas
cd public
php -S localhost:8000

ou 
da raiz do projeto:
php artisan serve 
ou
php artisan serve --port=3000

### PARA ABRIR PORTA EM OUTRO SERVIDOR
php artisan serve --host test.com --port 8080

 **********************************************************************
cd app_controle_tarefas
cd public
php artisan serve
- acessa o navegador http://localhost:8000

### DENTRO DO PROJETO CRIADO INSTALAR O LARAVEL/UI:^3.2 - versão 3.2
composer require laravel/ui:^3.2

### SE OCORRER ERRO AUMENTAR A MEMÓRIA DISPONIVEL PARA O php

-php --ini -> localiza o arquivo de configuração do php
LOCALIZA memory_limit = 1000 e altera para 
         memory_limit  = -1 e Salva

### LISTA A RELAÇÃO DE COMANDOS 
php artisan list 

DEVERA SURGIR AS OPÇÕES ABAIXO:

 ui
  ui:auth               Scaffold basic login and registration views and routes
  ui:controllers        Scaffold the authentication controllers
 vendor

### ENTENDENDO O PACOTE UI E INICIANDO A AUTENTICAÇÃO WEB NATIVA DO LARAVEL

COMANDO PARA LISTAR ROUTES: 
php artisan route:list

### php artisan ui bootstrap --auth (bootstrap ou react ou vue)
aplicando o bootstrap incluindo os recursos de autenticação;
poderia ser aplicado o bootstrap sem os recursos de autenticação;

### php artisan route:list -> mostra as rotas - ver que aumentaram as rotas

### APÓS ESSE PROCESSO O SISTEMA PEDE PARA RODAR
npm install -> instala as dependências do package.json (inclusive o bootstrap)
npm run dev -> gera os assets da aplicação de acordo com a tecnologia selecionada (bootstrap, react ou vue) -> Geralmente roda mais de uma vez para compilar tudo.

### CRIA O BANCO DE DADOS NORMALMENTE

### EXECUTA AS MIGRATIONS PADRÕES CRIADAS PARA O SISTEMA DE login
php artisan migrate -> CRIA AS TABELAS NO BANCO DE DADOS


************************************** 
INSTALANDO O COMPOSER NO UBUNTU
**************************************
sudo apt update
sudo apt install php-cli unzip

cd ~

curl -sS https://getcomposer.org/installer -o composer-setup.php

HASH=`curl -sS https://composer.github.io/installer.sig`

echo $HASH ->saída: Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74



php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer





***********************

DigitalOcean Kubernetes: novo plano de controle é mais rápido e gratuito, habilita HA para SLA de 99,95% de tempo de atividade
Produtos
Preços

Documentos
divisa suspensa

Entrar
divisa suspensa

// Tutorial //
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Publicado em 21 de maio de 2020
Ubuntu
PHP
Ubuntu 20.04
Avatar padrão
Por Erika Heidi
Advogado Desenvolvedor
Português
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Introdução
O Composer é uma ferramenta popular de gerenciamento de dependências para o PHP, criado para facilitar a instalação e a atualização das dependências principalmente do projeto. Ele controla quais outros pacotes de projeto específico dependem e são instalados para você, usando as opções apropriadas de acordo com os requisitos do projeto. O Composer também é comumente utilizado para inicializar novos projetos em frameworks PHP populares, como o Symfon e o Laravel .

Neste tutorial, você instalará e começará a usar o Composer em um sistema Ubuntu 20.04.

Pré-requisitos
Para seguir este guia, você pode acessar um servidor como usuário Ubuntu20.04 como usuário sudonão-root um firewall habilitado em seu servidor Para configurar isto, siga nosso guia Configuração do servidor inicial para o Ubuntu 20.04

Passo 1 — Instalando o PHP e as Dependências Adicionais
Além das dependências que já devem estar incluídas em seu sistema Ubuntu 20.04, como o , o Composer exige ou gitexecuta scripts PHP na linha de comando e para extrair arquivos zipados. Vamos instalar essas dependências agora.curlphp-cliunzip

primeiro, atual, gerenciador de pacotes de soluções: o cache do gerenciador de pacotes

sudo apt update
Em seguida, o seguinte comando para instalar os pacotes, execute:

sudo apt install php-cli unzip
Você será solicitado a confirmar a instalação digitando Ye, depois, ENTER.

Assim que os pré-requisitos para instalação do Composer forem instalados, você poderá seguir.

Passo 2 — Baixando e Instalando o Compositor
O Composer fornece um instalador de script escrito em PHP. Vamos baixá-lo, verificar se ele não está danificado e, em seguida, o usaremos para instalar o Composer.

Certifique-se de estar em sua pasta home. Em seguida, baixe o instalador usando o curl:

cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
Em seguida, vamos verificar se o instalador baixado corresponde ao hash SHA-384 para o instalador mais recente encontrado na página Composer Public Keys / Signatures . Para facilitar o passo de seleção, você pode usar o seguinte comando para obter programaticamente o hash mais recente da página do Composer e armazená-lo em uma variável do shell:

HASH=`curl -sS https://composer.github.io/installer.sig`
Se você quiser verificar o valor realizado, execute:

echo $HASH
Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a
Agora o código PHP a seguir, execute conforme a página de download do Composer, para verificar se o script de instalação está seguro para ser executado:

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
Você verá o seguinte resultado:

Resultado
Installer verified
Se Installer corruptvocê estiver usando o hash correto, verifique se você está usando o hash correto. Em seguida, repita o processo de verificação. Quando você tiver um instalador selecionado, você pode continuar.

Para instalar o composerglobalmente, use o seguinte comando que baixará e instalará o Composer como um comando disponível em todo o sistema chamado composer, sob /usr/local/bin:

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
Você verá um resultado semelhante com este:

Output
All settings correct for using Composer
Downloading...

Composer (version 1.10.5) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer
Para testar sua instalação, execute:

composer
Output
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.10.5 2020-04-10 11:44:22

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
...
Isso verifica que o Composer foi instalado com sucesso em seu sistema e está disponível em todo o sistema.

Nota: se você preferirá ter-lhe-ão separados separados do Composer para projeto hospedado neste servidor, você pode instalar localmente, em uma base por projeto. Este método também é útil quando o usuário do sistema não possui permissão para instalar o software disponível em todo o sistema.

Para fazer isso, use o comando php composer-setup.php. Isso irá gerar um arquivo composer.pharem seu diretório atual, que pode ser executado com o seu atual php composer.phar.

Agora podemos dar uma dependência em como usar o Compose como gerenciar.

Passo 3 — Usando o Compositor em um Projeto PHP
Os projetos PHP geralmente dependentes de bibliotecas externas, e o gerenciamento de dependências e suas versões podem ser complicados. O Composer resolve esse problema de manter um controle de projeto de extensões e dependências, também facilita o processo de descoberta, instalação e atualização de pacotes que são definidos por enquanto.

Para usar o seu projeto, você pode compor um arquivo composer.json. O arquivo composer.jsonComposer quais dependências precisa para baixar seu projeto quais serão as versões de cada pacote tem permissão para instalações e instalações. Isso é muito importante para manter seu projeto consistente e evitar a instalação de versões instáveis ​​que podem causar problemas de compatibilidade retroativa.

Você não precisa criar este arquivo manualmente - é comum ocorrer erros de sintaxe quando fizer isso. O Composer oferece uma maneira de criar um novo arquivo composer.jsoncom base na entrada do usuário, o que é uma boa escolha se você planeja compartilhar seu projeto mais tarde como um pacote público no Packagist . O Composer gera automaticamente um arquivo básico composer.jsonquando você executa um comando composer requirepara incluir uma dependência em um projeto recém-criado.

O processo de uso do Composer para instalar um pacote como uma dependência em um projeto envolve os passos a seguir:

Identifique o tipo de biblioteca que o aplicativo precisa.
uma biblioteca de código aberto adequada no agist.org , o responsável oficial de pacotes para o Compose.
Escolha o pacote de dependência.
Execute composer requirepara incluir a dependência no arquivo composer.jsone instalar o pacote.
Vamos testar isso com uma aplicação de demonstração.

O objetivo desta aplicação é transformar uma determinação determinada em uma string de URL amigável - um slug . Isso é comumente usado para converter os títulos de página para caminhos de URL (Assim como a parte final da URL para este tutorial).

Vamos começar a criar um diretório para o nosso projeto. Vamos chamá-lo de slugify :

cd ~
mkdir slugify
cd slugify
Embora não seja necessário, você pode executar agora um comando composer init para criar um arquivo composer.json detalhado para seu projeto. Como o único objetivo do nosso projeto é demonstrar como instalar dependências com o Composer, usaremos um arquivo composer.json mais simples que será gerado automaticamente quando exigirmos nosso primeiro pacote.

Agora é hora de procurar no Packagist.org por um pacote que pode nos ajudar a gerar slugs. Se você procurar pelo termo “slug” no Packagist, receberá um resultado parecido com este:

Resultados da Pesquisa do Packagist para o termo "slug"

Você verá dois números no lado direito de cada pacote na lista. O número no topo representa quantas vezes o pacote foi instalado através do Composer, e o número em baixo mostra quantas vezes um pacote foi estrelado no GitHub. De um modo geral, os pacotes com mais instalações e mais estrelas tendem a ser mais estáveis, pois mais pessoas os utilizam. Também é importante verificar a descrição do pacote para relevância para garantir que ele é o que você precisa.

Precisamos de um conversor string-to-slug A partir dos resultados da pesquisa, o pacote cocur/slugify, que aparece como o primeiro resultado naquela página, parece ser um bom candidato, com uma quantidade razoável de instalações e estrelas.

Os pacotes no Packagist têm um nome de vendor e um nome de package. Cada pacote tem um identificador único (um namespace) no mesmo formato que o GitHub utiliza para seus repositórios: vendor/package. A biblioteca que queremos instalar utiliza o namespace cocur/slugify. Você precisa de um namespace do pacote para exigi-lo em seu projeto.

Agora que você sabe exatamente qual pacote deseja instalar, você pode executar o composer require para incluí-lo como uma dependência e gerar também o arquivo composer.json para seu projeto. Uma coisa importante é observar a exigência de pacotes. O Composer rastreia as dependências no nível da aplicação e do sistema. As dependências no nível do sistema são importantes para indicar de quais módulos PHP um pacote depende. No caso do pacote cocur/slugify, ele exige um módulo PHP que ainda não instalamos.

Quando um pacote necessário depende de uma biblioteca de sistema que não está atualmente instalada em seu servidor, você receberá um erro informando qual requisito está faltando:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Your requirements could not be resolved to an installable set of packages.

  Problem 1
    - Installation request for cocur/slugify ^4.0 -> satisfiable by cocur/slugify[v4.0.0].
    - cocur/slugify v4.0.0 requires ext-mbstring * -> the requested PHP extension mbstring is missing from your system.
...
Para resolver o problema de dependência do sistema, podemos procurar pelo pacote que falta usando o apt search:

apt search mbstring
Output
Sorting... Done
Full Text Search... Done
php-mbstring/focal 2:7.4+75 all
  MBSTRING module for PHP [default]

php-patchwork-utf8/focal 1.3.1-1 all
  UTF-8 strings handling for PHP

php7.4-mbstring/focal 7.4.3-4ubuntu1 amd64
  MBSTRING module for PHP
Após localizar o nome do pacote correto, você pode utilizar o apt novamente para instalar a dependência de sistema:

sudo apt install php-mbstring
Assim que a instalação terminar, você pode executar novamente o comando composer require:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing cocur/slugify (v4.0.0): Downloading (100%)         
Writing lock file
Generating autoload files
Como você pode ver na saída, o Composer decidiu automaticamente qual versão do pacote utilizar. Se você verificar o diretório do seu projeto agora, ele irá conter dois arquivos novos: composer.json e composer.lock, e um diretório vendor:

ls -l
Output
total 12
-rw-rw-r-- 1 sammy sammy   59 May  4 13:56 composer.json
-rw-rw-r-- 1 sammy sammy 3229 May  4 13:56 composer.lock
drwxrwxr-x 4 sammy sammy 4096 May  4 13:56 vendor
O arquivo composer.lock é usado para armazenar informações sobre quais versões de cada pacote estão instaladas, e garantir que as mesmas versões sejam usadas se outra pessoa clonar seu projeto e instalar suas dependências. O diretório vendor é onde as dependências do projeto estão localizadas. Você não deve fazer commit da pasta vendor no controle de versão - você precisa apenas incluir os arquivos composer.json e composer.lock.

Ao instalar um projeto que já contém um arquivo composer.json, execute o composer install para baixar as dependências do projeto.

Vamos dar uma olhada rápida em restrições de versão. Se você verificar o conteúdo do seu arquivo composer.json, verá algo parecido com isto:

cat composer.json
Output
{
    "require": {
        "cocur/slugify": "^4.0"
    }
}
Note que há o caractere especial ^ antes do número da versão no composer.json. O Composer suporta várias restrições diferentes e formatos para definir a versão necessária do pacote, para fornecer flexibilidade enquanto também mantém seu projeto estável. O operador circunflexo (^) utilizado pelo arquivo composer.json criado automaticamente é o operador recomendado para a interoperabilidade máxima, seguindo o versionamento semântico. Neste caso, ele define 4.0 como a versão mínima compatível e permite atualizações para qualquer versão futura abaixo de 5.0.

De um modo geral, você não precisará alterar as restrições de versão em seu arquivo composer.json. No entanto, algumas situações podem exigir que você edite manualmente as restrições – por exemplo, quando uma nova versão principal da sua biblioteca requerida é liberada e você deseja atualizar, ou quando a biblioteca que você deseja usar não segue o versionamento semântico.

Aqui estão alguns exemplos para lhe dar um melhor entendimento sobre como as restrições de versão do Composer funcionam:

Restrição	Significado	Exemplo de Versões Permitidas
^1.0	>= 1.0 < 2.0	1.0, 1.2.3, 1.9.9
^1.1.0	>= 1.1.0 < 2.0	1.1.0, 1.5.6, 1.9.9
~1.0	>= 1.0 < 2.0.0	1.0, 1.4.1, 1.9.9
~1.0.0	>= 1.0.0 < 1.1	1.0.0, 1.0.4, 1.0.9
1.2.1	1.2.1	1.2.1
1.*	>= 1.0 < 2.0	1.0.0, 1.4.5, 1.9.9
1.2. *	>= 1.2 < 1.3	1.2.0, 1.2.3, 1.2.9
Para uma visualização mais detalhada das restrições de versão do Composer, consulte a documentação oficial.

A seguir, vamos ver como carregar dependências automaticamente com o Composer.

Passo 4 — Incluindo o Script Autoload
Como o PHP por si só não carrega classes automaticamente, o Composer fornece um script autoload que você pode incluir em seu projeto para obter o carregamento automático para ele. Este arquivo é gerado automaticamente pelo Composer quando você adiciona sua primeira dependência.

A única coisa que você precisa fazer é incluir o arquivo vendor/autoload.php em seus scripts PHP antes de qualquer instância de classe.

Vamos testar isso em nossa aplicação de demonstração. Abra um novo arquivo chamado test.php em seu editor de texto:

nano test.php
Adicione o código a seguir que vem no arquivo vendor/autoload.php, carrega a dependência cocur/slugify, e o utiliza para criar um slug:

test.php
<?php
require __DIR__ . '/vendor/autoload.php';

use Cocur\Slugify\Slugify;

$slugify = new Slugify();

echo $slugify->slugify('Hello World, this is a long sentence and I need to make a slug from it!');
Salve o arquivo e saia do seu editor.

Agora, execute o script.

php test.php
Isso produz a saída hello-world-this-is-a-long-sentence-and-i-need-to-make-a-slug-from-it.

As dependências precisam de atualizações quando novas versões são liberadas. Dessa forma, vamos ver como lidar com isso.

Passo 5 — Atualizando as Dependências do Projeto
Sempre que você quiser atualizar suas dependências do projeto para versões mais recentes, execute o comando update:

composer update
Isso irá verificar por versões mais recentes das bibliotecas que você requer em seu projeto. Se uma versão mais recente for encontrada e ela for compatível com a restrição de versão definida no arquivo composer.json, o Composer substituirá a versão anterior instalada. O arquivo composer.lock será atualizado para refletir essas alterações.

Você também pode atualizar uma ou mais bibliotecas específicas, especificando-as desta forma:

composer update vendor/package vendor2/package2
Certifique-se de verificar em seus arquivos composer.json e composer.lock dentro do seu sistema de controle de versão após atualizar suas dependências de modo que outros também possam instalar essas versões mais recentes.








INÍCIO:

1 instalar o docker

2 abrir wsl2/Windows ou linux
 curl -s "https://laravel.build/olw?with=mysql,redis,mailhog,minio" | bash

3 cd olw
./vendor/bin/sail up -d
	ou
4 cd olw && ./vendor/bin/sail up -d

5 ATRIBUINDO PERMISSÃO PARA A PASTA
cd .. -> sai da pasta
sudo chmod 777 olw/ -R ou sem o 'sudo' chmod 777 olw/ -R

6 CRIANDO ALIAS PARA O COMANDO ANTERIOR
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
passa a usar assim: sail ps

7 CONFIGURAR PORTAS PARA A APLICAÇÃO NO NAVEGADOR E MYSQL
.env
APP_PORT=8000

*porta do myql
FORWARD_DB_PORT=3307

8 INSTALANDO DEPENDÊNCIA AO PROJETO
./vendor/bin/sail composer require laravel/breeze --dev

9 DEIXAR TELA DE AUTENTICAÇÃO PRONTA, ROTA AUTENTICADA, TAWINDCSS INSTALADO E INERTIA INSTALADO
./vendor/bin/sail artisan breeze:install vue 
ou
./vendor/bin/sail art breeze:install vue


10 RODAR AS MIGRATES PADRÕES DO PROJETO AI JÁ PODE CADASTRAR USUÁRIOS PARA LOGIN:
./vendor/bin/sail art migrate

11 


/*******************************************/
2a AULA:

O PROJETO CONSISTE EM RECEBER DADOS DE UMA API (punkapi.com) DE INFORMAÇÕES SOBRE CERVEJAS, VAMOS CONSTRUIR AS ROTAS PARA CONSUMIR A API E CRIAR A ESTRUTURA PARA O RELATÓRIO QUE IREMOS GERAR EM EXCEL E ENVIAR PARA O STORAGE...
1 CRIAR ROTAS:
code .
olw/routes/web.php


sail up -d -> SOBE O CONTAINER localhost:8000 (nesse projeto)

Route::get('/beers', fn()=> 'Olw - testando a rota /beers');

**************************************************
obs:
- laravel.com/api -> acesso a documentação do código;
- in line paramets for vscode -> extensão para vscode para exibir o nome dos métodos na hora que codificar;
- fira code -> extensão para fonte no vscode

git Hub Copilot vs Tabnine -> (pesquisar sobre)
Link para extensões vscode:
https://github.com/icarojobs/vscode-useful-extensions
*************************************************


Route::get('/beers', fn()=> 'Olw - testando a rota /beers')
                             ->middleware(['auth']);

* FLUXO PADRÃO DO MVC-LARAVEL: 
life cicle: sai do usuário pelo navegador, insomnia ou postman -> passa pelo index.php(pasta public) -> passa pelos arquivos do bootstrap retornando uma instância da aplicação -> passa pelo kernel do http (carrega mais instâncias) -> Service provider -> despacha a requisição pro Router -> Cai no arquivo Web.php -> Middleware (se tiver, geralmente tem os globais) -> Controller (faz as regras de negócio e pode chamar outras classes como Serviços por exemplo)
-> Retorna uma view ou um json (No caso estamos usando inértia, ele não vai reinderizar a 'view.blade' padrão, ele vai reinderizar componente vue.js através do inértia.).


* EM VEZ DE USAR A FUNÇÃO AQUI NA ROTA CRIAMOS UM CONTROLLER:

obs.: ​dica: php artisan make:controller -r cria o Resource também.
dica: limpar o cache do container:
./vendor/bin/sail art config:cache
./vendor/bin/sail art optimize:clear


sail artisan make:controller BeerController
ou 
sail art make:controller BeerController -> CRIA O ARQUIVO BeerController.php na pasta app/Http/Controllers
->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index()
    {
    return 'Virgu & Beer & Code'
    }
}

* NO ARQUIVO DE ROTAS Web.php CHAMA O BeersController:

importante importar o Controller <nomeDoController>+<CTRL=ENTER:
use App\Http\Controllers\BeerController;

Route::get('/beers', [BeerController::class, 'index'])
                        ->middleware(['auth']);


* PRECISAMOS CRIAR UM MÉTODO PARA PEGAR A LISTA, LISTAR OS DADOS DA API (listar as bebidas de https://api.punkapi.com/v2 ->
VAMOS CRIAR UMA NOVA CLASSE de serviços em app/Sevices/PunkapiService.php

* O LARAVEL POSSUI UM RECURSO CHAMADO HTTPClient que abstrai o uso de uma ferramenta chama guzeo, esse guzeo é o client http mais comum para php, com ele fazemos requisições pra diversos serviços web dentro do php para outras url, ele é robusto, então o laravel simplifica importando o recurso que faz tudo por 'detrás dos panos':

PunkapiService.php

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::get('https://api.punkapi.com/v2/beers');
    }
}

E NO BeerController.php fica:
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index()
    {
    //return 'Virgu & Beer & Code';
    $service = new PunkapiService;

    return $service->getBeers();
    }
}

* TRATE É CARACTERÍSTICA QUE A CLASSE ADQUIRE (pode ter mesmos métodos e atributos substituindo o recurso de um classe extender várias classes que não tem no php, a trate é uma forma de fazer isso. O service  é uma outra camada na maioria das vezes abstrair seviços que vc vai consumir, por exemplo API.

Estando logado, os dados da api já serão exibidos em localhost:8000/beers, se usar um aplicativo cliente tipo insomnia pode apresentar os dados também, melhor comentar a linha de de autenticação da rota:
Route::get('/beers', [BeerController::class, 'index']);
linha de autenticação da rota // ->middleware(['auth']);

* ESSA API PERMITE FAZER FILTROS VIA PARÂMETROS NA PRÓPRIA ROTA. PRIMEIRO VAMOS REFATORAR O CÓDIO, A CLASSE PunkapiService.php:

USO DE CONFIG E MACRO


Vamos alterar a url, primeiro acessando a pasta config da raiz do projeto e criar o arquivo punkapi.php. O que acontece é que o config(pasta config da raiz) carrega todos os arquivos da pasta e permite que sejam acessados via funções simples(HELPERS), isso é muito legal porque podemos acessar esses arquivos de configurações de qualquer lugar do projeto: 

<?php

return [
    'url' => env('PUNK_BASE_URL', 'https://api.punkapi.com/v2')
];

Usando o helper env significa dizer que, se não houver a constante PUNK_BASE_URL setada no arquivo .env do projeto, seu valor será o segundo parâmetro: http://api.punkapi.com/v2 e no arquivo PunkapiService.php da pasta app/Services fica:

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::get('/beers');
    }
}

MACRO é uma forma de criar funções customizadas:
 em app\Providers vamos acessar o arquivo AppServiceProvider.php que é uma classe que tem dois métodos register e boot. No método boot vamos chamar o método Http do laravel e chamar o método macro, no primeiro parâmetro será um nome atribuído à função e e o segundo uma clausure (uma função).
Neste arquivo é passado o arquivo de configuração da url (em 'config/punkapi.php') além de tokens, headers,...
 

use Illuminate\Support\Facades\Http; -> deve ser importado
E a função boot fica:

  public function boot()
    {
        Http::macro('punkapi', function(){
            return Http::acceptJson()
            ->baseUrl(config('punkapi.url'));
        });
    }

Então criamos uma macro(uma função customizada) chamada punkapi que já retorna o client com accept/Json no Header e com o baseUrl configurado lá do arquivo /config/punkapi.php e se estiver setado no .env pegará de lá.

/app/Services/PunkapiService.php fica:

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::punkapi()->get('/beers');
    }
}

*obs.: a baseUrl poderia ser setada no construtor, que pode setar token também.(uma outra abordagem para versão sem macros);

->Testamos o retorno Json em localhost:8000/beers.

Refatorando o arquivo PunkapiService.php: O client Http não lança exceção e podemos forçar o retorno em modo Json:
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
       // return Http::punkapi()->get('/beers');
       return Http::punkapi()
            ->get('/beers')
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Podemos testar forçando um erro alterando a constante PUNKAPI_BASE_URL criada em /config/punkapi.php, vamos atribuir um valor diferente no arquivo .env:

PUNKAPI_BASE_URL="adfjklj878"

Podemos usar a função retry tem dois parâmetros, o número de tentativas pra buscar a requisição e o intervalo entre elas. Refatorando o código fica:
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
       // return Http::punkapi()->get('/beers');
       return Http::punkapi()
            ->get('/beers')
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

- Quando sai a exceção nao deveriamos retornar o erro em json por ser um api neste caso estamos usamos um app web e não uma api. E usaríamos o Route Api.

Refatorando o método boot de /app/Providers/AppServiceProvider.php, inserindo o retry():

     */
    public function boot()
    {
        Http::macro('punkapi', function(){
            return Http::acceptJson()
            ->baseUrl(config('punkapi.url'))
            ->retry(3,100);
        });
    }
}

comando de help

* ./vendor/bin/sail composer dump-autoload
* Verificar Nome do arquivo se bate com o nome das rotas(Classes criadas e importar o nome errado);
* inteliphense

Refatorando BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index()
    {

    $service = new PunkapiService();

    return $service->getBeers();
    }
}

Em vez de instanciar o método PunkapiService() dentro de index, vamos passar por parâmetro de index() declarando seu Próprio nome (PunkapiService) como tipo. Fica assim:

<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers();
    }
}

Assim usamos feactures do php(injeção de dependências) e ao mesmo tempo feactures do laravel. Em vez de criar uma instância dentro do método index, vamos injetar a classe como parâmetro para o método index(), ficando index($service) e a instância de dentro da função passa como parâmetro de 'tipo da variável'. Isso quebra a cadeia de dependência entre as classes.
Assim, o método index ganha independência não mais dependendo da instância de new PunkapiService e passamos a olhar a função index em si.
Assim, o Laravel tenta fazer um binding, um match, o laravel tenta encontrar alguma classe PunkapiService e cria uma instância dessa classe e usa ali como parâmetro. Se não fizer assim, lá em Rotas teria que ser passado como parâmetro o que fica desnecessário.
Não poderia ser feito se na classe PunkapiService existisse o construtor para atribuir valores automaticamente à classe. Assim podemos usar porque não precisamos passar nenhum valor.

ADICIONAR OS FILTROS:
Vamos filtrar o retorno api com os seguintes itens: beer_name, food, ibu_gt, malte:

var_dump($v)
die();
dd($variável)
benchmarck -> ?

/*****REFATORA PARA TESTE alterando BeerController.php e PunkapiService.php
BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(
        'heineken',
        'cheese',
        'corn',
        45
    );
    }
}

PunkapiService.php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers(
        string $beer_name,
        string $food,
        string $malt,
        string $ibu_gt
    )
    {
        $params = get_defined_vars();

        dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Resultado do debug no insomnia ou no navegador:
array:4 [▼ // app/Services/PunkapiService.php:18
  "beer_name" => "heineken"
  "food" => "cheese"
  "malt" => "corn"
  "ibu_gt" => "45"
]
//* fim teste

Refatorando:

class PunkapiService
{
    public function getBeers(
        string $beer_name = null,
        string $food = null,
        string $malt = null,
        string $ibu_gt = null
    )
    {
        $params = get_defined_vars();

        dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Assim quando não passar o valor para a chave ele exibirá a chave e o valor Null, vamos refatorar para não exibir nem a chave englobando get_defined_vers() com array_filter no arquivo PunkapiService.php:

$params = array_filter(get_defined_vars());

<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(
        'heineken',
        'cheese',
        'corn',
       // 45 -> Esse não é passado
    );
    }
}


array:3 [▼ // app/Services/PunkapiService.php:18
  "beer_name" => "heineken"
  "food" => "cheese"
  "malt" => "corn"
	Aqui não exibiu o valor 45
]


USANDO A FUNÇÃO NAMED_ARGS passamos só os parâmetros que precisamos retornar da api e o php com essa função saberá qual a posição dela no array de argumentos passados como parâmetro sem a necessidade de seguir a mesma sequência dos argumentos:
class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(food: 'cheese');
    }
}

REFATORANDO:
BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index( Request $request, PunkapiService $service)
    {
    return $service->getBeers(...$request->all());
    }
}

PunkapiService.php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers(
        string $beer_name = null,
        string $food = null,
        string $malt = null,
        string $ibu_gt = null
    )
    {
        $params = array_filter(get_defined_vars());

     //   dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

CRIANDO UMA REQUEST
sail artisan make:request BeerRequest
/app/Http/Requests/BeerRequest.php

* Funções anônimas, também conhecidas como closures , permitem a criação de funções que não tem o nome especificado. Elas são mais úteis como o valor de parâmetros callable, mas podem ter vários outros usos.. É uma função passada como parâmetro

CRIANDO NOVA ROTA PARA SALVAR COMO EXCEL
* https://docs.laravel-excel.com/3.1/getting-started/installation.html

Route::group([
    'prefix' => 'beers',
], function() {

    Route::get('/', [BeerController::class, 'index']); //-> Se houver necessidade de salvar dados por essa rota mudamos o método(verbo html) para post(os dados não serão expostos na url).
                          //  ->middleware(['auth']);
    Route::get('/export', [BeerController::class, 'export']);

});

Então passamos a ter duas rotas: localhost:8000/beers
localhost:8000/beers/export

No BeerController incluimos o método export():
class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
    // return $service->getBeers(...$request->all());
    return $service->getBeers(...$request->validated());
    }

    public function export()
    {
        return 'Relatório criado.';
    }
}



INSTALANDO PACOTE LARAVEL-EXCEL PARA GERAR OS RELATÓRIO EM EXCEL FILTRADOS DA API:

* https://docs.laravel-excel.com/3.1/getting-started/installation.html

COMANDO PARA INSTALAR VIA COMPOSER:
./vendor/bin/sail composer require psr/simple-cache:^2.0 maatwebsite/excel

CRIAR A CLASSE DO EXCEL
./vendor/bin/sail artisan make:export BeerExport  --> Cria o arquivo em  /app/Exports/BeerExport.php

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BeerExport implements FromCollection
{


    /**
    * @return \I¢lluminate\Support\Collection
    */
    public function collection()
    {
        //
    }
}

-> Dentro de colletion buscaremos as informações que serão salvas no arquivo do excel, um array de dados;

criamos um __construct() que vai ter uma propriedade privada do tipo array chamamos de $reportData.

O retorn será uma collection como informa o comentário:
 /**
    * @return \I¢lluminate\Support\Collection
    */

Na função colletion(), está recebendo um array return $this->reportData; 
Observe que não precisa mais declarar uma propriedade que vai se setada via construct(), basta defifinir o escopo junto do argumento e o php faz isso pra você. Como o retorno da função é um array usamos o helper collect para o $this->reportData:

BeerExport.php

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BeerExport implements FromCollection
{

    public function __construct(
        private array $reportData
    ){}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return collect($this->reportData);
    }
}
 

Consultamos a documentação do Laravel-excel em 'Exporting collections':
em Excel Store passa o nome da classe e o nome do arquivo:

BeerController.php
<?php

namespace App\Http\Controllers;


use App\Exports\BeerExport;
use App\Http\Requests\BeerRequest;
use App\Services\PunkapiService;
use Maatwebsite\Excel\Facades\Excel;


class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
    // return $service->getBeers(...$request->all());
    return $service->getBeers(...$request->validated());
    }

    public function export()
    {
      $params = [
        ['name' => 'Tom', 'age' => '30'],
        ['name' => 'Virgu', 'age' => '27']
       ];

       Excel::store(new BeerExport($params), 'olw-report.xlsx');
       return "Relatório criado";

    }


}

********************************************
* REFATORANDO E SALVANDO O ARQUIVO EXCEL EM /storage/app

BeerExport.php
<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BeerExport implements FromCollection
{

    public function __construct(
        private array $reportData
    ){}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return collect($this->reportData);
    }
}
*****************************

BeerController.php

<?php

namespace App\Http\Controllers;


use App\Exports\BeerExport;
use App\Http\Requests\BeerRequest;
use App\Services\PunkapiService;
use Maatwebsite\Excel\Facades\Excel;


class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
        return $service->getBeers(...$request->all());

    }

    public function export(BeerRequest $request, PunkapiService $service)
    {
        $beers = $service->getBeers(...$request->validated());

        $filteredBeers = collect($beers)->map(function($value, $key){
        return collect($value)
                ->only(['name', 'tagline', 'first_brewed', 'description'])
                ->toArray();
    })->toArray();

    //dd($filteredBeers);

      $params = [
        ['name' => 'Tom', 'age' => '30'],
        ['name' => 'Virgu', 'age' => '27']
       ];

       Excel::store(new BeerExport($filteredBeers), 'olw-report.xlsx');

           return "Relatório criado";

    }


}

PARA SALVAR O ARQUIVO EXCEL EM UM STORAGE S3:
ALTERA BeerController.php

<?php

namespace App\Http\Controllers;


use App\Exports\BeerExport;
use App\Http\Requests\BeerRequest;
use App\Services\PunkapiService;
use Maatwebsite\Excel\Facades\Excel;


class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
        return $service->getBeers(...$request->all());

    }

    public function export(BeerRequest $request, PunkapiService $service)
    {
        $beers = $service->getBeers(...$request->validated());

        $filteredBeers = collect($beers)->map(function($value, $key){
        return collect($value)
                ->only(['name', 'tagline', 'first_brewed', 'description'])
                ->toArray();
    })->toArray();


       Excel::store(
            new BeerExport($filteredBeers),
             'olw-report.xlsx',
             's3');

           return "Relatório criado";

    }


}

************
O REPOSITÓRIO DE ARQUIVOS minio:
NO DOCKER COMPOSER TEMOS O minio, um S3 que tem
MINIO_ROOT_USER: 'sail'
MINIO_ROOT_PASSWORD: 'password' e roda na porta 9000
localhost:9000
usuário: sail
senha: password

vamos criar um buncket(uma pasta)

e configurar o .env da raiz da aplicação:
originalmente é assim:
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

 e acrescentamos as informações para:


AWS_ACCESS_KEY_ID=sail
AWS_SECRET_ACCESS_KEY=password
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=local
AWS_ENDPOINT=http://minio:9000
AWS_URL=http://minio:9000/local
AWS_USE_PATH_STYLE_ENDPOINT=true

altera tambem:

FILESYSTEM_DISK=local 
para:
FILESYSTEM_DISK=s3

INSTALAR UMA DEPENDÊNCIA (ADAPTER) PARA FAZER CORRESPONDÊNCIA COM A AWS:

Flysystem 3.x em laravel.com/docs/9.x/upgrade
./vendor/bin/sail composer require -W league/flysystem-aws-s3-v3 "^3.0"

em caso de erro:
 artisan vendor:publish --tag=laravel-assets --ansi --force

.env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:UbVvTP6Cu+LF5GamJdB4dsZZvW05ep4bZqcCEhmiDCg=
APP_DEBUG=true
APP_URL=http://localhost
APP_PORT=8000

# PUNKAPI_BASE_URL="httpadfjkljdsdfdfasf878"

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
FORWARD_DB_PORT=3307
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=olw
DB_USERNAME=sail
DB_PASSWORD=password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=s3
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=memcached

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=sail
AWS_SECRET_ACCESS_KEY=password
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=local
AWS_ENDPOINT=http://minio:9000
AWS_URL=http://minio:9000/local
AWS_USE_PATH_STYLE_ENDPOINT=true

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

PRONTO. ENVIANDO PARA O MINIO.


### /**** ABAIXO AULA DE FRONT END -> FALTA
virgu 3a. aula seed model factory

olw# sail art make:migration create_history_table
/olw# sail art make:model Export -mr

/olw# sail art migrate:fresh --seed ->


























 







/***********************************************************
QUINTA FEIRA: 20/10/22

Open Laravel Week | Deploy com Terraform, EC2 e RDS | Fermentação

****
https://portal.aws.amazon.com/billing/signup?nc2=h_ct&src=header_signup&redirect_url=https%3A%2F%2Faws.amazon.com%2Fregistration-confirmation&language=pt_br#/start/email

Com terraform pode mudar de infra e configurar no git.

PROGRMAR A CONFIGURAÇÃO DO SERVIDOR: É basicamente construir uma nova aplicação para fazer isso, mais fácil de entender.
Terraform serve para (linguagem HCL -> linguagem própria - linguagem descritiva, descreve o resultado e não como irá ser feito), ou seja, descrever o que queremos.
Terraspace é o framework pra terraform.
Quando criamos o Terraform, ele pode variar conforme a infra cloud (aws, azure, google cloud). sua estrutura é a mesma para todos. mas cada provider tem a sua forma de usar, não consegue usar o mesmo código para mais de uma cloud.
Vamos rodar Terraform via container:

1. clonar do git: git clone 
Criar uma pasta para a infraestrutura

sail   (script que vamos usar)
#!/usr/bin/env bash

docker run -rm -it
	-u $(id -u):$(id -g) \
	-v $PWD:/workspace \
	-w /workspace
	hashicorp/terraform:light "%@"


	<no terminal

Logar em: aws.amazon.com
busca: iam
iam dashboard -> mysecurity credencials (root user) -> Acces keys ->clicar em create access keys -> salva o access key e secret access key
e coloca no arquivo credencials na maquina local.. .aws/credencials
















































//////////////////////////////////////////////////////////////////////////////////////////////////////
CONTEÚDO QUE FALTA ORGANIZAR:



/**************************************/

sail share

sail artisan sail:publish ->coloca em uma pasta na raiz chamada docker

sail --help

sail artisan optimizer:clear

sail ps

sail build --no-cache -> faz o bild da aplicação. (dá um sail down  por precaução antes.)










/*********************************

root@DELLAGS:~# curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash

Dockerfile

root@DELLAGS:~/example-app# docker exec -it example-app-mysql-1 bash


FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
RUN chmod -R 755 /usr/share/nginx/storage/*
RUN ln -s public html

.env (do composer)

DB_CONNECTION=mysql
DB_HOST=mysql-app (serviço do mysql no docker-compose.yaml)
DB_PORT=3306
DB_DATABASE=laraveldockerdb
DB_USERNAME=root
DB_PASSWORD=123456



docker-compose.yaml

version: '3'

services:
  laraveldocker-app:
    build: .
    ports:
      - "3003:80"
    volumes:
      - ./:/usr/share/nginx
      - .docker/nginx:/etc/nginx/conf.d/
    networks:
      - app-network
  mysql-app:
    image: mysql:5.7.22
    ports:
      - "3306:3306"
    volumes:
      - .docker/dbdata:/var/lib/mysql
    environment:
      MYSQL_DATABASE: laraveldocker
      MYSQL_ROOT_PASSWORD: 123456
    networks:
      - app-network
networks:
  app-network:
    driver: bridge
    



/*************************************************
#criando um serviço com um nome qualquer
version: '3'

services:
  laravel-app:                    #criando um serviço com um nome qualquer
    build: . ou image: wyveo/nginx-php-fpm:latest -> neste caso sem Dockerfile.                    # endereço da imagem ou local do Dockerfile (neste caso o ponto siginifica a raiz do projeto)
    ports:
      - "8080:80"                 # 8080 porta do meu host: 80 é a porta do docker nginx
    volumes:                      # docker-compose up -d -> sobe a imagem e libera o terminal  
      - ./:/usr/share/nginx       # TUDO QUE ESTIVE NA RAIZ (na rais tem o meu projeto laravel) './' IRÁ SER REFLETIDO NA PASTA /usr/share/nginx (pasta de acesso da página html)
                                  # C:\Laravel-docker\laravel-docker>docker compose up -d --build atualiza a minha imagem

  mysql-app:
      image: mysql:5.7
      ports:
        - "3306:3306"
      volumes:
        - .docker/dbdata:/var/lib/mysql          # qualqer nome (para persistir -guardar os dados do banco de dados)


      environment:
        MYSQL_DATABASE: laravel
        MYSQL_ROOT_PASSWORD: laravel
    
      

      /***************************///


  
C:\Laravel-docker\laravel-docker>docker compose up -d --build

                                
                               

    

/******************************** Dockerfile
FROM wyveo/nginx-php-fpm:latest

/***************************///
  COMANDOS

docker compose down -> para todos os containers
C:\Laravel-docker\laravel-docker>docker exec -it laravel-docker-laravel-app-1 bash 
root@612ea0ea3340:/# cd /usr/share/nginx/
root@612ea0ea3340:/usr/share/nginx# php artisan migrate
root@612ea0ea3340:/usr/share/nginx# php artisan serve

		
/***********/
PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d mysql:5.7

docker inspect meu-mysql ou | grep IPAddress

PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d -p 3306:3306 mysql:5.7

docker ps
docker ps -l
docker ps -a
docker rm -f nome


/*** LARAVEL */
### CRIANDO UM PROJETO NO LARAVEL 
laravel new projeto_laravel_via_installer (ESTA É UM AOPÇÃO)
composer create-project --prefer-dist laravel/laravel app_controle_tarefas "8.5.9"
cd app_controle_tarefas
cd public
php -S localhost:8000

ou 
da raiz do projeto:
php artisan serve 
ou
php artisan serve --port=3000

### PARA ABRIR PORTA EM OUTRO SERVIDOR
php artisan serve --host test.com --port 8080

 **********************************************************************
cd app_controle_tarefas
cd public
php artisan serve
- acessa o navegador http://localhost:8000

### DENTRO DO PROJETO CRIADO INSTALAR O LARAVEL/UI:^3.2 - versão 3.2
composer require laravel/ui:^3.2

### SE OCORRER ERRO AUMENTAR A MEMÓRIA DISPONIVEL PARA O php

-php --ini -> localiza o arquivo de configuração do php
LOCALIZA memory_limit = 1000 e altera para 
         memory_limit  = -1 e Salva

### LISTA A RELAÇÃO DE COMANDOS 
php artisan list 

DEVERA SURGIR AS OPÇÕES ABAIXO:

 ui
  ui:auth               Scaffold basic login and registration views and routes
  ui:controllers        Scaffold the authentication controllers
 vendor

### ENTENDENDO O PACOTE UI E INICIANDO A AUTENTICAÇÃO WEB NATIVA DO LARAVEL

COMANDO PARA LISTAR ROUTES: 
php artisan route:list

### php artisan ui bootstrap --auth (bootstrap ou react ou vue)
aplicando o bootstrap incluindo os recursos de autenticação;
poderia ser aplicado o bootstrap sem os recursos de autenticação;

### php artisan route:list -> mostra as rotas - ver que aumentaram as rotas

### APÓS ESSE PROCESSO O SISTEMA PEDE PARA RODAR
npm install -> instala as dependências do package.json (inclusive o bootstrap)
npm run dev -> gera os assets da aplicação de acordo com a tecnologia selecionada (bootstrap, react ou vue) -> Geralmente roda mais de uma vez para compilar tudo.

### CRIA O BANCO DE DADOS NORMALMENTE

### EXECUTA AS MIGRATIONS PADRÕES CRIADAS PARA O SISTEMA DE login
php artisan migrate -> CRIA AS TABELAS NO BANCO DE DADOS


************************************** 
INSTALANDO O COMPOSER NO UBUNTU
**************************************
sudo apt update
sudo apt install php-cli unzip

cd ~

curl -sS https://getcomposer.org/installer -o composer-setup.php

HASH=`curl -sS https://composer.github.io/installer.sig`

echo $HASH ->saída: Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74



php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer





***********************

DigitalOcean Kubernetes: novo plano de controle é mais rápido e gratuito, habilita HA para SLA de 99,95% de tempo de atividade
Produtos
Preços

Documentos
divisa suspensa

Entrar
divisa suspensa

// Tutorial //
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Publicado em 21 de maio de 2020
Ubuntu
PHP
Ubuntu 20.04
Avatar padrão
Por Erika Heidi
Advogado Desenvolvedor
Português
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Introdução
O Composer é uma ferramenta popular de gerenciamento de dependências para o PHP, criado para facilitar a instalação e a atualização das dependências principalmente do projeto. Ele controla quais outros pacotes de projeto específico dependem e são instalados para você, usando as opções apropriadas de acordo com os requisitos do projeto. O Composer também é comumente utilizado para inicializar novos projetos em frameworks PHP populares, como o Symfon e o Laravel .

Neste tutorial, você instalará e começará a usar o Composer em um sistema Ubuntu 20.04.

Pré-requisitos
Para seguir este guia, você pode acessar um servidor como usuário Ubuntu20.04 como usuário sudonão-root um firewall habilitado em seu servidor Para configurar isto, siga nosso guia Configuração do servidor inicial para o Ubuntu 20.04

Passo 1 — Instalando o PHP e as Dependências Adicionais
Além das dependências que já devem estar incluídas em seu sistema Ubuntu 20.04, como o , o Composer exige ou gitexecuta scripts PHP na linha de comando e para extrair arquivos zipados. Vamos instalar essas dependências agora.curlphp-cliunzip

primeiro, atual, gerenciador de pacotes de soluções: o cache do gerenciador de pacotes

sudo apt update
Em seguida, o seguinte comando para instalar os pacotes, execute:

sudo apt install php-cli unzip
Você será solicitado a confirmar a instalação digitando Ye, depois, ENTER.

Assim que os pré-requisitos para instalação do Composer forem instalados, você poderá seguir.

Passo 2 — Baixando e Instalando o Compositor
O Composer fornece um instalador de script escrito em PHP. Vamos baixá-lo, verificar se ele não está danificado e, em seguida, o usaremos para instalar o Composer.

Certifique-se de estar em sua pasta home. Em seguida, baixe o instalador usando o curl:

cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
Em seguida, vamos verificar se o instalador baixado corresponde ao hash SHA-384 para o instalador mais recente encontrado na página Composer Public Keys / Signatures . Para facilitar o passo de seleção, você pode usar o seguinte comando para obter programaticamente o hash mais recente da página do Composer e armazená-lo em uma variável do shell:

HASH=`curl -sS https://composer.github.io/installer.sig`
Se você quiser verificar o valor realizado, execute:

echo $HASH
Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a
Agora o código PHP a seguir, execute conforme a página de download do Composer, para verificar se o script de instalação está seguro para ser executado:

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
Você verá o seguinte resultado:

Resultado
Installer verified
Se Installer corruptvocê estiver usando o hash correto, verifique se você está usando o hash correto. Em seguida, repita o processo de verificação. Quando você tiver um instalador selecionado, você pode continuar.

Para instalar o composerglobalmente, use o seguinte comando que baixará e instalará o Composer como um comando disponível em todo o sistema chamado composer, sob /usr/local/bin:

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
Você verá um resultado semelhante com este:

Output
All settings correct for using Composer
Downloading...

Composer (version 1.10.5) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer
Para testar sua instalação, execute:

composer
Output
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.10.5 2020-04-10 11:44:22

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
...
Isso verifica que o Composer foi instalado com sucesso em seu sistema e está disponível em todo o sistema.

Nota: se você preferirá ter-lhe-ão separados separados do Composer para projeto hospedado neste servidor, você pode instalar localmente, em uma base por projeto. Este método também é útil quando o usuário do sistema não possui permissão para instalar o software disponível em todo o sistema.

Para fazer isso, use o comando php composer-setup.php. Isso irá gerar um arquivo composer.pharem seu diretório atual, que pode ser executado com o seu atual php composer.phar.

Agora podemos dar uma dependência em como usar o Compose como gerenciar.

Passo 3 — Usando o Compositor em um Projeto PHP
Os projetos PHP geralmente dependentes de bibliotecas externas, e o gerenciamento de dependências e suas versões podem ser complicados. O Composer resolve esse problema de manter um controle de projeto de extensões e dependências, também facilita o processo de descoberta, instalação e atualização de pacotes que são definidos por enquanto.

Para usar o seu projeto, você pode compor um arquivo composer.json. O arquivo composer.jsonComposer quais dependências precisa para baixar seu projeto quais serão as versões de cada pacote tem permissão para instalações e instalações. Isso é muito importante para manter seu projeto consistente e evitar a instalação de versões instáveis ​​que podem causar problemas de compatibilidade retroativa.

Você não precisa criar este arquivo manualmente - é comum ocorrer erros de sintaxe quando fizer isso. O Composer oferece uma maneira de criar um novo arquivo composer.jsoncom base na entrada do usuário, o que é uma boa escolha se você planeja compartilhar seu projeto mais tarde como um pacote público no Packagist . O Composer gera automaticamente um arquivo básico composer.jsonquando você executa um comando composer requirepara incluir uma dependência em um projeto recém-criado.

O processo de uso do Composer para instalar um pacote como uma dependência em um projeto envolve os passos a seguir:

Identifique o tipo de biblioteca que o aplicativo precisa.
uma biblioteca de código aberto adequada no agist.org , o responsável oficial de pacotes para o Compose.
Escolha o pacote de dependência.
Execute composer requirepara incluir a dependência no arquivo composer.jsone instalar o pacote.
Vamos testar isso com uma aplicação de demonstração.

O objetivo desta aplicação é transformar uma determinação determinada em uma string de URL amigável - um slug . Isso é comumente usado para converter os títulos de página para caminhos de URL (Assim como a parte final da URL para este tutorial).

Vamos começar a criar um diretório para o nosso projeto. Vamos chamá-lo de slugify :

cd ~
mkdir slugify
cd slugify
Embora não seja necessário, você pode executar agora um comando composer init para criar um arquivo composer.json detalhado para seu projeto. Como o único objetivo do nosso projeto é demonstrar como instalar dependências com o Composer, usaremos um arquivo composer.json mais simples que será gerado automaticamente quando exigirmos nosso primeiro pacote.

Agora é hora de procurar no Packagist.org por um pacote que pode nos ajudar a gerar slugs. Se você procurar pelo termo “slug” no Packagist, receberá um resultado parecido com este:

Resultados da Pesquisa do Packagist para o termo "slug"

Você verá dois números no lado direito de cada pacote na lista. O número no topo representa quantas vezes o pacote foi instalado através do Composer, e o número em baixo mostra quantas vezes um pacote foi estrelado no GitHub. De um modo geral, os pacotes com mais instalações e mais estrelas tendem a ser mais estáveis, pois mais pessoas os utilizam. Também é importante verificar a descrição do pacote para relevância para garantir que ele é o que você precisa.

Precisamos de um conversor string-to-slug A partir dos resultados da pesquisa, o pacote cocur/slugify, que aparece como o primeiro resultado naquela página, parece ser um bom candidato, com uma quantidade razoável de instalações e estrelas.

Os pacotes no Packagist têm um nome de vendor e um nome de package. Cada pacote tem um identificador único (um namespace) no mesmo formato que o GitHub utiliza para seus repositórios: vendor/package. A biblioteca que queremos instalar utiliza o namespace cocur/slugify. Você precisa de um namespace do pacote para exigi-lo em seu projeto.

Agora que você sabe exatamente qual pacote deseja instalar, você pode executar o composer require para incluí-lo como uma dependência e gerar também o arquivo composer.json para seu projeto. Uma coisa importante é observar a exigência de pacotes. O Composer rastreia as dependências no nível da aplicação e do sistema. As dependências no nível do sistema são importantes para indicar de quais módulos PHP um pacote depende. No caso do pacote cocur/slugify, ele exige um módulo PHP que ainda não instalamos.

Quando um pacote necessário depende de uma biblioteca de sistema que não está atualmente instalada em seu servidor, você receberá um erro informando qual requisito está faltando:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Your requirements could not be resolved to an installable set of packages.

  Problem 1
    - Installation request for cocur/slugify ^4.0 -> satisfiable by cocur/slugify[v4.0.0].
    - cocur/slugify v4.0.0 requires ext-mbstring * -> the requested PHP extension mbstring is missing from your system.
...
Para resolver o problema de dependência do sistema, podemos procurar pelo pacote que falta usando o apt search:

apt search mbstring
Output
Sorting... Done
Full Text Search... Done
php-mbstring/focal 2:7.4+75 all
  MBSTRING module for PHP [default]

php-patchwork-utf8/focal 1.3.1-1 all
  UTF-8 strings handling for PHP

php7.4-mbstring/focal 7.4.3-4ubuntu1 amd64
  MBSTRING module for PHP
Após localizar o nome do pacote correto, você pode utilizar o apt novamente para instalar a dependência de sistema:

sudo apt install php-mbstring
Assim que a instalação terminar, você pode executar novamente o comando composer require:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing cocur/slugify (v4.0.0): Downloading (100%)         
Writing lock file
Generating autoload files
Como você pode ver na saída, o Composer decidiu automaticamente qual versão do pacote utilizar. Se você verificar o diretório do seu projeto agora, ele irá conter dois arquivos novos: composer.json e composer.lock, e um diretório vendor:

ls -l
Output
total 12
-rw-rw-r-- 1 sammy sammy   59 May  4 13:56 composer.json
-rw-rw-r-- 1 sammy sammy 3229 May  4 13:56 composer.lock
drwxrwxr-x 4 sammy sammy 4096 May  4 13:56 vendor
O arquivo composer.lock é usado para armazenar informações sobre quais versões de cada pacote estão instaladas, e garantir que as mesmas versões sejam usadas se outra pessoa clonar seu projeto e instalar suas dependências. O diretório vendor é onde as dependências do projeto estão localizadas. Você não deve fazer commit da pasta vendor no controle de versão - você precisa apenas incluir os arquivos composer.json e composer.lock.

Ao instalar um projeto que já contém um arquivo composer.json, execute o composer install para baixar as dependências do projeto.

Vamos dar uma olhada rápida em restrições de versão. Se você verificar o conteúdo do seu arquivo composer.json, verá algo parecido com isto:

cat composer.json
Output
{
    "require": {
        "cocur/slugify": "^4.0"
    }
}
Note que há o caractere especial ^ antes do número da versão no composer.json. O Composer suporta várias restrições diferentes e formatos para definir a versão necessária do pacote, para fornecer flexibilidade enquanto também mantém seu projeto estável. O operador circunflexo (^) utilizado pelo arquivo composer.json criado automaticamente é o operador recomendado para a interoperabilidade máxima, seguindo o versionamento semântico. Neste caso, ele define 4.0 como a versão mínima compatível e permite atualizações para qualquer versão futura abaixo de 5.0.

De um modo geral, você não precisará alterar as restrições de versão em seu arquivo composer.json. No entanto, algumas situações podem exigir que você edite manualmente as restrições – por exemplo, quando uma nova versão principal da sua biblioteca requerida é liberada e você deseja atualizar, ou quando a biblioteca que você deseja usar não segue o versionamento semântico.

Aqui estão alguns exemplos para lhe dar um melhor entendimento sobre como as restrições de versão do Composer funcionam:

Restrição	Significado	Exemplo de Versões Permitidas
^1.0	>= 1.0 < 2.0	1.0, 1.2.3, 1.9.9
^1.1.0	>= 1.1.0 < 2.0	1.1.0, 1.5.6, 1.9.9
~1.0	>= 1.0 < 2.0.0	1.0, 1.4.1, 1.9.9
~1.0.0	>= 1.0.0 < 1.1	1.0.0, 1.0.4, 1.0.9
1.2.1	1.2.1	1.2.1
1.*	>= 1.0 < 2.0	1.0.0, 1.4.5, 1.9.9
1.2. *	>= 1.2 < 1.3	1.2.0, 1.2.3, 1.2.9
Para uma visualização mais detalhada das restrições de versão do Composer, consulte a documentação oficial.

A seguir, vamos ver como carregar dependências automaticamente com o Composer.

Passo 4 — Incluindo o Script Autoload
Como o PHP por si só não carrega classes automaticamente, o Composer fornece um script autoload que você pode incluir em seu projeto para obter o carregamento automático para ele. Este arquivo é gerado automaticamente pelo Composer quando você adiciona sua primeira dependência.

A única coisa que você precisa fazer é incluir o arquivo vendor/autoload.php em seus scripts PHP antes de qualquer instância de classe.

Vamos testar isso em nossa aplicação de demonstração. Abra um novo arquivo chamado test.php em seu editor de texto:

nano test.php
Adicione o código a seguir que vem no arquivo vendor/autoload.php, carrega a dependência cocur/slugify, e o utiliza para criar um slug:

test.php
<?php
require __DIR__ . '/vendor/autoload.php';

use Cocur\Slugify\Slugify;

$slugify = new Slugify();

echo $slugify->slugify('Hello World, this is a long sentence and I need to make a slug from it!');
Salve o arquivo e saia do seu editor.

Agora, execute o script.

php test.php
Isso produz a saída hello-world-this-is-a-long-sentence-and-i-need-to-make-a-slug-from-it.

As dependências precisam de atualizações quando novas versões são liberadas. Dessa forma, vamos ver como lidar com isso.

Passo 5 — Atualizando as Dependências do Projeto
Sempre que você quiser atualizar suas dependências do projeto para versões mais recentes, execute o comando update:

composer update
Isso irá verificar por versões mais recentes das bibliotecas que você requer em seu projeto. Se uma versão mais recente for encontrada e ela for compatível com a restrição de versão definida no arquivo composer.json, o Composer substituirá a versão anterior instalada. O arquivo composer.lock será atualizado para refletir essas alterações.

Você também pode atualizar uma ou mais bibliotecas específicas, especificando-as desta forma:

composer update vendor/package vendor2/package2
Certifique-se de verificar em seus arquivos composer.json e composer.lock dentro do seu sistema de controle de versão após atualizar suas dependências de modo que outros também possam instalar essas versões mais recentes.

Conclusão





***********
Algoritmo "CalculoMedia2"
// Disciplina: Lógica de programação
// Professor : Antonio Carlos Nicolodi
// Descrição : calculo da média aritimética
// Autor     : Professor Antonio
// Data atual: 01/04/2015
var
// Seção de Declarações
   v1, v2, total: Real
   sinal : Caracter
Inicio
// Seção dos Comandos
   Escreva ("Digite o primeiro valor: ")
   Leia (v1)
   Escreva ("Digite a operação + - * / : ")
   Leia (sinal)
   Escreva ("Digite o segundo valor: ")
   Leia (v2)

   Se sinal = "+" entao
   total <- v1 + v2
   Escreva("O Resultado é: ", total)
   Senao
   Se sinal = "-" entao
   total <- v1 - v2
   Escreva("O Resultado é: ", total)
   Senao
   Se sinal = "*" entao
   total <- v1 * v2
   Escreva("O Resultado é: ", total)


   Senao
     Escreva("OPERAÇÃO INVÁLIDA! ")



      Escreval("total")
   fimse
Fimalgoritmo

****
COMANDOS DOCKER
root@DELLAGS:~# curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash

root@DELLAGS:~/example-app# ./vendor/bin/sail  artisan migrate --seed -> criar o banco de dados e copular dados;

Dockerfile

root@DELLAGS:~/example-app# docker exec -it example-app-mysql-1 bash


FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
RUN chmod -R 755 /usr/share/nginx/storage/*
RUN ln -s public html

.env (do composer)

DB_CONNECTION=mysql
DB_HOST=mysql-app (serviço do mysql no docker-compose.yaml)
DB_PORT=3306
DB_DATABASE=laraveldockerdb
DB_USERNAME=root
DB_PASSWORD=123456



docker-compose.yaml

version: '3'

services:
  laraveldocker-app:
    build: .
    ports:
      - "3003:80"
    volumes:
      - ./:/usr/share/nginx
      - .docker/nginx:/etc/nginx/conf.d/
    networks:
      - app-network
  mysql-app:
    image: mysql:5.7.22
    ports:
      - "3306:3306"
    volumes:
      - .docker/dbdata:/var/lib/mysql
    environment:
      MYSQL_DATABASE: laraveldocker
      MYSQL_ROOT_PASSWORD: 123456
    networks:
      - app-network
networks:
  app-network:
    driver: bridge
    



/*************************************************
#criando um serviço com um nome qualquer
version: '3'

services:
  laravel-app:                    #criando um serviço com um nome qualquer
    build: . ou image: wyveo/nginx-php-fpm:latest -> neste caso sem Dockerfile.                    # endereço da imagem ou local do Dockerfile (neste caso o ponto siginifica a raiz do projeto)
    ports:
      - "8080:80"                 # 8080 porta do meu host: 80 é a porta do docker nginx
    volumes:                      # docker-compose up -d -> sobe a imagem e libera o terminal  
      - ./:/usr/share/nginx       # TUDO QUE ESTIVE NA RAIZ (na rais tem o meu projeto laravel) './' IRÁ SER REFLETIDO NA PASTA /usr/share/nginx (pasta de acesso da página html)
                                  # C:\Laravel-docker\laravel-docker>docker compose up -d --build atualiza a minha imagem

  mysql-app:
      image: mysql:5.7
      ports:
        - "3306:3306"
      volumes:
        - .docker/dbdata:/var/lib/mysql          # qualqer nome (para persistir -guardar os dados do banco de dados)


      environment:
        MYSQL_DATABASE: laravel
        MYSQL_ROOT_PASSWORD: laravel
    
      

      /***************************///


  
C:\Laravel-docker\laravel-docker>docker compose up -d --build

                                
                               

    

/******************************** Dockerfile
FROM wyveo/nginx-php-fpm:latest

/***************************///
  COMANDOS

docker compose down -> para todos os containers
C:\Laravel-docker\laravel-docker>docker exec -it laravel-docker-laravel-app-1 bash 
root@612ea0ea3340:/# cd /usr/share/nginx/
root@612ea0ea3340:/usr/share/nginx# php artisan migrate
root@612ea0ea3340:/usr/share/nginx# php artisan serve

		
/***********/
PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d mysql:5.7

docker inspect meu-mysql ou | grep IPAddress

PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d -p 3306:3306 mysql:5.7

docker ps
docker ps -l
docker ps -a
docker rm -f nome


/*** LARAVEL */
### CRIANDO UM PROJETO NO LARAVEL 
laravel new projeto_laravel_via_installer (ESTA É UM AOPÇÃO)
composer create-project --prefer-dist laravel/laravel app_controle_tarefas "8.5.9"
cd app_controle_tarefas
cd public
php -S localhost:8000

ou 
da raiz do projeto:
php artisan serve 
ou
php artisan serve --port=3000

### PARA ABRIR PORTA EM OUTRO SERVIDOR
php artisan serve --host test.com --port 8080

 **********************************************************************
cd app_controle_tarefas
cd public
php artisan serve
- acessa o navegador http://localhost:8000

### DENTRO DO PROJETO CRIADO INSTALAR O LARAVEL/UI:^3.2 - versão 3.2
composer require laravel/ui:^3.2

### SE OCORRER ERRO AUMENTAR A MEMÓRIA DISPONIVEL PARA O php

-php --ini -> localiza o arquivo de configuração do php
LOCALIZA memory_limit = 1000 e altera para 
         memory_limit  = -1 e Salva

### LISTA A RELAÇÃO DE COMANDOS 
php artisan list 

DEVERA SURGIR AS OPÇÕES ABAIXO:

 ui
  ui:auth               Scaffold basic login and registration views and routes
  ui:controllers        Scaffold the authentication controllers
 vendor

### ENTENDENDO O PACOTE UI E INICIANDO A AUTENTICAÇÃO WEB NATIVA DO LARAVEL

COMANDO PARA LISTAR ROUTES: 
php artisan route:list

### php artisan ui bootstrap --auth (bootstrap ou react ou vue)
aplicando o bootstrap incluindo os recursos de autenticação;
poderia ser aplicado o bootstrap sem os recursos de autenticação;

### php artisan route:list -> mostra as rotas - ver que aumentaram as rotas

### APÓS ESSE PROCESSO O SISTEMA PEDE PARA RODAR
npm install -> instala as dependências do package.json (inclusive o bootstrap)
npm run dev -> gera os assets da aplicação de acordo com a tecnologia selecionada (bootstrap, react ou vue) -> Geralmente roda mais de uma vez para compilar tudo.

### CRIA O BANCO DE DADOS NORMALMENTE

### EXECUTA AS MIGRATIONS PADRÕES CRIADAS PARA O SISTEMA DE login
php artisan migrate -> CRIA AS TABELAS NO BANCO DE DADOS


************************************** 
INSTALANDO O COMPOSER NO UBUNTU
**************************************
sudo apt update
sudo apt install php-cli unzip

cd ~

curl -sS https://getcomposer.org/installer -o composer-setup.php

HASH=`curl -sS https://composer.github.io/installer.sig`

echo $HASH ->saída: Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74



php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer





***********************

DigitalOcean Kubernetes: novo plano de controle é mais rápido e gratuito, habilita HA para SLA de 99,95% de tempo de atividade
Produtos
Preços

Documentos
divisa suspensa

Entrar
divisa suspensa

// Tutorial //
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Publicado em 21 de maio de 2020
Ubuntu
PHP
Ubuntu 20.04
Avatar padrão
Por Erika Heidi
Advogado Desenvolvedor
Português
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Introdução
O Composer é uma ferramenta popular de gerenciamento de dependências para o PHP, criado para facilitar a instalação e a atualização das dependências principalmente do projeto. Ele controla quais outros pacotes de projeto específico dependem e são instalados para você, usando as opções apropriadas de acordo com os requisitos do projeto. O Composer também é comumente utilizado para inicializar novos projetos em frameworks PHP populares, como o Symfon e o Laravel .

Neste tutorial, você instalará e começará a usar o Composer em um sistema Ubuntu 20.04.

Pré-requisitos
Para seguir este guia, você pode acessar um servidor como usuário Ubuntu20.04 como usuário sudonão-root um firewall habilitado em seu servidor Para configurar isto, siga nosso guia Configuração do servidor inicial para o Ubuntu 20.04

Passo 1 — Instalando o PHP e as Dependências Adicionais
Além das dependências que já devem estar incluídas em seu sistema Ubuntu 20.04, como o , o Composer exige ou gitexecuta scripts PHP na linha de comando e para extrair arquivos zipados. Vamos instalar essas dependências agora.curlphp-cliunzip

primeiro, atual, gerenciador de pacotes de soluções: o cache do gerenciador de pacotes

sudo apt update
Em seguida, o seguinte comando para instalar os pacotes, execute:

sudo apt install php-cli unzip
Você será solicitado a confirmar a instalação digitando Ye, depois, ENTER.

Assim que os pré-requisitos para instalação do Composer forem instalados, você poderá seguir.

Passo 2 — Baixando e Instalando o Compositor
O Composer fornece um instalador de script escrito em PHP. Vamos baixá-lo, verificar se ele não está danificado e, em seguida, o usaremos para instalar o Composer.

Certifique-se de estar em sua pasta home. Em seguida, baixe o instalador usando o curl:

cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
Em seguida, vamos verificar se o instalador baixado corresponde ao hash SHA-384 para o instalador mais recente encontrado na página Composer Public Keys / Signatures . Para facilitar o passo de seleção, você pode usar o seguinte comando para obter programaticamente o hash mais recente da página do Composer e armazená-lo em uma variável do shell:

HASH=`curl -sS https://composer.github.io/installer.sig`
Se você quiser verificar o valor realizado, execute:

echo $HASH
Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a
Agora o código PHP a seguir, execute conforme a página de download do Composer, para verificar se o script de instalação está seguro para ser executado:

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
Você verá o seguinte resultado:

Resultado
Installer verified
Se Installer corruptvocê estiver usando o hash correto, verifique se você está usando o hash correto. Em seguida, repita o processo de verificação. Quando você tiver um instalador selecionado, você pode continuar.

Para instalar o composerglobalmente, use o seguinte comando que baixará e instalará o Composer como um comando disponível em todo o sistema chamado composer, sob /usr/local/bin:

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
Você verá um resultado semelhante com este:

Output
All settings correct for using Composer
Downloading...

Composer (version 1.10.5) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer
Para testar sua instalação, execute:

composer
Output
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.10.5 2020-04-10 11:44:22

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
...
Isso verifica que o Composer foi instalado com sucesso em seu sistema e está disponível em todo o sistema.

Nota: se você preferirá ter-lhe-ão separados separados do Composer para projeto hospedado neste servidor, você pode instalar localmente, em uma base por projeto. Este método também é útil quando o usuário do sistema não possui permissão para instalar o software disponível em todo o sistema.

Para fazer isso, use o comando php composer-setup.php. Isso irá gerar um arquivo composer.pharem seu diretório atual, que pode ser executado com o seu atual php composer.phar.

Agora podemos dar uma dependência em como usar o Compose como gerenciar.

Passo 3 — Usando o Compositor em um Projeto PHP
Os projetos PHP geralmente dependentes de bibliotecas externas, e o gerenciamento de dependências e suas versões podem ser complicados. O Composer resolve esse problema de manter um controle de projeto de extensões e dependências, também facilita o processo de descoberta, instalação e atualização de pacotes que são definidos por enquanto.

Para usar o seu projeto, você pode compor um arquivo composer.json. O arquivo composer.jsonComposer quais dependências precisa para baixar seu projeto quais serão as versões de cada pacote tem permissão para instalações e instalações. Isso é muito importante para manter seu projeto consistente e evitar a instalação de versões instáveis ​​que podem causar problemas de compatibilidade retroativa.

Você não precisa criar este arquivo manualmente - é comum ocorrer erros de sintaxe quando fizer isso. O Composer oferece uma maneira de criar um novo arquivo composer.jsoncom base na entrada do usuário, o que é uma boa escolha se você planeja compartilhar seu projeto mais tarde como um pacote público no Packagist . O Composer gera automaticamente um arquivo básico composer.jsonquando você executa um comando composer requirepara incluir uma dependência em um projeto recém-criado.

O processo de uso do Composer para instalar um pacote como uma dependência em um projeto envolve os passos a seguir:

Identifique o tipo de biblioteca que o aplicativo precisa.
uma biblioteca de código aberto adequada no agist.org , o responsável oficial de pacotes para o Compose.
Escolha o pacote de dependência.
Execute composer requirepara incluir a dependência no arquivo composer.jsone instalar o pacote.
Vamos testar isso com uma aplicação de demonstração.

O objetivo desta aplicação é transformar uma determinação determinada em uma string de URL amigável - um slug . Isso é comumente usado para converter os títulos de página para caminhos de URL (Assim como a parte final da URL para este tutorial).

Vamos começar a criar um diretório para o nosso projeto. Vamos chamá-lo de slugify :

cd ~
mkdir slugify
cd slugify
Embora não seja necessário, você pode executar agora um comando composer init para criar um arquivo composer.json detalhado para seu projeto. Como o único objetivo do nosso projeto é demonstrar como instalar dependências com o Composer, usaremos um arquivo composer.json mais simples que será gerado automaticamente quando exigirmos nosso primeiro pacote.

Agora é hora de procurar no Packagist.org por um pacote que pode nos ajudar a gerar slugs. Se você procurar pelo termo “slug” no Packagist, receberá um resultado parecido com este:

Resultados da Pesquisa do Packagist para o termo "slug"

Você verá dois números no lado direito de cada pacote na lista. O número no topo representa quantas vezes o pacote foi instalado através do Composer, e o número em baixo mostra quantas vezes um pacote foi estrelado no GitHub. De um modo geral, os pacotes com mais instalações e mais estrelas tendem a ser mais estáveis, pois mais pessoas os utilizam. Também é importante verificar a descrição do pacote para relevância para garantir que ele é o que você precisa.

Precisamos de um conversor string-to-slug A partir dos resultados da pesquisa, o pacote cocur/slugify, que aparece como o primeiro resultado naquela página, parece ser um bom candidato, com uma quantidade razoável de instalações e estrelas.

Os pacotes no Packagist têm um nome de vendor e um nome de package. Cada pacote tem um identificador único (um namespace) no mesmo formato que o GitHub utiliza para seus repositórios: vendor/package. A biblioteca que queremos instalar utiliza o namespace cocur/slugify. Você precisa de um namespace do pacote para exigi-lo em seu projeto.

Agora que você sabe exatamente qual pacote deseja instalar, você pode executar o composer require para incluí-lo como uma dependência e gerar também o arquivo composer.json para seu projeto. Uma coisa importante é observar a exigência de pacotes. O Composer rastreia as dependências no nível da aplicação e do sistema. As dependências no nível do sistema são importantes para indicar de quais módulos PHP um pacote depende. No caso do pacote cocur/slugify, ele exige um módulo PHP que ainda não instalamos.

Quando um pacote necessário depende de uma biblioteca de sistema que não está atualmente instalada em seu servidor, você receberá um erro informando qual requisito está faltando:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Your requirements could not be resolved to an installable set of packages.

  Problem 1
    - Installation request for cocur/slugify ^4.0 -> satisfiable by cocur/slugify[v4.0.0].
    - cocur/slugify v4.0.0 requires ext-mbstring * -> the requested PHP extension mbstring is missing from your system.
...
Para resolver o problema de dependência do sistema, podemos procurar pelo pacote que falta usando o apt search:

apt search mbstring
Output
Sorting... Done
Full Text Search... Done
php-mbstring/focal 2:7.4+75 all
  MBSTRING module for PHP [default]

php-patchwork-utf8/focal 1.3.1-1 all
  UTF-8 strings handling for PHP

php7.4-mbstring/focal 7.4.3-4ubuntu1 amd64
  MBSTRING module for PHP
Após localizar o nome do pacote correto, você pode utilizar o apt novamente para instalar a dependência de sistema:

sudo apt install php-mbstring
Assim que a instalação terminar, você pode executar novamente o comando composer require:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing cocur/slugify (v4.0.0): Downloading (100%)         
Writing lock file
Generating autoload files
Como você pode ver na saída, o Composer decidiu automaticamente qual versão do pacote utilizar. Se você verificar o diretório do seu projeto agora, ele irá conter dois arquivos novos: composer.json e composer.lock, e um diretório vendor:

ls -l
Output
total 12
-rw-rw-r-- 1 sammy sammy   59 May  4 13:56 composer.json
-rw-rw-r-- 1 sammy sammy 3229 May  4 13:56 composer.lock
drwxrwxr-x 4 sammy sammy 4096 May  4 13:56 vendor
O arquivo composer.lock é usado para armazenar informações sobre quais versões de cada pacote estão instaladas, e garantir que as mesmas versões sejam usadas se outra pessoa clonar seu projeto e instalar suas dependências. O diretório vendor é onde as dependências do projeto estão localizadas. Você não deve fazer commit da pasta vendor no controle de versão - você precisa apenas incluir os arquivos composer.json e composer.lock.

Ao instalar um projeto que já contém um arquivo composer.json, execute o composer install para baixar as dependências do projeto.

Vamos dar uma olhada rápida em restrições de versão. Se você verificar o conteúdo do seu arquivo composer.json, verá algo parecido com isto:

cat composer.json
Output
{
    "require": {
        "cocur/slugify": "^4.0"
    }
}
Note que há o caractere especial ^ antes do número da versão no composer.json. O Composer suporta várias restrições diferentes e formatos para definir a versão necessária do pacote, para fornecer flexibilidade enquanto também mantém seu projeto estável. O operador circunflexo (^) utilizado pelo arquivo composer.json criado automaticamente é o operador recomendado para a interoperabilidade máxima, seguindo o versionamento semântico. Neste caso, ele define 4.0 como a versão mínima compatível e permite atualizações para qualquer versão futura abaixo de 5.0.

De um modo geral, você não precisará alterar as restrições de versão em seu arquivo composer.json. No entanto, algumas situações podem exigir que você edite manualmente as restrições – por exemplo, quando uma nova versão principal da sua biblioteca requerida é liberada e você deseja atualizar, ou quando a biblioteca que você deseja usar não segue o versionamento semântico.

Aqui estão alguns exemplos para lhe dar um melhor entendimento sobre como as restrições de versão do Composer funcionam:

Restrição	Significado	Exemplo de Versões Permitidas
^1.0	>= 1.0 < 2.0	1.0, 1.2.3, 1.9.9
^1.1.0	>= 1.1.0 < 2.0	1.1.0, 1.5.6, 1.9.9
~1.0	>= 1.0 < 2.0.0	1.0, 1.4.1, 1.9.9
~1.0.0	>= 1.0.0 < 1.1	1.0.0, 1.0.4, 1.0.9
1.2.1	1.2.1	1.2.1
1.*	>= 1.0 < 2.0	1.0.0, 1.4.5, 1.9.9
1.2. *	>= 1.2 < 1.3	1.2.0, 1.2.3, 1.2.9
Para uma visualização mais detalhada das restrições de versão do Composer, consulte a documentação oficial.

A seguir, vamos ver como carregar dependências automaticamente com o Composer.

Passo 4 — Incluindo o Script Autoload
Como o PHP por si só não carrega classes automaticamente, o Composer fornece um script autoload que você pode incluir em seu projeto para obter o carregamento automático para ele. Este arquivo é gerado automaticamente pelo Composer quando você adiciona sua primeira dependência.

A única coisa que você precisa fazer é incluir o arquivo vendor/autoload.php em seus scripts PHP antes de qualquer instância de classe.

Vamos testar isso em nossa aplicação de demonstração. Abra um novo arquivo chamado test.php em seu editor de texto:

nano test.php
Adicione o código a seguir que vem no arquivo vendor/autoload.php, carrega a dependência cocur/slugify, e o utiliza para criar um slug:

test.php
<?php
require __DIR__ . '/vendor/autoload.php';

use Cocur\Slugify\Slugify;

$slugify = new Slugify();

echo $slugify->slugify('Hello World, this is a long sentence and I need to make a slug from it!');
Salve o arquivo e saia do seu editor.

Agora, execute o script.

php test.php
Isso produz a saída hello-world-this-is-a-long-sentence-and-i-need-to-make-a-slug-from-it.

As dependências precisam de atualizações quando novas versões são liberadas. Dessa forma, vamos ver como lidar com isso.

Passo 5 — Atualizando as Dependências do Projeto
Sempre que você quiser atualizar suas dependências do projeto para versões mais recentes, execute o comando update:

composer update
Isso irá verificar por versões mais recentes das bibliotecas que você requer em seu projeto. Se uma versão mais recente for encontrada e ela for compatível com a restrição de versão definida no arquivo composer.json, o Composer substituirá a versão anterior instalada. O arquivo composer.lock será atualizado para refletir essas alterações.

Você também pode atualizar uma ou mais bibliotecas específicas, especificando-as desta forma:

composer update vendor/package vendor2/package2
Certifique-se de verificar em seus arquivos composer.json e composer.lock dentro do seu sistema de controle de versão após atualizar suas dependências de modo que outros também possam instalar essas versões mais recentes.








INÍCIO:

1 instalar o docker

2 abrir wsl2/Windows ou linux
 curl -s "https://laravel.build/olw?with=mysql,redis,mailhog,minio" | bash

3 cd olw
./vendor/bin/sail up -d
	ou
4 cd olw && ./vendor/bin/sail up -d

5 ATRIBUINDO PERMISSÃO PARA A PASTA
cd .. -> sai da pasta
sudo chmod 777 olw/ -R ou sem o 'sudo' chmod 777 olw/ -R

6 CRIANDO ALIAS PARA O COMANDO ANTERIOR
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
passa a usar assim: sail ps

7 CONFIGURAR PORTAS PARA A APLICAÇÃO NO NAVEGADOR E MYSQL
.env
APP_PORT=8000

*porta do myql
FORWARD_DB_PORT=3307

8 INSTALANDO DEPENDÊNCIA AO PROJETO
./vendor/bin/sail composer require laravel/breeze --dev

9 DEIXAR TELA DE AUTENTICAÇÃO PRONTA, ROTA AUTENTICADA, TAWINDCSS INSTALADO E INERTIA INSTALADO
./vendor/bin/sail artisan breeze:install vue 
ou
./vendor/bin/sail art breeze:install vue


10 RODAR AS MIGRATES PADRÕES DO PROJETO AI JÁ PODE CADASTRAR USUÁRIOS PARA LOGIN:
./vendor/bin/sail art migrate

11 


/*******************************************/
2a AULA:

O PROJETO CONSISTE EM RECEBER DADOS DE UMA API (punkapi.com) DE INFORMAÇÕES SOBRE CERVEJAS, VAMOS CONSTRUIR AS ROTAS PARA CONSUMIR A API E CRIAR A ESTRUTURA PARA O RELATÓRIO QUE IREMOS GERAR EM EXCEL E ENVIAR PARA O STORAGE...
1 CRIAR ROTAS:
code .
olw/routes/web.php


sail up -d -> SOBE O CONTAINER localhost:8000 (nesse projeto)

Route::get('/beers', fn()=> 'Olw - testando a rota /beers');

**************************************************
obs:
- laravel.com/api -> acesso a documentação do código;
- Inline Parameters for VSCode-> extensão para vscode para exibir o nome dos métodos na hora que codificar;
- fira code -> extensão para fonte no vscode

git Hub Copilot vs Tabnine -> (pesquisar sobre)
Link para extensões vscode:
https://github.com/icarojobs/vscode-useful-extensions
*************************************************


Route::get('/beers', fn()=> 'Olw - testando a rota /beers')
                             ->middleware(['auth']);

* FLUXO PADRÃO DO MVC-LARAVEL: 
life cicle: sai do usuário pelo navegador, insomnia ou postman -> passa pelo index.php(pasta public) -> passa pelos arquivos do bootstrap retornando uma instância da aplicação -> passa pelo kernel do http (carrega mais instâncias) -> Service provider -> despacha a requisição pro Router -> Cai no arquivo Web.php -> Middleware (se tiver, geralmente tem os globais) -> Controller (faz as regras de negócio e pode chamar outras classes como Serviços por exemplo)
-> Retorna uma view ou um json (No caso estamos usando inértia, ele não vai reinderizar a 'view.blade' padrão, ele vai reinderizar componente vue.js através do inértia.).


* EM VEZ DE USAR A FUNÇÃO AQUI NA ROTA CRIAMOS UM CONTROLLER:

obs.: ​dica: php artisan make:controller -r cria o Resource também.
dica: limpar o cache do container:
./vendor/bin/sail art config:cache
./vendor/bin/sail art optimize:clear


sail artisan make:controller BeerController
ou 
sail art make:controller BeerController -> CRIA O ARQUIVO BeerController.php na pasta app/Http/Controllers
->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index()
    {
    return 'Virgu & Beer & Code'
    }
}

* NO ARQUIVO DE ROTAS Web.php CHAMA O BeersController:

importante importar o Controller <nomeDoController>+<CTRL=ENTER:
use App\Http\Controllers\BeerController;

Route::get('/beers', [BeerController::class, 'index'])
                        ->middleware(['auth']);


* PRECISAMOS CRIAR UM MÉTODO PARA PEGAR A LISTA, LISTAR OS DADOS DA API (listar as bebidas de https://api.punkapi.com/v2 ->
VAMOS CRIAR UMA NOVA CLASSE de serviços em app/Sevices/PunkapiService.php

* O LARAVEL POSSUI UM RECURSO CHAMADO HTTPClient que abstrai o uso de uma ferramenta chama guzeo, esse guzeo é o client http mais comum para php, com ele fazemos requisições pra diversos serviços web dentro do php para outras url, ele é robusto, então o laravel simplifica importando o recurso que faz tudo por 'detrás dos panos':

PunkapiService.php

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::get('https://api.punkapi.com/v2/beers');
    }
}

E NO BeerController.php fica:
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index()
    {
    //return 'Virgu & Beer & Code';
    $service = new PunkapiService;

    return $service->getBeers();
    }
}

* TRATE É CARACTERÍSTICA QUE A CLASSE ADQUIRE (pode ter mesmos métodos e atributos substituindo o recurso de um classe extender várias classes que não tem no php, a trate é uma forma de fazer isso. O service  é uma outra camada na maioria das vezes abstrair seviços que vc vai consumir, por exemplo API.

Estando logado, os dados da api já serão exibidos em localhost:8000/beers, se usar um aplicativo cliente tipo insomnia pode apresentar os dados também, melhor comentar a linha de de autenticação da rota:
Route::get('/beers', [BeerController::class, 'index']);
linha de autenticação da rota // ->middleware(['auth']);

* ESSA API PERMITE FAZER FILTROS VIA PARÂMETROS NA PRÓPRIA ROTA. PRIMEIRO VAMOS REFATORAR O CÓDIO, A CLASSE PunkapiService.php:

USO DE CONFIG E MACRO


Vamos alterar a url, primeiro acessando a pasta config da raiz do projeto e criar o arquivo punkapi.php. O que acontece é que o config(pasta config da raiz) carrega todos os arquivos da pasta e permite que sejam acessados via funções simples(HELPERS), isso é muito legal porque podemos acessar esses arquivos de configurações de qualquer lugar do projeto: 

<?php

return [
    'url' => env('PUNK_BASE_URL', 'https://api.punkapi.com/v2')
];

Usando o helper env significa dizer que, se não houver a constante PUNK_BASE_URL setada no arquivo .env do projeto, seu valor será o segundo parâmetro: http://api.punkapi.com/v2 e no arquivo PunkapiService.php da pasta app/Services fica:

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::get('/beers');
    }
}

MACRO é uma forma de criar funções customizadas:
 em app\Providers vamos acessar o arquivo AppServiceProvider.php que é uma classe que tem dois métodos register e boot. No método boot vamos chamar o método Http do laravel e chamar o método macro, no primeiro parâmetro será um nome atribuído à função e e o segundo uma clausure (uma função).
Neste arquivo é passado o arquivo de configuração da url (em 'config/punkapi.php') além de tokens, headers,...
 

use Illuminate\Support\Facades\Http; -> deve ser importado
E a função boot fica:

  public function boot()
    {
        Http::macro('punkapi', function(){
            return Http::acceptJson()
            ->baseUrl(config('punkapi.url'));
        });
    }

Então criamos uma macro(uma função customizada) chamada punkapi que já retorna o client com accept/Json no Header e com o baseUrl configurado lá do arquivo /config/punkapi.php e se estiver setado no .env pegará de lá.

/app/Services/PunkapiService.php fica:

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::punkapi()->get('/beers');
    }
}

*obs.: a baseUrl poderia ser setada no construtor, que pode setar token também.(uma outra abordagem para versão sem macros);

->Testamos o retorno Json em localhost:8000/beers.

Refatorando o arquivo PunkapiService.php: O client Http não lança exceção e podemos forçar o retorno em modo Json:
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
       // return Http::punkapi()->get('/beers');
       return Http::punkapi()
            ->get('/beers')
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Podemos testar forçando um erro alterando a constante PUNKAPI_BASE_URL criada em /config/punkapi.php, vamos atribuir um valor diferente no arquivo .env:

PUNKAPI_BASE_URL="adfjklj878"

Podemos usar a função retry tem dois parâmetros, o número de tentativas pra buscar a requisição e o intervalo entre elas. Refatorando o código fica:
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
       // return Http::punkapi()->get('/beers');
       return Http::punkapi()
            ->get('/beers')
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

- Quando sai a exceção nao deveriamos retornar o erro em json por ser um api neste caso estamos usamos um app web e não uma api. E usaríamos o Route Api.

Refatorando o método boot de /app/Providers/AppServiceProvider.php, inserindo o retry():

     */
    public function boot()
    {
        Http::macro('punkapi', function(){
            return Http::acceptJson()
            ->baseUrl(config('punkapi.url'))
            ->retry(3,100);
        });
    }
}

comando de help

* ./vendor/bin/sail composer dump-autoload
* Verificar Nome do arquivo se bate com o nome das rotas(Classes criadas e importar o nome errado);
* inteliphense

Refatorando BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index()
    {

    $service = new PunkapiService();

    return $service->getBeers();
    }
}

Em vez de instanciar o método PunkapiService() dentro de index, vamos passar por parâmetro de index() declarando seu Próprio nome (PunkapiService) como tipo. Fica assim:

<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers();
    }
}

Assim usamos feactures do php(injeção de dependências) e ao mesmo tempo feactures do laravel. Em vez de criar uma instância dentro do método index, vamos injetar a classe como parâmetro para o método index(), ficando index($service) e a instância de dentro da função passa como parâmetro de 'tipo da variável'. Isso quebra a cadeia de dependência entre as classes.
Assim, o método index ganha independência não mais dependendo da instância de new PunkapiService e passamos a olhar a função index em si.
Assim, o Laravel tenta fazer um binding, um match, o laravel tenta encontrar alguma classe PunkapiService e cria uma instância dessa classe e usa ali como parâmetro. Se não fizer assim, lá em Rotas teria que ser passado como parâmetro o que fica desnecessário.
Não poderia ser feito se na classe PunkapiService existisse o construtor para atribuir valores automaticamente à classe. Assim podemos usar porque não precisamos passar nenhum valor.

ADICIONAR OS FILTROS:
Vamos filtrar o retorno api com os seguintes itens: beer_name, food, ibu_gt, malte:

var_dump($v)
die();
dd($variável)
benchmarck -> ?

/*****REFATORA PARA TESTE alterando BeerController.php e PunkapiService.php
BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(
        'heineken',
        'cheese',
        'corn',
        45
    );
    }
}

PunkapiService.php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers(
        string $beer_name,
        string $food,
        string $malt,
        string $ibu_gt
    )
    {
        $params = get_defined_vars();

        dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Resultado do debug no insomnia ou no navegador:
array:4 [▼ // app/Services/PunkapiService.php:18
  "beer_name" => "heineken"
  "food" => "cheese"
  "malt" => "corn"
  "ibu_gt" => "45"
]
//* fim teste

Refatorando:

class PunkapiService
{
    public function getBeers(
        string $beer_name = null,
        string $food = null,
        string $malt = null,
        string $ibu_gt = null
    )
    {
        $params = get_defined_vars();

        dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Assim quando não passar o valor para a chave ele exibirá a chave e o valor Null, vamos refatorar para não exibir nem a chave englobando get_defined_vers() com array_filter no arquivo PunkapiService.php:

$params = array_filter(get_defined_vars());

<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(
        'heineken',
        'cheese',
        'corn',
       // 45 -> Esse não é passado
    );
    }
}


array:3 [▼ // app/Services/PunkapiService.php:18
  "beer_name" => "heineken"
  "food" => "cheese"
  "malt" => "corn"
	Aqui não exibiu o valor 45
]


USANDO A FUNÇÃO NAMED_ARGS passamos só os parâmetros que precisamos retornar da api e o php com essa função saberá qual a posição dela no array de argumentos passados como parâmetro sem a necessidade de seguir a mesma sequência dos argumentos:
class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(food: 'cheese');
    }
}

REFATORANDO:
BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index( Request $request, PunkapiService $service)
    {
    return $service->getBeers(...$request->all());
    }
}

PunkapiService.php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers(
        string $beer_name = null,
        string $food = null,
        string $malt = null,
        string $ibu_gt = null
    )
    {
        $params = array_filter(get_defined_vars());

     //   dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

CRIANDO UMA REQUEST
sail artisan make:request BeerRequest
/app/Http/Requests/BeerRequest.php

* Funções anônimas, também conhecidas como closures , permitem a criação de funções que não tem o nome especificado. Elas são mais úteis como o valor de parâmetros callable, mas podem ter vários outros usos.. É uma função passada como parâmetro

CRIANDO NOVA ROTA PARA SALVAR COMO EXCEL
* https://docs.laravel-excel.com/3.1/getting-started/installation.html

Route::group([
    'prefix' => 'beers',
], function() {

    Route::get('/', [BeerController::class, 'index']); //-> Se houver necessidade de salvar dados por essa rota mudamos o método(verbo html) para post(os dados não serão expostos na url).
                          //  ->middleware(['auth']);
    Route::get('/export', [BeerController::class, 'export']);

});

Então passamos a ter duas rotas: localhost:8000/beers
localhost:8000/beers/export

No BeerController incluimos o método export():
class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
    // return $service->getBeers(...$request->all());
    return $service->getBeers(...$request->validated());
    }

    public function export()
    {
        return 'Relatório criado.';
    }
}



INSTALANDO PACOTE LARAVEL-EXCEL PARA GERAR OS RELATÓRIO EM EXCEL FILTRADOS DA API:

* https://docs.laravel-excel.com/3.1/getting-started/installation.html

COMANDO PARA INSTALAR VIA COMPOSER:
./vendor/bin/sail composer require psr/simple-cache:^2.0 maatwebsite/excel

CRIAR A CLASSE DO EXCEL
./vendor/bin/sail artisan make:export BeerExport  --> Cria o arquivo em  /app/Exports/BeerExport.php

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BeerExport implements FromCollection
{


    /**
    * @return \I¢lluminate\Support\Collection
    */
    public function collection()
    {
        //
    }
}

-> Dentro de colletion buscaremos as informações que serão salvas no arquivo do excel, um array de dados;

criamos um __construct() que vai ter uma propriedade privada do tipo array chamamos de $reportData.

O retorn será uma collection como informa o comentário:
 /**
    * @return \I¢lluminate\Support\Collection
    */

Na função colletion(), está recebendo um array return $this->reportData; 
Observe que não precisa mais declarar uma propriedade que vai se setada via construct(), basta defifinir o escopo junto do argumento e o php faz isso pra você. Como o retorno da função é um array usamos o helper collect para o $this->reportData:

BeerExport.php

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BeerExport implements FromCollection
{

    public function __construct(
        private array $reportData
    ){}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return collect($this->reportData);
    }
}
 

Consultamos a documentação do Laravel-excel em 'Exporting collections':
em Excel Store passa o nome da classe e o nome do arquivo:

BeerController.php
<?php

namespace App\Http\Controllers;


use App\Exports\BeerExport;
use App\Http\Requests\BeerRequest;
use App\Services\PunkapiService;
use Maatwebsite\Excel\Facades\Excel;


class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
    // return $service->getBeers(...$request->all());
    return $service->getBeers(...$request->validated());
    }

    public function export()
    {
      $params = [
        ['name' => 'Tom', 'age' => '30'],
        ['name' => 'Virgu', 'age' => '27']
       ];

       Excel::store(new BeerExport($params), 'olw-report.xlsx');
       return "Relatório criado";

    }


}

********************************************
* REFATORANDO E SALVANDO O ARQUIVO EXCEL EM /storage/app

BeerExport.php
<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class BeerExport implements FromCollection
{

    public function __construct(
        private array $reportData
    ){}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return collect($this->reportData);
    }
}
*****************************

BeerController.php

<?php

namespace App\Http\Controllers;


use App\Exports\BeerExport;
use App\Http\Requests\BeerRequest;
use App\Services\PunkapiService;
use Maatwebsite\Excel\Facades\Excel;


class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
        return $service->getBeers(...$request->all());

    }

    public function export(BeerRequest $request, PunkapiService $service)
    {
        $beers = $service->getBeers(...$request->validated());

        $filteredBeers = collect($beers)->map(function($value, $key){
        return collect($value)
                ->only(['name', 'tagline', 'first_brewed', 'description'])
                ->toArray();
    })->toArray();

    //dd($filteredBeers);

      $params = [
        ['name' => 'Tom', 'age' => '30'],
        ['name' => 'Virgu', 'age' => '27']
       ];

       Excel::store(new BeerExport($filteredBeers), 'olw-report.xlsx');

           return "Relatório criado";

    }


}

PARA SALVAR O ARQUIVO EXCEL EM UM STORAGE S3:
ALTERA BeerController.php

<?php

namespace App\Http\Controllers;


use App\Exports\BeerExport;
use App\Http\Requests\BeerRequest;
use App\Services\PunkapiService;
use Maatwebsite\Excel\Facades\Excel;


class BeerController extends Controller
{
    public function index( BeerRequest $request, PunkapiService $service)
    {
        return $service->getBeers(...$request->all());

    }

    public function export(BeerRequest $request, PunkapiService $service)
    {
        $beers = $service->getBeers(...$request->validated());

        $filteredBeers = collect($beers)->map(function($value, $key){
        return collect($value)
                ->only(['name', 'tagline', 'first_brewed', 'description'])
                ->toArray();
    })->toArray();


       Excel::store(
            new BeerExport($filteredBeers),
             'olw-report.xlsx',
             's3');

           return "Relatório criado";

    }


}

************
O REPOSITÓRIO DE ARQUIVOS minio:
NO DOCKER COMPOSER TEMOS O minio, um S3 que tem
MINIO_ROOT_USER: 'sail'
MINIO_ROOT_PASSWORD: 'password' e roda na porta 9000
localhost:9000
usuário: sail
senha: password

vamos criar um buncket(uma pasta)

e configurar o .env da raiz da aplicação:
originalmente é assim:
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

 e acrescentamos as informações para:


AWS_ACCESS_KEY_ID=sail
AWS_SECRET_ACCESS_KEY=password
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=local
AWS_ENDPOINT=http://minio:9000
AWS_URL=http://minio:9000/local
AWS_USE_PATH_STYLE_ENDPOINT=true

altera tambem:

FILESYSTEM_DISK=local 
para:
FILESYSTEM_DISK=s3

INSTALAR UMA DEPENDÊNCIA (ADAPTER) PARA FAZER CORRESPONDÊNCIA COM A AWS:

Flysystem 3.x em laravel.com/docs/9.x/upgrade
./vendor/bin/sail composer require -W league/flysystem-aws-s3-v3 "^3.0"

em caso de erro:
 artisan vendor:publish --tag=laravel-assets --ansi --force

.env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:UbVvTP6Cu+LF5GamJdB4dsZZvW05ep4bZqcCEhmiDCg=
APP_DEBUG=true
APP_URL=http://localhost
APP_PORT=8000

# PUNKAPI_BASE_URL="httpadfjkljdsdfdfasf878"

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
FORWARD_DB_PORT=3307
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=olw
DB_USERNAME=sail
DB_PASSWORD=password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=s3
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=memcached

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=sail
AWS_SECRET_ACCESS_KEY=password
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=local
AWS_ENDPOINT=http://minio:9000
AWS_URL=http://minio:9000/local
AWS_USE_PATH_STYLE_ENDPOINT=true

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

PRONTO. ENVIANDO PARA O MINIO.


/**** ABAIXO AULA DE FRONT END -> FALTA
























 







/***********************************************************
QUINTA FEIRA: 20/10/22

Open Laravel Week | Deploy com Terraform, EC2 e RDS | Fermentação

****
https://portal.aws.amazon.com/billing/signup?nc2=h_ct&src=header_signup&redirect_url=https%3A%2F%2Faws.amazon.com%2Fregistration-confirmation&language=pt_br#/start/email

Com terraform pode mudar de infra e configurar no git.

PROGRMAR A CONFIGURAÇÃO DO SERVIDOR: É basicamente construir uma nova aplicação para fazer isso, mais fácil de entender.
Terraform serve para (linguagem HCL -> linguagem própria - linguagem descritiva, descreve o resultado e não como irá ser feito), ou seja, descrever o que queremos.
Terraspace é o framework pra terraform.
Quando criamos o Terraform, ele pode variar conforme a infra cloud (aws, azure, google cloud). sua estrutura é a mesma para todos. mas cada provider tem a sua forma de usar, não consegue usar o mesmo código para mais de uma cloud.
Vamos rodar Terraform via container:

1. clonar do git: git clone 
Criar uma pasta para a infraestrutura

sail   (script que vamos usar)
#!/usr/bin/env bash

docker run -rm -it
	-u $(id -u):$(id -g) \
	-v $PWD:/workspace \
	-w /workspace
	hashicorp/terraform:light "%@"


	<no terminal

Logar em: aws.amazon.com
busca: iam
iam dashboard -> mysecurity credencials (root user) -> Acces keys ->clicar em create access keys -> salva o access key e secret access key
e coloca no arquivo credencials na maquina local.. .aws/credencials
















































//////////////////////////////////////////////////////////////////////////////////////////////////////
CONTEÚDO QUE FALTA ORGANIZAR:



/**************************************/

sail share

sail artisan sail:publish ->coloca em uma pasta na raiz chamada docker

sail --help

sail artisan optimizer:clear

sail ps

sail build --no-cache -> faz o bild da aplicação. (dá um sail down  por precaução antes.)










/*********************************

root@DELLAGS:~# curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash

Dockerfile

root@DELLAGS:~/example-app# docker exec -it example-app-mysql-1 bash


FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
RUN chmod -R 755 /usr/share/nginx/storage/*
RUN ln -s public html

.env (do composer)

DB_CONNECTION=mysql
DB_HOST=mysql-app (serviço do mysql no docker-compose.yaml)
DB_PORT=3306
DB_DATABASE=laraveldockerdb
DB_USERNAME=root
DB_PASSWORD=123456



docker-compose.yaml

version: '3'

services:
  laraveldocker-app:
    build: .
    ports:
      - "3003:80"
    volumes:
      - ./:/usr/share/nginx
      - .docker/nginx:/etc/nginx/conf.d/
    networks:
      - app-network
  mysql-app:
    image: mysql:5.7.22
    ports:
      - "3306:3306"
    volumes:
      - .docker/dbdata:/var/lib/mysql
    environment:
      MYSQL_DATABASE: laraveldocker
      MYSQL_ROOT_PASSWORD: 123456
    networks:
      - app-network
networks:
  app-network:
    driver: bridge
    



/*************************************************
#criando um serviço com um nome qualquer
version: '3'

services:
  laravel-app:                    #criando um serviço com um nome qualquer
    build: . ou image: wyveo/nginx-php-fpm:latest -> neste caso sem Dockerfile.                    # endereço da imagem ou local do Dockerfile (neste caso o ponto siginifica a raiz do projeto)
    ports:
      - "8080:80"                 # 8080 porta do meu host: 80 é a porta do docker nginx
    volumes:                      # docker-compose up -d -> sobe a imagem e libera o terminal  
      - ./:/usr/share/nginx       # TUDO QUE ESTIVE NA RAIZ (na rais tem o meu projeto laravel) './' IRÁ SER REFLETIDO NA PASTA /usr/share/nginx (pasta de acesso da página html)
                                  # C:\Laravel-docker\laravel-docker>docker compose up -d --build atualiza a minha imagem

  mysql-app:
      image: mysql:5.7
      ports:
        - "3306:3306"
      volumes:
        - .docker/dbdata:/var/lib/mysql          # qualqer nome (para persistir -guardar os dados do banco de dados)


      environment:
        MYSQL_DATABASE: laravel
        MYSQL_ROOT_PASSWORD: laravel
    
      

      /***************************///


  
C:\Laravel-docker\laravel-docker>docker compose up -d --build

                                
                               

    

/******************************** Dockerfile
FROM wyveo/nginx-php-fpm:latest

/***************************///
  COMANDOS

docker compose down -> para todos os containers
C:\Laravel-docker\laravel-docker>docker exec -it laravel-docker-laravel-app-1 bash 
root@612ea0ea3340:/# cd /usr/share/nginx/
root@612ea0ea3340:/usr/share/nginx# php artisan migrate
root@612ea0ea3340:/usr/share/nginx# php artisan serve

		
/***********/
PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d mysql:5.7

docker inspect meu-mysql ou | grep IPAddress

PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d -p 3306:3306 mysql:5.7

docker ps
docker ps -l
docker ps -a
docker rm -f nome


/*** LARAVEL */
### CRIANDO UM PROJETO NO LARAVEL 
laravel new projeto_laravel_via_installer (ESTA É UM AOPÇÃO)
composer create-project --prefer-dist laravel/laravel app_controle_tarefas "8.5.9"
cd app_controle_tarefas
cd public
php -S localhost:8000

ou 
da raiz do projeto:
php artisan serve 
ou
php artisan serve --port=3000

### PARA ABRIR PORTA EM OUTRO SERVIDOR
php artisan serve --host test.com --port 8080

 **********************************************************************
cd app_controle_tarefas
cd public
php artisan serve
- acessa o navegador http://localhost:8000

### DENTRO DO PROJETO CRIADO INSTALAR O LARAVEL/UI:^3.2 - versão 3.2
composer require laravel/ui:^3.2

### SE OCORRER ERRO AUMENTAR A MEMÓRIA DISPONIVEL PARA O php

-php --ini -> localiza o arquivo de configuração do php
LOCALIZA memory_limit = 1000 e altera para 
         memory_limit  = -1 e Salva

### LISTA A RELAÇÃO DE COMANDOS 
php artisan list 

DEVERA SURGIR AS OPÇÕES ABAIXO:

 ui
  ui:auth               Scaffold basic login and registration views and routes
  ui:controllers        Scaffold the authentication controllers
 vendor

### ENTENDENDO O PACOTE UI E INICIANDO A AUTENTICAÇÃO WEB NATIVA DO LARAVEL

COMANDO PARA LISTAR ROUTES: 
php artisan route:list

### php artisan ui bootstrap --auth (bootstrap ou react ou vue)
aplicando o bootstrap incluindo os recursos de autenticação;
poderia ser aplicado o bootstrap sem os recursos de autenticação;

### php artisan route:list -> mostra as rotas - ver que aumentaram as rotas

### APÓS ESSE PROCESSO O SISTEMA PEDE PARA RODAR
npm install -> instala as dependências do package.json (inclusive o bootstrap)
npm run dev -> gera os assets da aplicação de acordo com a tecnologia selecionada (bootstrap, react ou vue) -> Geralmente roda mais de uma vez para compilar tudo.

### CRIA O BANCO DE DADOS NORMALMENTE

### EXECUTA AS MIGRATIONS PADRÕES CRIADAS PARA O SISTEMA DE login
php artisan migrate -> CRIA AS TABELAS NO BANCO DE DADOS


************************************** 
INSTALANDO O COMPOSER NO UBUNTU
**************************************
sudo apt update
sudo apt install php-cli unzip

cd ~

curl -sS https://getcomposer.org/installer -o composer-setup.php

HASH=`curl -sS https://composer.github.io/installer.sig`

echo $HASH ->saída: Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74



php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer





***********************

DigitalOcean Kubernetes: novo plano de controle é mais rápido e gratuito, habilita HA para SLA de 99,95% de tempo de atividade
Produtos
Preços

Documentos
divisa suspensa

Entrar
divisa suspensa

// Tutorial //
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Publicado em 21 de maio de 2020
Ubuntu
PHP
Ubuntu 20.04
Avatar padrão
Por Erika Heidi
Advogado Desenvolvedor
Português
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Introdução
O Composer é uma ferramenta popular de gerenciamento de dependências para o PHP, criado para facilitar a instalação e a atualização das dependências principalmente do projeto. Ele controla quais outros pacotes de projeto específico dependem e são instalados para você, usando as opções apropriadas de acordo com os requisitos do projeto. O Composer também é comumente utilizado para inicializar novos projetos em frameworks PHP populares, como o Symfon e o Laravel .

Neste tutorial, você instalará e começará a usar o Composer em um sistema Ubuntu 20.04.

Pré-requisitos
Para seguir este guia, você pode acessar um servidor como usuário Ubuntu20.04 como usuário sudonão-root um firewall habilitado em seu servidor Para configurar isto, siga nosso guia Configuração do servidor inicial para o Ubuntu 20.04

Passo 1 — Instalando o PHP e as Dependências Adicionais
Além das dependências que já devem estar incluídas em seu sistema Ubuntu 20.04, como o , o Composer exige ou gitexecuta scripts PHP na linha de comando e para extrair arquivos zipados. Vamos instalar essas dependências agora.curlphp-cliunzip

primeiro, atual, gerenciador de pacotes de soluções: o cache do gerenciador de pacotes

sudo apt update
Em seguida, o seguinte comando para instalar os pacotes, execute:

sudo apt install php-cli unzip
Você será solicitado a confirmar a instalação digitando Ye, depois, ENTER.

Assim que os pré-requisitos para instalação do Composer forem instalados, você poderá seguir.

Passo 2 — Baixando e Instalando o Compositor
O Composer fornece um instalador de script escrito em PHP. Vamos baixá-lo, verificar se ele não está danificado e, em seguida, o usaremos para instalar o Composer.

Certifique-se de estar em sua pasta home. Em seguida, baixe o instalador usando o curl:

cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
Em seguida, vamos verificar se o instalador baixado corresponde ao hash SHA-384 para o instalador mais recente encontrado na página Composer Public Keys / Signatures . Para facilitar o passo de seleção, você pode usar o seguinte comando para obter programaticamente o hash mais recente da página do Composer e armazená-lo em uma variável do shell:

HASH=`curl -sS https://composer.github.io/installer.sig`
Se você quiser verificar o valor realizado, execute:

echo $HASH
Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a
Agora o código PHP a seguir, execute conforme a página de download do Composer, para verificar se o script de instalação está seguro para ser executado:

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
Você verá o seguinte resultado:

Resultado
Installer verified
Se Installer corruptvocê estiver usando o hash correto, verifique se você está usando o hash correto. Em seguida, repita o processo de verificação. Quando você tiver um instalador selecionado, você pode continuar.

Para instalar o composerglobalmente, use o seguinte comando que baixará e instalará o Composer como um comando disponível em todo o sistema chamado composer, sob /usr/local/bin:

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
Você verá um resultado semelhante com este:

Output
All settings correct for using Composer
Downloading...

Composer (version 1.10.5) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer
Para testar sua instalação, execute:

composer
Output
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.10.5 2020-04-10 11:44:22

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
...
Isso verifica que o Composer foi instalado com sucesso em seu sistema e está disponível em todo o sistema.

Nota: se você preferirá ter-lhe-ão separados separados do Composer para projeto hospedado neste servidor, você pode instalar localmente, em uma base por projeto. Este método também é útil quando o usuário do sistema não possui permissão para instalar o software disponível em todo o sistema.

Para fazer isso, use o comando php composer-setup.php. Isso irá gerar um arquivo composer.pharem seu diretório atual, que pode ser executado com o seu atual php composer.phar.

Agora podemos dar uma dependência em como usar o Compose como gerenciar.

Passo 3 — Usando o Compositor em um Projeto PHP
Os projetos PHP geralmente dependentes de bibliotecas externas, e o gerenciamento de dependências e suas versões podem ser complicados. O Composer resolve esse problema de manter um controle de projeto de extensões e dependências, também facilita o processo de descoberta, instalação e atualização de pacotes que são definidos por enquanto.

Para usar o seu projeto, você pode compor um arquivo composer.json. O arquivo composer.jsonComposer quais dependências precisa para baixar seu projeto quais serão as versões de cada pacote tem permissão para instalações e instalações. Isso é muito importante para manter seu projeto consistente e evitar a instalação de versões instáveis ​​que podem causar problemas de compatibilidade retroativa.

Você não precisa criar este arquivo manualmente - é comum ocorrer erros de sintaxe quando fizer isso. O Composer oferece uma maneira de criar um novo arquivo composer.jsoncom base na entrada do usuário, o que é uma boa escolha se você planeja compartilhar seu projeto mais tarde como um pacote público no Packagist . O Composer gera automaticamente um arquivo básico composer.jsonquando você executa um comando composer requirepara incluir uma dependência em um projeto recém-criado.

O processo de uso do Composer para instalar um pacote como uma dependência em um projeto envolve os passos a seguir:

Identifique o tipo de biblioteca que o aplicativo precisa.
uma biblioteca de código aberto adequada no agist.org , o responsável oficial de pacotes para o Compose.
Escolha o pacote de dependência.
Execute composer requirepara incluir a dependência no arquivo composer.jsone instalar o pacote.
Vamos testar isso com uma aplicação de demonstração.

O objetivo desta aplicação é transformar uma determinação determinada em uma string de URL amigável - um slug . Isso é comumente usado para converter os títulos de página para caminhos de URL (Assim como a parte final da URL para este tutorial).

Vamos começar a criar um diretório para o nosso projeto. Vamos chamá-lo de slugify :

cd ~
mkdir slugify
cd slugify
Embora não seja necessário, você pode executar agora um comando composer init para criar um arquivo composer.json detalhado para seu projeto. Como o único objetivo do nosso projeto é demonstrar como instalar dependências com o Composer, usaremos um arquivo composer.json mais simples que será gerado automaticamente quando exigirmos nosso primeiro pacote.

Agora é hora de procurar no Packagist.org por um pacote que pode nos ajudar a gerar slugs. Se você procurar pelo termo “slug” no Packagist, receberá um resultado parecido com este:

Resultados da Pesquisa do Packagist para o termo "slug"

Você verá dois números no lado direito de cada pacote na lista. O número no topo representa quantas vezes o pacote foi instalado através do Composer, e o número em baixo mostra quantas vezes um pacote foi estrelado no GitHub. De um modo geral, os pacotes com mais instalações e mais estrelas tendem a ser mais estáveis, pois mais pessoas os utilizam. Também é importante verificar a descrição do pacote para relevância para garantir que ele é o que você precisa.

Precisamos de um conversor string-to-slug A partir dos resultados da pesquisa, o pacote cocur/slugify, que aparece como o primeiro resultado naquela página, parece ser um bom candidato, com uma quantidade razoável de instalações e estrelas.

Os pacotes no Packagist têm um nome de vendor e um nome de package. Cada pacote tem um identificador único (um namespace) no mesmo formato que o GitHub utiliza para seus repositórios: vendor/package. A biblioteca que queremos instalar utiliza o namespace cocur/slugify. Você precisa de um namespace do pacote para exigi-lo em seu projeto.

Agora que você sabe exatamente qual pacote deseja instalar, você pode executar o composer require para incluí-lo como uma dependência e gerar também o arquivo composer.json para seu projeto. Uma coisa importante é observar a exigência de pacotes. O Composer rastreia as dependências no nível da aplicação e do sistema. As dependências no nível do sistema são importantes para indicar de quais módulos PHP um pacote depende. No caso do pacote cocur/slugify, ele exige um módulo PHP que ainda não instalamos.

Quando um pacote necessário depende de uma biblioteca de sistema que não está atualmente instalada em seu servidor, você receberá um erro informando qual requisito está faltando:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Your requirements could not be resolved to an installable set of packages.

  Problem 1
    - Installation request for cocur/slugify ^4.0 -> satisfiable by cocur/slugify[v4.0.0].
    - cocur/slugify v4.0.0 requires ext-mbstring * -> the requested PHP extension mbstring is missing from your system.
...
Para resolver o problema de dependência do sistema, podemos procurar pelo pacote que falta usando o apt search:

apt search mbstring
Output
Sorting... Done
Full Text Search... Done
php-mbstring/focal 2:7.4+75 all
  MBSTRING module for PHP [default]

php-patchwork-utf8/focal 1.3.1-1 all
  UTF-8 strings handling for PHP

php7.4-mbstring/focal 7.4.3-4ubuntu1 amd64
  MBSTRING module for PHP
Após localizar o nome do pacote correto, você pode utilizar o apt novamente para instalar a dependência de sistema:

sudo apt install php-mbstring
Assim que a instalação terminar, você pode executar novamente o comando composer require:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing cocur/slugify (v4.0.0): Downloading (100%)         
Writing lock file
Generating autoload files
Como você pode ver na saída, o Composer decidiu automaticamente qual versão do pacote utilizar. Se você verificar o diretório do seu projeto agora, ele irá conter dois arquivos novos: composer.json e composer.lock, e um diretório vendor:

ls -l
Output
total 12
-rw-rw-r-- 1 sammy sammy   59 May  4 13:56 composer.json
-rw-rw-r-- 1 sammy sammy 3229 May  4 13:56 composer.lock
drwxrwxr-x 4 sammy sammy 4096 May  4 13:56 vendor
O arquivo composer.lock é usado para armazenar informações sobre quais versões de cada pacote estão instaladas, e garantir que as mesmas versões sejam usadas se outra pessoa clonar seu projeto e instalar suas dependências. O diretório vendor é onde as dependências do projeto estão localizadas. Você não deve fazer commit da pasta vendor no controle de versão - você precisa apenas incluir os arquivos composer.json e composer.lock.

Ao instalar um projeto que já contém um arquivo composer.json, execute o composer install para baixar as dependências do projeto.

Vamos dar uma olhada rápida em restrições de versão. Se você verificar o conteúdo do seu arquivo composer.json, verá algo parecido com isto:

cat composer.json
Output
{
    "require": {
        "cocur/slugify": "^4.0"
    }
}
Note que há o caractere especial ^ antes do número da versão no composer.json. O Composer suporta várias restrições diferentes e formatos para definir a versão necessária do pacote, para fornecer flexibilidade enquanto também mantém seu projeto estável. O operador circunflexo (^) utilizado pelo arquivo composer.json criado automaticamente é o operador recomendado para a interoperabilidade máxima, seguindo o versionamento semântico. Neste caso, ele define 4.0 como a versão mínima compatível e permite atualizações para qualquer versão futura abaixo de 5.0.

De um modo geral, você não precisará alterar as restrições de versão em seu arquivo composer.json. No entanto, algumas situações podem exigir que você edite manualmente as restrições – por exemplo, quando uma nova versão principal da sua biblioteca requerida é liberada e você deseja atualizar, ou quando a biblioteca que você deseja usar não segue o versionamento semântico.

Aqui estão alguns exemplos para lhe dar um melhor entendimento sobre como as restrições de versão do Composer funcionam:

Restrição	Significado	Exemplo de Versões Permitidas
^1.0	>= 1.0 < 2.0	1.0, 1.2.3, 1.9.9
^1.1.0	>= 1.1.0 < 2.0	1.1.0, 1.5.6, 1.9.9
~1.0	>= 1.0 < 2.0.0	1.0, 1.4.1, 1.9.9
~1.0.0	>= 1.0.0 < 1.1	1.0.0, 1.0.4, 1.0.9
1.2.1	1.2.1	1.2.1
1.*	>= 1.0 < 2.0	1.0.0, 1.4.5, 1.9.9
1.2. *	>= 1.2 < 1.3	1.2.0, 1.2.3, 1.2.9
Para uma visualização mais detalhada das restrições de versão do Composer, consulte a documentação oficial.

A seguir, vamos ver como carregar dependências automaticamente com o Composer.

Passo 4 — Incluindo o Script Autoload
Como o PHP por si só não carrega classes automaticamente, o Composer fornece um script autoload que você pode incluir em seu projeto para obter o carregamento automático para ele. Este arquivo é gerado automaticamente pelo Composer quando você adiciona sua primeira dependência.

A única coisa que você precisa fazer é incluir o arquivo vendor/autoload.php em seus scripts PHP antes de qualquer instância de classe.

Vamos testar isso em nossa aplicação de demonstração. Abra um novo arquivo chamado test.php em seu editor de texto:

nano test.php
Adicione o código a seguir que vem no arquivo vendor/autoload.php, carrega a dependência cocur/slugify, e o utiliza para criar um slug:

test.php
<?php
require __DIR__ . '/vendor/autoload.php';

use Cocur\Slugify\Slugify;

$slugify = new Slugify();

echo $slugify->slugify('Hello World, this is a long sentence and I need to make a slug from it!');
Salve o arquivo e saia do seu editor.

Agora, execute o script.

php test.php
Isso produz a saída hello-world-this-is-a-long-sentence-and-i-need-to-make-a-slug-from-it.

As dependências precisam de atualizações quando novas versões são liberadas. Dessa forma, vamos ver como lidar com isso.

Passo 5 — Atualizando as Dependências do Projeto
Sempre que você quiser atualizar suas dependências do projeto para versões mais recentes, execute o comando update:

composer update
Isso irá verificar por versões mais recentes das bibliotecas que você requer em seu projeto. Se uma versão mais recente for encontrada e ela for compatível com a restrição de versão definida no arquivo composer.json, o Composer substituirá a versão anterior instalada. O arquivo composer.lock será atualizado para refletir essas alterações.

Você também pode atualizar uma ou mais bibliotecas específicas, especificando-as desta forma:

composer update vendor/package vendor2/package2
Certifique-se de verificar em seus arquivos composer.json e composer.lock dentro do seu sistema de controle de versão após atualizar suas dependências de modo que outros também possam instalar essas versões mais recentes.

Conclusão





***********
Algoritmo "CalculoMedia2"
// Disciplina: Lógica de programação
// Professor : Antonio Carlos Nicolodi
// Descrição : calculo da média aritimética
// Autor     : Professor Antonio
// Data atual: 01/04/2015
var
// Seção de Declarações
   v1, v2, total: Real
   sinal : Caracter
Inicio
// Seção dos Comandos
   Escreva ("Digite o primeiro valor: ")
   Leia (v1)
   Escreva ("Digite a operação + - * / : ")
   Leia (sinal)
   Escreva ("Digite o segundo valor: ")
   Leia (v2)

   Se sinal = "+" entao
   total <- v1 + v2
   Escreva("O Resultado é: ", total)
   Senao
   Se sinal = "-" entao
   total <- v1 - v2
   Escreva("O Resultado é: ", total)
   Senao
   Se sinal = "*" entao
   total <- v1 * v2
   Escreva("O Resultado é: ", total)


   Senao
     Escreva("OPERAÇÃO INVÁLIDA! ")



      Escreval("total")
   fimse
Fimalgoritmo

****
COMANDOS DOCKER
root@DELLAGS:~# curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash

root@DELLAGS:~/example-app# ./vendor/bin/sail  artisan migrate --seed -> criar o banco de dados e copular dados;

Dockerfile

root@DELLAGS:~/example-app# docker exec -it example-app-mysql-1 bash


FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
RUN chmod -R 755 /usr/share/nginx/storage/*
RUN ln -s public html

.env (do composer)

DB_CONNECTION=mysql
DB_HOST=mysql-app (serviço do mysql no docker-compose.yaml)
DB_PORT=3306
DB_DATABASE=laraveldockerdb
DB_USERNAME=root
DB_PASSWORD=123456



docker-compose.yaml

version: '3'

services:
  laraveldocker-app:
    build: .
    ports:
      - "3003:80"
    volumes:
      - ./:/usr/share/nginx
      - .docker/nginx:/etc/nginx/conf.d/
    networks:
      - app-network
  mysql-app:
    image: mysql:5.7.22
    ports:
      - "3306:3306"
    volumes:
      - .docker/dbdata:/var/lib/mysql
    environment:
      MYSQL_DATABASE: laraveldocker
      MYSQL_ROOT_PASSWORD: 123456
    networks:
      - app-network
networks:
  app-network:
    driver: bridge
    



/*************************************************
#criando um serviço com um nome qualquer
version: '3'

services:
  laravel-app:                    #criando um serviço com um nome qualquer
    build: . ou image: wyveo/nginx-php-fpm:latest -> neste caso sem Dockerfile.                    # endereço da imagem ou local do Dockerfile (neste caso o ponto siginifica a raiz do projeto)
    ports:
      - "8080:80"                 # 8080 porta do meu host: 80 é a porta do docker nginx
    volumes:                      # docker-compose up -d -> sobe a imagem e libera o terminal  
      - ./:/usr/share/nginx       # TUDO QUE ESTIVE NA RAIZ (na rais tem o meu projeto laravel) './' IRÁ SER REFLETIDO NA PASTA /usr/share/nginx (pasta de acesso da página html)
                                  # C:\Laravel-docker\laravel-docker>docker compose up -d --build atualiza a minha imagem

  mysql-app:
      image: mysql:5.7
      ports:
        - "3306:3306"
      volumes:
        - .docker/dbdata:/var/lib/mysql          # qualqer nome (para persistir -guardar os dados do banco de dados)


      environment:
        MYSQL_DATABASE: laravel
        MYSQL_ROOT_PASSWORD: laravel
    
      

      /***************************///


  
C:\Laravel-docker\laravel-docker>docker compose up -d --build

                                
                               

    

/******************************** Dockerfile
FROM wyveo/nginx-php-fpm:latest

/***************************///
  COMANDOS

docker compose down -> para todos os containers
C:\Laravel-docker\laravel-docker>docker exec -it laravel-docker-laravel-app-1 bash 
root@612ea0ea3340:/# cd /usr/share/nginx/
root@612ea0ea3340:/usr/share/nginx# php artisan migrate
root@612ea0ea3340:/usr/share/nginx# php artisan serve

		
/***********/
PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d mysql:5.7

docker inspect meu-mysql ou | grep IPAddress

PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d -p 3306:3306 mysql:5.7

docker ps
docker ps -l
docker ps -a
docker rm -f nome


/*** LARAVEL */
### CRIANDO UM PROJETO NO LARAVEL 
laravel new projeto_laravel_via_installer (ESTA É UM AOPÇÃO)
composer create-project --prefer-dist laravel/laravel app_controle_tarefas "8.5.9"
cd app_controle_tarefas
cd public
php -S localhost:8000

ou 
da raiz do projeto:
php artisan serve 
ou
php artisan serve --port=3000

### PARA ABRIR PORTA EM OUTRO SERVIDOR
php artisan serve --host test.com --port 8080

 **********************************************************************
cd app_controle_tarefas
cd public
php artisan serve
- acessa o navegador http://localhost:8000

### DENTRO DO PROJETO CRIADO INSTALAR O LARAVEL/UI:^3.2 - versão 3.2
composer require laravel/ui:^3.2

### SE OCORRER ERRO AUMENTAR A MEMÓRIA DISPONIVEL PARA O php

-php --ini -> localiza o arquivo de configuração do php
LOCALIZA memory_limit = 1000 e altera para 
         memory_limit  = -1 e Salva

### LISTA A RELAÇÃO DE COMANDOS 
php artisan list 

DEVERA SURGIR AS OPÇÕES ABAIXO:

 ui
  ui:auth               Scaffold basic login and registration views and routes
  ui:controllers        Scaffold the authentication controllers
 vendor

### ENTENDENDO O PACOTE UI E INICIANDO A AUTENTICAÇÃO WEB NATIVA DO LARAVEL

COMANDO PARA LISTAR ROUTES: 
php artisan route:list

### php artisan ui bootstrap --auth (bootstrap ou react ou vue)
aplicando o bootstrap incluindo os recursos de autenticação;
poderia ser aplicado o bootstrap sem os recursos de autenticação;

### php artisan route:list -> mostra as rotas - ver que aumentaram as rotas

### APÓS ESSE PROCESSO O SISTEMA PEDE PARA RODAR
npm install -> instala as dependências do package.json (inclusive o bootstrap)
npm run dev -> gera os assets da aplicação de acordo com a tecnologia selecionada (bootstrap, react ou vue) -> Geralmente roda mais de uma vez para compilar tudo.

### CRIA O BANCO DE DADOS NORMALMENTE

### EXECUTA AS MIGRATIONS PADRÕES CRIADAS PARA O SISTEMA DE login
php artisan migrate -> CRIA AS TABELAS NO BANCO DE DADOS


************************************** 
INSTALANDO O COMPOSER NO UBUNTU
**************************************
sudo apt update
sudo apt install php-cli unzip

cd ~

curl -sS https://getcomposer.org/installer -o composer-setup.php

HASH=`curl -sS https://composer.github.io/installer.sig`

echo $HASH ->saída: Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74



php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer





***********************

DigitalOcean Kubernetes: novo plano de controle é mais rápido e gratuito, habilita HA para SLA de 99,95% de tempo de atividade
Produtos
Preços

Documentos
divisa suspensa

Entrar
divisa suspensa

// Tutorial //
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Publicado em 21 de maio de 2020
Ubuntu
PHP
Ubuntu 20.04
Avatar padrão
Por Erika Heidi
Advogado Desenvolvedor
Português
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Introdução
O Composer é uma ferramenta popular de gerenciamento de dependências para o PHP, criado para facilitar a instalação e a atualização das dependências principalmente do projeto. Ele controla quais outros pacotes de projeto específico dependem e são instalados para você, usando as opções apropriadas de acordo com os requisitos do projeto. O Composer também é comumente utilizado para inicializar novos projetos em frameworks PHP populares, como o Symfon e o Laravel .

Neste tutorial, você instalará e começará a usar o Composer em um sistema Ubuntu 20.04.

Pré-requisitos
Para seguir este guia, você pode acessar um servidor como usuário Ubuntu20.04 como usuário sudonão-root um firewall habilitado em seu servidor Para configurar isto, siga nosso guia Configuração do servidor inicial para o Ubuntu 20.04

Passo 1 — Instalando o PHP e as Dependências Adicionais
Além das dependências que já devem estar incluídas em seu sistema Ubuntu 20.04, como o , o Composer exige ou gitexecuta scripts PHP na linha de comando e para extrair arquivos zipados. Vamos instalar essas dependências agora.curlphp-cliunzip

primeiro, atual, gerenciador de pacotes de soluções: o cache do gerenciador de pacotes

sudo apt update
Em seguida, o seguinte comando para instalar os pacotes, execute:

sudo apt install php-cli unzip
Você será solicitado a confirmar a instalação digitando Ye, depois, ENTER.

Assim que os pré-requisitos para instalação do Composer forem instalados, você poderá seguir.

Passo 2 — Baixando e Instalando o Compositor
O Composer fornece um instalador de script escrito em PHP. Vamos baixá-lo, verificar se ele não está danificado e, em seguida, o usaremos para instalar o Composer.

Certifique-se de estar em sua pasta home. Em seguida, baixe o instalador usando o curl:

cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
Em seguida, vamos verificar se o instalador baixado corresponde ao hash SHA-384 para o instalador mais recente encontrado na página Composer Public Keys / Signatures . Para facilitar o passo de seleção, você pode usar o seguinte comando para obter programaticamente o hash mais recente da página do Composer e armazená-lo em uma variável do shell:

HASH=`curl -sS https://composer.github.io/installer.sig`
Se você quiser verificar o valor realizado, execute:

echo $HASH
Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a
Agora o código PHP a seguir, execute conforme a página de download do Composer, para verificar se o script de instalação está seguro para ser executado:

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
Você verá o seguinte resultado:

Resultado
Installer verified
Se Installer corruptvocê estiver usando o hash correto, verifique se você está usando o hash correto. Em seguida, repita o processo de verificação. Quando você tiver um instalador selecionado, você pode continuar.

Para instalar o composerglobalmente, use o seguinte comando que baixará e instalará o Composer como um comando disponível em todo o sistema chamado composer, sob /usr/local/bin:

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
Você verá um resultado semelhante com este:

Output
All settings correct for using Composer
Downloading...

Composer (version 1.10.5) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer
Para testar sua instalação, execute:

composer
Output
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.10.5 2020-04-10 11:44:22

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
...
Isso verifica que o Composer foi instalado com sucesso em seu sistema e está disponível em todo o sistema.

Nota: se você preferirá ter-lhe-ão separados separados do Composer para projeto hospedado neste servidor, você pode instalar localmente, em uma base por projeto. Este método também é útil quando o usuário do sistema não possui permissão para instalar o software disponível em todo o sistema.

Para fazer isso, use o comando php composer-setup.php. Isso irá gerar um arquivo composer.pharem seu diretório atual, que pode ser executado com o seu atual php composer.phar.

Agora podemos dar uma dependência em como usar o Compose como gerenciar.

Passo 3 — Usando o Compositor em um Projeto PHP
Os projetos PHP geralmente dependentes de bibliotecas externas, e o gerenciamento de dependências e suas versões podem ser complicados. O Composer resolve esse problema de manter um controle de projeto de extensões e dependências, também facilita o processo de descoberta, instalação e atualização de pacotes que são definidos por enquanto.

Para usar o seu projeto, você pode compor um arquivo composer.json. O arquivo composer.jsonComposer quais dependências precisa para baixar seu projeto quais serão as versões de cada pacote tem permissão para instalações e instalações. Isso é muito importante para manter seu projeto consistente e evitar a instalação de versões instáveis ​​que podem causar problemas de compatibilidade retroativa.

Você não precisa criar este arquivo manualmente - é comum ocorrer erros de sintaxe quando fizer isso. O Composer oferece uma maneira de criar um novo arquivo composer.jsoncom base na entrada do usuário, o que é uma boa escolha se você planeja compartilhar seu projeto mais tarde como um pacote público no Packagist . O Composer gera automaticamente um arquivo básico composer.jsonquando você executa um comando composer requirepara incluir uma dependência em um projeto recém-criado.

O processo de uso do Composer para instalar um pacote como uma dependência em um projeto envolve os passos a seguir:

Identifique o tipo de biblioteca que o aplicativo precisa.
uma biblioteca de código aberto adequada no agist.org , o responsável oficial de pacotes para o Compose.
Escolha o pacote de dependência.
Execute composer requirepara incluir a dependência no arquivo composer.jsone instalar o pacote.
Vamos testar isso com uma aplicação de demonstração.

O objetivo desta aplicação é transformar uma determinação determinada em uma string de URL amigável - um slug . Isso é comumente usado para converter os títulos de página para caminhos de URL (Assim como a parte final da URL para este tutorial).

Vamos começar a criar um diretório para o nosso projeto. Vamos chamá-lo de slugify :

cd ~
mkdir slugify
cd slugify
Embora não seja necessário, você pode executar agora um comando composer init para criar um arquivo composer.json detalhado para seu projeto. Como o único objetivo do nosso projeto é demonstrar como instalar dependências com o Composer, usaremos um arquivo composer.json mais simples que será gerado automaticamente quando exigirmos nosso primeiro pacote.

Agora é hora de procurar no Packagist.org por um pacote que pode nos ajudar a gerar slugs. Se você procurar pelo termo “slug” no Packagist, receberá um resultado parecido com este:

Resultados da Pesquisa do Packagist para o termo "slug"

Você verá dois números no lado direito de cada pacote na lista. O número no topo representa quantas vezes o pacote foi instalado através do Composer, e o número em baixo mostra quantas vezes um pacote foi estrelado no GitHub. De um modo geral, os pacotes com mais instalações e mais estrelas tendem a ser mais estáveis, pois mais pessoas os utilizam. Também é importante verificar a descrição do pacote para relevância para garantir que ele é o que você precisa.

Precisamos de um conversor string-to-slug A partir dos resultados da pesquisa, o pacote cocur/slugify, que aparece como o primeiro resultado naquela página, parece ser um bom candidato, com uma quantidade razoável de instalações e estrelas.

Os pacotes no Packagist têm um nome de vendor e um nome de package. Cada pacote tem um identificador único (um namespace) no mesmo formato que o GitHub utiliza para seus repositórios: vendor/package. A biblioteca que queremos instalar utiliza o namespace cocur/slugify. Você precisa de um namespace do pacote para exigi-lo em seu projeto.

Agora que você sabe exatamente qual pacote deseja instalar, você pode executar o composer require para incluí-lo como uma dependência e gerar também o arquivo composer.json para seu projeto. Uma coisa importante é observar a exigência de pacotes. O Composer rastreia as dependências no nível da aplicação e do sistema. As dependências no nível do sistema são importantes para indicar de quais módulos PHP um pacote depende. No caso do pacote cocur/slugify, ele exige um módulo PHP que ainda não instalamos.

Quando um pacote necessário depende de uma biblioteca de sistema que não está atualmente instalada em seu servidor, você receberá um erro informando qual requisito está faltando:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Your requirements could not be resolved to an installable set of packages.

  Problem 1
    - Installation request for cocur/slugify ^4.0 -> satisfiable by cocur/slugify[v4.0.0].
    - cocur/slugify v4.0.0 requires ext-mbstring * -> the requested PHP extension mbstring is missing from your system.
...
Para resolver o problema de dependência do sistema, podemos procurar pelo pacote que falta usando o apt search:

apt search mbstring
Output
Sorting... Done
Full Text Search... Done
php-mbstring/focal 2:7.4+75 all
  MBSTRING module for PHP [default]

php-patchwork-utf8/focal 1.3.1-1 all
  UTF-8 strings handling for PHP

php7.4-mbstring/focal 7.4.3-4ubuntu1 amd64
  MBSTRING module for PHP
Após localizar o nome do pacote correto, você pode utilizar o apt novamente para instalar a dependência de sistema:

sudo apt install php-mbstring
Assim que a instalação terminar, você pode executar novamente o comando composer require:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing cocur/slugify (v4.0.0): Downloading (100%)         
Writing lock file
Generating autoload files
Como você pode ver na saída, o Composer decidiu automaticamente qual versão do pacote utilizar. Se você verificar o diretório do seu projeto agora, ele irá conter dois arquivos novos: composer.json e composer.lock, e um diretório vendor:

ls -l
Output
total 12
-rw-rw-r-- 1 sammy sammy   59 May  4 13:56 composer.json
-rw-rw-r-- 1 sammy sammy 3229 May  4 13:56 composer.lock
drwxrwxr-x 4 sammy sammy 4096 May  4 13:56 vendor
O arquivo composer.lock é usado para armazenar informações sobre quais versões de cada pacote estão instaladas, e garantir que as mesmas versões sejam usadas se outra pessoa clonar seu projeto e instalar suas dependências. O diretório vendor é onde as dependências do projeto estão localizadas. Você não deve fazer commit da pasta vendor no controle de versão - você precisa apenas incluir os arquivos composer.json e composer.lock.

Ao instalar um projeto que já contém um arquivo composer.json, execute o composer install para baixar as dependências do projeto.

Vamos dar uma olhada rápida em restrições de versão. Se você verificar o conteúdo do seu arquivo composer.json, verá algo parecido com isto:

cat composer.json
Output
{
    "require": {
        "cocur/slugify": "^4.0"
    }
}
Note que há o caractere especial ^ antes do número da versão no composer.json. O Composer suporta várias restrições diferentes e formatos para definir a versão necessária do pacote, para fornecer flexibilidade enquanto também mantém seu projeto estável. O operador circunflexo (^) utilizado pelo arquivo composer.json criado automaticamente é o operador recomendado para a interoperabilidade máxima, seguindo o versionamento semântico. Neste caso, ele define 4.0 como a versão mínima compatível e permite atualizações para qualquer versão futura abaixo de 5.0.

De um modo geral, você não precisará alterar as restrições de versão em seu arquivo composer.json. No entanto, algumas situações podem exigir que você edite manualmente as restrições – por exemplo, quando uma nova versão principal da sua biblioteca requerida é liberada e você deseja atualizar, ou quando a biblioteca que você deseja usar não segue o versionamento semântico.

Aqui estão alguns exemplos para lhe dar um melhor entendimento sobre como as restrições de versão do Composer funcionam:

Restrição	Significado	Exemplo de Versões Permitidas
^1.0	>= 1.0 < 2.0	1.0, 1.2.3, 1.9.9
^1.1.0	>= 1.1.0 < 2.0	1.1.0, 1.5.6, 1.9.9
~1.0	>= 1.0 < 2.0.0	1.0, 1.4.1, 1.9.9
~1.0.0	>= 1.0.0 < 1.1	1.0.0, 1.0.4, 1.0.9
1.2.1	1.2.1	1.2.1
1.*	>= 1.0 < 2.0	1.0.0, 1.4.5, 1.9.9
1.2. *	>= 1.2 < 1.3	1.2.0, 1.2.3, 1.2.9
Para uma visualização mais detalhada das restrições de versão do Composer, consulte a documentação oficial.

A seguir, vamos ver como carregar dependências automaticamente com o Composer.

Passo 4 — Incluindo o Script Autoload
Como o PHP por si só não carrega classes automaticamente, o Composer fornece um script autoload que você pode incluir em seu projeto para obter o carregamento automático para ele. Este arquivo é gerado automaticamente pelo Composer quando você adiciona sua primeira dependência.

A única coisa que você precisa fazer é incluir o arquivo vendor/autoload.php em seus scripts PHP antes de qualquer instância de classe.

Vamos testar isso em nossa aplicação de demonstração. Abra um novo arquivo chamado test.php em seu editor de texto:

nano test.php
Adicione o código a seguir que vem no arquivo vendor/autoload.php, carrega a dependência cocur/slugify, e o utiliza para criar um slug:

test.php
<?php
require __DIR__ . '/vendor/autoload.php';

use Cocur\Slugify\Slugify;

$slugify = new Slugify();

echo $slugify->slugify('Hello World, this is a long sentence and I need to make a slug from it!');
Salve o arquivo e saia do seu editor.

Agora, execute o script.

php test.php
Isso produz a saída hello-world-this-is-a-long-sentence-and-i-need-to-make-a-slug-from-it.

As dependências precisam de atualizações quando novas versões são liberadas. Dessa forma, vamos ver como lidar com isso.

Passo 5 — Atualizando as Dependências do Projeto
Sempre que você quiser atualizar suas dependências do projeto para versões mais recentes, execute o comando update:

composer update
Isso irá verificar por versões mais recentes das bibliotecas que você requer em seu projeto. Se uma versão mais recente for encontrada e ela for compatível com a restrição de versão definida no arquivo composer.json, o Composer substituirá a versão anterior instalada. O arquivo composer.lock será atualizado para refletir essas alterações.

Você também pode atualizar uma ou mais bibliotecas específicas, especificando-as desta forma:

composer update vendor/package vendor2/package2
Certifique-se de verificar em seus arquivos composer.json e composer.lock dentro do seu sistema de controle de versão após atualizar suas dependências de modo que outros também possam instalar essas versões mais recentes.








INÍCIO:

1 instalar o docker

2 abrir wsl2/Windows ou linux
 curl -s "https://laravel.build/olw?with=mysql,redis,mailhog,minio" | bash

3 cd olw
./vendor/bin/sail up -d
	ou
4 cd olw && ./vendor/bin/sail up -d

5 ATRIBUINDO PERMISSÃO PARA A PASTA
cd .. -> sai da pasta
sudo chmod 777 olw/ -R ou sem o 'sudo' chmod 777 olw/ -R

6 CRIANDO ALIAS PARA O COMANDO ANTERIOR
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
passa a usar assim: sail ps

7 CONFIGURAR PORTAS PARA A APLICAÇÃO NO NAVEGADOR E MYSQL
.env
APP_PORT=8000

*porta do myql
FORWARD_DB_PORT=3307

8 INSTALANDO DEPENDÊNCIA AO PROJETO
./vendor/bin/sail composer require laravel/breeze --dev

9 DEIXAR TELA DE AUTENTICAÇÃO PRONTA, ROTA AUTENTICADA, TAWINDCSS INSTALADO E INERTIA INSTALADO
./vendor/bin/sail artisan breeze:install vue 
ou
./vendor/bin/sail art breeze:install vue


10 RODAR AS MIGRATES PADRÕES DO PROJETO AI JÁ PODE CADASTRAR USUÁRIOS PARA LOGIN:
./vendor/bin/sail art migrate

11 


/*******************************************/
2a AULA:

O PROJETO CONSISTE EM RECEBER DADOS DE UMA API (punkapi.com) DE INFORMAÇÕES SOBRE CERVEJAS, VAMOS CONSTRUIR AS ROTAS PARA CONSUMIR A API E CRIAR A ESTRUTURA PARA O RELATÓRIO QUE IREMOS GERAR EM EXCEL E ENVIAR PARA O STORAGE...
1 CRIAR ROTAS:
code .
olw/routes/web.php


sail up -d -> SOBE O CONTAINER localhost:8000 (nesse projeto)

Route::get('/beers', fn()=> 'Olw - testando a rota /beers');

**************************************************
obs:
- laravel.com/api -> acesso a documentação do código;
- in line paramets for vscode -> extensão para vscode para exibir o nome dos métodos na hora que codificar;
- fira code -> extensão para fonte no vscode

Copilot vs Tabnine, qual preferem? (pesquisar sobre)
Link para extensões vscode:
https://github.com/icarojobs/vscode-useful-extensions
*************************************************


Route::get('/beers', fn()=> 'Olw - testando a rota /beers')
                             ->middleware(['auth']);

* FLUXO PADRÃO DO MVC-LARAVEL: 
life cicle: sai do usuário pelo navegador, insomnia ou postman -> passa pelo index.php(pasta public) -> passa pelos arquivos do bootstrap retornando uma instância da aplicação -> passa pelo kernel do http (carrega mais instâncias) -> Service provider -> despacha a requisição pro Router -> Cai no arquivo Web.php -> Middleware (se tiver, geralmente tem os globais) -> Controller (faz as regras de negócio e pode chamar outras classes como Serviços por exemplo)
-> Retorna uma view ou um json (No caso estamos usando inértia, ele não vai reinderizar a 'view.blade' padrão, ele vai reinderizar componente vue.js através do inértia.).


* EM VEZ DE USAR A FUNÇÃO AQUI NA ROTA CRIAMOS UM CONTROLLER:
obs.: ​dica: php artisan make:controller -r cria o Resource também.

sail artisan make:controller BeerController
ou 
sail art make:controller BeerController -> CRIA O ARQUIVO BeerController.php na pasta app/Http/Controllers
->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index()
    {
    return 'Virgu & Beer & Code'
    }
}

* NO ARQUIVO DE ROTAS Web.php CHAMA O BeersController:

importante importar o Controller <nomeDoController>+<CTRL=ENTER:
use App\Http\Controllers\BeerController;

Route::get('/beers', [BeerController::class, 'index'])
                        ->middleware(['auth']);


* PRECISAMOS CRIAR UM MÉTODO PARA PEGAR A LISTA, LISTAR OS DADOS DA API (listar as bebidas de https://api.punkapi.com/v2 ->
VAMOS CRIAR UMA NOVA CLASSE de serviços em app/Sevices/PunkapiService.php

* O LARAVEL POSSUI UM RECURSO CHAMADO HTTPClient que abstrai o uso de uma ferramenta chama guzeo, esse guzeo é o client http mais comum para php, com ele fazemos requisições pra diversos serviços web dentro do php para outras url, ele é robusto, então o laravel simplifica importando o recurso que faz tudo por 'detrás dos panos':

PunkapiService.php

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::get('https://api.punkapi.com/v2/beers');
    }
}

E NO BeerController.php fica:
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index()
    {
    //return 'Virgu & Beer & Code';
    $service = new PunkapiService;

    return $service->getBeers();
    }
}

* TRATE É CARACTERÍSTICA QUE A CLASSE ADQUIRE (pode ter mesmos métodos e atributos substituindo o recurso de um classe extender várias classes que não tem no php, a trate é uma forma de fazer isso. O service  é uma outra camada na maioria das vezes abstrair seviços que vc vai consumir, por exemplo API.

Estando logado, os dados da api já serão exibidos em localhost:8000/beers, se usar um aplicativo cliente tipo insomnia pode apresentar os dados também, melhor comentar a linha de de autenticação da rota:
Route::get('/beers', [BeerController::class, 'index']);
linha de autenticação da rota // ->middleware(['auth']);

* ESSA API PERMITE FAZER FILTROS VIA PARÂMETROS NA PRÓPRIA ROTA. PRIMEIRO VAMOS REFATORAR O CÓDIO, A CLASSE PunkapiService.php:

USO DE CONFIG E MACRO


Vamos alterar a url, primeiro acessando a pasta config da raiz do projeto e criar o arquivo punkapi.php. O que acontece é que o config(pasta config da raiz) carrega todos os arquivos da pasta e permite que sejam acessados via funções simples(HELPERS), isso é muito legal porque podemos acessar esses arquivos de configurações de qualquer lugar do projeto: 

<?php

return [
    'url' => env('PUNK_BASE_URL', 'https://api.punkapi.com/v2')
];

Usando o helper env significa dizer que, se não houver a constante PUNK_BASE_URL setada no arquivo .env do projeto, seu valor será o segundo parâmetro: http://api.punkapi.com/v2 e no arquivo PunkapiService.php da pasta app/Services fica:

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::get('/beers');
    }
}

MACRO é uma forma de criar funções customizadas:
 em app\Providers vamos acessar o arquivo AppServiceProvider.php que é uma classe que tem dois métodos register e boot. No método boot vamos chamar o método Http do laravel e chamar o método macro, no primeiro parâmetro será um nome atribuído à função e e o segundo uma clausure (uma função).
Neste arquivo é passado o arquivo de configuração da url (em 'config/punkapi.php') além de tokens, headers,...
 

use Illuminate\Support\Facades\Http; -> deve ser importado
E a função boot fica:

  public function boot()
    {
        Http::macro('punkapi', function(){
            return Http::acceptJson()
            ->baseUrl(config('punkapi.url'));
        });
    }

Então criamos uma macro(uma função customizada) chamada punkapi que já retorna o client com accept/Json no Header e com o baseUrl configurado lá do arquivo /config/punkapi.php e se estiver setado no .env pegará de lá.

/app/Services/PunkapiService.php fica:

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
        return Http::punkapi()->get('/beers');
    }
}

*obs.: a baseUrl poderia ser setada no construtor, que pode setar token também.(uma outra abordagem para versão sem macros);

->Testamos o retorno Json em localhost:8000/beers.

Refatorando o arquivo PunkapiService.php: O client Http não lança exceção e podemos forçar o retorno em modo Json:
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
       // return Http::punkapi()->get('/beers');
       return Http::punkapi()
            ->get('/beers')
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Podemos testar forçando um erro alterando a constante PUNKAPI_BASE_URL criada em /config/punkapi.php, vamos atribuir um valor diferente no arquivo .env:

PUNKAPI_BASE_URL="adfjklj878"

Podemos usar a função retry tem dois parâmetros, o número de tentativas pra buscar a requisição e o intervalo entre elas. Refatorando o código fica:
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers()
    {
       // return Http::punkapi()->get('/beers');
       return Http::punkapi()
            ->get('/beers')
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

- Quando sai a exceção nao deveriamos retornar o erro em json por ser um api neste caso estamos usamos um app web e não uma api. E usaríamos o Route Api.

Refatorando o método boot de /app/Providers/AppServiceProvider.php, inserindo o retry():

     */
    public function boot()
    {
        Http::macro('punkapi', function(){
            return Http::acceptJson()
            ->baseUrl(config('punkapi.url'))
            ->retry(3,100);
        });
    }
}

comando de help

* sail composer dump-autoload
* Verificar Nome do arquivo se bate com o nome das rotas(Classes criadas e importar o nome errado);
* inteliphense

Refatorando BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index()
    {

    $service = new PunkapiService();

    return $service->getBeers();
    }
}

Em vez de instanciar o método PunkapiService() dentro de index, vamos passar por parâmetro de index() declarando seu Próprio nome (PunkapiService) como tipo. Fica assim:

<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers();
    }
}

Assim usamos feactures do php(injeção de dependências) e ao mesmo tempo feactures do laravel. Em vez de criar uma instância dentro do método index, vamos injetar a classe como parâmetro para o método index(), ficando index($service) e a instância de dentro da função passa como parâmetro de 'tipo da variável'. Isso quebra a cadeia de dependência entre as classes.
Assim, o método index ganha independência não mais dependendo da instância de new PunkapiService e passamos a olhar a função index em si.
Assim, o Laravel tenta fazer um binding, um match, o laravel tenta encontrar alguma classe PunkapiService e cria uma instância dessa classe e usa ali como parâmetro. Se não fizer assim, lá em Rotas teria que ser passado como parâmetro o que fica desnecessário.
Não poderia ser feito se na classe PunkapiService existisse o construtor para atribuir valores automaticamente à classe. Assim podemos usar porque não precisamos passar nenhum valor.

ADICIONAR OS FILTROS:
Vamos filtrar o retorno api com os seguintes itens: beer_name, food, ibu_gt, malte:

var_dump($v)
die();
dd($variável)
benchmarck -> ?

/*****REFATORA PARA TESTE alterando BeerController.php e PunkapiService.php
BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(
        'heineken',
        'cheese',
        'corn',
        45
    );
    }
}

PunkapiService.php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers(
        string $beer_name,
        string $food,
        string $malt,
        string $ibu_gt
    )
    {
        $params = get_defined_vars();

        dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Resultado do debug no insomnia ou no navegador:
array:4 [▼ // app/Services/PunkapiService.php:18
  "beer_name" => "heineken"
  "food" => "cheese"
  "malt" => "corn"
  "ibu_gt" => "45"
]
//* fim teste

Refatorando:

class PunkapiService
{
    public function getBeers(
        string $beer_name = null,
        string $food = null,
        string $malt = null,
        string $ibu_gt = null
    )
    {
        $params = get_defined_vars();

        dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

Assim quando não passar o valor para a chave ele exibirá a chave e o valor Null, vamos refatorar para não exibir nem a chave englobando get_defined_vers() com array_filter no arquivo PunkapiService.php:

$params = array_filter(get_defined_vars());

<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(
        'heineken',
        'cheese',
        'corn',
       // 45 -> Esse não é passado
    );
    }
}


array:3 [▼ // app/Services/PunkapiService.php:18
  "beer_name" => "heineken"
  "food" => "cheese"
  "malt" => "corn"
	Aqui não exibiu o valor 45
]


USANDO A FUNÇÃO NAMED_ARGS passamos só os parâmetros que precisamos retornar da api e o php com essa função saberá qual a posição dela no array de argumentos passados como parâmetro sem a necessidade de seguir a mesma sequência dos argumentos:
class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
    return $service->getBeers(food: 'cheese');
    }
}

REFATORANDO:
BeerController.php
<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index( Request $request, PunkapiService $service)
    {
    return $service->getBeers(...$request->all());
    }
}

PunkapiService.php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers(
        string $beer_name = null,
        string $food = null,
        string $malt = null,
        string $ibu_gt = null
    )
    {
        $params = array_filter(get_defined_vars());

     //   dd($params);

        return Http::punkapi()
            ->get('/beers', $params)
            ->throw()  // Exceção em caso de erro
            ->json();   // Força o retorno em formato Json
    }
}

CRIANDO UMA REQUEST
sail artisan make:request BeerRequest
/app/Http/Requests/BeerRequest.php

* clouser é uma função passada como parâmetro


AGRUPANDO AS ROTAS 2:01MINUTO 
open laravel week | MVC, rotas , services, api, filas, redis laravel Excel e S3 | Mosturação










 
































/**************************************/

sail share

sail artisan sail:publish ->coloca em uma pasta na raiz chamada docker

sail --help

sail artisan optimizer:clear

sail ps

sail build --no-cache -> faz o bild da aplicação. (dá um sail down  por precaução antes.)










/*********************************

root@DELLAGS:~# curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash

Dockerfile

root@DELLAGS:~/example-app# docker exec -it example-app-mysql-1 bash


FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
RUN chmod -R 755 /usr/share/nginx/storage/*
RUN ln -s public html

.env (do composer)

DB_CONNECTION=mysql
DB_HOST=mysql-app (serviço do mysql no docker-compose.yaml)
DB_PORT=3306
DB_DATABASE=laraveldockerdb
DB_USERNAME=root
DB_PASSWORD=123456



docker-compose.yaml

version: '3'

services:
  laraveldocker-app:
    build: .
    ports:
      - "3003:80"
    volumes:
      - ./:/usr/share/nginx
      - .docker/nginx:/etc/nginx/conf.d/
    networks:
      - app-network
  mysql-app:
    image: mysql:5.7.22
    ports:
      - "3306:3306"
    volumes:
      - .docker/dbdata:/var/lib/mysql
    environment:
      MYSQL_DATABASE: laraveldocker
      MYSQL_ROOT_PASSWORD: 123456
    networks:
      - app-network
networks:
  app-network:
    driver: bridge
    



/*************************************************
#criando um serviço com um nome qualquer
version: '3'

services:
  laravel-app:                    #criando um serviço com um nome qualquer
    build: . ou image: wyveo/nginx-php-fpm:latest -> neste caso sem Dockerfile.                    # endereço da imagem ou local do Dockerfile (neste caso o ponto siginifica a raiz do projeto)
    ports:
      - "8080:80"                 # 8080 porta do meu host: 80 é a porta do docker nginx
    volumes:                      # docker-compose up -d -> sobe a imagem e libera o terminal  
      - ./:/usr/share/nginx       # TUDO QUE ESTIVE NA RAIZ (na rais tem o meu projeto laravel) './' IRÁ SER REFLETIDO NA PASTA /usr/share/nginx (pasta de acesso da página html)
                                  # C:\Laravel-docker\laravel-docker>docker compose up -d --build atualiza a minha imagem

  mysql-app:
      image: mysql:5.7
      ports:
        - "3306:3306"
      volumes:
        - .docker/dbdata:/var/lib/mysql          # qualqer nome (para persistir -guardar os dados do banco de dados)


      environment:
        MYSQL_DATABASE: laravel
        MYSQL_ROOT_PASSWORD: laravel
    
      

      /***************************///


  
C:\Laravel-docker\laravel-docker>docker compose up -d --build

                                
                               

    

/******************************** Dockerfile
FROM wyveo/nginx-php-fpm:latest

/***************************///
  COMANDOS

docker compose down -> para todos os containers
C:\Laravel-docker\laravel-docker>docker exec -it laravel-docker-laravel-app-1 bash 
root@612ea0ea3340:/# cd /usr/share/nginx/
root@612ea0ea3340:/usr/share/nginx# php artisan migrate
root@612ea0ea3340:/usr/share/nginx# php artisan serve

		
/***********/
PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d mysql:5.7

docker inspect meu-mysql ou | grep IPAddress

PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d -p 3306:3306 mysql:5.7

docker ps
docker ps -l
docker ps -a
docker rm -f nome


/*** LARAVEL */
### CRIANDO UM PROJETO NO LARAVEL 
laravel new projeto_laravel_via_installer (ESTA É UM AOPÇÃO)
composer create-project --prefer-dist laravel/laravel app_controle_tarefas "8.5.9"
cd app_controle_tarefas
cd public
php -S localhost:8000

ou 
da raiz do projeto:
php artisan serve 
ou
php artisan serve --port=3000

### PARA ABRIR PORTA EM OUTRO SERVIDOR
php artisan serve --host test.com --port 8080

 **********************************************************************
cd app_controle_tarefas
cd public
php artisan serve
- acessa o navegador http://localhost:8000

### DENTRO DO PROJETO CRIADO INSTALAR O LARAVEL/UI:^3.2 - versão 3.2
composer require laravel/ui:^3.2

### SE OCORRER ERRO AUMENTAR A MEMÓRIA DISPONIVEL PARA O php

-php --ini -> localiza o arquivo de configuração do php
LOCALIZA memory_limit = 1000 e altera para 
         memory_limit  = -1 e Salva

### LISTA A RELAÇÃO DE COMANDOS 
php artisan list 

DEVERA SURGIR AS OPÇÕES ABAIXO:

 ui
  ui:auth               Scaffold basic login and registration views and routes
  ui:controllers        Scaffold the authentication controllers
 vendor

### ENTENDENDO O PACOTE UI E INICIANDO A AUTENTICAÇÃO WEB NATIVA DO LARAVEL

COMANDO PARA LISTAR ROUTES: 
php artisan route:list

### php artisan ui bootstrap --auth (bootstrap ou react ou vue)
aplicando o bootstrap incluindo os recursos de autenticação;
poderia ser aplicado o bootstrap sem os recursos de autenticação;

### php artisan route:list -> mostra as rotas - ver que aumentaram as rotas

### APÓS ESSE PROCESSO O SISTEMA PEDE PARA RODAR
npm install -> instala as dependências do package.json (inclusive o bootstrap)
npm run dev -> gera os assets da aplicação de acordo com a tecnologia selecionada (bootstrap, react ou vue) -> Geralmente roda mais de uma vez para compilar tudo.

### CRIA O BANCO DE DADOS NORMALMENTE

### EXECUTA AS MIGRATIONS PADRÕES CRIADAS PARA O SISTEMA DE login
php artisan migrate -> CRIA AS TABELAS NO BANCO DE DADOS


************************************** 
INSTALANDO O COMPOSER NO UBUNTU
**************************************
sudo apt update
sudo apt install php-cli unzip

cd ~

curl -sS https://getcomposer.org/installer -o composer-setup.php

HASH=`curl -sS https://composer.github.io/installer.sig`

echo $HASH ->saída: Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74



php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer





***********************

DigitalOcean Kubernetes: novo plano de controle é mais rápido e gratuito, habilita HA para SLA de 99,95% de tempo de atividade
Produtos
Preços

Documentos
divisa suspensa

Entrar
divisa suspensa

// Tutorial //
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Publicado em 21 de maio de 2020
Ubuntu
PHP
Ubuntu 20.04
Avatar padrão
Por Erika Heidi
Advogado Desenvolvedor
Português
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Introdução
O Composer é uma ferramenta popular de gerenciamento de dependências para o PHP, criado para facilitar a instalação e a atualização das dependências principalmente do projeto. Ele controla quais outros pacotes de projeto específico dependem e são instalados para você, usando as opções apropriadas de acordo com os requisitos do projeto. O Composer também é comumente utilizado para inicializar novos projetos em frameworks PHP populares, como o Symfon e o Laravel .

Neste tutorial, você instalará e começará a usar o Composer em um sistema Ubuntu 20.04.

Pré-requisitos
Para seguir este guia, você pode acessar um servidor como usuário Ubuntu20.04 como usuário sudonão-root um firewall habilitado em seu servidor Para configurar isto, siga nosso guia Configuração do servidor inicial para o Ubuntu 20.04

Passo 1 — Instalando o PHP e as Dependências Adicionais
Além das dependências que já devem estar incluídas em seu sistema Ubuntu 20.04, como o , o Composer exige ou gitexecuta scripts PHP na linha de comando e para extrair arquivos zipados. Vamos instalar essas dependências agora.curlphp-cliunzip

primeiro, atual, gerenciador de pacotes de soluções: o cache do gerenciador de pacotes

sudo apt update
Em seguida, o seguinte comando para instalar os pacotes, execute:

sudo apt install php-cli unzip
Você será solicitado a confirmar a instalação digitando Ye, depois, ENTER.

Assim que os pré-requisitos para instalação do Composer forem instalados, você poderá seguir.

Passo 2 — Baixando e Instalando o Compositor
O Composer fornece um instalador de script escrito em PHP. Vamos baixá-lo, verificar se ele não está danificado e, em seguida, o usaremos para instalar o Composer.

Certifique-se de estar em sua pasta home. Em seguida, baixe o instalador usando o curl:

cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
Em seguida, vamos verificar se o instalador baixado corresponde ao hash SHA-384 para o instalador mais recente encontrado na página Composer Public Keys / Signatures . Para facilitar o passo de seleção, você pode usar o seguinte comando para obter programaticamente o hash mais recente da página do Composer e armazená-lo em uma variável do shell:

HASH=`curl -sS https://composer.github.io/installer.sig`
Se você quiser verificar o valor realizado, execute:

echo $HASH
Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a
Agora o código PHP a seguir, execute conforme a página de download do Composer, para verificar se o script de instalação está seguro para ser executado:

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
Você verá o seguinte resultado:

Resultado
Installer verified
Se Installer corruptvocê estiver usando o hash correto, verifique se você está usando o hash correto. Em seguida, repita o processo de verificação. Quando você tiver um instalador selecionado, você pode continuar.

Para instalar o composerglobalmente, use o seguinte comando que baixará e instalará o Composer como um comando disponível em todo o sistema chamado composer, sob /usr/local/bin:

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
Você verá um resultado semelhante com este:

Output
All settings correct for using Composer
Downloading...

Composer (version 1.10.5) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer
Para testar sua instalação, execute:

composer
Output
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.10.5 2020-04-10 11:44:22

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
...
Isso verifica que o Composer foi instalado com sucesso em seu sistema e está disponível em todo o sistema.

Nota: se você preferirá ter-lhe-ão separados separados do Composer para projeto hospedado neste servidor, você pode instalar localmente, em uma base por projeto. Este método também é útil quando o usuário do sistema não possui permissão para instalar o software disponível em todo o sistema.

Para fazer isso, use o comando php composer-setup.php. Isso irá gerar um arquivo composer.pharem seu diretório atual, que pode ser executado com o seu atual php composer.phar.

Agora podemos dar uma dependência em como usar o Compose como gerenciar.

Passo 3 — Usando o Compositor em um Projeto PHP
Os projetos PHP geralmente dependentes de bibliotecas externas, e o gerenciamento de dependências e suas versões podem ser complicados. O Composer resolve esse problema de manter um controle de projeto de extensões e dependências, também facilita o processo de descoberta, instalação e atualização de pacotes que são definidos por enquanto.

Para usar o seu projeto, você pode compor um arquivo composer.json. O arquivo composer.jsonComposer quais dependências precisa para baixar seu projeto quais serão as versões de cada pacote tem permissão para instalações e instalações. Isso é muito importante para manter seu projeto consistente e evitar a instalação de versões instáveis ​​que podem causar problemas de compatibilidade retroativa.

Você não precisa criar este arquivo manualmente - é comum ocorrer erros de sintaxe quando fizer isso. O Composer oferece uma maneira de criar um novo arquivo composer.jsoncom base na entrada do usuário, o que é uma boa escolha se você planeja compartilhar seu projeto mais tarde como um pacote público no Packagist . O Composer gera automaticamente um arquivo básico composer.jsonquando você executa um comando composer requirepara incluir uma dependência em um projeto recém-criado.

O processo de uso do Composer para instalar um pacote como uma dependência em um projeto envolve os passos a seguir:

Identifique o tipo de biblioteca que o aplicativo precisa.
uma biblioteca de código aberto adequada no agist.org , o responsável oficial de pacotes para o Compose.
Escolha o pacote de dependência.
Execute composer requirepara incluir a dependência no arquivo composer.jsone instalar o pacote.
Vamos testar isso com uma aplicação de demonstração.

O objetivo desta aplicação é transformar uma determinação determinada em uma string de URL amigável - um slug . Isso é comumente usado para converter os títulos de página para caminhos de URL (Assim como a parte final da URL para este tutorial).

Vamos começar a criar um diretório para o nosso projeto. Vamos chamá-lo de slugify :

cd ~
mkdir slugify
cd slugify
Embora não seja necessário, você pode executar agora um comando composer init para criar um arquivo composer.json detalhado para seu projeto. Como o único objetivo do nosso projeto é demonstrar como instalar dependências com o Composer, usaremos um arquivo composer.json mais simples que será gerado automaticamente quando exigirmos nosso primeiro pacote.

Agora é hora de procurar no Packagist.org por um pacote que pode nos ajudar a gerar slugs. Se você procurar pelo termo “slug” no Packagist, receberá um resultado parecido com este:

Resultados da Pesquisa do Packagist para o termo "slug"

Você verá dois números no lado direito de cada pacote na lista. O número no topo representa quantas vezes o pacote foi instalado através do Composer, e o número em baixo mostra quantas vezes um pacote foi estrelado no GitHub. De um modo geral, os pacotes com mais instalações e mais estrelas tendem a ser mais estáveis, pois mais pessoas os utilizam. Também é importante verificar a descrição do pacote para relevância para garantir que ele é o que você precisa.

Precisamos de um conversor string-to-slug A partir dos resultados da pesquisa, o pacote cocur/slugify, que aparece como o primeiro resultado naquela página, parece ser um bom candidato, com uma quantidade razoável de instalações e estrelas.

Os pacotes no Packagist têm um nome de vendor e um nome de package. Cada pacote tem um identificador único (um namespace) no mesmo formato que o GitHub utiliza para seus repositórios: vendor/package. A biblioteca que queremos instalar utiliza o namespace cocur/slugify. Você precisa de um namespace do pacote para exigi-lo em seu projeto.

Agora que você sabe exatamente qual pacote deseja instalar, você pode executar o composer require para incluí-lo como uma dependência e gerar também o arquivo composer.json para seu projeto. Uma coisa importante é observar a exigência de pacotes. O Composer rastreia as dependências no nível da aplicação e do sistema. As dependências no nível do sistema são importantes para indicar de quais módulos PHP um pacote depende. No caso do pacote cocur/slugify, ele exige um módulo PHP que ainda não instalamos.

Quando um pacote necessário depende de uma biblioteca de sistema que não está atualmente instalada em seu servidor, você receberá um erro informando qual requisito está faltando:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Your requirements could not be resolved to an installable set of packages.

  Problem 1
    - Installation request for cocur/slugify ^4.0 -> satisfiable by cocur/slugify[v4.0.0].
    - cocur/slugify v4.0.0 requires ext-mbstring * -> the requested PHP extension mbstring is missing from your system.
...
Para resolver o problema de dependência do sistema, podemos procurar pelo pacote que falta usando o apt search:

apt search mbstring
Output
Sorting... Done
Full Text Search... Done
php-mbstring/focal 2:7.4+75 all
  MBSTRING module for PHP [default]

php-patchwork-utf8/focal 1.3.1-1 all
  UTF-8 strings handling for PHP

php7.4-mbstring/focal 7.4.3-4ubuntu1 amd64
  MBSTRING module for PHP
Após localizar o nome do pacote correto, você pode utilizar o apt novamente para instalar a dependência de sistema:

sudo apt install php-mbstring
Assim que a instalação terminar, você pode executar novamente o comando composer require:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing cocur/slugify (v4.0.0): Downloading (100%)         
Writing lock file
Generating autoload files
Como você pode ver na saída, o Composer decidiu automaticamente qual versão do pacote utilizar. Se você verificar o diretório do seu projeto agora, ele irá conter dois arquivos novos: composer.json e composer.lock, e um diretório vendor:

ls -l
Output
total 12
-rw-rw-r-- 1 sammy sammy   59 May  4 13:56 composer.json
-rw-rw-r-- 1 sammy sammy 3229 May  4 13:56 composer.lock
drwxrwxr-x 4 sammy sammy 4096 May  4 13:56 vendor
O arquivo composer.lock é usado para armazenar informações sobre quais versões de cada pacote estão instaladas, e garantir que as mesmas versões sejam usadas se outra pessoa clonar seu projeto e instalar suas dependências. O diretório vendor é onde as dependências do projeto estão localizadas. Você não deve fazer commit da pasta vendor no controle de versão - você precisa apenas incluir os arquivos composer.json e composer.lock.

Ao instalar um projeto que já contém um arquivo composer.json, execute o composer install para baixar as dependências do projeto.

Vamos dar uma olhada rápida em restrições de versão. Se você verificar o conteúdo do seu arquivo composer.json, verá algo parecido com isto:

cat composer.json
Output
{
    "require": {
        "cocur/slugify": "^4.0"
    }
}
Note que há o caractere especial ^ antes do número da versão no composer.json. O Composer suporta várias restrições diferentes e formatos para definir a versão necessária do pacote, para fornecer flexibilidade enquanto também mantém seu projeto estável. O operador circunflexo (^) utilizado pelo arquivo composer.json criado automaticamente é o operador recomendado para a interoperabilidade máxima, seguindo o versionamento semântico. Neste caso, ele define 4.0 como a versão mínima compatível e permite atualizações para qualquer versão futura abaixo de 5.0.

De um modo geral, você não precisará alterar as restrições de versão em seu arquivo composer.json. No entanto, algumas situações podem exigir que você edite manualmente as restrições – por exemplo, quando uma nova versão principal da sua biblioteca requerida é liberada e você deseja atualizar, ou quando a biblioteca que você deseja usar não segue o versionamento semântico.

Aqui estão alguns exemplos para lhe dar um melhor entendimento sobre como as restrições de versão do Composer funcionam:

Restrição	Significado	Exemplo de Versões Permitidas
^1.0	>= 1.0 < 2.0	1.0, 1.2.3, 1.9.9
^1.1.0	>= 1.1.0 < 2.0	1.1.0, 1.5.6, 1.9.9
~1.0	>= 1.0 < 2.0.0	1.0, 1.4.1, 1.9.9
~1.0.0	>= 1.0.0 < 1.1	1.0.0, 1.0.4, 1.0.9
1.2.1	1.2.1	1.2.1
1.*	>= 1.0 < 2.0	1.0.0, 1.4.5, 1.9.9
1.2. *	>= 1.2 < 1.3	1.2.0, 1.2.3, 1.2.9
Para uma visualização mais detalhada das restrições de versão do Composer, consulte a documentação oficial.

A seguir, vamos ver como carregar dependências automaticamente com o Composer.

Passo 4 — Incluindo o Script Autoload
Como o PHP por si só não carrega classes automaticamente, o Composer fornece um script autoload que você pode incluir em seu projeto para obter o carregamento automático para ele. Este arquivo é gerado automaticamente pelo Composer quando você adiciona sua primeira dependência.

A única coisa que você precisa fazer é incluir o arquivo vendor/autoload.php em seus scripts PHP antes de qualquer instância de classe.

Vamos testar isso em nossa aplicação de demonstração. Abra um novo arquivo chamado test.php em seu editor de texto:

nano test.php
Adicione o código a seguir que vem no arquivo vendor/autoload.php, carrega a dependência cocur/slugify, e o utiliza para criar um slug:

test.php
<?php
require __DIR__ . '/vendor/autoload.php';

use Cocur\Slugify\Slugify;

$slugify = new Slugify();

echo $slugify->slugify('Hello World, this is a long sentence and I need to make a slug from it!');
Salve o arquivo e saia do seu editor.

Agora, execute o script.

php test.php
Isso produz a saída hello-world-this-is-a-long-sentence-and-i-need-to-make-a-slug-from-it.

As dependências precisam de atualizações quando novas versões são liberadas. Dessa forma, vamos ver como lidar com isso.

Passo 5 — Atualizando as Dependências do Projeto
Sempre que você quiser atualizar suas dependências do projeto para versões mais recentes, execute o comando update:

composer update
Isso irá verificar por versões mais recentes das bibliotecas que você requer em seu projeto. Se uma versão mais recente for encontrada e ela for compatível com a restrição de versão definida no arquivo composer.json, o Composer substituirá a versão anterior instalada. O arquivo composer.lock será atualizado para refletir essas alterações.

Você também pode atualizar uma ou mais bibliotecas específicas, especificando-as desta forma:

composer update vendor/package vendor2/package2
Certifique-se de verificar em seus arquivos composer.json e composer.lock dentro do seu sistema de controle de versão após atualizar suas dependências de modo que outros também possam instalar essas versões mais recentes.

Conclusão





***********
Algoritmo "CalculoMedia2"
// Disciplina: Lógica de programação
// Professor : Antonio Carlos Nicolodi
// Descrição : calculo da média aritimética
// Autor     : Professor Antonio
// Data atual: 01/04/2015
var
// Seção de Declarações
   v1, v2, total: Real
   sinal : Caracter
Inicio
// Seção dos Comandos
   Escreva ("Digite o primeiro valor: ")
   Leia (v1)
   Escreva ("Digite a operação + - * / : ")
   Leia (sinal)
   Escreva ("Digite o segundo valor: ")
   Leia (v2)

   Se sinal = "+" entao
   total <- v1 + v2
   Escreva("O Resultado é: ", total)
   Senao
   Se sinal = "-" entao
   total <- v1 - v2
   Escreva("O Resultado é: ", total)
   Senao
   Se sinal = "*" entao
   total <- v1 * v2
   Escreva("O Resultado é: ", total)


   Senao
     Escreva("OPERAÇÃO INVÁLIDA! ")



      Escreval("total")
   fimse
Fimalgoritmo

****
COMANDOS DOCKER
root@DELLAGS:~# curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash

root@DELLAGS:~/example-app# ./vendor/bin/sail  artisan migrate --seed -> criar o banco de dados e copular dados;

Dockerfile

root@DELLAGS:~/example-app# docker exec -it example-app-mysql-1 bash


FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
RUN chmod -R 755 /usr/share/nginx/storage/*
RUN ln -s public html

.env (do composer)

DB_CONNECTION=mysql
DB_HOST=mysql-app (serviço do mysql no docker-compose.yaml)
DB_PORT=3306
DB_DATABASE=laraveldockerdb
DB_USERNAME=root
DB_PASSWORD=123456



docker-compose.yaml

version: '3'

services:
  laraveldocker-app:
    build: .
    ports:
      - "3003:80"
    volumes:
      - ./:/usr/share/nginx
      - .docker/nginx:/etc/nginx/conf.d/
    networks:
      - app-network
  mysql-app:
    image: mysql:5.7.22
    ports:
      - "3306:3306"
    volumes:
      - .docker/dbdata:/var/lib/mysql
    environment:
      MYSQL_DATABASE: laraveldocker
      MYSQL_ROOT_PASSWORD: 123456
    networks:
      - app-network
networks:
  app-network:
    driver: bridge
    



/*************************************************
#criando um serviço com um nome qualquer
version: '3'

services:
  laravel-app:                    #criando um serviço com um nome qualquer
    build: . ou image: wyveo/nginx-php-fpm:latest -> neste caso sem Dockerfile.                    # endereço da imagem ou local do Dockerfile (neste caso o ponto siginifica a raiz do projeto)
    ports:
      - "8080:80"                 # 8080 porta do meu host: 80 é a porta do docker nginx
    volumes:                      # docker-compose up -d -> sobe a imagem e libera o terminal  
      - ./:/usr/share/nginx       # TUDO QUE ESTIVE NA RAIZ (na rais tem o meu projeto laravel) './' IRÁ SER REFLETIDO NA PASTA /usr/share/nginx (pasta de acesso da página html)
                                  # C:\Laravel-docker\laravel-docker>docker compose up -d --build atualiza a minha imagem

  mysql-app:
      image: mysql:5.7
      ports:
        - "3306:3306"
      volumes:
        - .docker/dbdata:/var/lib/mysql          # qualqer nome (para persistir -guardar os dados do banco de dados)


      environment:
        MYSQL_DATABASE: laravel
        MYSQL_ROOT_PASSWORD: laravel
    
      

      /***************************///


  
C:\Laravel-docker\laravel-docker>docker compose up -d --build

                                
                               

    

/******************************** Dockerfile
FROM wyveo/nginx-php-fpm:latest

/***************************///
  COMANDOS

docker compose down -> para todos os containers
C:\Laravel-docker\laravel-docker>docker exec -it laravel-docker-laravel-app-1 bash 
root@612ea0ea3340:/# cd /usr/share/nginx/
root@612ea0ea3340:/usr/share/nginx# php artisan migrate
root@612ea0ea3340:/usr/share/nginx# php artisan serve

		
/***********/
PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d mysql:5.7

docker inspect meu-mysql ou | grep IPAddress

PS C:\Users\alber> docker run -e MYSQL_ROOT_PASSWORD=root --name meu-mysql -d -p 3306:3306 mysql:5.7

docker ps
docker ps -l
docker ps -a
docker rm -f nome


/*** LARAVEL */
### CRIANDO UM PROJETO NO LARAVEL 
laravel new projeto_laravel_via_installer (ESTA É UM AOPÇÃO)
composer create-project --prefer-dist laravel/laravel app_controle_tarefas "8.5.9"
cd app_controle_tarefas
cd public
php -S localhost:8000

ou 
da raiz do projeto:
php artisan serve 
ou
php artisan serve --port=3000

### PARA ABRIR PORTA EM OUTRO SERVIDOR
php artisan serve --host test.com --port 8080

 **********************************************************************
cd app_controle_tarefas
cd public
php artisan serve
- acessa o navegador http://localhost:8000

### DENTRO DO PROJETO CRIADO INSTALAR O LARAVEL/UI:^3.2 - versão 3.2
composer require laravel/ui:^3.2

### SE OCORRER ERRO AUMENTAR A MEMÓRIA DISPONIVEL PARA O php

-php --ini -> localiza o arquivo de configuração do php
LOCALIZA memory_limit = 1000 e altera para 
         memory_limit  = -1 e Salva

### LISTA A RELAÇÃO DE COMANDOS 
php artisan list 

DEVERA SURGIR AS OPÇÕES ABAIXO:

 ui
  ui:auth               Scaffold basic login and registration views and routes
  ui:controllers        Scaffold the authentication controllers
 vendor

### ENTENDENDO O PACOTE UI E INICIANDO A AUTENTICAÇÃO WEB NATIVA DO LARAVEL

COMANDO PARA LISTAR ROUTES: 
php artisan route:list

### php artisan ui bootstrap --auth (bootstrap ou react ou vue)
aplicando o bootstrap incluindo os recursos de autenticação;
poderia ser aplicado o bootstrap sem os recursos de autenticação;

### php artisan route:list -> mostra as rotas - ver que aumentaram as rotas

### APÓS ESSE PROCESSO O SISTEMA PEDE PARA RODAR
npm install -> instala as dependências do package.json (inclusive o bootstrap)
npm run dev -> gera os assets da aplicação de acordo com a tecnologia selecionada (bootstrap, react ou vue) -> Geralmente roda mais de uma vez para compilar tudo.

### CRIA O BANCO DE DADOS NORMALMENTE

### EXECUTA AS MIGRATIONS PADRÕES CRIADAS PARA O SISTEMA DE login
php artisan migrate -> CRIA AS TABELAS NO BANCO DE DADOS


************************************** 
INSTALANDO O COMPOSER NO UBUNTU
**************************************
sudo apt update
sudo apt install php-cli unzip

cd ~

curl -sS https://getcomposer.org/installer -o composer-setup.php

HASH=`curl -sS https://composer.github.io/installer.sig`

echo $HASH ->saída: Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74



php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer





***********************

DigitalOcean Kubernetes: novo plano de controle é mais rápido e gratuito, habilita HA para SLA de 99,95% de tempo de atividade
Produtos
Preços

Documentos
divisa suspensa

Entrar
divisa suspensa

// Tutorial //
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Publicado em 21 de maio de 2020
Ubuntu
PHP
Ubuntu 20.04
Avatar padrão
Por Erika Heidi
Advogado Desenvolvedor
Português
Como Instalar e Utilizar o Composer no Ubuntu 20.04
Introdução
O Composer é uma ferramenta popular de gerenciamento de dependências para o PHP, criado para facilitar a instalação e a atualização das dependências principalmente do projeto. Ele controla quais outros pacotes de projeto específico dependem e são instalados para você, usando as opções apropriadas de acordo com os requisitos do projeto. O Composer também é comumente utilizado para inicializar novos projetos em frameworks PHP populares, como o Symfon e o Laravel .

Neste tutorial, você instalará e começará a usar o Composer em um sistema Ubuntu 20.04.

Pré-requisitos
Para seguir este guia, você pode acessar um servidor como usuário Ubuntu20.04 como usuário sudonão-root um firewall habilitado em seu servidor Para configurar isto, siga nosso guia Configuração do servidor inicial para o Ubuntu 20.04

Passo 1 — Instalando o PHP e as Dependências Adicionais
Além das dependências que já devem estar incluídas em seu sistema Ubuntu 20.04, como o , o Composer exige ou gitexecuta scripts PHP na linha de comando e para extrair arquivos zipados. Vamos instalar essas dependências agora.curlphp-cliunzip

primeiro, atual, gerenciador de pacotes de soluções: o cache do gerenciador de pacotes

sudo apt update
Em seguida, o seguinte comando para instalar os pacotes, execute:

sudo apt install php-cli unzip
Você será solicitado a confirmar a instalação digitando Ye, depois, ENTER.

Assim que os pré-requisitos para instalação do Composer forem instalados, você poderá seguir.

Passo 2 — Baixando e Instalando o Compositor
O Composer fornece um instalador de script escrito em PHP. Vamos baixá-lo, verificar se ele não está danificado e, em seguida, o usaremos para instalar o Composer.

Certifique-se de estar em sua pasta home. Em seguida, baixe o instalador usando o curl:

cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
Em seguida, vamos verificar se o instalador baixado corresponde ao hash SHA-384 para o instalador mais recente encontrado na página Composer Public Keys / Signatures . Para facilitar o passo de seleção, você pode usar o seguinte comando para obter programaticamente o hash mais recente da página do Composer e armazená-lo em uma variável do shell:

HASH=`curl -sS https://composer.github.io/installer.sig`
Se você quiser verificar o valor realizado, execute:

echo $HASH
Output
e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a
Agora o código PHP a seguir, execute conforme a página de download do Composer, para verificar se o script de instalação está seguro para ser executado:

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
Você verá o seguinte resultado:

Resultado
Installer verified
Se Installer corruptvocê estiver usando o hash correto, verifique se você está usando o hash correto. Em seguida, repita o processo de verificação. Quando você tiver um instalador selecionado, você pode continuar.

Para instalar o composerglobalmente, use o seguinte comando que baixará e instalará o Composer como um comando disponível em todo o sistema chamado composer, sob /usr/local/bin:

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
Você verá um resultado semelhante com este:

Output
All settings correct for using Composer
Downloading...

Composer (version 1.10.5) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer
Para testar sua instalação, execute:

composer
Output
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.10.5 2020-04-10 11:44:22

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
...
Isso verifica que o Composer foi instalado com sucesso em seu sistema e está disponível em todo o sistema.

Nota: se você preferirá ter-lhe-ão separados separados do Composer para projeto hospedado neste servidor, você pode instalar localmente, em uma base por projeto. Este método também é útil quando o usuário do sistema não possui permissão para instalar o software disponível em todo o sistema.

Para fazer isso, use o comando php composer-setup.php. Isso irá gerar um arquivo composer.pharem seu diretório atual, que pode ser executado com o seu atual php composer.phar.

Agora podemos dar uma dependência em como usar o Compose como gerenciar.

Passo 3 — Usando o Compositor em um Projeto PHP
Os projetos PHP geralmente dependentes de bibliotecas externas, e o gerenciamento de dependências e suas versões podem ser complicados. O Composer resolve esse problema de manter um controle de projeto de extensões e dependências, também facilita o processo de descoberta, instalação e atualização de pacotes que são definidos por enquanto.

Para usar o seu projeto, você pode compor um arquivo composer.json. O arquivo composer.jsonComposer quais dependências precisa para baixar seu projeto quais serão as versões de cada pacote tem permissão para instalações e instalações. Isso é muito importante para manter seu projeto consistente e evitar a instalação de versões instáveis ​​que podem causar problemas de compatibilidade retroativa.

Você não precisa criar este arquivo manualmente - é comum ocorrer erros de sintaxe quando fizer isso. O Composer oferece uma maneira de criar um novo arquivo composer.jsoncom base na entrada do usuário, o que é uma boa escolha se você planeja compartilhar seu projeto mais tarde como um pacote público no Packagist . O Composer gera automaticamente um arquivo básico composer.jsonquando você executa um comando composer requirepara incluir uma dependência em um projeto recém-criado.

O processo de uso do Composer para instalar um pacote como uma dependência em um projeto envolve os passos a seguir:

Identifique o tipo de biblioteca que o aplicativo precisa.
uma biblioteca de código aberto adequada no agist.org , o responsável oficial de pacotes para o Compose.
Escolha o pacote de dependência.
Execute composer requirepara incluir a dependência no arquivo composer.jsone instalar o pacote.
Vamos testar isso com uma aplicação de demonstração.

O objetivo desta aplicação é transformar uma determinação determinada em uma string de URL amigável - um slug . Isso é comumente usado para converter os títulos de página para caminhos de URL (Assim como a parte final da URL para este tutorial).

Vamos começar a criar um diretório para o nosso projeto. Vamos chamá-lo de slugify :

cd ~
mkdir slugify
cd slugify
Embora não seja necessário, você pode executar agora um comando composer init para criar um arquivo composer.json detalhado para seu projeto. Como o único objetivo do nosso projeto é demonstrar como instalar dependências com o Composer, usaremos um arquivo composer.json mais simples que será gerado automaticamente quando exigirmos nosso primeiro pacote.

Agora é hora de procurar no Packagist.org por um pacote que pode nos ajudar a gerar slugs. Se você procurar pelo termo “slug” no Packagist, receberá um resultado parecido com este:

Resultados da Pesquisa do Packagist para o termo "slug"

Você verá dois números no lado direito de cada pacote na lista. O número no topo representa quantas vezes o pacote foi instalado através do Composer, e o número em baixo mostra quantas vezes um pacote foi estrelado no GitHub. De um modo geral, os pacotes com mais instalações e mais estrelas tendem a ser mais estáveis, pois mais pessoas os utilizam. Também é importante verificar a descrição do pacote para relevância para garantir que ele é o que você precisa.

Precisamos de um conversor string-to-slug A partir dos resultados da pesquisa, o pacote cocur/slugify, que aparece como o primeiro resultado naquela página, parece ser um bom candidato, com uma quantidade razoável de instalações e estrelas.

Os pacotes no Packagist têm um nome de vendor e um nome de package. Cada pacote tem um identificador único (um namespace) no mesmo formato que o GitHub utiliza para seus repositórios: vendor/package. A biblioteca que queremos instalar utiliza o namespace cocur/slugify. Você precisa de um namespace do pacote para exigi-lo em seu projeto.

Agora que você sabe exatamente qual pacote deseja instalar, você pode executar o composer require para incluí-lo como uma dependência e gerar também o arquivo composer.json para seu projeto. Uma coisa importante é observar a exigência de pacotes. O Composer rastreia as dependências no nível da aplicação e do sistema. As dependências no nível do sistema são importantes para indicar de quais módulos PHP um pacote depende. No caso do pacote cocur/slugify, ele exige um módulo PHP que ainda não instalamos.

Quando um pacote necessário depende de uma biblioteca de sistema que não está atualmente instalada em seu servidor, você receberá um erro informando qual requisito está faltando:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Your requirements could not be resolved to an installable set of packages.

  Problem 1
    - Installation request for cocur/slugify ^4.0 -> satisfiable by cocur/slugify[v4.0.0].
    - cocur/slugify v4.0.0 requires ext-mbstring * -> the requested PHP extension mbstring is missing from your system.
...
Para resolver o problema de dependência do sistema, podemos procurar pelo pacote que falta usando o apt search:

apt search mbstring
Output
Sorting... Done
Full Text Search... Done
php-mbstring/focal 2:7.4+75 all
  MBSTRING module for PHP [default]

php-patchwork-utf8/focal 1.3.1-1 all
  UTF-8 strings handling for PHP

php7.4-mbstring/focal 7.4.3-4ubuntu1 amd64
  MBSTRING module for PHP
Após localizar o nome do pacote correto, você pode utilizar o apt novamente para instalar a dependência de sistema:

sudo apt install php-mbstring
Assim que a instalação terminar, você pode executar novamente o comando composer require:

composer require cocur/slugify
Output
Using version ^4.0 for cocur/slugify
./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing cocur/slugify (v4.0.0): Downloading (100%)         
Writing lock file
Generating autoload files
Como você pode ver na saída, o Composer decidiu automaticamente qual versão do pacote utilizar. Se você verificar o diretório do seu projeto agora, ele irá conter dois arquivos novos: composer.json e composer.lock, e um diretório vendor:

ls -l
Output
total 12
-rw-rw-r-- 1 sammy sammy   59 May  4 13:56 composer.json
-rw-rw-r-- 1 sammy sammy 3229 May  4 13:56 composer.lock
drwxrwxr-x 4 sammy sammy 4096 May  4 13:56 vendor
O arquivo composer.lock é usado para armazenar informações sobre quais versões de cada pacote estão instaladas, e garantir que as mesmas versões sejam usadas se outra pessoa clonar seu projeto e instalar suas dependências. O diretório vendor é onde as dependências do projeto estão localizadas. Você não deve fazer commit da pasta vendor no controle de versão - você precisa apenas incluir os arquivos composer.json e composer.lock.

Ao instalar um projeto que já contém um arquivo composer.json, execute o composer install para baixar as dependências do projeto.

Vamos dar uma olhada rápida em restrições de versão. Se você verificar o conteúdo do seu arquivo composer.json, verá algo parecido com isto:

cat composer.json
Output
{
    "require": {
        "cocur/slugify": "^4.0"
    }
}
Note que há o caractere especial ^ antes do número da versão no composer.json. O Composer suporta várias restrições diferentes e formatos para definir a versão necessária do pacote, para fornecer flexibilidade enquanto também mantém seu projeto estável. O operador circunflexo (^) utilizado pelo arquivo composer.json criado automaticamente é o operador recomendado para a interoperabilidade máxima, seguindo o versionamento semântico. Neste caso, ele define 4.0 como a versão mínima compatível e permite atualizações para qualquer versão futura abaixo de 5.0.

De um modo geral, você não precisará alterar as restrições de versão em seu arquivo composer.json. No entanto, algumas situações podem exigir que você edite manualmente as restrições – por exemplo, quando uma nova versão principal da sua biblioteca requerida é liberada e você deseja atualizar, ou quando a biblioteca que você deseja usar não segue o versionamento semântico.

Aqui estão alguns exemplos para lhe dar um melhor entendimento sobre como as restrições de versão do Composer funcionam:

Restrição	Significado	Exemplo de Versões Permitidas
^1.0	>= 1.0 < 2.0	1.0, 1.2.3, 1.9.9
^1.1.0	>= 1.1.0 < 2.0	1.1.0, 1.5.6, 1.9.9
~1.0	>= 1.0 < 2.0.0	1.0, 1.4.1, 1.9.9
~1.0.0	>= 1.0.0 < 1.1	1.0.0, 1.0.4, 1.0.9
1.2.1	1.2.1	1.2.1
1.*	>= 1.0 < 2.0	1.0.0, 1.4.5, 1.9.9
1.2. *	>= 1.2 < 1.3	1.2.0, 1.2.3, 1.2.9
Para uma visualização mais detalhada das restrições de versão do Composer, consulte a documentação oficial.

A seguir, vamos ver como carregar dependências automaticamente com o Composer.

Passo 4 — Incluindo o Script Autoload
Como o PHP por si só não carrega classes automaticamente, o Composer fornece um script autoload que você pode incluir em seu projeto para obter o carregamento automático para ele. Este arquivo é gerado automaticamente pelo Composer quando você adiciona sua primeira dependência.

A única coisa que você precisa fazer é incluir o arquivo vendor/autoload.php em seus scripts PHP antes de qualquer instância de classe.

Vamos testar isso em nossa aplicação de demonstração. Abra um novo arquivo chamado test.php em seu editor de texto:

nano test.php
Adicione o código a seguir que vem no arquivo vendor/autoload.php, carrega a dependência cocur/slugify, e o utiliza para criar um slug:

test.php
<?php
require __DIR__ . '/vendor/autoload.php';

use Cocur\Slugify\Slugify;

$slugify = new Slugify();

echo $slugify->slugify('Hello World, this is a long sentence and I need to make a slug from it!');
Salve o arquivo e saia do seu editor.

Agora, execute o script.

php test.php
Isso produz a saída hello-world-this-is-a-long-sentence-and-i-need-to-make-a-slug-from-it.

As dependências precisam de atualizações quando novas versões são liberadas. Dessa forma, vamos ver como lidar com isso.

Passo 5 — Atualizando as Dependências do Projeto
Sempre que você quiser atualizar suas dependências do projeto para versões mais recentes, execute o comando update:

composer update
Isso irá verificar por versões mais recentes das bibliotecas que você requer em seu projeto. Se uma versão mais recente for encontrada e ela for compatível com a restrição de versão definida no arquivo composer.json, o Composer substituirá a versão anterior instalada. O arquivo composer.lock será atualizado para refletir essas alterações.

Você também pode atualizar uma ou mais bibliotecas específicas, especificando-as desta forma:

composer update vendor/package vendor2/package2
Certifique-se de verificar em seus arquivos composer.json e composer.lock dentro do seu sistema de controle de versão após atualizar suas dependências de modo que outros também possam instalar essas versões mais recentes.
 -->
exit
pwd
exit
curl
curl -s "https://laravel.build/example-app?with=mysql,redis" |bash
docker
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
docker
apt-cache policy docker-ce
docker
curl
curl --help
apt install docker
systemctl status docker
docker
exit
docker
ver
sudo apt-get update
sudo apt-get install ./docker-desktop-<version>-<arch>.deb
sudo apt-get install     ca-certificates     curl     gnupg     lsb-release
sudo mkdir -p /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
echo   "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-compose-plugin
sudo service docker start
sudo docker run hello-world
docker
exit
pwd
ls
cd Desktop
ls
mkdir ProjetosDocker
ls
cd ProjetosDocker/
ls
curl
curl -s "https://laravel.build/example-app?with=mysql,redir" | bash
docker
docker run
systemctl status docker
sudo systemctl status docker
wget -qO- https://get.docker.com/ | sh
curl -L https://github.com/docker/compose/releases/download/1.6.2/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
docker-compose version
docker-machine version
docker
curl -s "https://laravel.build/example-app?with=mysql,redir" | bash
docker ls
docker --help
docker start
docker start --help
docker start -i
docker image list
cd ..
cd var
cd /var
cd run
ls
docker
docker run
docker run *
cd /
ls
pwd
cd rn
cd run
ls
docker
docker run
exit
docker
sytemctl status
sudo systemctl
cmd
docker
docker run
curl
curl --help
curl -V
docker -v
code .
cls
clear
docker
clear
docker ps
sudo sevice docker start
sudo service docker start
docker ps
sudo service docker start
docker ps
apt get install docker
apt install docker
docker ps
sudo service docker start
docker ps
sudo service docker start
sudo service docker-start
curl -s "https://laravel.build/example-app?wit..." | bash
docker
docker ps
exit
docker start
docker ps
docker start
docker ps
docker
docker ps
docker --version
docker run hello-world
docker image ls
Enable WSL 2 Windows features
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned
lsb_release -a
dotnet --version
sudo wget https://packages.microsoft.com/config/ubuntu/20.04/packages-microsoft-prod.deb -O packages-microsoft-prod.deb
sudo dpkg -i packages-microsoft-prod.deb
sudo apt-get update
sudo apt-get install apt-transport-https
sudo apt-get update
sudo apt-get install dotnet-sdk-3.1
dotnet --version
code .
docker
sudo apt install gnome-terminal
docker
docker ps
docker start
sudo apt remove docker-desktop
sudo apt-get install ./docker-desktop-<version>-<arch>.deb
sudo apt-get update
sudo apt-get install ./docker-desktop-<version>-<arch>.deb
systemctl --user enable docker-desktop
systemctl --user stop docker-desktop
wsl.exe -l -v
wsl
apt install wsl
code .
curl -s https://laravel.build/example-app | bash
docker
apt get install docker
sudo su
clear
docker ps
y
pwd
ls
cd ProjetosDocker/
pwd
php -v
cls
clear
curl -s "https://laravel.build/example-app?with=mysql,redis,pgsql" |bash
sudo apt-get curl
curl
curl --manual
clear
docker ps
curl -s "https://laravel.build/example-app?with=mysql,redis,pgsql" |bash
docker ps
docker
docker ps
exit
ls
./vendor/bin/sail up
./vendor/bin/sail up -D
./vendor/bin/sail up -d
./vendor/bin/sail ps
./vendor/bin/sail composer require/breeze --dev
./vendor/bin/sail compose require/breeze --dev
./vendor/bin/sail composer require laravel/breeze --dev
sudo su
./vendor/bin/sail composer require laravel/breese --dev
docker ps
docker stop
docker ps
./vendor/bin/sail stop
./vendor/bin/sail composer require laravel/breese --dev
docker start
docker ps
./vendor/bin/sail up
./vendor/bin/sail up -d
docker ps
docker stop
./vendor/bin/sail stop
docker ps
docker ls
docker -ls
docker -l
docker ls
docker --help
docker rmi
docker rm
docker rm --help
docker rm -f
docker ls
list
docker ps
docker start
docker run
docker ps
curl -s "https://laravel.build/example-app?with=mysql,redis" | bash
docker ps
docker ls
ls
cd ProjetosDocker/
cd ..
cd example-app/
code .
docker run -d -p 80:80 docker/getting-started
docker up -d
clear
docker run -d -p 80:80 docker/getting-started
docker up 0094
docker run 7b0aed04f7c251a872242ec415f2d99551385af0c8ceb8409af2ffa9c3fedf6a -d
docker
docker ps
code .
docker
clear
clear ps
docker ps
sudo apt install curl 
exit
pwd
./vendor/bin/sail up -d
cls
clear

./vendor/bin/sail up -d
docker ps
clear
docker ps
./vendor/bin/sail up -d
docker kill
docker stop
doker ps
docker
exit
curl -s "https://laravel.build/laravel-curso?with=mysql,redis,mailhog" |bash
cd laravel-curso/
./vendeor/bin/sail up -d
./vendor/bin/sail up -d
docker ps
code .
./vendor/bin/sail up -d
curl "http://localhost/tutorial/"    -X GET    -H 'host: localhost'    -H 'connection: keep-alive'    -H 'sec-ch-ua: "Chromium";v="106", "Google Chrome";v="106", "Not;A=Brand";v="99"'    -H 'sec-ch-ua-mobile: ?0'    -H 'sec-ch-ua-platform: "Windows"'    -H 'upgrade-insecure-requests: 1'    -H 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'    -H 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'    -H 'sec-fetch-site: same-origin'    -H 'sec-fetch-mode: navigate'    -H 'sec-fetch-dest: document'    -H 'referer: http://localhost/'    -H 'accept-encoding: gzip, deflate, br'    -H 'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7,es;q=0.6'    -H 'cookie: _ga=GA1.1.171439518.1657383921; _ga_E7H41BFJ0Q=GS1.1.1657462355.2.1.1657462635.0; pma_lang=pt';
clear
./vendor/bin/sail up -d
pwd
ls
cd ProjetosDocker/
ls
cd example-app
ls
cd ..
cd example-app
ls
cd ..
rm -rf example-app
ls
rm-rf laravel-curso/
ls
rm -rf laravel-curso/
clear
ls
cd ProjetosDocker/
ls
curl -s "https://laravel.build/laravel-curso?with=mysql,redis,mailhog" |bash
cd laravel-curso && ./vendor/bin/sail up -d
code .
pwd
ls
cd ProjetosDocker/
ls
rm -rf laravel-curso/
ls
clear
curl -s "https://laravel.build/laravel-curso?with=mysql" |bash
pwd
ls
cd ProjetosDocker/
ls
rm -rf laravel-curso/
ls
cd ..
cd laravel-curso/
ls
exit
php -S localhost:8080
apt install php-cli
php -S localhost:8080
docker run -d -p 80:80 docker/getting-started
curl -s "https://laravel.build/laravel-curso?with=mysql" |bash
docker ps
docker ls
docker -l
docker l
docker ps
docker exec
docker exec -it docker/getting-started bash
docker ps
docker exec -it 6ec4e45db98a bash
docker exec -it 6ec4e45db98a 
docker exec --help
docker exec -it 6ec4e45db98a bash
clear
docker ps
code .
ls
cd laravel-curso/
ls
docker ps
cd ..
ls
pwd
cd socket/
ls
cd ..
cd ProjetosDocker/
ls
cd ..
rm -rf laravel-curso/
ls
cd ..
ls
clear
docker ps
docker exec -it docker/getting-started: bash
docker exec -it docker/getting-started bash
docker exec -it getting-started bash
docker exec -it 6ec4e45db98a bash
docker exec -it 6ec4e45db98a 
ls
cd socket/
ls
cd ..
cd snap
ls
cd ..
cd \
cd /
ls
cd var
ls
cd lib
ls
cd docker
ls
cd containers
ls
cd ..
cd image
ls
cd ..
sudo service docker status
status docker
sudo status docker
sudo service status docker
sudo service docker
sudo service docker status
docker start
cd ..
pwd
ls
cd usr
ls
ls -l
cd ..
docker ps
docker
docker ps
apt-get docker
apt-get install docker 
docker ps
apt-get uninstall docker 
pwd
ls
cd ..
ls
cd usr
ls
cd bin
ls
cd ..
cd lig
cd lib
ls
clear
ls
cd ..
ls
cd usr
ls
ls docker
cld
cd ..
ls
cd ProjetosDocker/
ls
sudo apt update
sudo apt install apt-transport-https ca-certificates curl software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
sudo apt update
apt-cache policy docker-ce
sudo apt install docker-ce
sudo systemctl status docker
wsl --set-version Ubuntu 2
sudo apt update
sudo apt install apt-transport-https ca-certificates curl software-properties-common
sudo apt install build-essential
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
sudo apt update
sudo apt install docker-ce
sudo docker run hello-world
início do docker de serviço sudo
sudo service docker start
sudo docker run hello-world
docker ps
sudo etc
cd etc
ls
cd ..
ls
cd etc
ls
vi init.d
cd ..
ls
sudo apt install docker-ce
sudo service docker status
sudo service docker start
docker ps
ls
cd var/run
ls
vi docker.sock
docker.sock
cd user
ls
cd ..
ls
cd run
ls
cd docker
ls
cd ..
sudo service docker start
docker ps
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
sudo docker run hello-world
docker ps
sudo service docker start
sudo service status
sudo service docker start
sudo curl -L "https://github.com/docker/compose/releases/download/1.24.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
docker-compose --version
ls
cd ProjetosDocker/
code .
curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash
docker start
docker ps
sudo apt install docker-ce
docker start
sudo service docker start
curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash
docker ps
exit
docker ps
ls
docker ps
clear
docker ps
curl -s "https://laravel.build/laravel-9-course?with=mysql,redis,mailhog" | bash
cd laravel-9-course && ./vendor/bin/sail up -d
docker ps
clear
docker ps
docker ps -l
./vendor/bin/sail up -d
php artisan about
./vendor/bin/sail up -d
docker ps
docker-compose up -d
./vendor/bin/sail up -d
pwd
ls
cd laravel-9-course/
./vendor/bin/sail up -d
docker exec -it b6870e2dd73e bash
clear
ls
cd ..
clear
ls
cd laravel-9-course/
ls
php artisan serve
php artisan
clear
ls
code .
docker ps
docker ps -l
docker exec -it laravel-9-course-laravel.test-1 bash
ls
php artisan serve
vi
vi docker-compose.yml
code .
exit
php artisan serve
exit
php -v
mysql -v
mysql -u root
mysql -u root -p
docker ps
docker ps -l
exit
ls
rm -rf laravel-9-course/
ls
cd example-app/
ls
php -v
mysql -u root -p
apt install mysql-client-core-8.0
mysql -u root -p
jdflkjadsl
curl -s https://laravel.build/example-app | bash
cd example-app && ./vendor/bin/sail up -d
ls
php -S localhost:8000
php artisan serve
ls
cd public/
php -S localhost:8000
php artisan serve
clear
./vendor/bin/sail up -d
php artisan cache:clear
./vendor/bin/sail php artisan cache:clear
./vendor/bin/sail up -d
./vendor/bin/sail php artisan route:clear
./vendor/bin/sail down
./vendor/bin/sail php artisan route:clear
dir
cd public/
php -S localhost:80
cd ..
./vendor/bin/sail up -d
./vendor/bin/sail down
curl -s "https://laravel.build/olw?with=mysql,redis,mailhog,minio" | bash
LS
ls
cd ProjetosDocker/
ls
cd olw
ls
cd ..
cd olw
ls
sail artisan serve
sail php artisan serve
cls
clear
ls
code .
docker ps
clear
docker ps
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail up -d
code .
sail down
ls
cd ..
ls
version
ls
cd ..
ls
cd var
ls
cls
ls
cd www
cd /
ls
cd var
ls
cd www
cd ..
ls
cd home
ls
cd alber
ls
cd ..
laravel -v
laravel -V
composer -V
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
sail ps
sail down
clear
./vendor/bin/sail ps
./vendor/bin/sail down
./vendor/bin/sail up -d
php artisan --version
./vendor/bin/sail down
./vendor/bin/sail ps
docker up -d
docker run -d
docker ps
./vendor/bin/sail ps
./vendor/bin/sail up -d
docke ps
docker ps
docker exec -it ffc7fa4e28ed bash
docker ps
sail up -d
cd ..
./vendor/bin/sail up -d
docker ps
./vendor/bin/sail up -d
ls
cd home
ls
cd alber/
ls
cd ..
ls
cd ..
ls
cd home
ls
cd var
ls
cd ..
cd var
ls
cd ..
ls
docker ps
exit
wsl --set-version <Distro> 2, – wsl --set-default-version 2
wsl --importe visando WSL 2wsl --export
cls
clear
wsl
wsl2
wsl.exe -l -v
wsl.exe --set-default-version 2
docker ps
./vendor/bin/sail up -d
docker run
docker run olw-laravel.test-1
start-container
docker start-container
docker up start-container
docker run start-container
docker down
clear
docker ps
ls
cd olw
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
ls
cd ..
ls
rm -rf olw
ls
rm -rf ProjetosDocker/
rm -rf example-app/
ls
exit
curl.exe -L -o ubuntu-2004.appx https://aka.ms/wslubuntu2004
wsl --set-default-version 2
Error: 0x1bc
For information on key differences with WSL 2 please visit https://aka.ms/wsl2
[    0.363323] 9p: Installing v9fs 9p2000 file system support
[    0.363336] FS-Cache: Netfs '9p' registered for caching
[    0.398989] 9pnet: Installing 9P2000 support
wsl --update
apt-get upgrade
Get-WindowsOptionalFeature -Online -FeatureName Microsoft-Windows-Subsystem-Linux
sudo service ssh status
debug1: sshd version OpenSSH_7.2, OpenSSL 1.0.2g  1 Mar 2016
debug1: key_load_private: incorrect passphrase supplied to decrypt private key
debug1: key_load_public: No such file or directory
Could not load host key: /etc/ssh/ssh_host_rsa_key
debug1: key_load_private: No such file or directory
debug1: key_load_public: No such file or directory
Could not load host key: /etc/ssh/ssh_host_dsa_key
debug1: key_load_private: No such file or directory
debug1: key_load_public: No such file or directory
Could not load host key: /etc/ssh/ssh_host_ecdsa_key
debug1: key_load_private: No such file or directory
debug1: key_load_public: No such file or directory
Could not load host key: /etc/ssh/ssh_host_ed25519_key
sudo apt-get purge openssh-server
sudo apt-get install openssh-server
wsl --install
wsl --update
wsl --shutdown
exit
sudo apt update
sudo apt install gedit -y
sudo apt-get install     ca-certificates     curl     gnupg     lsb-release
sudo mkdir -p /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
echo   "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-compose-plugin
sudo service docker start
sudo docker run hello-world
sudo su docker run hello-world
docker ps
ps aux | grep docker
sudo service docker status
systemctl start docker
gpasswd -a $USER docker
systemctl start docker
sudo service docker start
docke ps
docker ps
sudo service docker start
sudo service --status-all
sudo service docker start
systemctl enable docker
systemctl restart docker
systemctl enable docker
sudo service docker start
/var/run/docker.sock
sudo nohup docker daemon -H tcp://0.0.0.0:2375 -H unix:///var/run/docker.sock
sudo usermod -aG docker $USER
reboot
docker ps
sudo /var/run/docker.sock
cd  /var/run/docker.sock
cd  /var/run/
ls
cd WSL
ls
cd ..
ls
cd ..
ls
curl -s "https://laravel.build/olw?with=mysql,redis,mailhog,minio" | bash
docker ps
docker start
service docker start
sudo service docker status
sudo service docker start
sudo service docker status
sudo service docker start
sudo service docker status
& $Env:ProgramFiles\Docker\Docker\DockerCli.exe -SwitchDaemon .
docker pull mcr.microsoft.com/windows/nanoserver:ltsc2022
dockerd --debug
docker -H tcp://0.0.0.0:2375 ps
sudo dockerd -H unix:///var/run/docker.sock -H tcp://192.168.59.106 -H tcp://10.10.10.2sudo dockerd -H unix:///var/run/docker.sock -H tcp://192.168.59.106 -H tcp://10.10.10.2
docker --tlsverify ps
docker ps
docker -H :5555 pull ubuntu
docker -H tcp://127.0.0.1:2375 pull ubuntu
docker 
docker ps
docker version
docker ps
systemclt start docker 
systemctl start docker 
docker 
docker -H
docker -H --host list
docker -H --host
docker -H --help
docker ps
curl -s "https://laravel.build/olw?with=mysql,redis,mailhog,minio" | bash
cd olw && ./vendor/bin/sail up
cd olw && ./vendor/bin/sail up -d
cd ..
cd olw
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail tinker
cls
clear
sail php --version
sail share
sudo chmod 777 storage/ -R
sudo chmod 0777 storage/ -R
./vendor/bin/sail up -d
./vendor/bin/sail down
ls
cd olw
./vendor/bin/sail up -d
sudo chmod 777 storage/ -R
./vendor/bin/sail up -d
code .
./vendor/bin/sail down
curl -s "https://laravel.build/example-app | bash
cd ..
curl -s "https://laravel.build/example-app | bash
ls
curl -s https://laravel.build/example-app | bash
cd example-app/
./vendor/bin/sail up -d
sudo chmod 777 storage/ -R
./vendor/bin/sail up -d
sail share
./vendor/bin/sail share
mysql 
myqsl -u root -p
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
ls
sail ps
./vendor/bin/sail ps
docker ps
cd example-app/
sail ps
sail down
composer global require beyondcode/expose
expose default-server sa-1
expose token 89e90595-06a7-4245-99c9-03536b633447
composer global require beyondcode/expose
ls
php artisan serve
cd public/
php -S localhost:8080
clear
cd..
cd ..
cd example-app/
clear
sail up -d
code .
ls
code .
sail down
cd ..
docker ps
clear
./vendor/bin/sail up -d
cd example-app/
./vendor/bin/sail up -d
code .
./vendor/bin/sail down
php artisan route:list
sail artisan route:list
sail
cls
clear
./vendor/bin/sail list
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
/ls
mysql -u root -p
mysql -u sail -p
mysql
docker ps
ls
cd example-app/
./vendor/bin/sail up -d
code .
cd ..
mysql
mysql --version
mysql -u sail -p
cd ..
ls
cd example-app/
clear
mysql -u root -p
cd..
ls
cd ..
sail down
./vendor/bin/sail down
docker ps
cd example-app/
sail down
./vendor/bin/sail down
ls
cd ..
ls
sail up -d
./vendor/bin/sail up -d
cd example-app/
./vendor/bin/sail up -d
docker ps
./vendor/bin/sail up -d
mysql -u root -p
mysql -u sail -p
exit
mysql -u sail -p
./vendor/bin/sail up -d
mysql -u sail -p
clear
./vendor/bin/sail down
mysql -u sail -p
exit
docker ps
docker ps -l
docker ps -a
clear
ls
cd ex
cd example-app/
ls
./vendor/bin/sail up -d
code .
mysql --version
mysql -u sail -p
mysql -u root -p
mysql -u sail -p
mysql --version
myql -u root -p
mysql -u root -p
ls
sudo
sudo chmod 777 storage/ -R
ls
cd ..
ls
cd ..
ls
sudo chmod 777 var/ -R
mysql -u root -p
ls
docker ps
cd example-app/
sail down
./vendor/bin/sail down
./vendor/bin/sail up -d
code .
ls
cd ..
ls
cd ..
ls
cd ..
ls
cd home
ls
cd ..
cd root
ls
cd example-app/
ls
cd ..
docker ps
docker exec -it example-app-mysql-1 bash
ls
cd example-app/
ping localhost:3306
ping 0.0.0.0:3306
clear
./vendor/bin/sail down
sail ps
./vendor/bin/sail ps
ls
cd ..
pwd
ls
cd olw
ls
cd ..
cd example-app/
sail ps
./vendor/bin/sail up -d
sail artisan migrate --seed
p
./vendor/bin/sail  artisan migrate --seed
./vendor/bin/sail artisan make:controller UserController
php artisan make:controller UserController
./vendor/bin/sail artisan make:controller UserController
php artisan make:controller UserController
clear
docker ps
./vendor/bin/sail  up -d
php -v
docker ps
docker run hello-world
exit
./vendor/bin/sail artisan serve
docker ps
clear
./vendor/bin/sail  up -d
mysql --v
mysql -v
mysql -u root -p
cd ..
mysql -u root -p
clear
mysql --version;
composer
clear
docker ps -l
docker ps
docker run hello-world
clear
docker ps -l
ls
cd example-app/
./vendor/bin/sail up -d
code .
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
code .
./vendor/bin/sail down
./vendor/bin/sail up -d
ping
ping 127.0.0.1:3307
ping 127.0.0.1:3306
ping 127.0.0.1
ping 127.0.0.1:80
ping 127.0.0.1:6379
ping 127.0.0.1:3306
ping 127.0.0.1:3307
./vendor/bin/sail down
./vendor/bin/sail up -d
code .
./vendor/bin/sail down
./vendor/bin/sail up -d
code .
./vendor/bin/sail down
./vendor/bin/sail up -d
code .
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
code .
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
code .
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
code .
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
clear
docker ps
docker exec -it example-app-mysql-1
docker exec -it example-app-mysql-1 bash
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
ls
cd example-app/
docker ps
ls
php artisan serve
clear
ls
cd vendor
cd bin
ls
vi sail
clear
code .
ls
cd sail
cd ..
cd vendor
cd bin
sail up -d
cd ..
./vendor/bin/sail up -d
ls
code .
./vendor/bin/sail ps
clear

./vendor/bin/sail down
docker ps -l
docker  -l
ls
cd olw
./vendor/bin/sail up -d
code .
docker ps
./vendor/bin/sail up -d
clear
./vendor/bin/sail up -d
./vendor/bin/sail composer require laravel/breeze --dev
./vendor/bin/sail up -d
./vendor/bin/sail composer require laravel/breeze --dev
cd ..
sudo chmod 777 olw/ -R
./vendor/bin/sail composer require laravel/breeze --dev
cd olw
./vendor/bin/sail composer require laravel/breeze --dev
./vendor/bin/sail art breeze:install vue
./vendor/bin/sail art migrate
CLEAR
clear
alias sail='bash vendor/bin/sail'
sail ps
git init
git add .
git commit -m "comit inicial"
git add .
git remote add origin https://github.com/albertogomesdasilva/laravel- sail-olw.git
git remote add origin -m https://github.com/albertogomesdasilva/laravel- sail-olw.git
git push
git push --set-upstream origin master
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw.git
git push -u origin main
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw.git
git push -u origin main
git login
git user.name albertogomesdasilva
echo "# laravel-sail-olw" >> README.md 
git init 
git add README.md 
git commit -m "first commit" 
git branch -M main 
git remote add origin https://github.com/albertogomesdasilva/laravel- sail-olw.git
echo "# laravel-sail-olw" >> README.md 
git init 
git add README.md 
git commit -m "first commit" 
git branch -M main 
git remote add origin https://github.com/albertogomesdasilva/laravel- sail-olw.git
echo "# laravel-sail-olw" >> README.md 
git init
git add README.md
git commit -m "first commit"
git config  user.name "Albertogomesdasilva"
git config  user.email "albertogomesdasilva@hotmail.com"
git branch -M main
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw.git
git push -u origin main
ping www.google.com
clear
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw.git
git push -u origin main
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw
echo "# laravel-sail-olw" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw.git2
git push -u origin main
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw.git
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw.git2
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw.git
clear
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw
git config --global user.email  "albertogomesdasilva@hotmail.com"
git status
touch .gitignore
git add .
git commit -a -m "commit inicial"
git remote add origin https://github.com/albertogomesdasilva/laravel- sail-olw.git
git branch -M main 
git remote add origin https://github.com/albertogomesdasilva/laravel- sail-olw.git
clear
git status
git push --set-upstream origin master
git branch
git status
git init
git status
git add.
git add .
git status
git commit -a -m "commit inicial"
git status
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw.git
git push
cd ..
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw.git
cd owl
ls
cd olw
git remote add origin https://github.com/albertogomesdasilva/laravel-sail-olw
git push -u origin main
git init
clear
git reset
git status
git logout
git --help
git exit
clear
git add ANOTAÇÕES.md
git log
git commit "anotações"
clear
sail ps
clear
alias sail='bash vendor/bin/sail'
alias s='bash vendor/bin/sail'
s ps
clear
sail ps
s ps
clear
s down
s up -d
clear
s art make:controller BeerController
alias sail='bash vendor/bin/sail'
sail art migrate
sail npm run dev
npm run dev
sail npm run dev
npm run dev
sail npm run dev
sail art migrate
./vendor/bin/sail art migrate
./vendor/bin/sail artisan migrate
npm i
composer install
php --ini
php ini
php -i
ls
composer update
composer install
docker ps
ls
cd olw
s up -d
./vendor/bin/sail up -d
ls
cd public
ls
cd build
ls
cd assets/
ls
cd ..
ls
cd resources/
ls
cd views
ls
cd..
cd ..
code .
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
sail art migrate
./vendor/bin/sail up -d
./vendor/bin/sail donw
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail down
composer install
--ignore-platform-req=ext-simplexml --ignore-platform-req=ext-dom --ignore-platform-req=ext-xml --ignore-platform-req=ext-curl
composer install --ignore-platform-req=ext-simplexml --ignore-platform-req=ext-dom --ignore-platform-req=ext-xml --ignore-platform-req=ext-curl
sudo su composer update
sudo composer update
sudo su
sudo composer update
composer i
apt install composer
composer update
composer update --with-all-dependencies
php composer.phar install --no-plugins --no-scripts
cd olw
php composer.phar install --no-plugins --no-scripts
ls
cd olw
ls
apt update
composer update
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
composer update
composer update --with-all
ls
sudo su albert
sudo su alber
cd ow
cd olw
./vendor/bin/sail up -d
code .
./vendor/bin/sail up -d
php composer.phar update --no-plugins --no-scripts
ls
composer install
code .
php composer.phar install --no-plugins --no-scripts
cls
clear
./vendor/bin/sail up -d
./vendor/bin/sail down
php composer.phar install --no-plugins --no-scripts
composer update
cd ..
ls
cd ..
ls
chmod 777 usr/ -R
php --ini
php -ini
composer install
cd olw
pwd
ls
cd home
ls
cd ..
ls
cd root
ls
cd olw
composer install
npm i
cd public/
ls
cd buido
cd buid
cd build
ls
cd asstes
cd assets
ls
ls
chmod 777 olw/ -R
cd olw
sail up -d
./vendor/bin/sail up -d
./vendor/bin/sail composer dumpautoload
./vendor/bin/sail composer autoload
./vendor/bin/sail composer dump-autoload
composer install
composer --ignore-platform-req=ext-simplexml --ignore-platform-req=ext-dom --ignore-platform-req=ext-dom --ignore-platform-req=ext-xml --ignore-platform-req=ext-dom --ignore-platform-req=ext-dom --ignore-platform-req=ext-dom --ignore-platform-req=ext-curl --ignore-platform-req=ext-dom --ignore-platform-req=ext-simplexml
composer dumautoload --ignore-platform-req=ext-simplexml --ignore-platform-req=ext-dom --ignore-platform-req=ext-dom --ignore-platform-req=ext-xml --ignore-platform-req=ext-dom --ignore-platform-req=ext-dom --ignore-platform-req=ext-dom --ignore-platform-req=ext-curl --ignore-platform-req=ext-dom --ignore-platform-req=ext-simplexml
composer dumpautoload --ignore-platform-req=ext-simplexml --ignore-platform-req=ext-dom --ignore-platform-req=ext-dom --ignore-platform-req=ext-xml --ignore-platform-req=ext-dom --ignore-platform-req=ext-dom --ignore-platform-req=ext-dom --ignore-platform-req=ext-curl --ignore-platform-req=ext-dom --ignore-platform-req=ext-simplexml
./vendor/bin/sail up -d
code .
./vendor/bin/sail up -d
cd ..
ls
./vendor/bin/down
./vendor/bin/sail down
cd root
cd olw
./vendor/bin/sail down
cd olw
./vendor/bin/sail up -d
cd ..
rm -rf olw
ls
exit
docker ps
docker ps -la
docker ps -l
exit
nmp run dev
ls
cd example-app/
ls
sail 
./vendor/bin/sail up -d
code .
./vendor/bin/sail stop
cd ..
docker
docker ps
clear
cd ..
sudo chmod 777 olw/ -R
composer require laravel/breeze --dev
php -ini
php --ini
clear
./vendor/bin/sail composer require laravel/breeze --dev
cd olw
./vendor/bin/sail composer require laravel/breeze --dev
./vendor/bin/sail artisan breeze:install vue
./vendor/bin/sail art migrate
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail art make:controller BeerController
sail ps
sail artisan make:controller BeerController
sail artisan make:request BeerRequest
sail composer require psr/simple-cache:^2.0 maatwebsite/excel
./vendor/bin/sail composer require psr/simple-cache:^2.0 maatwebsite/excel
./vendor/bin/sail composer dump-autoload
./vendor/bin/sail artisan make:export BeerExport
./vendor/bin/sail art config:cache
./vendor/bin/sail art optimize:clear
./vendor/bin/sail composer require psr/simple-cache:^2.0 maatwebsite/excel
./vendor/bin/sail composer require -W league/flysystem-aws-s3-v3 "^3.0"
curl -s "https://laravel.build/olw?with=mysql,redis,mailhog,minio" | bash
ls
rm -rf example-app/
ls
rm -rf olw
clear
curl -s "https://laravel.build/olw?with=mysql,redis,mailhog,minio" | bash
docker scan
cd olw && ./vendor/bin/sail up -d
code .
cd olw && ./vendor/bin/sail up -d
./vendor/bin/sail up -d
code .
./vendor/bin/sail down
./vendor/bin/sail up -d
sail down
./vendor/bin/sail down
./vendor/bin/sail up -d
code .
./vendor/bin/sail up -d
code .
./vendor/bin/sail up -d
sail down
./vendor/bin/sail down
ls
cd olw
./vendor/bin/sail up -d
docker ps
ls
cd olx
ls
cd olw
./vendor/bin/sail up -d
docker ps
clear
code .
ls
cd ..
ls
docker ps
docker exec -it 51288723f17a bash
ls
./vendor/bin/sail up -d
cd olw
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail up -d
./vendor/bin/sail art migrate
php artisan migrate
clear
composer update
npm i
npm
composer install
php --ini
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail ps
s ps
sh ps
clear
sail art make:migration create_history_table
sail art make:model Export -mr
sail art make: Export -mr
sail art make:model Export -mr
sail art make:model Meal -mr
sail art make:factory MealFactory
sail art make:seed MealSeeder
sail composer require jzonta/faker-restaurant
sail composer dump-autoload
./vendor/bin/sail composer dump-autoload
clear
alias sail='[ -f sail ]
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail art migrate:fresh --seed
clear
sail art migrate:fresh --seed
sail art make:mail ExportEmail
sail up -d
sail down
sail up -d
docker ps
ols
olw
ls
cd olw
ls
sail ps
clear
./vendor/bin/sail up -d
code .
./vendor/bin/sail up -d
./vendor/bin/sail art server
./vendor/bin/sail art serve
sail art migrate:fresh --seed
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail composer dump-autoload
sail up -d
sail composer require jzonta/faker-restaurant
sail ps
sail composer install
composer install
php --ini
composer install
php -S localhost:8000
cd ..
chmod 777 olw/ -R
sail ps
./vendor/bin/sail up -d
cd olw
./vendor/bin/sail up -d
docker ps
./vendor/bin/sail up -d -->
"# notas" 

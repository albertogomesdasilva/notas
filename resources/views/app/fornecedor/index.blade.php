<h2>Fornecedor</h2>
### OBJETO LOOP -> Existe em @foreach e @forelse
    
@endforeach
@forelse ($fornecedores as $indice => $fornecedor)
@dd($loop)
    @if($loop->first)
        => Aqui é a primeira iteração do loop  
    @endif
    Iteração Atual: -> {{ $loop->iteration }}<br>
    Fornecedor: {{ $fornecedor['nome']}} <br>
    Status: {{ $fornecedor['status'] }} <br>
    CNPJ: {{ $fornecedor['cnpj'] ?? '' }} <br>  
    @if($loop->last)
        => Aqui é a última iteração do loop <hr>
    @else 
        <hr>
    @endif
@empty
    Telefone: ({{ $fornecedor['dd'] ?? '' }})  {{ $fornecedor['telefone'] ?? '' }} <br>  <hr>
        Não existem Registros

@endforelse





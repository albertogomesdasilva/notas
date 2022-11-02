{{ $slot }}

{{ $x }}

<form action={{ route('site.contato') }} method="post" > 
            @csrf
            <input name="nome" value="{{ old('nome') }}"  type="text" placeholder="Nome" class="{{ $classe }}">
            <br>
            <input type="text" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $classe }}">
            <br>
            <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="{{ $classe }}">
            <br>
            <select name="motivo_contato" class="{{ $classe }}">
                <option value="">Qual o motivo do contato?</option>
                <option value="1">Dúvida</option>
                <option value="2">Elogio</option>
                <option value="3">Reclamação</option>
            </select>
            <br>
            <textarea name="mensagem" value="{{ old('mensagem') }}" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem"> {{ (old('mensagem') != '') ?  old('mensagem')  :'' }} </textarea>
    <br>
    <button type="submit" class="btn btn-suces">ENVIAR</button>
</form>
<div style="position:absolute; top:0px; left:0px; width:100%; height: 150px; background: orange; color: red;">
{{ print_r($errors); }}
</div>
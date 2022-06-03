@extends('layout')

<title>New Event</title>

@section('conteudo')
    

<div class="col-md-8 offset-md-2">
    <h2>Criar Evento</h2>

    <div class="mt-3">
        
        <form action="{{ route('store') }}" method="post">
            @csrf
                <h5 class="mt-3">Evento</h5><input type="text" class="form-control" name="evento">
                
                <h5 class="mt-3">Cidade</h5><input type="text" class="form-control" name="cidade">

                <h5 class="mt-3">Data</h5><input type="text" class="form-control" name="data">
                

                <h5 class="mt-3">O evento é privado?</h5>
                <select id="" class="form-control" name="privado">
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>

                <h5 class="mt-3">Descrição</h5>
                <textarea id="" cols="30" rows="3" class="form-control" name="descricao"></textarea>

                <h5 class="mt-3">O evento terá</h5>
                <div class="form-check">
                <input type="checkbox" name="itens[]" id="it1" class="form-check-input" value="Cadeiras"> Cadeiras<br>
                <input type="checkbox" name="itens[]" id="it2" class="form-check-input" value="Brindes"> Brindes<br>
                <input type="checkbox" name="itens[]" id="it3" class="form-check-input" value="Bebidas"> Bebidas<br>
                <input type="checkbox" name="itens[]" id="it4"
                class="form-check-input" value="Sorteios"> Sorteios<br> 
                </div>
               
            

                <input type="submit" value="Criar Evento" class="btn btn-unico mt-3">

                
        </form>
    </div>
    

</div>

    
@endsection
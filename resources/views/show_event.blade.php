@extends('layout_clean')

<title>Show event</title>

@section('conteudo_show')


<div class="col-md-10 offset-md-1" id="quecoisa">
    <div class="row">
        <div class="col-md-6">
            <img src="../img/events/{{$imagem_evento}}" alt="umaImagem" width="500" class="image-fluid">
        </div>
    
        <div class="col-md-6">
            <h2>Descricao?</h2>
           {{$event->description}}
           <h2>O que vai ter?</h2>
           @foreach(json_decode($event->items_ev) as $item)
          <ion-icon name="arrow-undo-outline" class="text-warning"></ion-icon>{{$item}}<br>
           @endforeach

        </div>
    </div>
    
</div>
    
@endsection
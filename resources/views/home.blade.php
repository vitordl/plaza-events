@extends('layout')

<title>Home</title>

@section('conteudo')
<h2>Próximos eventos</h2>
<p class="eventos-p">Veja os eventos dos próximos dias</p>
<div id="cards-eventos" class="row">
@foreach($events as $ev)
    <div class="card col-md-3">
        <img src="imgs/event2.jpg" alt="evento-img" class="image-fluid">
        <div class="card-body">
            <p>09/09/2022</p>
            <h5>{{ $ev->title }}</h5>
            <p>X Participantes</p>
            <a href="#" class="btn btn-unico">Saber mais</a>
        </div>
    </div>
@endforeach
</div>
    
@endsection
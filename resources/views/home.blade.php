@extends('layout')

<title>Home</title>

@if (session('msg'))
    <p class="alert bg-success text-center">{{session('msg')}}</p>   
@endif

@section('conteudo')


@if ($buscar)
    <h4>Buscando por {{$buscar}}</h4>
    @if ($events->count() == 0)
<p class="eventos-p">Não existe nenhum evento cadastrado com {{$buscar}} no momento. <br> Clique <a href="{{route('home')}}">aqui</a> pra ver todos os eventos!</p>
@endif

@else
    
@if ($events->count() == 0)
<p class="eventos-p">Não existe nenhum evento cadastrado no momento.</p>
@else
<h2>Próximos eventos</h2>
<p class="eventos-p">Veja os eventos dos próximos dias</p>
@endif

@endif


<div id="cards-eventos" class="row">
@foreach($events as $ev)
    <div class="card col-md-3">
        <img src="img/events/{{$ev->image}}" alt="evento-img" class="img-fluid">
        <div class="card-body">
            <p>{{$ev->created_at}}</p>
            <h5>{{ $ev->title }}</h5>
            <p>{{count($ev->users)}} Participantes</p>
            <a href="{{route('show_event', $ev->id)}}" class="btn btn-unico">Saber mais</a>
        </div>
    </div>
@endforeach


</div>
    
@endsection
@extends('layout_clean')

<title>Show event</title>

@section('conteudo_show')


<div class="col-md-10 offset-md-1" >
    <div class="row" >
        <div class="col-md-6">
            <img src="../img/events/{{$imagem_evento}}" alt="umaImagem" width="500" height="300" class="img-fluid " id="quecoisa">
        </div>
    
        <div class="col-md-6">
           <h2>{{$event->title}}</h2>
           {{-- {{$event->description}} --}}
           <ion-icon name="location-outline" class="text-warning"></ion-icon> {{$event->city}} <br>
           <ion-icon name="people-outline" class="text-warning"></ion-icon> {{count($event->users)}} Participantes <br>
           <ion-icon name="star-outline" class="text-warning"></ion-icon> {{$user['name']}}<br><br>

           <form action="{{route('participar', $event->id)}}" method="post">
            @csrf
            <input type="submit" class="btn btn-unico" value="Confirmar presenca">
           </form>
           

           <h5>O evento conta com:</h5>
           @foreach(json_decode($event->items_ev) as $item)
          <ion-icon name="caret-forward-outline" class="text-warning"> </ion-icon> {{$item}}
           @endforeach

        </div>

       
       
    </div>
    <div class="row mt-2">
        <div class="col-md-10 col-offset-md-1  mt-2">
            
            <h4>Sobre o evento</h4>
            {{$event->description}}
        </div>
    </div>
    
</div>
    
@endsection
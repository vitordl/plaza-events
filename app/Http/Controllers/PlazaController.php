<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class PlazaController extends Controller
{
   
    public function index()
    {
        $buscar = request('buscar_name');
        if($buscar){
            $events = Event::where('title', 'like', '%'.$buscar.'%')->get();
        }else{
            $events = Event::all();
        }
        
        return view('home', ['events' => $events, 'buscar' => $buscar]);
    }

    
    public function create()
    {
        return view('new_event');
    }

   
    public function store(Request $request)
    {
        // $data = $request->all();
        // echo "<pre>";
        // print_r($data);
        $event = new Event();
        $event->title = $request->evento;
        $event->city = $request->cidade;
        //$event->data = $request->input('data');
        $event->description = $request->descricao;
  
        $request->privado = $request->privado == 'sim'? 1 : 0;
        $event->private = $request->privado; 

        $user = auth()->user();
        $event->user_id = $user->id;

        
        //$dados = Event::create($request->all());

        $itens = json_encode($request->itens);
        $event->items_ev = $itens;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $extension = $request->image->extension();

            $imageName = md5($request->image->getClientOriginalName().strtotime('now')).".".$extension;

            $request->image->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }
        
        $event->save();

        return redirect()->route('home')->with('msg', 'Evento criado com sucesso!');
    }

    
    public function show_event($id)
    {
        $event = Event::where('id', $id)->first();

        $user = User::where('id', $event->user_id)->first()->toArray();
        
        //return redirect()->route('show_event', ['event' => $event]);
        return view('show_event', 
        ['event' => $event, 'imagem_evento' => $event->image, 'user' => $user]);
    }

    public function participar($id){

        $user = auth()->user();
        $event = Event::findOrFail($id);

        
        $event_users = $event->users()->where('user_id', '=', $user->id)->where('event_id', '=', $id)->count();
        if($event_users == 0){

            $user->eventsAsParticipant()->attach($id);
            //refazer num metodo mais real, no meu nível de aprendizado

            return redirect()->route('home')->with('msg', 'Sua presença foi confirmada no evento '.$event->title);

        }else{
            return redirect()->route('home')->with('msg', 'Você já está inscrito no evento '.$event->title);
        }
        
       
      
        
        
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}

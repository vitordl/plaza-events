<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class PlazaController extends Controller
{
   
    public function index()
    {
        $events = Event::all();
        return view('home', ['events' => $events]);
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

        return redirect()->route('home');
    }

    
    public function show_event($id)
    {
        $event = Event::where('id', $id)->first();
        //return redirect()->route('show_event', ['event' => $event]);
        return view('show_event', ['event' => $event, 'imagem_evento' => $event->image]);
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

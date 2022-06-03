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
        
        $event->save();

        return redirect()->route('home');
    }

    
    public function show($id)
    {
        //
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

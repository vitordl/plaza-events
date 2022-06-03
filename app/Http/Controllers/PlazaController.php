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
        $event = Event::get();
        $event->title = $request->evento;
        $event->city = $request->cidade;
        //$event->data = $request->input('data');
        $event->description = $request->descricao;
        $event->private = $request->privado;
        // $event->items = $request->input('itens');
        // foreach($event->items as $ev){
        //     echo $ev;
        // }
        //$event->save();
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

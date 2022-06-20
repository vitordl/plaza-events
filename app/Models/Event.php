<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // protected $appends = ['items'];

    // protected $casts = [
    //     'items' => 'array'
    // ];

    // protected $fillable = ['title', 'city', 'private', 'description', 'items_ev'];

    //foi criado "items" do tipo json na table

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}

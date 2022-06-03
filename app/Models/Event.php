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
}

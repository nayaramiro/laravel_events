<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    //to say that 'items' checkbox is a array
    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = [
        'date'
    ];

    public function user(){

        //to know who's the user whom belongs many events
        return $this->belongsTo('App\Models\User');
    }
}

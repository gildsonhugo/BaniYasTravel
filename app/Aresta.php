<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aresta extends Model
{
    public $timestamps = false;

    protected $fillable = ['starts', 'ends', 'distance'];

    public function start(){
        return $this->hasOne(Vertice::class, 'id', 'starts');
    }

    public function end(){
        return $this->hasOne(Vertice::class, 'id', 'ends');
    }

}

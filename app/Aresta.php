<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aresta extends Model
{
    public $timestamps = false;

    public function start(){
        return $this->hasOne(Vertice::class, 'id', 'starts');
    }

    public function end(){
        return $this->hasOne(Vertice::class, 'id', 'ends');
    }

}

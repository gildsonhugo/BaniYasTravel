<?php

namespace App\Http\Controllers;

use App\Aresta;
use App\Grafo;
use App\Vertice;
use Illuminate\Http\Request;

class GrafoController extends Controller
{

    public function getAllVertices(){
        return Vertice::all();
    }

    public function getAllArestas(){
        return Aresta::all()->load('start', 'end');
    }

    public function searchRoute($from, $to){
        $grafo = new Grafo();

        $grafo->startRoute($from, $to);

        $items = $grafo->getRouteList($from, $to);

        return $items;

    }

}

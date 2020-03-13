<?php

namespace App;

use Hamcrest\Thingy;
use Illuminate\Database\Eloquent\Model;

class Grafo extends Model
{
    public $timestamps = false;

    public $vertices = [];

    protected $appends = ['vertices'];

    public function getVerticesAttribute(){
        return $this->vertices;
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $vertices = Vertice::all();

        foreach ($vertices as $vertice){
             $vertice->label = [100000000000000000000000000000000000000000000, $vertice->id];
             $vertice->visited = false;
             $vertice->prev = null;
             $this->vertices[] = $vertice;
        }

    }

    public function startRoute($from, $to){
        $start = $this->getItemFromVertices($from);
        $start->label = [0, $start->id];
        $start->visited = true;
        $start->prev = $start->id;
        $vizinhanca = $this->getVizinhaca($start->id);

        $this->getRoute($from,0, $vizinhanca);

    }

    public function getRoute($from, $distance, $vizinhanca){

        foreach ($vizinhanca as $vizinho){
            if($vizinho->label[0] > $distance + $vizinho->distance){
                $vizinho->label = [$distance + $vizinho->distance, $from];
                $vizinho->prev = $from;
            };
            $vizinho->visited = true;
            if(!$vizinho->prev) $vizinho->prev = $from;
        }

        if(!$this->everyVerticeVisited()){
            foreach ($vizinhanca as $vizinho){
                $atual = $this->getItemFromVertices($from);
                $vizinhanca = $this->getVizinhaca($vizinho->id);
                $this->getRoute($vizinho->id, $vizinho->label[0], $vizinhanca);
            }
        }

    }

    public function everyVerticeVisited(){
        $visiteds = array_filter($this->vertices, function($vertice){return !$vertice->visited;});
        return count($visiteds) == 0;
    }

    public function getRouteList($from, $to, $route = []){

        $item = array_filter($this->vertices, function($it)use($to){
            return $it->id == $to;
        });
        $item = array_pop($item);

        $ar = Aresta::where([['starts', $item->id], ['ends', $item->label[1]]])->orWhere([['ends', $item->id], ['starts', $item->label[1]]])->first();

        array_unshift($route, Aresta::where([['starts', $item->id], ['ends', $item->label[1]]])->orWhere([['ends', $item->id], ['starts', $item->label[1]]])->first()->load('start', 'end'));

        $destinyFound =  $item->id == $from || $item->label[1] == $from;

        if(!$destinyFound){
            return $this->getRouteList($from, $item->label[1], $route);
        }

        return $route;

    }

    public function getVizinhaca($id){
        $arestas = Aresta::select('starts', 'ends', 'distance')->where('starts', $id)->orWhere('ends', $id)->get()->toArray();
        $verticesVizinhos = [];
        foreach ($arestas as $aresta){
            $verticeVizinho =  $aresta['starts'] != $id ?  $this->getItemFromVertices($aresta['starts']) :  $this->getItemFromVertices($aresta['ends']);
            $verticeVizinho->distance = $aresta['distance'];
            $verticesVizinhos[] = $verticeVizinho;
        }
        return $verticesVizinhos;
    }

    public function getItemFromVertices($id){
        $items = array_filter($this->vertices, function($item) use ($id){
            return $item->id == $id;
        });
        return array_pop($items);
    }
}

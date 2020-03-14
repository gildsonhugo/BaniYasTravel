<?php

namespace App;

use Hamcrest\Thingy;
use Illuminate\Database\Eloquent\Model;

class Grafo extends Model
{
    public $timestamps = false;

    public $path = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getRoute($from, $to){
        $arestas = array_map(function($item){return array_values($item);}, Aresta::select('starts', 'ends', 'distance')->get()->toArray());
        $this->path = $this->dijkstra($arestas, $from, $to);
        $route = $this->traceRoute();
        return $route;
    }

    public function traceRoute(){
        $route = [];
        for($i = 0; $i < count($this->path)-1; $i++){
            $route[] = Aresta::where([['starts', $this->path[$i]], ['ends', $this->path[$i+1]]])->first()->load('start', 'end');
        }
        return $route;
    }

    public function dijkstra($graphs, $source, $target){
        $vertices = [];
        $neighbours = [];
        $path = [];

        foreach($graphs as $edge){
            array_push($vertices, $edge[0], $edge[1]);
            $neighbours[$edge[0]][] = ['endEdge' => $edge[1], 'cost' => $edge[2]];
        }

        $vertices = array_values(array_unique($vertices));

        foreach ($vertices as $vertex) {
             $dist[$vertex] = INF;
             $previous[$vertex] = NULL;
        }


        $dist[$source] = 0;
        $g = $vertices;
        while(count($g) > 0){
            $min = INF;
            foreach ($g as $vertex) {
                if($dist[$vertex] < $min){
                    $min = $dist[$vertex];
                    $u = $vertex;
                }
            }

            $g = array_diff($g, [$u]);

            if($dist[$u] == INF || $u == $target){
                break;
            }

            if(isset($neighbours[$u])){
                foreach ($neighbours[$u] as $arr){
                    $alt = $dist[$u] + $arr["cost"];
                    if($alt < $dist[$arr["endEdge"]]){
                        $dist[$arr['endEdge']] = $alt;
                        $previous[$arr["endEdge"]] = $u;
                    }
                }
            }
        }

        $u = $target;
        while(isset($previous[$u])){
            array_unshift($path, $u);
            $u = $previous[$u];
        }
        array_unshift($path, $u);
        return $path;
    }

}

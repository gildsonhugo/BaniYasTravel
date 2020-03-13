<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bani Yas Travel</title>
    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0">
</head>
<body>
<div class="wrapper" id="app">
    <div class="container">
        <aside class="side">
            <div class="item form">
                <h1 role="heading" class="heading">Bani Yas Travel</h1>
                <div class="panel-content">
                    <form role="form">
                        <div class="form-group">
                            <input type="search" v-model="fromId" list="vertices" required name="from" placeholder="From: " class="input">
                        </div>
                        <div class="form-group">
                            <input type="search" v-model="toId" list="vertices" required name="target" placeholder="Target: " class="input">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" v-model="showArestas" @change="getArestas" id="showArestas" >
                            <label for="showArestas">Show Arestas</label>
                        </div>
                        <div class="form-group form-content-right">
                            <button type="button" class="btn btn-submit" @click="searchRoutes">Get Routes</button>
                        </div>
                    </form>
                </div>
                <datalist id="vertices">
                    <option v-for="vertice in vertices" :value="vertice.name">
                </datalist>
            </div>
        </aside>
        <main class="map">
            <div class="map-container">
                <div class="point-map" v-for="vertice in vertices" :style="{ top: vertice.y+'px', left: vertice.x+'px' }">
                    <span :class="{ 'no-break': vertice.id == 8 || vertice.id == 5, 'opacity': showArestas }">@{{ vertice.id }} - @{{ vertice.name }}</span>
                </div>
                <svg id="canvasArestas" width="1280" height="800">
                    <line v-for="aresta in arestas" class="line" :x1="aresta.start.x + 4" :x2="aresta.end.x + 4" :y1="aresta.start.y + 4" :y2="aresta.end.y + 4"></line>
                    <line v-for="aresta in arestasResult" class="line" :x1="aresta.start.x + 4" :x2="aresta.end.x + 4" :y1="aresta.start.y + 4" :y2="aresta.end.y + 4"></line>
                    <text v-for="aresta in arestas" :transform="'rotate('+( Math.atan2(( aresta.end.y - aresta.start.y ), ( aresta.end.x - aresta.start.x )) * 180 / Math.PI )+','+ ((aresta.start.x+(aresta.end.x - aresta.start.x)/2) + 5) +', '+((aresta.start.y+(aresta.end.y - aresta.start.y)/2)- 0.5 ) +')'" :x="aresta.start.x+((aresta.end.x - aresta.start.x)/2)-2" :y="aresta.start.y+((aresta.end.y - aresta.start.y)/2)-5" font-family="Verdana" font-size="15">
                        @{{ aresta.distance }}m
                    </text>
                </svg>
            </div>
        </main>
    </div>
</div>
<script src="{{asset('vue.js')}}"></script>
<script src="{{asset('script.js')}}"></script>
</body>
</html>

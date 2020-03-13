var app = new Vue({
    el: '#app',
    data: {
        vertices: [],
        fromId: '',
        toId: '',
        arestas: [],
        arestasResult: [],
        showArestas: false
    },
    methods: {
        getVertices: function(){
            fetch('api/vertices').then(r => r.json()).then(res => {
                this.vertices = res;
            })
        },
        getArestas: function () {
            if(this.showArestas){
                fetch('api/arestas').then(r => r.json()).then(res => {
                    this.arestas = res;
                })
            }else{
                this.arestas = [];
            }
        },
        searchRoutes: function () {
            let idFrom = this.vertices.find(i => i.name == this.fromId).id;
            let idTo = this.vertices.find(i => i.name == this.toId).id;
            fetch(`api/route/${idFrom}/${idTo}`).then(r => r.json()).then(res => {
                this.arestasResult = res;
            })
        }
    },
    created: function() {
        this.getVertices();
    }

})

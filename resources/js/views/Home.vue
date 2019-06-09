<template>
<div class="container" id="cont">
    <div class="row">
         <!-- iterar para cargar los articulos-->
        <div class="col-md-4" :key="articulo.id" v-for="articulo in articulos">
            <div class="card shadow" style="width: 20rem;">
                <div class="inner">
                    <img :src="`../imagenes/${articulo.imagen}`" class="cart-img-top" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title" v-text="articulo.nombre"></h5>
                    <p class="card-text">$ {{articulo.precio}}</p><!--cart-text interpolación con {{}}-->
                    <button type="button" class="btn btn-info btn-sm"   v-on:click="agregarCarro(articulo)">Agregar al carrito</button>          
                </div>
                <div class="card-footer">
                    <a href="#" class="card-link">Leer mas..</a>   
                </div>
            </div>
        </div>                         
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return{
            articulos: []
            }
        },
        // metodo para traer todos los articulo 
        methods: {
            getArticulos: function () {
			var urlarticulos = '/inicio';
			axios.get(urlarticulos).then(response => {
				this.articulos = response.data;
                this.$store.commit('contar')
            });
               
            },
        //metodo para agregar al carrito un articulo
            agregarCarro: function (articulo) {
                var urlcarro = 'carrito/agregar/' + articulo.id;
                axios.get(urlcarro).then(response => {
                this.getArticulos();
                alert("Se Agregó el Artículo al Carrito");
			});
            }
                
        },
    
    mounted() {
            console.log('Component Articulo cargado.')
            this.getArticulos();
        }
    }
</script>
<style>
    #cont{
        margin-top: 2%;
       
    }
    .inner{
        overflow: hidden;
    }
    .inner img{
        transition: all 1.5s ease;
    }
    .inner:hover img{
        transform: scale(1.5);
    }
</style>
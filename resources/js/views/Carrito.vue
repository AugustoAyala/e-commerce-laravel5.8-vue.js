<template>
<div class="container mt-3">
        <!-- verificar que el carrito tenga algo -->
    <div class="card" id="tarjeta" v-if = "artcarro.length !== 0">
        <div class="card-header">
            <h3 class="text-center">Carrito de Compras</h3>
        </div> 
        <div class="card-body" >
            <div class="table-responsive">
				        <table class="table  table-hover ">
                    <tbody>
                         <!-- iterar para cargar los articulos que tiene el carrito-->
                        <tr :key="articulo.id" v-for="articulo in artcarro">
                            <td> 
                            <center>  
                            <img :src="`../imagenes/${articulo.imagen}`"  alt="articulo"><br>
                            <button type="button" class="btn btn-light btn-sm"   v-on:click="removerCarro(articulo)" @click="$store.commit('contar')">Remover</button>
                            </center> 
                            </td>
                            <td>{{articulo.nombre}}</td>
                            <td>
                                 {{articulo.cantidad}}
                               x  ${{articulo.precio}}
                            </td>
                            <td> $ {{articulo.cantidad * articulo.precio}}</td>
                        </tr>                
                        <tr>
                             <td></td>
                             <td> </td>
                             <td class="table-active">Total</td>
                             <td class="table-active">$ {{ total }}</td>          
                        </tr>   
                    </tbody>
                </table>
            </div>
        </div> 
        <div class="card-footer">
            <router-link :to="{name: 'home'}" class="btn btn-info btn-sm">Continuar Comprando</router-link> &nbsp;
            <a href="#" class="btn btn-dark btn-sm">Finalizar la Compra</a>
        </div>
    </div>
</div>
</template>
<script>
export default {
        data() {
            return{
               artcarro: [],
               total: 0
            }
        },
          // metodo para traer todos los articulo del carrito  
        methods: {
            getCarro: function () {
			         var urlcarrito = 'carrito/mostrar';
			         axios.get(urlcarrito).then(response => {
               this.artcarro = response.data.carrito,
               this.total = response.data.total
            });
            },
            //metodo para sacar un articulo del carrito
             removerCarro: function (articulo) {
                var urlcarro = 'carrito/borrar/' + articulo.id;
                axios.get(urlcarro).then(response => {
                this.getCarro();
            });
            }  
        },
        mounted() {
             console.log('Component Articulo cargado.')
             this.getCarro();
        }
    }
</script>

<style>
#tarjeta
{
	
	border-radius: 1em;
	margin-bottom: 30px;
	padding: 1em;
}

#tarjeta img
{
	width: 50px;
}
</style>


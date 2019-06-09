<template>
<div>
    <b-navbar toggleable="lg" type="dark" variant="warning" >
        <b-navbar-brand :to="{name: 'home'}">Glaxnet</b-navbar-brand>
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        <b-collapse id="nav-collapse" is-nav><!-- b-collapse es    lo que se oculta cuando la medida es menor-->
            <b-navbar-nav>
                <b-nav-item :to="{name: 'home'}" exact>Productos</b-nav-item> <!--exact se activa solo cuando tiene que esta activo-->
            </b-navbar-nav>
      <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">
                <b-nav-item :to="{name: 'carrito'}">{{ $store.state.contador }}<img :src="`../imagenes/cart.png` " id="carro"></b-nav-item>
                <b-nav-form>
                    <b-form-input size="sm" class="mr-sm-2" placeholder="Buscar"></b-form-input>
                    <b-button size="sm" class="my-2 my-sm-0" type="submit">Buscar</b-button>
                </b-nav-form>
                <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
                    <template slot="button-content"><em>Usuario</em></template>
                    <b-dropdown-item href="#">Profile</b-dropdown-item>
                    <b-dropdown-item href="#">Sign Out</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
 <router-view></router-view>
</div>
</template>

<script>
export default {
      
      mounted(){
        console.log('Component mounted.');
       }
}
</script>

<style>

#carro
{
	width: 30px;
}
</style>

	 		
			
	

		
			


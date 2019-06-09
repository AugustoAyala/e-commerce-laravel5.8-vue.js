<?php

namespace Carrito\Http\Controllers;
use Carrito\Articulo;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function __Construct()
    {
     if(!\Session::has('carrito')){
         \Session::put('carrito', array());
     }
    }
    public function mostrar()
    {
        
        $carrito = \Session::get('carrito');
        $total = $this->total();
        $contador = $this->contador();
        return ['carrito' => $carrito, 'total' => $total, 'contador' => $contador];
    }
    public function agregar($id)
    {
        $articulo = Articulo::findOrFail( $id );
        $articulo->cantidad = 1;
        $carrito = \Session::get('carrito');
        $carrito[$articulo->id] = $articulo;
        \Session::put('carrito', $carrito);
        return;
    }
    public function borrar($id)
    {
        $carrito = \Session::get('carrito');
        unset($carrito[$id]);
        \Session::put('carrito', $carrito);
        return;
    }
    public function eliminar()
    {
        \Session::forget('carrito');
        return;
    }
    private function total()
    {
    	$carrito = \Session::get('carrito');
    	$total = 0;
    	foreach($carrito as $item){
    		$total += $item->precio * $item->cantidad;
    	}

    	return $total;
    }
    private function contador()
    {
    	$carrito = \Session::get('carrito');
    	$contador = 0;
    	foreach($carrito as $item){
    		$contador = $contador + 1;
    	}

    	return $contador;
    }
}

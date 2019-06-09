<?php

namespace Carrito\Http\Controllers;

use Illuminate\Http\Request;
use Carrito\Articulo;

class AlmacenController extends Controller
{
    Public function index()
    {
        $articulos = Articulo::all();
        return $articulos;
        //return response()->json($articulos);
    }
}

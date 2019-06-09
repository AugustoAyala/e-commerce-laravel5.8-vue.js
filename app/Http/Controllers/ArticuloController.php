<?php

namespace Carrito\Http\Controllers;

use Carrito\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::orderBy('id' , 'DESC')->paginate(10);
        return [
            'pagination' => [
             'total'        => $articulos->total(),
             'current_page' => $articulos->currentPage(),
             'per_page'     => $articulos->perPage(),
             'last_page'    => $articulos->lastPage(),
             'form'         => $articulos->firstItem(),
             'to'           => $articulos->lastPage(),
  
            ],
            'articulos' => $articulos
         ];
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloRequest $request)
    {
        $articulo = new Articulo;
        $articulo->nombre = $request->get('nombre');
        $articulo->descripcion = $request->get('descripcion');
        $articulo->resumen = $request->get('resumen');
        $articulo->precio = $request->get('precio');
        $articulo->imagen = $request->get('imagen');
        $articulo->visible = $request->has('visible') ? 1 : 0;
        $articulo->idcategoria = $request->get('idcategoria');
        $articulo->save();
        return;
    }

    
    
    public function update(Request $request, Articulo $articulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \test\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        //
    }
}

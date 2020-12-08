<?php

namespace App\Http\Controllers;

use App\producto;
use App\categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $P=producto::all();

        return \view('admin.productos')->with('produ',$P);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $P=new producto();
        $P->Nombre=$request->Pnombre;
        $P->Descripcion=$request->Pdescripcion;
        $P->Cantidad=$request->Pcantidad;
        $P->Precio=$request->Pprecio;
        $P->category_id=$request->Recolector;
        $P->save();
        return \redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        return \view('EditarPR')->with('Producto',producto::find($id))->with('Categoria',categoria::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
    
        $P=producto::find($id);
        
        $P->Nombre=$request->Pnombre;
        $P->Descripcion=$request->Pdescripcion;
        $P->Cantidad=$request->Pcantidad;
        $P->Precio=$request->Pprecio;
        $P->category_id=$request->categoria;
        $P->save();
        return \redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $P=producto::find($id);
        $P->destroy(array('id',$id));
        return \redirect('/productos');
    }
}

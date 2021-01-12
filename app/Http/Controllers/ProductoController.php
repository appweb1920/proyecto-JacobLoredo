<?php

namespace App\Http\Controllers;

use App\producto;
use App\categoria;
use Illuminate\Http\Request;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $P=producto::all();

        return \view('admin.productos')->with('produ',$P);
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $P=new producto();
        $P->Nombre=$request->Pnombre;
        $P->Descripcion=$request->Pdescripcion;
        $P->Cantidad=$request->Pcantidad;
        $P->Precio=$request->Pprecio;
        $P->category_id=$request->categoria;
        $P->categoria_id=$request->categoria;
        if ($request->hasFile('urlfoto')){
            $file= $request->file("urlfoto");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("img/productos/"),$nombrearchivo);
            $P->Url_imag= "img/productos/".$nombrearchivo;
        }else{
            $P->Url_imag= "img/productos/default.jpg";
        } 
        $P->save();
        return \redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
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
        $request->user()->authorizeRoles(['admin']);
        $P=producto::find($id);
        
        $P->Nombre=$request->Pnombre;
        $P->Descripcion=$request->Pdescripcion;
        $P->Cantidad=$request->Pcantidad;
        $P->Precio=$request->Pprecio;
        $P->category_id=$request->categoria;
        $P->categoria_id=$request->categoria;
        if ($request->hasFile('urlfoto')){
            $file= $request->file("urlfoto");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("img/productos"),$nombrearchivo);
            $P->Url_imag= "img/productos/".$nombrearchivo;
        }else{
        
        }
        $P->save();
        return \redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $P=producto::find($id);
       
        $P->destroy(array('id',$id));
        return \redirect('/productos');
    }
    /**
     * Funcion para regresar todos los productos como JSON
     *
     * @param Request $request
     * @return JSON
     */
    public function showListProduct(Request $request)
    {
        $producto = producto::all();
        return response()->json(array(
            "success" => true,
            "productos" => $producto
        ), 200);
    }
}

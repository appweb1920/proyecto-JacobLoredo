<?php

namespace App\Http\Controllers;

use App\categoria;
use App\producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the categorias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $c=categoria::all();
        
        return \view('admin.categoria')->with('categoria',$c);
    }
    /**
     * Guarda una nueva categoria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $C=new categoria();
        $C->Nombre=$request->Cnombre;
        $C->save();
        return \redirect()->back();
    }

    /**
     * Muestra una categoria en especifico
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        $request->user()->authorizeRoles(['admin']);
    }

    /**
     * Muestra el form para modificar una categoria
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return \view('/admin.EditarCat')->with('Categoria',categoria::find($id));
    }
    /**
     * Actualiza la categoria que se modifico
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $C=categoria::find($id);
        $C->Nombre=$request->Cnombre;
       
        $C->save();
        return \redirect('/categoria');
    }
    /**
     * Elimina la categoria que se especifico
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $C=categoria::find($id);
        $C->destroy(array('id',$id));
        return \redirect('/categoria');
    }
    /**
     * Muestra la lista de de todas las categorias como JSON
     * @param Request $request
     * @return JSON
     */
    public function showListCategoria(Request $request)
    {
        $categoria = categoria::all();
        return response()->json(array(
            "success" => true,
            "categorias" => $categoria
        ), 200);
        
    }
}

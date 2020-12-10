<?php

namespace App\Http\Controllers;

use App\categoria;
use App\producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        $request->user()->authorizeRoles(['admin']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return \view('/admin.EditarCat')->with('Categoria',categoria::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
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
     * Remove the specified resource from storage.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $C=categoria::find($id);
        $C->destroy(array('id',$id));
        return \redirect('/categoria');
    }
    public function showListCategoria(Request $request)
    {
        return (categoria::all())->toJson();
    }
}

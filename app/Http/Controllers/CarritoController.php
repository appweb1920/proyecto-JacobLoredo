<?php

namespace App\Http\Controllers;
use App\Carrito;
use App\producto;
use App\User;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    
    public function index(Request $request)
    {
        
    }
    public function ShowCarrito($id_user){
        
        $user=User::find($id_user);
        
        $carrito=Carrito::where('user_id',$id_user)->get();
       
        $data=array();
        foreach($carrito as $c){
            if($c->user_id==$id_user){
                $producto=producto::find($c->producto_id);
                array_push($data,$producto);  
            }
        }
        return $data;

    }
    public function AgregarProductoCarrito($id_user,$id_producto){
        
        $users=User::find($id_user);
        $producto=producto::find($id_producto);
        $Carrito = new Carrito();
        $Carrito->user_id=$users->id;
        $Carrito->producto_id=$producto->id;

        $Carrito->save();
        return (Carrito::all())->toJson();

    }
    public function EliminarProductoCarrito($id_user,$id_producto){
        
        $users=User::find($id_user);
        $producto=producto::find($id_producto);
        $carrito=Carrito::all();
        foreach($carrito as $c){
            if($c->user_id==$id_user&&$c->producto_id==$id_producto){
                $c->destroy(array('id',$c->id));
                break;
            }
        }
        return (Carrito::all())->toJson();
    }
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
       
    }

    
    public function show(Carrito $carrito)
    {
       
    }

    
    public function edit($id)
    {
        
        
    }

    public function update(Request $request, $id)
    {
           
    }

    
    public function destroy( Request $request,$id)
    {

    }
    
}

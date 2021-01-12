<?php

namespace App\Http\Controllers;
use App\Carrito;
use App\producto;
use App\User;
use App\Venta;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    
    public function index(Request $request)
    {
        
    }
    //muestra elcarrito de 1 solo usuario
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
        return response()->json(array(
            "success" => true,
            "productos" => $data
        ), 200);
        

    }
    //Agrega un producto al carrito junto al id del usuario, regresa todo el carrito completo para confirmar que se agrego
    public function AgregarProductoCarrito($id_user,$id_producto){
        
        $users=User::find($id_user);
        $producto=producto::find($id_producto);
        $Carrito = new Carrito();
        $Carrito->user_id=$users->id;
        $Carrito->producto_id=$producto->id;

        $Carrito->save();
        return response()->json(array(
            "success" => true,
            "productos" => $Carrito
        ), 200);
        

    }
    //elimina un producto de 1 usuario en especifico
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
      

        return response()->json(array(
            "success" => true,
            "productos" => $carrito
        ), 200);
        //return (Carrito::all())->toJson();

    }
    //confirma la compra del usuario y regresa el arreglo de los productos que compro y los elimina de la base de datos carrito
    public function ConfirmarCompra($id_user){
        $user=User::find($id_user);
        $venta=new Venta();
        $carrito=Carrito::where('user_id',$id_user)->get();
        $precioF=0.0;
        $data=array();
        foreach($carrito as $c){
            if($c->user_id==$id_user){
                $producto=producto::find($c->producto_id);
                $producto->Cantidad-=1;
                
                $precioF+=floatval($producto->Precio);
                $producto->save();
                array_push($data,$producto);  
                $c->destroy(array('id',$c->id));
            }
        }
        $venta->Total=$precioF;
        
        array_push($data,$venta); 
        $venta->save();
        return response()->json(array(
            "success" => true,
            "productos" => $data
        ), 200);
        
       
    }
    
}

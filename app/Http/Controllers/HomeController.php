<?php

namespace App\Http\Controllers;
use App\User;
use App\producto;
use App\Carrito;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $request->user()->authorizeRoles(['admin']);
        $users=User::all();
        return view('home')->with('Usuarios',$users);
    }
    public function destroy($id)
    {
        $users=User::find($id);
        $users->destroy(array('id',$id));
        return \redirect('/home');
    }
    
}

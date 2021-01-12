<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Rol;
use App\categoria;
use Validator;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        //dd($request);
        $user = new User();
        $user->user_token = implode('-', [
            "Abarrotes",
            uniqid(''),
            bin2hex(random_bytes(4)),
            bin2hex(random_bytes(2)),
            bin2hex(chr((ord(random_bytes(1)) & 0x0F) | 0x40)) . bin2hex(random_bytes(1)),
            bin2hex(chr((ord(random_bytes(1)) & 0x3F) | 0x80)) . bin2hex(random_bytes(1)),
            bin2hex(random_bytes(6))
        ]);
        $user->name = $request->name;
        $user->Direccion = $request->Direccion;
        $user->email = $request->email;
        if ($request->password !== $request->password_confirmation)
            return response()->json(array(
                        'success' => false,
                        "message" =>"Las contraseñas tienen que ser iguales",
                    ), 200);
        $user->password = bcrypt($request->password);
        $user->save();
       
        
        $user->roles()->attach(Rol::where('name', 'user')->first());
       
        $success['token'] = $user->user_token;
        return response()->json([
            'success' => true,
            'token'=>$success,
            'user' => $user,
            'message' => 'Successfully created user!'
        ], 201);
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|max:255'
        ])->validate();

        $user = user::where('email', $request['email'])->first();
      
        if ($user) {
            if (Hash::check($request['password'], $user->password)) {
                return response()->json(
                    array(
                        "success" => true,
                        "message" => "Login",
                        "user_token" => $user->user_token
                    ), 200);
            }
            return response()->json(
                array(
                    "success" => false,
                    "message" => "Tu contraseña es Incorrecta"
                ), 200);
        }
        return response()->json(
            array(
                "success" => false,
                "message" => "Tu email no existe en nuestro registro"
            ), 200);
            
      
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
      
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return user::all()->toJson();
    }
    /**
     * Funcion que regresa los productos de una categoria
     *
     * @param Request $request
     * @param [type] $id
     * @return JSON
     */
    public function ProductosXCategoria(Request $request,$id)
    {
        $categoria=categoria::find($id);
        
        return $categoria->producto->toJson();
    }
    public function getUser(Request $request)
    {
        
        $user = user::where('user_token', $request['token'])->first();
        return response()->json(array(
                    "success" => true,
                    "user" => $user
                ), 200);
    }
}
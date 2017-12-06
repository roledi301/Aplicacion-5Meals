<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        //función para el buscador
        $usuarios=User::name($request->get('name'))->orderBy('name','ASC')->paginate();
        return view('Admin/index', compact('usuarios'));

    }
    public function create()
    {
        return view('auth/register');
    }
    public function store(Request $request)
    {
        $this-> validate($request,
            ['name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'role_id'=>'required']);

         User::create([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'password' => bcrypt( $request->password),
             'role_id'=> $request->role_id
        ]);
        return view('/menuAdmin');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        return view('Admin/edit')->with(['usuario'=>$usuario]);
    }

    //ACTUALIZAR
    public function update(Request $request, $id)
    {
        //
        $this-> validate($request,
            ['name' => 'required|max:255',
                'email' => 'required|email|max:255|',
                'password' => 'required|min:6|confirmed',
                'role_id'=>'required']);

        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email= $request->email;

        if ( ! $request->password == '')
        {
            $usuario->password = bcrypt($request->password);
        }
        $usuario->role_id= $request->role_id;
        $usuario->save();

        if($usuario->save()){
            return redirect('admin');
        }else{
            return back();
        }
    }
}

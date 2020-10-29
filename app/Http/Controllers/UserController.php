<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use function Psy\debug;

class UserController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
     
        if($request)
        {
            //$users = User::paginate(5);
            $query = trim($request->get('search'));
            $users=User::where('name','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->paginate(5);
            return view('users.index', compact('users','query'));
        }
         
        
         
    }

   
    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Agrega el nombre .',
            'email.required' => 'Agrega el correo .',
            'password.required' => 'Ingresa una  contraseña.',
        ];
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
        ];
        $this->validate($request,$rules,$messages);
        $users = new User();
        $users ->name = request('name');
        $users ->email = request('email');
        $users ->password = request('password');
        $users->save();

        return redirect('/users');

    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show' , compact('user'));
    }

   
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit' , compact('user'));
    }

   
    public function update(Request $request, $id)
    {
       
        $messages = [
            'name.required' => 'Agrega el nombre .',
            'email.required' => 'Agrega el correo .',
        ];
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required',
        ];
        $this->validate($request,$rules,$messages);

        $this->validate($request, $messages);
        $users =  User::findOrFail($id);

        $users ->name = $request-> get('name');
        $users ->email = $request-> get('email');
        //$users ->password = request('password');
        $users->save();

        return redirect('/users')->with('success','El usuario fue actualizado correctamente');

    }

   
    public function destroy($id)
    {
       $user= User::FindOrFail($id);
       $user -> delete();
       return redirect('/users')->with('success','El usuario fue eliminado correctamente');
    }
}

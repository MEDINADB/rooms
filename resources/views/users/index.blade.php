@extends('layouts.app')

@section('content')
<div class="container">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
  <h2>Lista de Usuarios <a href="users/create"><button type="button" class="btn btn-success float-right "> <i class="fas fa-user-plus"></i> Agregar usuario</button></a></h2>
  <h6>
    @if ($query)
        <div class="alert alert-primary" role="alert">
     Los resultado son: '{{$query}}' son:
    </div>
    @endif
    
  </h6>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">CORREO</th>
        <th scope="col">ACCIONES</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        
        <td>
          
          <form action="{{route('users.destroy', $user->id)}}" method="POST"> 
            <a href="{{route('users.show',$user -> id)}}"> <button type="button" class="btn btn-secondary"><i class="far fa-eye"></i> Ver</button></a>
            <a href="{{route('users.edit', $user->id)}}"><button type="button" class="btn btn-primary"> <i class="fas fa-edit"></i> Editar</button></a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> Eliminar</button>
          </form>
          
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row">
    <div class="mx-auto">
       {{$users->links()}}
    </div>
  </div>
  
</div>



@endsection
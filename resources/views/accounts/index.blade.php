@extends('layouts.app')

@section('content')
@section('content')

<div class="container">
  @if ($message = Session::get('success'))

  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <span aria-hidden="true">x</span>
      <span class="sr-only">Close</span>
    </button>
    <p>{{ $message }}</p>
  </div>

  

@endif
  <h2>Lista de cuentas <a href="accounts/create"><button type="button" class="btn btn-success float-right "> <i class="fas fa-user-plus"></i> Agregar Cuenta</button></a></h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">PLATAFORMA</th>
        <th scope="col">HOST</th>
        <th scope="col">PROYECTO</th>
        <th>ACCIONES</th>        
      </tr>
    </thead>
    <tbody>
      @foreach ($accounts as $account)
      <tr>
        <th scope="row">{{$account->id}}</th>
        <td>{{$account->platform}}</td>
        <td>{{$account->host}}</td>
        <td>{{$account->project}}</td>
        <td>
          
          <form action="{{route('accounts.destroy', $account->id)}}" method="POST"> 
            <a href="{{route('accounts.show',$account -> id)}}"> <button type="button" class="btn btn-secondary"><i class="far fa-eye"></i> Ver</button></a>
            <a href="{{route('accounts.edit', $account->id)}}"><button type="button" class="btn btn-primary"> <i class="fas fa-edit"></i> Editar</button></a>
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
       {{$accounts->links()}}
    </div>
  </div>
  
</div>


@endsection

@extends('layouts.app')

@section('content')

        <div class="container">
            <h2>Editar datos de usuarios</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
             <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
               </div>
             @endif
            <div class="row">
                <div class="col-md-4">
                    <form action="{{ url('/users/'.$user->id.'/edit') }}" method="POST">

                        {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" >Nombres</label>
                        <input type="text" name="name" placeholder="" value="{{ $user->name }}" class="form-control" >
                    </div>
                    <div class="form-group">
                    <label for="email">Escribe tu email</label>
                    <input type="email" class="form-control" name="email" placeholder="" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Escribe tu nueva contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder=""  required>
                        </div>
                    <div class="form-group">
                        <label for="area">Ingrese el area</label>
                        <input type="text" class="form-control" name="area" placeholder="" value="{{ $user->area }}" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Escribe tu email</label>
                        <input type="text" class="form-control" name="position" placeholder="" value="{{ $user->position }}" required>
                        </div>
                    <br>  
                    <button type="submit" class="btn btn-primary"> Actualizar</button> <button type="reset" class="btn btn-danger">Cancelar</button>
                        
                
                 </form>
            </div>
            
        </div>
@endsection
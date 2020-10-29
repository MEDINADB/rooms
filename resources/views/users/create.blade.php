@extends('layouts.app')

@section('content')

        <div class="container">
            <h2>Registrar usuario</h2>
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
                    <form action="{{url('/users/')}}" method="POST">
                        {{csrf_field()}}

                    <div class="form-group">
                        <label for="name" >Nombres</label>
                        <input type="text" name="name" placeholder="Ingresa tu nombre"class="form-control" >
                    </div>
                    <div class="form-group">
                    <label for="email">Escribe tu email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo" >
                    
                    </div>
                    <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" >
                    </div>
                    
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Registrar</button> <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
                </div>
                
            </div>
            
        </div>
@endsection
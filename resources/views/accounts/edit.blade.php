@extends('layouts.app')

@section('content')

        <div class="container">
            <h2>Registrar Cuenta de Zoom - Webex </h2>
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
                    <form action="{{ url('/accounts/'.$account->id.'/edit') }}" method="POST">
                        {{csrf_field()}}

                    <div class="form-group">
                        <label for="platform" >Plafaforma</label>
                        <input type="text" name="platform"  value="{{$account->platform}}" placeholder="Ingresa la plataforma"class="form-control" >
                    </div>
                    <div class="form-group">
                    <label for="host">Escribe el host</label>
                    <input type="text" class="form-control" name="host" value="{{$account->host}}" placeholder="Ingresa tu correo" >
                    
                    </div>
                    <div class="form-group">
                    <label for="project">Proyecto</label>
                    <input type="texto" class="form-control" name="project"   value="{{$account->project}}" placeholder="Ingresa el proyecto">
                    </div>
                    
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Actualizar Cuenta</button> <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
                </div>
                
            </div>
            
        </div>
@endsection
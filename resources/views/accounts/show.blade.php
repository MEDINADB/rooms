@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">{{$account->platform}}</h1>
      <p class="lead">{{$account->host}}</p>
      <p class="lead">{{$account->project}}</p>
    </div>
  </div>
@endsection
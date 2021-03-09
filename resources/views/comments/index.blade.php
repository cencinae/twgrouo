@extends('layouts.app')
@section('content')

<div class="col-md-12"> 

<h3>Agregar Comentario</h3>

<ul class="nav nav-tabs" style="margin-bottom: 20px">
  <li class="nav-item">
    <a class="nav-link active" href="/publications/{{$publ->id}}">Volver a Publicación</a>
  </li>

</ul>

<div class="col-md-8 offset-md-2">

    <div class="card">

      <h5 class="card-header bg-info text-white">
       Comentario para Publicación Nº {{$publ->id}}
      </h5>

      <div class="card-body">

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

      <form method="post" action="{{ url('/comments') }}">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$publ->id}}">

          <div class="form-group" >
            <label>Título Publicación</label>
            <b>{{$publ->title}}</b>
          </div>

          <div class="form-group" >
            <label >Contenido</label>
            <textarea name="contenido" class="form-control" rows="10" cols="90"></textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check fa-lg"></i> Aceptar</button>
          </div>
      </form>

      </div>
    </div>
 </div>

</div>
 
@stop

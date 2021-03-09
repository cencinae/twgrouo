@extends('layouts.app')
@section('content')
 
<div class="col-md-12"> 

<h3>Editar Publicación</h3>

<div class="col-md-8 offset-md-2">
    <div class="card">
      <h5 class="card-header bg-info text-white">
        Editar Publicación
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


      <form method="post" action="{{ url('/publications/update') }}">
        {!! csrf_field() !!}
      <input type="hidden" name="id" value="{{$n->id}}">

      <div class="form-group" >
        <label >Título</label>
        <input type="text" class="form-control" name="titulo" value="{{$n->title}}">
      </div>

      <div class="form-group" >
        <label>Contenido</label>
        <textarea class="form-control" name="contenido"  rows="10" cols="90">{{$n->content}}</textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check fa-lg"></i>Aceptar</button>
      </div>

      </form>

      </div>
    </div>
</div>


</div>
 
@stop

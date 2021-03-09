@extends('layouts.app')
@section('content')

<div class="col-md-12">

<h3>Crear Publicación</h3>

<div class="col-md-8 offset-md-2">

    <div class="card">

      <h5 class="card-header bg-info text-white">
        Crear Publicación
      </h5>

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
        
      <div class="card-body">

      <form method="post" action="{{ url('/publications') }}">
        {!! csrf_field() !!}

          <div class="form-group" >
            <label >Título</label>
            <input type="text" class="form-control" name="titulo">
          </div>

          <div class="form-group" >
            <label >Contenido</label>
            <textarea class="form-control" name="contenido" rows="10" cols="90"></textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check fa-lg"></i>Aceptar</button>
          </div>

      </form>

      </div>
    </div>
 </div>

</div><!-- /.row -->
 

 
@stop

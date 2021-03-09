@extends('layouts.app')
@section('content')
 
<div class="col-md-12"> 

<h3>Ver Publicación y Comentarios</h3>

<div class="col-md-8 offset-md-2">
    <div class="card">
      <h5 class="card-header bg-info text-white">
        Publicación Nº : {{$n->id}}
      </h5>
      <div class="card-body">
        
        <div class="form-group" >
            <label>Título</label>
            <b>{{$n->title}}</b>
        </div>

        <div class="form-group" >
            <label >Contenido</label>
            {{$n->content}}
        </div>
      </div>
      <div class="card-footer">
        <input type="hidden" name="id" value="{{$n->id}}">
        <a  href="/comments/{{$n->id}}" class="btn btn-success float-right">Agregar Comentario</a>
      </div>
    </div>

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

    <div class="h5 mt-3">Comentarios</div>
    <hr>
    <div class="table-responsive">
        <table id="tabla" class="table table-striped">
            <thead>
                <tr>
                    <th>Content</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody class='bbb'>
                @foreach($n->comment as $d)
                <tr id="{{$d->id}}">
                    <td>{{substr(strip_tags($d->content), 0, 60)}}</td>   
                    <td>{{ $d->user->name }}</td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


</div>
 
@stop

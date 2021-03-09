@extends('layouts.app')

@section('content')

<div class="col-md-12"> 

<h3>Publicaciones</h3>

 <div class="input-group mb-3 col-md-4 offset-md-8">
  <input type="text" class="form-control" placeholder="Buscar..." id='filter'>
  <div class="input-group-append">
    <a href="/publications/create"">
        <button class="btn btn-warning" type="button">Nuevo</button>
    </a>
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

<div class="table-responsive">
    <table id="tabla" class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>User</th>
                <th>Acción</th>
            </tr>
        </thead>
         <tbody class='bbb'>


         @foreach($pbl as $d)
            <tr id="{{$d->id}}">
                <td>{{$d->id}}</td>
                <td>{{$d->title}}</td>
                <td>{{substr(strip_tags($d->content), 0, 60)}}</td>   
                <td>{{$d->user->name}}</td>
                <td >
                    <a href="{{ url('publications/'.$d->id) }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-search"></i></a>
                    <a href="{{ url('publications/'.$d->id.'/edit') }}" class="btn btn-outline-info btn-sm"><i class="fa fa-pencil-square"></i></a>

                    <form action="{{ route('publications.destroy', $d->id) }}" class="d-inline" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>  
                </td>
            </tr>
            @endforeach
        
        </tbody>
    </table>
</div>
</div>


<script>
$(document).ready(function () {
  
  $("#filter").focus();
  (function ($) {

      $('#filter').keyup(function () {

          var rex = new RegExp($(this).val(), 'i');
          $('.bbb tr').hide();
          $('.bbb tr').filter(function () {
              return rex.test($(this).text());
          }).show();

      })

  }(jQuery));

});
</script>
@endsection
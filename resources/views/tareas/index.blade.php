@extends('layouts.app')
  
@section('content')
<div class="row mt40">
   <div class="col-md-10">
    <h2>Tareas</h2>
   </div>
   <div class="col-md-2">
   <a href="{{ route('tareas.create')}}" class="btn btn-primary">
                    Nuevo
                </a>
    </div>
   <br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opps!</strong> Something went wrong<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
    <table class="table table-bordered" id="laravel_crud">
       <thead>
          <tr>
             <th>Id</th>
             <th>Fecha</th>
             <th>Nombre</th>
             <th>Direccion</th>
             <th>Estado</th>
             <!-- <th>Email</th> -->
             <th colspan="2">Action</th>
          </tr>
       </thead>
       <tbody>
          @foreach($tareas as $tarea)
          <tr>
             <td>{{ $tarea->id }}</td>
             <td>{{ $tarea->fecha }}</td>
             <td>{{ $tarea->nombre }}</td>
             <td>{{ $tarea->direccion }}</td>
             <td>{{ $tarea->estado }}</td>
             <td>
                <!-- <a href="{{ route('tareas.edit',$tarea->id)}}" class="btn btn-primary">
                    Edit
                </a> -->
            </td>
            <td>
                <form action="{{ route('tareas.destroy', $tarea->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
       </tbody>
    </table>
</div>
@endsection
</div>
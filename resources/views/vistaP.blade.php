@extends('layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

   {{--  Empieza modelo  --}}

   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Agregar Usuario </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <form action="{{ action('crudController@store') }}" method="POST">

          {{ csrf_field() }}
          <div class="modal-body">

               <div class="form-group">
                   <label> Nombre </label>
                   <input type="text" name ="nombre" class="form-control"  placeholder="Ingresa el nombre(s)">
               </div>

               <div class="form-group">
                      <label> Apellido Paterno </label>
                      <input type="text" name ="apellidoP" class="form-control"  placeholder="Ingresa apellido paterno">
              </div>

              <div class="form-group">
                      <label> Apellido Materno </label>
                      <input type="text" name ="apellidoM" class="form-control"  placeholder="Ingresa apellido materno">
              </div>

              <div class="form-group">
                          <label> Usuario </label>
                          <input type="text" name ="usuario" class="form-control"  placeholder="Ingresa nombre de Usuario">
              </div>

              <div class="form-group">
                      <label> Contraseña </label>
                      <input type="password" name ="pass" class="form-control"  placeholder="Ingresa la Contraseña">
               </div>

               <div class="form-group">
                      <label> Fecha </label>
                      <input type="date" name ="fechaReg" class="form-control"  placeholder="Igresa la fecha de Registro">
               </div>
              

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"> Insertar </button>
          </div>
      </form>
        </div>
      </div>
    </div>

    {{--  Termina Modelo  --}}

   <div class="container">


       @if(count($errors) > 0)

       <div class="alert alert-danger">
         <ul>
           @foreach($errors ->all() as $error)
           <li> {{$error}} </li>
           @endforeach
           
        </ul> 
       </div>
      @endif

      @if (\Session::has('success'))
       <div class="alert alert-success">
         <p>{{ \Session::get('success') }}</p>
       </div>
      @endif

        <table class="table mt-4">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha Registro</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($emps as $data)
                      
                  <tr>
                    <th> {{$data -> id}} </th>
                    <td> {{$data -> nombre}}</td>
                    <td> {{$data -> apellidoP}}</td>
                    <td> {{$data -> apellidoM}}</td>
                    <td> {{$data -> usuario}}</td>
                    <td> {{$data -> fechaReg}}</td>
                    <td>
                            <a class="btn btn-info" href="editar/{{ $data -> id}}"> <i class="fas fa-edit"> </i> </a>
                            <a class="btn btn-danger" href="eliminar/{{ $data -> id}}"><i class="fas fa-trash"></i></a>
                            </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
              
              {{ $emps-> links() }}
                        
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Agregar <i class="fas fa-user-plus"></i> </button>

   </div>
    
    <!-- Button trigger modal -->
   
      
      <!-- Modal -->
     

</body>
</html>

@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/38b56829b3.js" crossorigin="anonymous"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/zafiro/zafiro/public/">Home</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/zafiro/zafiro/public/apartamentos">Apartamentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/zafiro/zafiro/public/usuarios">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/zafiro/zafiro/public/pagos">Pagos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/zafiro/zafiro/public/deudas">Deudas</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
    
    <h1 class="text-center p-3">Apartamentos</h1>



    @if (session('correcto'))
        <div class="alert alert-success">{{ session('correcto') }} </div>
    @endif

    @if (session('incorrecto'))
        <div class="alert alert-danger">{{ session('incorrecto') }} </div>
    @endif

    <script>
      var res=function(){
        var not=confirm("Estas seguro de eliminar?");
        return not;
      }
    </script>

    <div class="p-5 table-responsive">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalRegistrar">Añadir
            Apartamento</button>
        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">Bloque</th>
                    <th scope="col">Numero Apartamento</th>
                    <th scope="col">Piso</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Editar/Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $key)
                    <tr>
                        <th>{{ $key->bloque }}</th>
                        <td>{{ $key->numero }}</td>
                        <td>{{ $key->piso }}</td>
                        <td>{{ $key->nombre }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#ModalEditar{{$key->id_apartamento}}"
                                class="btn btn-warning btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route("crud.delete",$key->id_apartamento)}}" onclick="return res ()"class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                        </td>


                        <!-- Modal  Modificacion de datos-->
                        <div class="modal fade" id="ModalEditar{{$key->id_apartamento}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registros</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route("crud.update")}}" method="POST">
                                          @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Bloque del
                                                    Apartamento</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="txtbapartamento" aria-describedby="emailHelp"
                                                    value="{{ $key->bloque }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Numero del
                                                    Apartamento</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    name="txtnapartamento" value="{{ $key->numero }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Numero de
                                                    Piso</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="txtnpiso" aria-describedby="emailHelp"
                                                    value="{{ $key->piso }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Nombre de la
                                                    persona y/o inquilino </label>

                                                <select name="nombres" id="nombresusuarios">
                                                    @foreach ($datos2 as $category)
                                                        <option value="{{ $category->id_usuarios }}">
                                                            {{ $category->nombre }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="modificar" aria-describedby="emailHelp"
                                                    value="{{$key->id_apartamento}}">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal  Ingresar  datos-->
                        <div class="modal fade" id="ModalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Realizar Registros</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('crud.create') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Bloque del
                                                    Apartamento</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="txtbapartamento" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Numero del
                                                    Apartamento</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                    name="txtnapartamento">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Numero de
                                                    Piso</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="txtnpiso" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Nombre de la
                                                    persona y/o inquilino </label>
                                                <select name="nombres" id="nombresusuarios">
                                                    @foreach ($datos2 as $category)
                                                        <option value="{{ $category->id_usuarios }}">
                                                            {{ $category->nombre }} </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar
                                                    Cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

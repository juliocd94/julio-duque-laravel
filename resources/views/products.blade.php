<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Julio Duque</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    
    </style>
  </head>
  
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Inicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li> -->
        </ul>
        <span class="navbar-text">
          <a href="/" class="navbar-brand">logout</a>
        </span>
      </div>
    </div>
  </nav>


    <div class="container mt-5">
    <div class="container">
      <h1>{{auth()->user()->role->name}}: {{auth()->user()->name}}</h1>
      <a href="/new-product" class="btn btn-success">Agregar nuevo producto</a>
    </div>

    <hr>

    <div class="container">
      <table class="table">
          <thead>
              <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Impuesto</th>
              <th scope="col">Acciones</th>
              </tr>
          </thead>
          <tbody>

          @foreach($data as $producto)
          <tr>
              <td>{{ $producto->name}}</td>
              <td>{{ $producto->price}}</td>
              <td>{{ $producto->tax->tax}}</td>
              <td>
                <!-- <form class="d-inline" action="{{ route('comprar', ['user_id' => auth()->user()->id, 'product_id' => $producto->id, 'price' => $producto->price, 'tax' => $producto->tax ])}}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-primary">Comprar</button>
                </form> -->

                <form class="d-inline" action="{{ route('edit', ['id' => $producto->id])}}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-primary">Editar</button>
                </form>
                
                <form class="d-inline" action="{{ route('eliminar', ['id' => $producto->id])}}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-primary">Borrar</button>
                </form>
              </td>
              </tr>
          @endforeach
          </tbody>
      </table>
    </div>
    </div>
  </body>
</html>

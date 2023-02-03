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
  
  <body class="text-center">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <span class="navbar-text">
        <a href="/" class="navbar-brand">logout</a>
      </span>
    </div>
  </nav>


    <div class="container mt-5">
    <div class="container">
      <h1>{{auth()->user()->role->name}}: {{auth()->user()->name}}</h1>
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
                <form class="d-inline" action="{{ route('comprar', ['user_id' => auth()->user()->id, 'product_id' => $producto->id, 'price' => $producto->price, 'tax' => $producto->tax ])}}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-primary">Comprar</button>
                </form>
              </td>
              </tr>
          @endforeach
          </tbody>
      </table>
    </div>

<br>
<br>
<br>

    <div class="container">
      <h3>Mis compras</h3>
      <table class="table">
          <thead>
              <tr>
              <th scope="col">Producto</th>
              <th scope="col">Precio</th>
              <th scope="col">Impuesto</th>
              <th scope="col">¿Facturado?</th>
              </tr>
          </thead>
          <tbody>

          @foreach($comprasDelUsuario as $data)
          <tr>
              <td>{{ $data->product->name}}</td>
              <td>{{ $data->price}}</td>
              <td>{{ $data->tax}}%</td>
              <td>{{ $data->invoiced}}</td>
              </tr>
          @endforeach
          </tbody>
      </table>
    </div>
    </div>
  </body>
</html>

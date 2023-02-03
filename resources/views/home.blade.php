<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Prueba tecnica Julio Duque</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  
  <body class="text-center">
  <nav class="navbar sticky-top bg-body-tertiary">
  <div class="container-fluid">
    <a href="/" class="navbar-brand">logout</a>
  </div>
</nav>

<div>
  <h1>Ventas</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Cliente</th>
          <th scope="col">Producto</th>
          <th scope="col">Precio</th>
          <th scope="col">Impuesto</th>
        </tr>
      </thead>
      <tbody>
      @foreach($compras as $compra)
        <tr>
          <td>{{$compra->user->name}}</td>
          <td>{{$compra->product->name}}</td>
          <td>{{$compra->price}}</td>
          <td>{{$compra->tax}}%</td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>

<br>
<br>
<br>
<br>

<div>
  <h1>Facturas</h1>

  <div class="text-end m-3">
    <form class="d-inline" action="{{ route('emitir', ['user_id' => $compra->user->id])}}" method="post">
      @csrf
      <button type="submit" class="btn btn-primary">Emitir facturas pendientes</button>
    </form>
  </div>
  

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Cliente</th>
          <th scope="col">Monto</th>
          <th scope="col">Total impuestos</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
      @foreach($invoices as $invoice)
        <tr>
          <td>{{$invoice->client->id}}</td>
          <td>{{$invoice->amount}}</td>
          <td>{{$invoice->total_tax}}</td>
          <td>
            <form class="d-inline" action="{{ route('detalle', ['invoice_id' => $invoice->id])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary btn-sm">Ver detalle</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>


</div>


  


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

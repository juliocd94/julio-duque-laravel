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
  </head>

  <body class="text-center">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <span class="navbar-text">
        <a href="/" class="navbar-brand">logout</a>
        <a href="/panel-administrativo" class="navbar-brand">Panel</a>
      </span>
    </div>
  </nav>
    <main class="form-signin w-100 m-auto container">
        <form method="POST" action="{{ route('update', ['id' => $producto->id])}}">
          @csrf
            <h1 class="h3 mb-3 fw-normal">Actualizar productos</h1>
            <div class="form-floating mt-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name" value="{{$producto->name}}">
                <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating mt-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="price" value="{{$producto->price}}">
                <label for="floatingInput">Precio</label>
            </div>
            <div class="form-floating mt-3">
            <select name="tax" class="form-select" aria-label="Default select example">
                  @foreach($taxes as $tax)
                  <option value="{{$tax->id}}">{{ $tax->tax}}%</option>
                  @endforeach
                </select>
                <label for="floatingInput">Impuesto</label>
            </div>
            <button class="mt-4 inline btn btn-lg btn-primary" type="submit">Guardar cambios</button>
        </form>
    </main>
  </body>
</html>
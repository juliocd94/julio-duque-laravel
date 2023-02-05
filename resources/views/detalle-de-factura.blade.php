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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
    <div>
        <h4>{{ auth()->user()->role->name }}: <b>{{ auth()->user()->name }}</b></h4>

        <h1 class=" mt-4">Detalle</h1>
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
                @foreach ($compras as $compra)
                    <tr>
                        <td>{{ $compra->user->name }}</td>
                        <td>{{ $compra->product->name }}</td>
                        <td>{{ $compra->price }}</td>
                        <td>{{ $compra->tax }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <h3 class="text-end m-3"><b>Total: {{ $invoice->amount }}</b></h3>
        </div>
    </div>

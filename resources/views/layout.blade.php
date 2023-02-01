<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-success-subtle">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">ERP Transport</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @if(auth()->check())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('transports.index') }}">Transports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('drivers.index') }}">Drivers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customers.index') }}">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('favors.index') }}">Services</a>
                </li>
                @endif
            </ul>
        </div>
        @if(auth()->check())
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger m-1">Logout</button>
            </form>
        @else
            <a class="btn btn-primary m-1" href="{{ route('login.form') }}">Login</a>
            <a class="btn btn-primary m-1" href="{{ route('register.form') }}">Registration</a>
        @endif
    </div>
</nav>
<div class="container">
    @yield('body')
</div>
</body>
</html>

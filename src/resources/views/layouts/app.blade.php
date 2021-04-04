<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    @stack('css')



</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{url('setting')}}">{{trans('laravel-settings::admin.menu.logo')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(Route::current()->getName() == 'settings/*') active @endif">
                    <a class="nav-link" href="{{url('settings')}}">{{trans('laravel-settings::admin.menu.setting')}} <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @if(Route::current()->getName() == 'settings/get') active @endif">
                    <a class="nav-link" href="{{url('settings/get')}}">{{trans('laravel-settings::admin.menu.list')}}<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @if(Route::current()->getName() == 'settings/create') active @endif">
                    <a class="nav-link" href="{{url('settings/create')}}">{{trans('laravel-settings::admin.menu.create')}}</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{url('settings/get')}}" method="GET">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{trans('laravel-settings::admin.menu.search')}}</button>
            </form>
        </div>
    </nav>

    <div class="card m-5">
        <div class="card-header">
            @yield('title')
        </div>
        <div class="card-body">
            @yield('content')
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    @stack('js')

    @include('sweetalert::alert')
</body>
</html>

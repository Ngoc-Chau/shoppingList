<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Document</title>
        @stack('styles')
    </head>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 text-end">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('shopping.index') }}" class="nav-link px-2 link-secondary">Danh sách mua</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Sản phẩm</a></li>
            </ul>
        </div>

        <div class="col-md-3 text-end">
            @if(Auth::check())
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('auth.edit') }}" class="nav-link px-2 link-dark">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('auth.logout') }}" class="btn btn-outline-primary me-2"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            @else
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('auth.login') }}" class="btn btn-outline-primary me-2">Đăng nhập</a></li>
                    <li><a href="{{ route('auth.register') }}" class="btn btn-link">Đăng kí</a></li>
                </ul>
            @endif
        </div>
    </header>
    <body>
        <div class="container">
            @yield('content')
        </div>
        @stack('scripts')
    </body>
    <footer class="justify-content-between align-items-center py-3 my-4 border-top">
        <div class="text-center">
        <span class="text-muted">&copy; Shopping List 2021</span>
        </div>
    </footer>
</html>
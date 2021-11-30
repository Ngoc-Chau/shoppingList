<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <a href="{{ route('auth.login') }}" class="btn btn-outline-primary me-2">Đăng nhập</a>
        <a href="{{ route('auth.register') }}" class="btn btn-primary">Đăng kí</a>
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
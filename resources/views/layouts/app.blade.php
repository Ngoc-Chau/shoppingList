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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <title>Document</title>
        @stack('styles')
    </head>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-4 text-end">
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('shopping.index') }}" class="nav-link px-2 link-secondary">TRANG CHỦ</a></li>
                {{--  <li><a href="#" class="nav-link px-2 link-dark">NGÔN NGỮ</a></li>  --}}
                <li>
                    <div class="dropdown">
                        <a class="nav-link px-2 link-dark dropdown-toggle" data-toggle="dropdown">
                            NGÔN NGỮ
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Link 1</a>
                          <a class="dropdown-item" href="#">Link 2</a>
                          <a class="dropdown-item" href="#">Link 3</a>
                        </div>
                      </div>
                </li>

                <li><a class="nav-link px-2 link-dark" data-toggle="modal" data-target="#myModal">CHIA SẺ <i class='fa fa-share-alt-square'></i></a></li>
                    
            </ul>
        </div>

        {{-- Share TodoList Start --}}
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('shopping.shareMail') }}" method="POST">
                        @csrf
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Nhập Gmail Bạn Muốn Chia Sẻ</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Nhập gmail</label>
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="you@gmail.com">
                            </div>
                            <i>( Chia sẻ cho bạn bè danh sách cần tìm và mua của bạn )</i>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Share TodoList Stop --}}

        <div class="col-md-3 text-end" style="z-index: -1;">
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
        <span class="text-muted">&copy; SHOPPING LIST 2021</span>
        </div>
    </footer>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="/uploads/icon-avicon.png"/>
        <link rel="icon" href="/uploads/icon-avicon.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
        <title>Shopping List</title>
        @stack('styles')
        <style>
            main > .container {
                padding: 60px 15px 0;
              }
              
            .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              user-select: none;
            }
            
            .me-auto {
                margin-right: auto!important;
            }
      
            @media (min-width: 768px) {
              .bd-placeholder-img-lg {
                font-size: 3.5rem;
              }
            }
          </style>
    </head>
    <header class="d-flex flex-wrap align-items-center py-3 mb-4 ">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">SHOPPING LIST</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a href="{{ route('shopping.index') }}" class="nav-link px-2 link-secondary">@lang('lang.list')</a>
                        </li>
                        <li>
                            <!-- Đa ngôn ngữ -->
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">@lang('lang.language')
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('lang/en')}}">
                                            <img src="https://img.icons8.com/color/32/000000/great-britain-circular.png"/>
                                            @lang('lang.English')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('lang/ja')}}">
                                            <img src="https://img.icons8.com/color/32/000000/japan-circular.png"/>
                                            @lang('lang.Japanese')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('lang/vi')}}">
                                            <img src="https://img.icons8.com/color/32/000000/vietnam-circular.png"/>
                                            @lang('lang.Vietnamese')
                                        </a>
                                    </li>
                                </ul>
                            </div>
<!-- Đa ngôn ngữ -->
                        </li>
                        <li class="nav-item"><a class="nav-link px-2 link-dark" data-toggle="modal" data-target="#myShare">@lang('lang.share') <i class='fa fa-share-alt-square'></i></a></li>
                    </ul>
                    <div class="d-flex">
                        @if(Auth::check())
                        <ul class="navbar-nav ">
                            <li class="nav-item"><a href="{{ route('auth.edit') }}" class="nav-link px-2 link-dark">{{ Auth::user()->name }}</a></li>
                            <li class="nav-item"><a href="{{ route('auth.logout') }}" class="btn btn-outline-light px-2 ml-2 me-2"><i class="fa fa-btn fa-sign-out"></i>@lang('lang.logout')</a></li>
                        </ul>
                        @else
                        <ul class="navbar-nav ">
                            <li class="nav-item"><a href="{{ route('auth.login') }}" class="btn btn-outline-light px-2 me-2">@lang('lang.login')</a></li>
                            <li class="nav-item"><a href="{{ route('auth.register') }}" class="btn btn-link text-white px-2 ml-2">@lang('lang.register')</a></li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        {{-- Share TodoList Start --}}
        <div class="modal" id="myShare">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('shopping.shareMail') }}" method="POST">
                        @csrf
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">@lang('lang.ShareMail')</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <label for="floatingInput"> @lang('lang.fillMail') </label>
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="you@gmail.com">
                            </div>
                            <i>( @lang('lang.NoteShare') )</i>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">@lang('lang.Send')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Share TodoList Stop --}}

        <div class="col-md-3 text-end" style="z-index: 0;">
            @if(Auth::check())
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0" style="z-index: 0">
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
    <body style="background: ivory;">
        <div class="container">
            @yield('content')
        </div>
        @stack('scripts')
    </body>
    <footer class="justify-content-between align-items-center py-3 bg-dark">
        <div class="text-center">
        <span class="text-white">&copy; SHOPPING LIST 2021</span>
        </div>
    </footer>
</html>
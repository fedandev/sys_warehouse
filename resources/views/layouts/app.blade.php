<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">  
<head>
    <meta charset="utf-8">
    <title>{{ ajuste('system_name') }} 
            @if (routeIndex($controller) != 'home') 
                | {{ trans('controllers.'.$controller) }}
            @else
                | Inicio
            @endif     
            @if ($action != 'index' and $action != 'showLoginForm')
                | {{ trans('generic.'.$action) }}
            @endif
    </title>    
    
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    
    <meta name="apple-mobile-web-app-title" content="{{ ajuste('system_name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href=" {{ secure_asset('img/favicon/apple-touch-icon.png') }} ">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('img/favicon/favicon-32x32.png') }}">
    <link rel="mask-icon" href="{{ secure_asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
   
    
    @include('layouts.styles')
   
    @section('styles')
    @show
</head>
  

    @guest
        @yield('content')
    @else
        <body class="mod-bg-1 ">
          <!-- Wrapper-->
            <div class="page-wrapper">
                <div class="page-inner">
        
                     <!-- Navigation -->
                    @include('layouts.navigation')
                    <div class="page-content-wrapper">
                        @include('layouts.header')
                        
                        <main id="js-page-content" role="main" class="page-content">
                            <!-- Main view  -->
                            @include('layouts.breadcrum') 
                            @include('common.msg')
                            @yield('content')
                        </main>
                        
                        <!-- Footer -->
                        @include('layouts.footer')
                                      
                        
                    </div>
                    
                </div>
            </div>
            <!-- End wrapper-->
            
            
            
            <!-- Scripts -->
            @include('layouts.scripts')
               
            
            @section('scripts')
            @show
          <nav class="shortcut-menu d-none d-sm-block">
            <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
            <label for="menu_open" class="menu-open-button ">
                <span class="app-shortcut-icon d-block"></span>
            </label>
            <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Desplazarse hacia arriba
">
                <i class="fal fa-arrow-up"></i>
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); localStorage.clear();" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Cerrar Sesión">
                <i class="fal fa-sign-out"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </a>
            <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Pantalla completa">
                <i class="fal fa-expand"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Imprimir página">
                <i class="fal fa-print"></i>
            </a>
        </nav>
        </body>
    @endguest


</html>

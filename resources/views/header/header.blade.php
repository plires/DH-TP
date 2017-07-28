<header>

<!--Container start-->
<div class="container">

    <!--Sub - container start-->
    <div class="sub_container">
        <div class="header_logo">
            <a id="logo" href="{{ url('/') }}"><img src="{{ asset('images/logo-header.png') }}" alt="logo sitio"></a>
        </div>

        <div class="container-icons-bar">
            <ul class="icons-bar">
                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
            </ul>
        </div>
        <nav class='main-menu'>
            <ul>
                <li><a class="login" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ url('logout') }}">
                    <i class="ion-android-exit"></i> Logout</a>
                </li>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <li><a href="{{ url('/') }}"><i class="ion-home"></i>Home</a></li>
                <li><a href="{{ url('faq') }}"><i class="ion-help"></i>Faqs</a></li>
                <li><a href="{{ url('register') }}"><i class="ion-clipboard"></i>Registrate</a></li>

                <li>
                    <a href="{{ url('login') }}"><i class="ion-person"></i>Login</a>
                </li>

                <li><a href="#"><i class="ion-android-cart"></i>Mi Carrito</a></li>

                <li><a href=#"><i class="ion-person"></i>Mi Cuenta</a></li>

                <li><a href="#"><i class="ion-email"></i>Contacto</a></li>
                <li>
                    <div class="desplega">
                        <button class="dropbtn">
                        <i class="ion-folder"></i>
                        Categorias
                        <i class="ion-ios-arrow-forward"></i>
                        </button>
                        <div class="desplega-content">
                            <a href="#">Rubias</a>
                            <a href="#">Rojas</a>
                            <a href="#">Negras</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="desplega">
                        <button class="dropbtn">
                        @if (Auth::user() && Auth::user()->admin == 0)
                            <i class="ion-settings"></i>
                            Mi Cuenta
                            <i class="ion-ios-arrow-forward"></i>
                            </button>
                            <div class="desplega-content">
                                <a href="#">Mis productos</a>
                                <a href="#">Favoritos</a>
                            </div>
                        @endif
                        
                    </div>
                </li>
                @if (Auth::user() && Auth::user()->admin == 1)
                    <li class="#"><a href="admin.php"><i class="ion-gear-b"></i>Backend Admin</a></li>
                @endif
                <li><a href="#"><i class="ion-social-facebook"></i>Facebook</a></li>
                <li><a href="#"><i class="ion-social-twitter"></i>Twitter</a></li>
                <li><a href="#"><i class="ion-social-instagram"></i>Instagram</a></li>
                <li><a href="#"><i class="ion-social-pinterest"></i>Pinterest</a></li>
                
            </ul>
        </nav>


        <div class="container-menu-bar"> 
            <a href="#" class='main-menu-button'><i class="ion-navicon-round"></i></a>
            <nav class="secondary-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="{{ url('faq') }}">Faqs</a></li>
                    <li><a href="{{ url('register') }}">Registrate</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
        </div>

    </div>
    <!--Sub - container end-->

</div>
<!--Container end-->


<!--Fondo gris full width start-->
<div class="header_fondo_gris">

    <!--Container start-->
    <div class="container">

        <!--Sub - container start-->
        <div class="sub_container">

            <div class="container-search-bar">
                <form action="" method="get">
                    <input class="text_search" type="text" placeholder="Ingresa tu busqueda" name="search" value="">
                    <input class="submit_search" type="submit" name="search_header" value="Buscar">
                </form>
                <div class="cuenta">
                    <a class="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ url('logout') }}">
                        <i class="ion-android-exit"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <a class="logout" href="{{ url('login') }}"><i class="ion-person"></i> Login</a>
                    <p class='user-name'>{{ Auth::user() ? 'Bienvenido, ' . Auth::user()->name : 'Hola, Invitado'}}</p>
                    <a href="#" class="home-icon"><i class="ion-ios-home"></i></a>
                </div>
            </div>

        </div>
        <!--Sub - container end-->

    </div>
    <!--Container end-->

</div>
<!--Fondo gris full width end-->


    <!--Fondo amarillo full width start-->
    <div class="header_fondo_amarillo">

        <!--Container start-->
        <div class="container">

            <!--Sub - container start-->
            <div class="sub_container">

            <div class="container-product-menu-bar">
                <div class="desplega">
                    <button class="dropbtn">Categorias</button>
                    <div class="desplega-content">
                        <a href="#">Rubias</a>
                        <a href="#">Rojas</a>
                        <a href="#">Negras</a>
                    </div>
                </div>
                <div class="desplega">
                    @if (Auth::user() && Auth::user()->admin == 0)
                        <button class="dropbtn">Mi cuenta</button>
                        <div class="desplega-content">
                            <a href="#">Mis productos</a>
                            <a href="#">Favoritos</a>
                        </div>
                    @endif
                </div>

                @if (Auth::user() && Auth::user()->admin == 1)
                    <button onclick="window.location.href='admin.php'" class="dropbtn">Backend Admin</button>
                @endif
            </div>
            <a class="carro-icon" href="#"><i class="ion-ios-cart"></i> </a>
            <a class="tema-icon" href="#" onclick="cambiarArchivoCss('css/theme_blue.css')" title="Cambiar tema del sitio"><i class="ion-arrow-swap"></i> </a>
            <a id="contador">Ya somos: <span id='registered-users'>1</span> usuarios registrados </a>


            </div>
            <!--Sub - container end-->

        </div>
        <!--Container end-->

    </div>
    <!--Fondo amarillo full width end-->

</header>
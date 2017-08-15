@extends('layouts.app')


@section('header')

  @include('header.header')

@endsection

@section('estra_css')
  <link rel="stylesheet" href="{{ asset('css/jquery.bxslider.min.css') }}" />
@endsection

@section('content')

  <!--slider start-->
  <ul class="bxslider">
    <li><img src="{{ asset('images/slide-1.jpg') }}" title="Descuentos de hasta el 30%" /></li>
    <li><img src="{{ asset('images/slide-2.jpg') }}" title="Nueva Ipa La cruz" /></li>
    <li><img src="{{ asset('images/slide-3.jpg') }}" title="Recien llegada de Bariloche" /></li>
    <li><img src="{{ asset('images/slide-4.jpg') }}" title="Primer premio en la fiesta cervezal" /></li>
    <li><img src="{{ asset('images/slide-5.jpg') }}" title="Promo del mes" /></li>
    <li><img src="{{ asset('images/slide-6.jpg') }}" title="La rubia que estremece" /></li>
  </ul>
  <!--slider end-->


  <!--Introduction start-->
  <div class="row">
    <div class="small-12 columns">
      <h1 class="text_center titulo_h1">Welcome Cerveza Artesanal</h1>
      <hr>
      <h2>Vos la haces, te ayudamos a venderla</h2>

      <p>
      Somos un grupo de personas amantes de la buena cerveza artesanal.
      </p>

      <p>
      Concientes del numeroso crecimiento de productores de cervezas artenalales y caseras que chocaban contra la falta de contactos para venderla, o la falta de logística para entregarla fue que decidimos implementar una plataforma de comercio electronico para que puedas vender, cobrar y entregar tu cerveza.
      </p>
    </div>
  </div>

  <div class="row">
    <div class="small medium-8 medium-centered columns">
      <h3 class="h3_home">
        Por eso te proponemos que hagas lo que mas te gusta y mejor te sale, la cerveza...de lo aburrido nos encargamos nosotros y nuestra plataforma."
      </h3>
    </div>
  </div>
  <!--Introduction end-->

  <hr class="margin_bottom_30">

<!--Productos start-->
<section class="main_products">

  <div class="row">
    @if(Auth::user())
      <input type="hidden" class='user-id' data-id="{{ Auth::user()->id }}">
    @endif
    @foreach($products as $product)

      <div class="small-12 medium-4 columns">
        <article  data-id="{{ $product->id}}" class="item animated fadeInDown">
          <a href="#"><img src="{{ $product->images->src }}" alt="{{ $product->slug }}"></a>
          <div class="item_descuento boton_gris">
            20 % OFF
          </div>
          @if (Auth::user())

            @if( in_array(  $product->id  , $favorites ) )
              <a title="Agregar a Favoritos" class="favoritos_home" href=""><i class ="ion-flag ion-flag-active"></i></a>
            @else
              <a title="Agregar a Favoritos" class="favoritos_home" href=""><i class ="ion-flag"></i></a>
            @endif

          @endif
          <h2>{{ $product->title }}</h2>
          <p title="Aroma, color y cuerpo intenso. Alto contenido de lúpulo y con malta seleccionada." >
            {{ $product->description }}
          </p>
          <a href="#" class="boton_carrito boton_amarillo fadeIn">Agregar</a>
          <span class="precio">{{ $product->price  . ' $'}}</span>
        </article>
      </div>
    @endforeach
  </div>
  <div class="row">
    <div class="small-12 medium-4 medium-centered columns">
      {{ $products->links() }}
    </div>
  </div>

</section>
<!--Productos end-->



<!--Section fondo de color de ancho al 100% start-->
<section class="fondo_color_principal">

<!--Container start-->
<div class="container">

  <div class="section_promocion_izq color_secundario">
    <h3>DURANTE TODO EL MES <br>Promociónes de cerveza NEGRA</h3>
  </div>
  <div class="section_promocion_der">
    <a href="#" class="btn boton_gris">Ver más<i class="ion-arrow-right-c"></i></a>
  </div>

</div>
<!--Container end-->
</section>
<!--Section fondo de color de ancho al 100% end-->



<!--Section Avatar de usuarios start-->
<section class="section_avatar">

  <div class="row">
    <div class="small-12 medium-10 medium-centered columns">
      <h4 class="text_center">Ellos confian en nuestra plataforma. Sumate vos también con tu cerveza!</h4>
      <hr>
    </div>

    <div class="small-12 columns">
      <p class="avatar_titulo_comentarios">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat vomy nibh euismod tincidunt ut laoreet dolore magn.
      </p>
    </div>
  </div>

  <div class="row">
    <article class="small-12 medium-6 large-3 columns margin_bottom_30">
      <a href="#"><img src="images/usuario-1.jpg" alt="usuario 1"></a>
      <h4>Carlos Vazquez</h4>
      <hr class="hr_separador">
      <p>La plataforma de "Artesanal Beer" me ayudo muchisimo, solo tengo que producir!</p>
    </article>
    <article class="small-12 medium-6 large-3 columns margin_bottom_30">
      <a href="#"><img src="images/usuario-2.jpg" alt="usuario 2"></a>
      <h4>Brenda Schik</h4>
      <hr class="hr_separador">
      <p>Los costos que maneja la plataforma son muy razonables. Hace solo 5 meses que la uso!</p>
    </article>
    <article class="small-12 medium-6 large-3 columns margin_bottom_30">
      <a href="#"><img src="images/usuario-3.jpg" alt="usuario 3"></a>
      <h4>Jose Perez</h4>
      <hr class="hr_separador">
      <p>Con la plataforma pude ofrecer a mis clientes la posibilidad de pagar con credito y debito!</p>
    </article>
    <article class="small-12 medium-6 large-3 columns margin_bottom_30">
      <a href="#"><img src="images/usuario-4.jpg" alt="usuario 4"></a>
      <h4>Juan Pest</h4>
      <hr class="hr_separador">
      <p>Producia mi cerveza pero no contaba con logistica. La plataforma de Artesanal Beer lo soluciono!</p>
    </article>
  </div>

</section>
<!--Section Avatar de usuarios end-->


<!--Section Categorias destacadas de usuarios start-->
<section class="section_categorias_destacadas">

  <div class="row">
    <div class="small-12 columns">
      <h2 class="text_center">Categorias Destacadas</h2>
      <hr>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente cupiditate sint earum cum cumque, veniam fugit dolore, deserunt neque ratione quaerat enim fuga, quibusdam repellat assumenda vel a modi eligendi.
      </p>
    </div>
  </div>

  <div class="row">
    <div class="small-12 medium-6 columns">
      <a href="#">
        <article class="text_center">
          <img src="images/category-cursos.jpg" alt="category 1">
          <div class="container_texto_categorias">
            <h3>Cursos de Elaboración</h3>
            <hr class="linea_blanca">
            <p>
              Lorem ipsum dolor sit amet.
            </p>
          </div>
        </article>
      </a>
    </div>
    <div class="small-12 medium-6 columns">
      <a href="#">
        <article class="text_center">
          <img src="images/category-negra.jpg " alt="category 2">
          <div class="container_texto_categorias">
            <h3>Cervezas Negras</h3>
            <hr class="linea_blanca">
            <p>
              Lorem ipsum dolor sit amet.
            </p>
          </div>
        </article>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="small-12 medium-6 columns">
      <a href="#">
        <article class="text_center">
          <img src="images/category-roja.jpg" alt="category 3">
          <div class="container_texto_categorias">
            <h3>Cervezas Rojas</h3>
            <hr class="linea_blanca">
            <p>
              Lorem ipsum dolor sit amet.
            </p>
          </div>
        </article>
      </a>
    </div>
    <div class="small-12 medium-6 columns">
      <a href="#">
        <article class="text_center">
          <img src="images/category-rubia.jpg" alt="category 4">
          <div class="container_texto_categorias">
            <h3>Cervezas Rubias</h3>
            <hr class="linea_blanca">
            <p>
              Lorem ipsum dolor sit amet.
            </p>
          </div>
        </article>
      </a>
    </div>
  </div>

</section>
<!--Section Categorias destacadas de usuarios end-->



<!--Section caracteristicas del servicio start-->
<section class="section_caracteristicas">

  <!--Fondo negro opacity start-->
  <div class="fondo_negro_opacity color_blanco">

    <div class="row">
      <article class="small-12 medium-6 columns text_center">
        <img src="{{ asset('images/premium.png') }}" alt="premium">
        <h4>Productos Premium &amp; <br>Calidad Garantizada.</h4>
        <hr class="linea_blanca">
        <p>Lorem ipsum dolor sit amet,consectetuer adipiscing elit, Lorem ipsum dolor</p>
        <a href="#">Leer más >></a>
      </article>

      <article class="small-12 medium-6 columns text_center">
        <img src="{{ asset('images/cupon.png') }}" alt="cupon">
        <h4>Cupones de <br>Descuento.</h4>
        <hr class="linea_blanca">
        <p>Lorem ipsum dolor sit amet,consectetuer adipiscing elit, Lorem ipsum dolor</p>
        <a href="#">Leer más >></a>
      </article>
    </div>

    <div class="row">
      <article class="small-12 medium-6 columns text_center">
        <img src="{{ asset('images/especiales.png') }}" alt="especiales">
        <h4>Consulte por <br>Tipos Especiales.</h4>
        <hr class="linea_blanca">
        <p>Lorem ipsum dolor sit amet,consectetuer adipiscing elit, Lorem ipsum dolor</p>
        <a href="#">Leer más >></a>
      </article>

      <article class="small-12 medium-6 columns text_center">
        <img src="{{ asset('images/24.png') }}" alt="24">
        <h4>Contactanos <br>las 24 horas.</h4>
        <hr class="linea_blanca">
        <p>Lorem ipsum dolor sit amet,consectetuer adipiscing elit, Lorem ipsum dolor</p>
        <a href="#">Leer más >></a>
      </article>
    </div>

    <div class="row">
      <!--NEWSLETTER start-->
      <div class="small-12 columns newsletter text_center">
        <h5>SUSCRIBITE <span class="tipo_ligth">A NUESTRO NEWSLETTER</span></h5>
        <p>
          Enterate de las últimas novedades y tendencias sobre la cerveza artesanal.
        </p>
        <hr>
        <form action="" method="post">
          <input class="newsletter_input" name="email" type="email" placeholder="Email">
          <input class="newsletter_enviar" name="enviar" type="submit" value="Enviar">
        </form>
      </div>
      <!--NEWSLETTER end-->
    </div>

  </div>
  <!--Fondo negro opacity end-->

</section>
<!--Section caracteristicas del servicio end-->
@section('scripts')
  <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
  <script>
    $('.bxslider').bxSlider({
      auto: true,
      mode: 'fade',
      captions: true
    })
  </script>
@endsection

@endsection

@section('footer')

    @include('footer.footer')

@endsection

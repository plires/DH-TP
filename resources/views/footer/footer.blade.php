<!--fondo de color full width footer start -->
<div id="footer">


    <!--footer start -->
    <footer class="row">

      <!--Primer Bloque Start-->
      <div class="primary small-12 medium-6 columns">
        <div class="logo">
          <img src="{{ asset('images/logo-footer.png') }}" alt="logo-footer">
        </div>

        <div class="main-footer-description">
          <p >
            Fringilla sit amet eros at, eleifend rhoncus lorem. Duis et velit tincidunt, congue mauris sed, laoreet tortor. In interdum semper tortor nec eleifend. Morbi sed purus ac elit egestas vestibulum. Nam quis tempor turpis, placerat egestas sem. Aenean sed erat at sem posuere mollis. Integer id arcu purus.
          </p>
        </div>

        <!--Bloque de datos Start-->
        <div class="main-footer-directions">
            <a href="#">Rivadavia 701 - CABA
              <i class="ion-ios-location"></i>
            </a><br><br>

            <a href="#">054.4552.2211
              <i class="ion-ios-telephone"></i>
            </a><br><br>

            <a href="mailto:info@beer.com">info@beer.com
              <i class="ion-email"></i>
            </a><br><br>
        </div>
        <!--Bloque de datos End-->
        
        <!--Redes Sociales Start-->
        <div class="social-networks">
          <a href="#"><img src="{{ asset('images/facebook.png') }}" alt="facebook-icon"></a>
          <a href="#"><img src="{{ asset('images/twitter.png') }}" alt="twitter-icon"></a>
          <a href="#"><img src="{{ asset('images/instagram.png') }}" alt="instagram-icon"></a>
          <a href="#"><img src="{{ asset('images/linkedin.png') }}" alt="linkedin-icon"></a>
        </div>
        <!--Redes Sociales end-->
      </div>
      <!--Primer Bloque end-->


      <!--Segundo Bloque Start-->
      <div class="secundary small-12 medium-6 columns">
        <h2>Contacto</h2>
        <form action="script.php" method="post">
          <input type="text" name="nombre_y_apellido" required placeholder="Apellido y Nombre">
          <input type="text" name="email" required placeholder="Direccion de Correo">
          <input type="text" name="telefono" required placeholder="Telefono">
          <button type="Submit" class="submit-button">ENVIAR</button>
        </form>
      </div>
      <!--Segundo Bloque end-->

    </footer>
    <!--footer end -->


</div>
<!--fondo de color full width footer end -->
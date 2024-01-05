<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Inicio</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
      >
        <a
          href="http://fedac-app.test.xyz/"
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 50px"
        >
        <img class="imagen" width="150" heigth="150" src="https://fedac.com.ec/wp-content/uploads/2016/08/logo_fedac-1.png">
          <span class="text-primary">FEDAC</span>
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
          <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="http://fedac-app.test.xyz/" class="nav-item nav-link active">Inicio</a>
            <a href="about.html" class="nav-item nav-link">Sobre nosotros</a>
            <a href="class.html" class="nav-item nav-link">Productos</a>
            <a href="team.html" class="nav-item nav-link">Puntos de venta</a>

            <a href="contact.html" class="nav-item nav-link">Contáctanos</a>
          </div>

          {{-- Login --}}


            @if (Route::has('login'))

                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary px-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary px-4">Iniciar sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary px-4">Registrarse</a>
                    @endif
                @endauth

            @endif



        </div>
      </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid px-0 px-md-5 mb-5"
    style="background-image: url('https://www.fedac.com.ec/wp-content/uploads/2016/08/bg-1.png'); width: 100%; height: 100vh; ">
      <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
          {{-- <h4 class="text-white mb-4 mt-5 mt-lg-0">El sabor del campo</h4> --}}
          <h1 class="display-3 font-weight-bold text-dark">
            El Sabor Del Campo
          </h1>
          <p class="text-dark mb-4">
            FEDAC es una empresa artesanal ecuatoriana, formada hace más de 40 años
            ofreciéndote los mejores productos lácteos al por mayor y menor
          </p>
          <a href="class.html" class="btn btn-secondary mt-1 py-3 px-5">Ver productos</a>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <img class="img-fluid mt-5" src="https://fedac.com.ec/wp-content/uploads/2015/10/productos-de-fedac.jpg" alt="" style="border-radius:22px;"/>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Facilities Start -->
    {{-- <div class="container-fluid pt-5">
      <div class="container pb-3">
        <div class="row">
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Play Ground</h4>
                <p class="m-0">
                  Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero
                  lorem amet elitr vero...
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Music and Dance</h4>
                <p class="m-0">
                  Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero
                  lorem amet elitr vero...
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Arts and Crafts</h4>
                <p class="m-0">
                  Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero
                  lorem amet elitr vero...
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Safe Transportation</h4>
                <p class="m-0">
                  Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero
                  lorem amet elitr vero...
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Healthy food</h4>
                <p class="m-0">
                  Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero
                  lorem amet elitr vero...
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4>Educational Tour</h4>
                <p class="m-0">
                  Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero
                  lorem amet elitr vero...
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- Facilities Start -->

    <!-- About Start -->
    <div class="container-fluid py-2">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <img
              class="img-fluid rounded mb-5 mb-lg-0"
              src="https://www.fedac.com.ec/wp-content/uploads/2015/10/yogurt-fedac-de-frutilla-copa.jpg"
              alt=""
            />
          </div>
          <div class="col-lg-7">
            <p class="section-title pr-5">
              <span class="pr-2">¿Qué hacemos?</span>
            </p>
            <h1 class="mb-4">Somos una empresa artesanal ecuatoriana</h1>
            <p>
                Nos dedicamos a la comercialización y producción responsable de productos lácteos al por mayor y menor, nos enfocamos en crear alimentos bajo normas de calidad que generen un beneficio al consumidor, tanto por su valor nutricional como por su inocuidad. Nuestra fábrica está ubicada en el cantón Rumiñahui, parroquia de Sangolquí, a 20 minutos de la ciudad de Quito, nuestras instalaciones cumplen con licencias y permisos sanitarios, ambientales y municipales. Nuestro objetivo es brindar una atención personalizada al cliente, ofreciéndole productos de alta calidad a precios competitivos y tiempos de respuesta cortos.
            </p>
            <div class="row pt-2 pb-4">
              <div class="col-6 col-md-4">
                <img class="img-fluid rounded" src="https://www.fedac.com.ec/wp-content/uploads/2015/10/pizza-de-queso-mozzarella.jpg" alt="" />
              </div>
              <div class="col-6 col-md-8">
                <ul class="list-inline m-0">
                  <li class="py-2 border-top border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>A partir de 100% leche de vaca
                  </li>
                  <li class="py-2 border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Bajo estrictas normas de calidad
                  </li>
                  <li class="py-2 border-bottom">
                    <i class="fa fa-check text-primary mr-3"></i>Distinguidos en su valor nutricional
                    como su inocuidad
                  </li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Beneficios Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Valores nutricionales</span>
          </p>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
                <img class="card-img-top mb-2" src="https://img.freepik.com/foto-gratis/jarra-vidrio-leche-fresca-mesa-madera_114579-18231.jpg?size=626&ext=jpg&ga=GA1.1.1880011253.1699315200&semt=ais" alt="" />

              <div class="card-body text-center">
                <h4 class="card-title">Consumo de lácteos</h4>
                <p class="card-text">
                    La leche es una de las fuentes de calcio más destacadas por lo que los especialistas recomiendan tomar leche diariamente desde el nacimiento, para ayudar a que se forme y mantenga la masa ósea en nuestros hijos. Son alimentos ricos en nutrientes, éstos proveen proteínas, vitaminas y minerales relativos a su contenido energético. Un número de estudios encontrados al azar demostraron que un mayor consumo de leche y otros alimentos lácteos ricos en calcio, incrementan la masa ósea durante el crecimiento y ayudan a reducir pérdida ósea en adultos.
                </p>
              </div>

            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="data:image/jpeg;base64,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" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title">Beneficios Yogurt</h4>
                <p class="card-text">
                    Las bacterias que contienen el yogurt con Prebióticos recarga una barrera de protección que tiene el intestino para evitar el paso de sustancias extrañas hacia la sangre, refuerza el sistema inmunológico. Esta barrera conformada por bacterias buenas inocuas para los seres humanos, también favorece la digestión y los movimientos gástricos naturales.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="data:image/jpeg;base64,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" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title">Beneficios Queso</h4>
                <p class="card-text">
                    El queso es uno de los alimentos más importantes de nuestra dieta. Es nutritivo y aporta el cuerpo calcio, proteínas indispensables, tanto como la carne, además el queso es uno de los alimentos favoritos en el mundo entero. El queso es versátil, voluble y gustoso. Puede llegar a cubrir el 65% de las necesidades de calcio que necesita nuestro organismo. Para los vegetarianos que toman productos lácteos es un complemento indispensable en su dieta para compensar las proteínas de la carne.
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Beneficios End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
      <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
          <a
            href=""
            class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
            style="font-size: 40px; line-height: 40px"
          >
          <img class="imagen" width="150" heigth="150" src="https://fedac.com.ec/wp-content/uploads/2016/08/logo_fedac-1.png">
            <span class="text-white">FEDAC</span>
          </a>

          <div class="d-flex justify-content-start mt-4">
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-twitter"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Contactos</h3>

          <div class="d-flex">
            <h4 class="fa fa-envelope text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Email</h5>
              <p>info@fedac.com.ec</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-phone-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Phone</h5>
              <p>0998377007</p>
              <p>022871774</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Links</h3>
          <div class="d-flex flex-column justify-content-start">
            <a class="text-white mb-2" href="http://fedac-app.test.xyz/"
              ><i class="fa fa-angle-right mr-2"></i>Inicio</a
            >
            <a class="text-white mb-2" href="http://fedac-app.test.xyz/about.html"
              ><i class="fa fa-angle-right mr-2"></i>Sobre nosotros</a
            >
            <a class="text-white mb-2" href="http://fedac-app.test.xyz/class.html"
              ><i class="fa fa-angle-right mr-2"></i>Productos</a
            >
            <a class="text-white mb-2" href="http://fedac-app.test.xyz/team.html"
              ><i class="fa fa-angle-right mr-2"></i>Puntos de venta</a
            >
            <a class="text-white" href="http://fedac-app.test.xyz/contact.html"
              ><i class="fa fa-angle-right mr-2"></i>Contáctanos</a
            >
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Noticias</h3>
          <form action="">
            <div class="form-group">
              <input
                type="text"
                class="form-control border-0 py-4"
                placeholder="Your Name"
                required="required"
              />
            </div>
            <div class="form-group">
              <input
                type="email"
                class="form-control border-0 py-4"
                placeholder="Your Email"
                required="required"
              />
            </div>
            <div>
              <button
                class="btn btn-primary btn-block border-0 py-3"
                type="submit"
              >
                Submit Now
              </button>
            </div>
          </form>
        </div>
      </div>
      <div
        class="container-fluid pt-5"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
      >
        <p class="m-0 text-center text-white">
          &copy;
          <a class="text-primary font-weight-bold" href="#">Your Site Name</a>.
          All Rights Reserved.

          <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
          Designed by
          <a class="text-primary font-weight-bold" href="https://htmlcodex.com"
            >HTML Codex</a
          >
          <br />Distributed By:
          <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>



{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style>
    </head>
    <body class="">

        <div class="grid">
            <div class="d-flex flex row">
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
            </div>
        <div class="row" style="background-image: url('https://www.fedac.com.ec/wp-content/uploads/2016/08/bg-1.png'); width: 100%; height: 100vh; ">

        </div>
        <div>
            Hola
        </div>
        {{-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center  selection:bg-red-500 selection:text-white"> --}}
            {{-- <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto bg-gray-100">
                        <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="#FF2D20"/>
                    </svg>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <a href="https://laravel.com/docs" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Documentation</h2>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://laracasts.com" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Laracasts</h2>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://laravel-news.com" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Laravel News</h2>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <div class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900">Vibrant Ecosystem</h2>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Forge</a>, <a href="https://vapor.laravel.com" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Vapor</a>, <a href="https://nova.laravel.com" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Nova</a>, and <a href="https://envoyer.io" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Telescope</a>, and more.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 group-hover:stroke-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div> --}}
        {{-- </div> --}}
    {{-- </body> --}}
{{-- </html> --}}

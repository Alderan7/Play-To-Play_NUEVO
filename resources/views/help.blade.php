@extends('layouts.header',
    ['title' => '', 'css_files' => ['help'], 
    'js_files' => ['app']])
    
@section('content')

<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/help.css') }}" rel="stylesheet">
<div class="margen container">

<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        ¿Qué es Play To Play?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <p>Play To Play es una aplicación web dedicada a los videojuegos, desde su concepción en forma de proyecto hasta su nacimiento en forma de demo jugable
        o versión definitiva. Es una página dedicada tanto a creadores y creadoras de videojuegos como a todas esas personas que sencillamente disfrutan jugando 
        con ellos. En Play To Play descubrirás una gran cantidad de juegos de los más diversos géneros, así como una gran variedad de precios que se podrán 
        adaptar a todos los bolsillos. 
      </p>

        <p>Por otra parte, también tenemos una gran sección dedicada a proyectos, es decir, juegos que solo existen en la mente de sus creadores y necesitan 
          financiación para poder llevar a cabo su desarrollo. En las páginas dedicadas a cada proyecto podréis encontrar todos los datos necesarios para 
          saber cómo colaborar con sus creadores y cómo aportar vuestro granito de arena si queréis que ese juego vea la luz.
        </p>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        ¿En qué plataformas está disponible?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
      <p>Por ahora, todos los juegos de nuetro catálogo estarán solo disponibles para Windows, aunque dependerá de cada creador y creadora si quieren 
        que estén disponibles para más plataformas como Linux o Mac. Por supuesto, nos hemos centrado en el mundo del PC y no tenemos juegos para consolas
        o dispositivos móviles, pero no descartamos que en un futuro se amplíen nuestras opciones y podamos ofrecer muchos más servicios en otras 
        plataformas.
      </p>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        ¿Qué formas de pago existen?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
      <p>Actualmente, el sistema de pago será a través de PayPal, usando una tarjeta de crédito que el comprador tenga disponible. Las compras se realizarán 
      automáticamente una vez el sistema haya comprobado la validez de la tarjeta y que el cobro se ha realizado con éxito. Aunque en estos momentos
      no dispongamos de otros medios de pago, en el futuro pensamos implementar otras formas para facilitar a los usuarios sus compras en nuestra aplicación.
    </p>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        ¿Qué diferencias existen entre los planes de usuario y creador?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
      <div class="accordion-body">
      <p>Los planes de creador y de usuario son, en principio, la mayor separación que podemos encontrar entre ambos tipos de personas que pueden acceder a la web.
        Por un lado, los usuarios tendrán tres tipos de planes con diferentes accesos a juegos o ventajas, pero todos ellos dispondrán de su biblioteca y acceso
        inmediato a todos los juegos gratuitos o demos de los que disponga nuestro catálogo. Los planes de usuario medio o avanzado desbloquearán la posibilidad
        de acceder de manera gratuita a unos juegos u otros, y el tipo de pago será siempre mensual, por la cantidad indicada en el apartado de "Planes de Usuario".
      </p>
      <p>De igual forma, los creadores y creadoras tendrán una biblioteca de juegos a su disposición, pero no podrán modificar su plan de usuario, disponiendo
        tan solo del tipo de usuario básico. Por supuesto, donde más opciones tendrán será a la hora de crear un proyecto, ya que tendrán a su disposición
        el panel de creación y modificación de los mismos, donde podrán acceder para editarlos a su antojo. Al igual que los usuarios, los creadores tendrán 
        la posibilidad de acceder en cualquier momento a la ventana de selección de planes para cambiar entre ellos en cualquier momento.
      </p>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        ¿Puedo probar los juegos antes de compralos?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
      <div class="accordion-body">
     <p>Lamentablemente, no podemos asegurar que todos los juegos vayan a disponer de una Demo jugable para poder probarlos antes de comprarlos. Eso dependerá de los 
       creadores y creadoras y de las posibilidades que hayan tenido en cuenta a la hora de financiar sus proyectos. Al ser una página dedicada albergar todo tipo de proyectos, 
       no podemos obligar a nadie a que ofrezca este tipo de servicio, pero por supuesto, cuando esté disponible aparecerá la opción en la página del juego.
     </p>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        ¿Qué ocurre con los proyectos que no se han financiado?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
      <div class="accordion-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo dapibus elit nec posuere. Nullam tempus dui eget lobortis ullamcorper. Morbi vel dolor sit amet lectus sodales ultricies at ac nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In vehicula libero lorem, quis porttitor eros lobortis quis. Vivamus dapibus semper nibh, in placerat mi venenatis et. In vel velit ex.

        Ut porta condimentum bibendum. Maecenas ex mi, accumsan eu felis in, rhoncus feugiat nisi. Sed luctus tristique aliquet. Sed commodo dolor vitae ipsum ultrices pellentesque. Ut magna dolor, dictum sed dui eu, finibus faucibus est. Nulla tincidunt lectus et neque cursus accumsan. Donec arcu magna, sollicitudin non ultrices quis, lacinia quis mauris. Ut lacus orci, luctus sit amet nisi at, finibus sagittis sem. Suspendisse at pellentesque sapien. Mauris euismod ac elit eget ullamcorper. Duis vehicula metus et risus pharetra dictum. Morbi molestie neque et aliquam varius. Quisque malesuada lorem mauris, non tempor nisi iaculis vel. Praesent feugiat commodo cursus.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        ¿Cómo pido un reembolso?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
      <div class="accordion-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo dapibus elit nec posuere. Nullam tempus dui eget lobortis ullamcorper. Morbi vel dolor sit amet lectus sodales ultricies at ac nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In vehicula libero lorem, quis porttitor eros lobortis quis. Vivamus dapibus semper nibh, in placerat mi venenatis et. In vel velit ex.

        Ut porta condimentum bibendum. Maecenas ex mi, accumsan eu felis in, rhoncus feugiat nisi. Sed luctus tristique aliquet. Sed commodo dolor vitae ipsum ultrices pellentesque. Ut magna dolor, dictum sed dui eu, finibus faucibus est. Nulla tincidunt lectus et neque cursus accumsan. Donec arcu magna, sollicitudin non ultrices quis, lacinia quis mauris. Ut lacus orci, luctus sit amet nisi at, finibus sagittis sem. Suspendisse at pellentesque sapien. Mauris euismod ac elit eget ullamcorper. Duis vehicula metus et risus pharetra dictum. Morbi molestie neque et aliquam varius. Quisque malesuada lorem mauris, non tempor nisi iaculis vel. Praesent feugiat commodo cursus.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingEight">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        ¿Cómo me pongo en contacto con el servicio técnico?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEight">
      <div class="accordion-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo dapibus elit nec posuere. Nullam tempus dui eget lobortis ullamcorper. Morbi vel dolor sit amet lectus sodales ultricies at ac nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In vehicula libero lorem, quis porttitor eros lobortis quis. Vivamus dapibus semper nibh, in placerat mi venenatis et. In vel velit ex.

        Ut porta condimentum bibendum. Maecenas ex mi, accumsan eu felis in, rhoncus feugiat nisi. Sed luctus tristique aliquet. Sed commodo dolor vitae ipsum ultrices pellentesque. Ut magna dolor, dictum sed dui eu, finibus faucibus est. Nulla tincidunt lectus et neque cursus accumsan. Donec arcu magna, sollicitudin non ultrices quis, lacinia quis mauris. Ut lacus orci, luctus sit amet nisi at, finibus sagittis sem. Suspendisse at pellentesque sapien. Mauris euismod ac elit eget ullamcorper. Duis vehicula metus et risus pharetra dictum. Morbi molestie neque et aliquam varius. Quisque malesuada lorem mauris, non tempor nisi iaculis vel. Praesent feugiat commodo cursus.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingNine">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        Soy creador/a ¿Cómo puedo transformar mi proyecto en un juego?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingNine">
      <div class="accordion-body">
      <p>En estos momentos no existe una manera de transformar un proyecto financiado en un juego directamente, puesto que los creadores y creadoras no tienen acceso
        al apartado de los juegos para poder editarlos. Actualmente el método de transformación se basa en el contacto con los administradores de la página para que estos
        eliminen el proyecto de la sección correspondiente y añadan el juego en nuestra amplia biblioteca para que esté disponible para comprar.
      </p>
    </div>
  </div>

</div>

</div>
@endsection
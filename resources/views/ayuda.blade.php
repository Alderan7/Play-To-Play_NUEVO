@extends('layouts.header',
    ['title' => '', 'css_files' => ['ayuda'], 
    'js_files' => ['app']])
    
@section('content')

<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/ayuda.css') }}" rel="stylesheet">
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
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo dapibus elit nec posuere. Nullam tempus dui eget lobortis ullamcorper. Morbi vel dolor sit amet lectus sodales ultricies at ac nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In vehicula libero lorem, quis porttitor eros lobortis quis. Vivamus dapibus semper nibh, in placerat mi venenatis et. In vel velit ex.

        Ut porta condimentum bibendum. Maecenas ex mi, accumsan eu felis in, rhoncus feugiat nisi. Sed luctus tristique aliquet. Sed commodo dolor vitae ipsum ultrices pellentesque. Ut magna dolor, dictum sed dui eu, finibus faucibus est. Nulla tincidunt lectus et neque cursus accumsan. Donec arcu magna, sollicitudin non ultrices quis, lacinia quis mauris. Ut lacus orci, luctus sit amet nisi at, finibus sagittis sem. Suspendisse at pellentesque sapien. Mauris euismod ac elit eget ullamcorper. Duis vehicula metus et risus pharetra dictum. Morbi molestie neque et aliquam varius. Quisque malesuada lorem mauris, non tempor nisi iaculis vel. Praesent feugiat commodo cursus.
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
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo dapibus elit nec posuere. Nullam tempus dui eget lobortis ullamcorper. Morbi vel dolor sit amet lectus sodales ultricies at ac nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In vehicula libero lorem, quis porttitor eros lobortis quis. Vivamus dapibus semper nibh, in placerat mi venenatis et. In vel velit ex.

        Ut porta condimentum bibendum. Maecenas ex mi, accumsan eu felis in, rhoncus feugiat nisi. Sed luctus tristique aliquet. Sed commodo dolor vitae ipsum ultrices pellentesque. Ut magna dolor, dictum sed dui eu, finibus faucibus est. Nulla tincidunt lectus et neque cursus accumsan. Donec arcu magna, sollicitudin non ultrices quis, lacinia quis mauris. Ut lacus orci, luctus sit amet nisi at, finibus sagittis sem. Suspendisse at pellentesque sapien. Mauris euismod ac elit eget ullamcorper. Duis vehicula metus et risus pharetra dictum. Morbi molestie neque et aliquam varius. Quisque malesuada lorem mauris, non tempor nisi iaculis vel. Praesent feugiat commodo cursus.
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
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo dapibus elit nec posuere. Nullam tempus dui eget lobortis ullamcorper. Morbi vel dolor sit amet lectus sodales ultricies at ac nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In vehicula libero lorem, quis porttitor eros lobortis quis. Vivamus dapibus semper nibh, in placerat mi venenatis et. In vel velit ex.

        Ut porta condimentum bibendum. Maecenas ex mi, accumsan eu felis in, rhoncus feugiat nisi. Sed luctus tristique aliquet. Sed commodo dolor vitae ipsum ultrices pellentesque. Ut magna dolor, dictum sed dui eu, finibus faucibus est. Nulla tincidunt lectus et neque cursus accumsan. Donec arcu magna, sollicitudin non ultrices quis, lacinia quis mauris. Ut lacus orci, luctus sit amet nisi at, finibus sagittis sem. Suspendisse at pellentesque sapien. Mauris euismod ac elit eget ullamcorper. Duis vehicula metus et risus pharetra dictum. Morbi molestie neque et aliquam varius. Quisque malesuada lorem mauris, non tempor nisi iaculis vel. Praesent feugiat commodo cursus.
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
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo dapibus elit nec posuere. Nullam tempus dui eget lobortis ullamcorper. Morbi vel dolor sit amet lectus sodales ultricies at ac nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In vehicula libero lorem, quis porttitor eros lobortis quis. Vivamus dapibus semper nibh, in placerat mi venenatis et. In vel velit ex.

        Ut porta condimentum bibendum. Maecenas ex mi, accumsan eu felis in, rhoncus feugiat nisi. Sed luctus tristique aliquet. Sed commodo dolor vitae ipsum ultrices pellentesque. Ut magna dolor, dictum sed dui eu, finibus faucibus est. Nulla tincidunt lectus et neque cursus accumsan. Donec arcu magna, sollicitudin non ultrices quis, lacinia quis mauris. Ut lacus orci, luctus sit amet nisi at, finibus sagittis sem. Suspendisse at pellentesque sapien. Mauris euismod ac elit eget ullamcorper. Duis vehicula metus et risus pharetra dictum. Morbi molestie neque et aliquam varius. Quisque malesuada lorem mauris, non tempor nisi iaculis vel. Praesent feugiat commodo cursus.
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
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo dapibus elit nec posuere. Nullam tempus dui eget lobortis ullamcorper. Morbi vel dolor sit amet lectus sodales ultricies at ac nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In vehicula libero lorem, quis porttitor eros lobortis quis. Vivamus dapibus semper nibh, in placerat mi venenatis et. In vel velit ex.

        Ut porta condimentum bibendum. Maecenas ex mi, accumsan eu felis in, rhoncus feugiat nisi. Sed luctus tristique aliquet. Sed commodo dolor vitae ipsum ultrices pellentesque. Ut magna dolor, dictum sed dui eu, finibus faucibus est. Nulla tincidunt lectus et neque cursus accumsan. Donec arcu magna, sollicitudin non ultrices quis, lacinia quis mauris. Ut lacus orci, luctus sit amet nisi at, finibus sagittis sem. Suspendisse at pellentesque sapien. Mauris euismod ac elit eget ullamcorper. Duis vehicula metus et risus pharetra dictum. Morbi molestie neque et aliquam varius. Quisque malesuada lorem mauris, non tempor nisi iaculis vel. Praesent feugiat commodo cursus.
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

</div>

</div>
@endsection
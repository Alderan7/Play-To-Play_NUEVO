<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/paypal_fake.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
        @if($tipo=="Juego")
        <form action="{{ url("user") }}" method="post">
        @elseif($tipo=="Proyecto")
        <form action="/paypal_pay" method="post">
        @endif
        @csrf
            <input type="hidden" name="id_game" value="{{$codigo}}">
            <input type="hidden" name="id_player" value="{{ Auth::user()->id }}">  
            <div class="codigo-compra">9LL7RRY8HDAVE</div>
            <h3>Detalles de la compra</h3>
            <div class="opcion">
                <input placeholder="{{$tipo}}: {{$nombre}}" type="text" id="nombre" name="nombre" disabled>
            </div>
            <div class="opcion">
                <input placeholder="{{$precio}} €" type="text" id="precio" name="precio" disabled>
                <input placeholder="Cantidad: 1" type="text" name="cantidad"  id="cantidad" disabled>
            </div>
            <div class="opcion">
                <button type="submit">Continuar</button>
                <div class="tecnologia">
                    <p>Tecnología de </p><img src="../images/paypal.png">
                </div>
            </div>
        </form>
        <div class="enlaces">
            <div class="elemento-enlaces">
                <p>Acuerdos legales</p>
                <p>Privacidad</p>
            </div>
            <p class="elemento-enlaces fechas">©1999 - 2022</p>
        </div>
    </div>
</body>
</html>
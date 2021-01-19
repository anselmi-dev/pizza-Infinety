<!DOCTYPE html>
<html>
<head>
    <title>Pizza Infinety</title>
</head>
<body>
    <h1 style="background: #cbd9f1; border-bottom: 6px #1155cc; border-bottom: 6px green solid;">
        <a href="{{ url('/') }}">Pizza Infinety</a>
    </h1>

    <h3>Hola, {{ $user->name }}</h3>

    @php
        $note = json_decode($order->note);
    @endphp

    <h3>
        Actualizamos tu pedido. Puedes ir a revisar el estado.
        <br>
        <br>
        Order: <br>
        <strong>{{ $note->name }}</strong>
        <strong>{{ $order->price }}</strong>

        <br>
        <br>

        <strong>Gracias por usar Pizza Infinety</strong>
    </h3>
</body>

</html>

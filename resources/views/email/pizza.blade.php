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
        Tu pedido de una "<strong>{{ $note->name }}</strong>" fue recibido! <br> Pronto estaremos enviando tu pizza!
        <br>
        <hr>
        <table style="max-width: 100%; width: 400px">
            <tbody>
                <tr>
                    <td style="vertical-align: baseline;">
                        <strong>Ingredientes:</strong>
                    </td>
                    <td>
                        @foreach ($note->ingredients as $element)
                            {{ $element->name }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Total:</strong>
                    </td>
                    <td>
                        USD {{ $order->price }}
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <br>

        <strong>Gracias por usar Pizza Infinety</strong>
    </h3>
</body>

</html>

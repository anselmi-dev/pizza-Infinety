@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="py-10">
        <div class="hero-text w-full px-4">
            <h1 class=" font-bold text-4xl md:text-5xl max-w-xl text-gray-900 leading-tight mb-1">
                Tu pizza sabe mejor a domicilio
            </h1>
            <p class="text-2xl">
                En <strong>Pizza infinety</strong> somos expertos en delivery. Por eso si tienes hambre, solo tienes que hacer tu pedido de comida online con nosotros.
            </p>

            <hr class=" w-12 h-1 bg-orange-500 rounded-full mt-8">
        </div>

        <list-pizzas>
        </list-pizzas>
    </div>
</div>
@endsection

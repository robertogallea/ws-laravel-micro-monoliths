@extends('shared::layout.app')

@section('title', 'Gestione prodotti')

@section('content')
    <p class="text-gray-700 leading-relaxed">
        Questo è un layout base pulito e moderno con Tailwind CSS 4. Puoi personalizzarlo facilmente aggiungendo
        componenti, sezioni o contenuti dinamici.
    </p>
    <div class="grid grid-cols-2 w-full mt-4 bg-gray-100 p-4 gap-y-8">
        <div class="font-bold">Nome</div>
        <div class="font-bold text-center">Prezzo</div>
        @foreach($products as $product)
            <div>
                {{ $product->name }}
            </div>
            <div class="text-center">
                <div>{{ Number::currency($product->price) }}</div>
            </div>
        @endforeach
    </div>
@endsection

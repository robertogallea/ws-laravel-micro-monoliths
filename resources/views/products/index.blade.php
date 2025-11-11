@extends('layout.app')

@section('page_title', 'Gestione prodotti')

@section('title')
    Gestione <span class="text-neon-pink">Prodotti</span>
@endsection


@section('content')
    <div
        class="grid grid-cols-2 text-sm font-semibold border-b border-electric-blue/40 bg-electric-blue/10 py-3 px-4 rounded-t-2xl">
        <div>Nome</div>
        <div class="text-right">Prezzo</div>
    </div>
    <div class="divide-y divide-muted/70">
        @foreach($products as $product)
            <div class="grid grid-cols-2 items-center py-3 px-4 hover:bg-acid-yellow/10 transition">
                <div>
                    {{ $product->name }}
                </div>
                <div class="text-right">
                    <div>€ {{ Number::currency($product->price) }}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

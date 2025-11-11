@extends('layout.app')

@section('page_title', 'Gestione ordini')

@section('title')
    Gestione <span class="text-neon-pink">Ordini</span>
@endsection

@section('content')
    @auth
        <div class="flex items-center gap-3 w-full sm:w-auto mb-8">
            <a class="rounded-full bg-neon-pink text-white px-4 py-2 text-sm font-semibold glow-neon hover:brightness-110 transition"
               href="{{ route('orders.create') }}">Crea ordine</a>
        </div>
    @endauth
    <div
        class="grid grid-cols-4 text-sm font-semibold border-b border-electric-blue/40 bg-electric-blue/10 py-3 px-4 rounded-t-2xl">
        <div>Cliente</div>
        <div class="text-center"># prodotti</div>
        <div>Prodotti</div>
        <div class="text-right">Totale</div>
    </div>
    <div class="divide-y divide-muted/70">
        @foreach($orders as $order)
            <div class="grid grid-cols-4 items-center py-3 px-4 hover:bg-acid-yellow/10 transition">
                <div>
                    {{ $order->user->name }}
                </div>
                <div class="text-center">
                    {{ $order->products->count() }}
                </div>
                <div>
                    <div class="grid grid-cols-2">
                        @forelse($order->products as $product)
                            <div>{{ $product->name }}</div>
                            <div>€ {{ Number::currency($product->price) }}</div>
                        @empty
                            -
                        @endforelse
                    </div>
                </div>
                <div class="text-right">
                    € {{ Number::currency($order->amount) }}
                </div>
            </div>
        @endforeach
    </div>
@endsection

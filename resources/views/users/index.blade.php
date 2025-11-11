@extends('layout.app')

@section('page_title', 'Gestione utenti')

@section('title')
    Gestione <span class="text-neon-pink">Utenti</span>
@endsection

@section('content')
    <div
        class="grid grid-cols-4 text-sm font-semibold border-b border-electric-blue/40 bg-electric-blue/10 py-3 px-4 rounded-t-2xl">
        <div>Cliente</div>
        <div>Email</div>
        <div class="text-center"># ordini</div>
        <div class="text-right">Totale ordini</div>
    </div>
    <div class="divide-y divide-muted/70">
        @foreach($users as $user)
            <div class="grid grid-cols-4 items-center py-3 px-4 hover:bg-acid-yellow/10 transition">
                <div>
                    {{ $user->name }}
                </div>
                <div>
                    {{ $user->email }}
                </div>
                <div class="text-center">
                    {{ $user->orders->count() ?? '-' }}
                </div>
                <div class="text-right">
                    € {{ Number::currency($user->orders->sum('products_sum_price') ?? 0)}}
                </div>
            </div>
        @endforeach
    </div>
@endsection

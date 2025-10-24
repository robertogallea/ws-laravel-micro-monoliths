@extends('shared::layout.app')

@section('title', 'Gestione utenti')

@section('content')
    <p class="text-gray-700 leading-relaxed">
        Questo è un layout base pulito e moderno con Tailwind CSS 4. Puoi personalizzarlo facilmente aggiungendo
        componenti, sezioni o contenuti dinamici.
    </p>
    <div class="grid grid-cols-4 w-full mt-4 bg-gray-100 p-4 gap-y-8">
        <div class="font-bold">Cliente</div>
        <div class="font-bold text-center">Email</div>
        <div class="font-bold"># ordini</div>
        <div class="font-bold text-right">Totale ordini</div>
        @foreach($users as $user)
            <div>
                {{ $user->name }}
            </div>
            <div>
                {{ $user->email }}
            </div>
            <div class="text-center">
                {{ $user->orders->count() ?? '-' }}
            </div>
            <div class="text-center">
                € {{ Number::currency($user->orders->sum('products_sum_price') ?? 0)}}
            </div>
        @endforeach
    </div>
@endsection

@extends('shared::layout.app')

@section('title', 'Gestione ordini')

@section('content')
    <p class="text-gray-700 leading-relaxed mb-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet atque autem cum dolor doloremque dolorum ducimus,
        ipsam modi nesciunt nihil nisi nostrum optio, quas quasi quidem reprehenderit, rerum sed tempore ut veniam!
        Alias eveniet ex illo magnam, neque numquam ratione saepe tempore veritatis voluptate. Ad consectetur ea laborum
        nostrum vitae?
    </p>
    @auth
        <a class="w-64 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded rounded-md"
           href="{{ route('orders.create') }}">Crea ordine</a>
    @endauth
    <div class="grid grid-cols-4 w-full mt-4 bg-gray-100 p-4 gap-y-8">
        <div class="font-bold">Cliente</div>
        <div class="font-bold text-center"># prodotti</div>
        <div class="font-bold">Prodotti</div>
        <div class="font-bold text-right">Totale</div>
        @foreach($orders as $order)
            <div>
                {{ $order->user->name }}
            </div>
            <div class="text-center">
                {{--                {{ $order->products->count() }}--}}?
            </div>
            <div>
                <div class="grid grid-cols-2">
                    {{--                    @forelse($order->products as $product)--}}
                    {{--                        <div>{{ $product->name }}</div>--}}
                    {{--                        <div>{{ Number::currency($product->price) }}</div>--}}
                    {{--                    @empty--}}
                    {{--                        ---}}
                    {{--                    @endforelse--}}
                    ?
                </div>
            </div>
            <div class="text-right">
                {{ Number::currency($order->amount) }}
            </div>
        @endforeach
    </div>
@endsection

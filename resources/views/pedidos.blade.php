<x-app-layout>


        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p class="font-bold">Sucesso</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- Pedidos Atuais --}}
        <section class="mt-8 px-4 py-4 bg-white shadow-md rounded-lg">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Pedidos Atuais</h2>
            @foreach ($currentOrders as $pedido)
                <div class="border-b border-gray-200 mb-4 pb-4">
                    <h3 class="text-md font-semibold text-gray-600">Pedido #{{ $pedido->id }}</h3>
                    @php $statusInfo = \App\Helpers\StatusHelper::formatStatus($pedido->status); @endphp
                    <p class="text-sm text-gray-500">Status: <span
                            class="{{ $statusInfo['color'] }}">{{ $statusInfo['text'] }}</span></p>
                    <div class="mt-2">
                        @foreach ($pedido->orderItems as $item)
                            <p class="text-sm text-gray-600">{{ $item->product->name }} - Quantidade:
                                {{ $item->quantity }}
                                - Preço: R$ {{ $item->price }}</p>
                        @endforeach
                    </div>
                    <p class="text-sm font-semibold mt-2">Total: R$ {{ $pedido->total }}</p>
                </div>
            @endforeach
        </section>

        {{-- Pedidos Passados --}}
        <section class="mt-8 px-4 py-4 bg-gray-50 shadow-md rounded-lg">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Histórico de Pedidos</h2>
            @foreach ($pastOrders as $pedido)
                <div class="border-b border-gray-200 mb-4 pb-4">
                    <h3 class="text-md font-semibold text-gray-600">Pedido #{{ $pedido->id }}</h3>
                    @php $statusInfo = \App\Helpers\StatusHelper::formatStatus($pedido->status); @endphp
                    <p class="text-sm text-gray-500">Status: <span
                            class="{{ $statusInfo['color'] }}">{{ $statusInfo['text'] }}</span></p>
                    <div class="mt-2">
                        @foreach ($pedido->orderItems as $item)
                            <p class="text-sm text-gray-600">{{ $item->product->name }} - Quantidade:
                                {{ $item->quantity }} - Preço: R$ {{ $item->price }}</p>
                        @endforeach
                    </div>
                    <p class="text-sm font-semibold mt-2">Total: R$ {{ $pedido->total }}</p>
                </div>
            @endforeach
        </section>

    </div>

</x-app-layout>

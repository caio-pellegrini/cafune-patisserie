{{-- Pedidos Atuais --}}
<section class="current-orders">
    <h2>Pedidos Atuais</h2>
    @foreach($currentOrders as $pedido)
    <div class="pedido">
        <h3>Pedido #{{ $pedido->id }}</h3>
        <p>Status: {{ $pedido->status }}</p>
        <div class="itens">
            @foreach($pedido->orderItems as $item)
            <p>{{ $item->product->name }} - Quantidade: {{ $item->quantity }} - Preço: {{ $item->price }}</p>
            @endforeach
        </div>
        <p>Total: {{ $pedido->total }}</p>
    </div>
    @endforeach
</section>

{{-- Pedidos Atuais --}}
<section class="past-orders">
    <h2>Histórico de Pedidos</h2>
    @foreach($pastOrders as $pedido)
    <div class="pedido">
        <h3>Pedido #{{ $pedido->id }}</h3>
        <p>Status: {{ $pedido->status }}</p>
        <div class="itens">
            @foreach($pedido->orderItems as $item)
            <p>{{ $item->product->name }} - Quantidade: {{ $item->quantity }} - Preço: {{ $item->price }}</p>
            @endforeach
        </div>
        <p>Total: {{ $pedido->total }}</p>
    </div>
    @endforeach
</section>
{{-- Verifica se o produto foi passado para a view --}}
@if(isset($product))

    <div class="product-details">
        <h2>{{ $product->name }}</h2> {{-- Exibe o nome do produto --}}
        <p>{{ $product->description }}</p> {{-- Exibe a descrição do produto --}}
        <p>Preço: R$ {{ number_format($product->price, 2, ',', '.') }}</p> {{-- Exibe o preço do produto --}}

        {{-- Verifica se existe um caminho de imagem e exibe a imagem --}}
        @if($product->product_image)
            <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->name }}" style="max-width: 100%;">
        @endif

        {{-- Exibe a categoria do produto, se disponível --}}
        @if($product->category)
            <p>Categoria: {{ $product->category->name }}</p>
        @endif

        <form action="{{ route('addcarrinho') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="number" name="qnt" value="1">
            <input type="hidden" name="img" value="{{ $product->product_image }}">

            <button class="btn orange btn-large">Comprar</button>
        </form>
        
    </div>

@else
    <p>Produto não encontrado.</p>
@endif

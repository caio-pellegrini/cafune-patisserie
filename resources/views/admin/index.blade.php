<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body class="antialiased">
    <div class="flex min-h-screen bg-gray-100">
        <!-- Barra Lateral de Navegação -->
        <div class="w-64 bg-gray-800 shadow-lg">
            <div class="p-4 text-white text-lg font-bold">Painel Administrativo</div>

            <div class="p-3"> <!-- Estilização para diferenciar -->
                <div class="p-1 bg-gray-700">
                    <!-- Verificação e Exibição da Imagem -->
                    @if($user->image)
                    <img class="my-3 w-12 h-12 rounded-full mx-auto" src="{{ asset("storage/$user->image") }}" alt="user avatar" />
                    @endif
                    <div class="text-white text-center">{{$user->name}}</div>
                </div>

            </div>

            <ul class="list-none">
                <li class="{{ request()->routeIs('admin.home') ? 'bg-gray-900' : '' }}">
                    <a href="{{ route('admin.home') }}" class="block p-4 text-gray-300 hover:bg-gray-700">Gestão de Pedidos</a>
                </li>
                <li class="{{ request()->routeIs('admin.outro') ? 'bg-gray-900' : '' }}">
                    <a href="#" class="block p-4 text-gray-300 hover:bg-gray-700">Gestão de Produtos (em breve)</a>
                </li>
                <li class="{{ request()->routeIs('admin.outro') ? 'bg-gray-900' : '' }}">
                    <a href="#" class="block p-4 text-gray-300 hover:bg-gray-700">Gestão de Usuários (em breve)</a>
                </li>
            </ul>
            <div class="absolute bottom-0">
                <div class="p-4 text-white text-sm"><a class="hover:underline" href="{{ route('/') }}">Voltar a página inicial</a></div>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="flex-1 bg-gray-100 py-8 px-16">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Gestão de Pedidos</h1>
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif
                
                <h1 class="text-2xl font-bold text-green-800 mb-2">Pedidos Ativos</h1>
                <section class="bg-white shadow-md rounded-lg overflow-hidden">
                    @if($activeOrders->isNotEmpty())
                    <table class="min-w-full leading-normal ">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider">Pedido ID</th>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider">Cliente</th>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider">Total</th>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider">Entrega</th>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activeOrders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->id }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->user->name }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->total }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if ($order->delivery_method === 'pickup')
                                    Retirada
                                    @else
                                    Delivery
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="flex items-center" onsubmit="return confirmUpdate(this);">
                                        @csrf
                                        <select name="status" class="form-select mr-2">
                                            
                                            <option value="pendente" {{ $order->status == 'pendente' ? 'selected' : '' }}>Pendente</option>


                                            <option value="preparacao" {{ $order->status == 'preparacao' ? 'selected' : '' }}>Em Preparação</option>
                                            @if ($order->delivery_method === 'pickup')
                                            <option value="retirar" {{ $order->status == 'retirar' ? 'selected' : '' }}>Pronto para Retirar</option>
                                            @else
                                            <option value="entregando" {{ $order->status == 'entregando' ? 'selected' : '' }}>Saiu para entrega</option>
                                            @endif


                                            <option value="concluido" {{ $order->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
                                            <option value="cancelado" {{ $order->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                        </select>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><x-primary-button>Atualizar</x-primary-button></td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Não há nenhum pedido ativo.</p>
                    @endif
                </section>





                <h1 class="text-2xl font-bold text-red-800 mt-7 mb-2">Pedidos Finalizados</h1>
                <section class="bg-white shadow-md rounded-lg overflow-hidden">
                    @if($completedOrders->isNotEmpty())
                    <table class="min-w-full leading-normal ">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider">Pedido ID</th>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider">Cliente</th>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider">Total</th>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider">Entrega</th>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                                <th class="px-5 py-3 bg-cafune text-left text-xs font-semibold text-white uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($completedOrders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->id }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->user->name }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->total }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if ($order->delivery_method === 'pickup')
                                    Retirada
                                    @else
                                    Delivery
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    
                                        @csrf
                                        <select name="status" class="form-select mr-2" disabled>
                                            
                                            <option value="pendente" {{ $order->status == 'pendente' ? 'selected' : '' }}>Pendente</option>


                                            <option value="preparacao" {{ $order->status == 'preparacao' ? 'selected' : '' }}>Em Preparação</option>
                                            @if ($order->delivery_method === 'pickup')
                                            <option value="retirar" {{ $order->status == 'retirar' ? 'selected' : '' }}>Pronto para Retirar</option>
                                            @else
                                            <option value="entregando" {{ $order->status == 'entregando' ? 'selected' : '' }}>Saiu para entrega</option>
                                            @endif


                                            <option value="concluido" {{ $order->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
                                            <option value="cancelado" {{ $order->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                                        </select>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Você não pode mudar o status de pedidos finalizados.</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Não há nenhum pedido finalizado.</p>
                    @endif
                </section>
                
            </div>
        </div>
    </div>
    <script>
        function confirmUpdate(form) {
            let status = form.querySelector('select[name="status"]').value;
            if (status === 'concluido' || status === 'cancelado') {
                return confirm('Tem certeza que deseja atualizar o status para ' + status + '? Esta ação é irreversível.');
            }
            return true;
        }
    </script>

</body>

</html>
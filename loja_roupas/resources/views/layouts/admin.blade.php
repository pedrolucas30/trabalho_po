<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>{{ $title ?? 'Painel | Ateliê Norte' }}</title>@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="admin-body">
<div class="admin-layout">
    <aside class="admin-sidebar"><a class="logo" href="{{ route('store') }}">ateliê <span>norte</span></a><p class="admin-label">Painel de gestão</p><nav class="admin-nav"><a href="{{ route('admin.products.index') }}">Produtos</a><a href="{{ route('admin.clients.index') }}">Clientes</a><a href="{{ route('admin.orders.index') }}">Pedidos</a><a href="{{ route('store') }}">Voltar à loja</a></nav><form class="logout-form" method="POST" action="{{ route('logout') }}">@csrf<button type="submit">Sair da conta</button></form></aside>
    <main class="admin-main"><header class="admin-header"><div><span class="eyebrow">Administração</span><h1>{{ $heading ?? 'Painel' }}</h1></div></header>@if (session('success'))<div class="flash-success">{{ session('success') }}</div>@endif @if ($errors->any())<div class="flash-error">Confira os campos destacados e tente novamente.</div>@endif @yield('content')</main>
</div>
</body>
</html>

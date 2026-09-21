<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Entrar | Ateliê Norte</title>@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="login-body">
<main class="login-card">
    <a class="logo" href="{{ route('home') }}">ateliê <span>norte</span></a>
    <span class="eyebrow">Área administrativa</span>
    <h1>Bem-vindo de volta.</h1>
    @if (session('success'))<div class="flash-success">{{ session('success') }}</div>@endif
    @if ($errors->any())<div class="flash-error">{{ $errors->first() }}</div>@endif
    <form method="POST" action="{{ route('login.store') }}" class="login-form">
        @csrf
        <label>E-mail<input name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus></label>
        <label>Senha<input name="password" type="password" autocomplete="current-password" required></label>
        <label class="remember"><input name="remember" type="checkbox"> Lembrar de mim</label>
        <button class="admin-button" type="submit">Entrar no painel</button>
    </form>
    <p class="auth-switch">Ainda não tem conta? <a href="{{ route('register') }}">Criar conta</a></p>
    <a class="back-store" href="{{ route('store') }}">← Voltar para a loja</a>
</main>
</body>
</html>

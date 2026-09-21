<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Criar conta | Ateliê Norte</title>@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="login-body">
<main class="login-card">
    <a class="logo" href="{{ route('store') }}">ateliê <span>norte</span></a>
    <span class="eyebrow">Novo acesso</span>
    <h1>Crie sua conta.</h1>
    @if ($errors->any())<div class="flash-error">Confira os campos e tente novamente.</div>@endif
    <form method="POST" action="{{ route('register.store') }}" class="login-form">
        @csrf
        <label>Nome<input name="name" type="text" value="{{ old('name') }}" autocomplete="name" required autofocus>@error('name')<small class="field-error">{{ $message }}</small>@enderror</label>
        <label>E-mail<input name="email" type="email" value="{{ old('email') }}" autocomplete="email" required>@error('email')<small class="field-error">{{ $message }}</small>@enderror</label>
        <label>Senha<input name="password" type="password" autocomplete="new-password" required>@error('password')<small class="field-error">{{ $message }}</small>@enderror</label>
        <label>Confirmar senha<input name="password_confirmation" type="password" autocomplete="new-password" required></label>
        <button class="admin-button" type="submit">Criar conta</button>
    </form>
    <p class="auth-switch">Já tem uma conta? <a href="{{ route('login') }}">Entrar</a></p>
    <a class="back-store" href="{{ route('store') }}">← Voltar para a loja</a>
</main>
</body>
</html>

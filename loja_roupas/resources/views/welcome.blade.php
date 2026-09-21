<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ateliê Norte | Moda essencial</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="site-shell">
        <header class="topbar">
            <a class="logo" href="{{ route('store') }}">ateliê <span>norte</span></a>
            <nav class="nav" aria-label="Navegação principal">
                <a href="#novidades">Novidades</a><a href="#colecao">Coleção</a><a href="#sobre">Sobre nós</a>
            </nav>
            @auth
                <a class="panel-link" href="{{ route('admin.products.index') }}">Painel</a>
            @else
                <a class="panel-link" href="{{ route('login') }}">Entrar</a>
            @endauth
            <button class="cart-button" type="button" aria-label="Abrir carrinho">Sacola <span id="cart-count">0</span></button>
        </header>

        <main>
            <section class="hero" id="colecao">
                <div class="hero-copy">
                    <span class="eyebrow">Coleção primavera 2026</span>
                    <h1>Vista o que faz sentido para você.</h1>
                    <p>Peças atemporais, materiais conscientes e o conforto que acompanha todos os seus dias.</p>
                    <a class="button" href="#novidades">Explorar a coleção <span aria-hidden="true">→</span></a>
                </div>
                <div class="hero-art" aria-label="Composição abstrata em tons terrosos"></div>
            </section>

            <section id="novidades">
                <div class="section-heading"><div><span class="eyebrow">Escolhas da semana</span><h2>Novidades que ficam.</h2></div><p>Design simples. Presença marcante.</p></div>
                <div class="products">
                    @forelse ($products as $product)
                        <article class="product-card">
                            <div class="product-image" role="img" aria-label="Imagem ilustrativa de {{ $product->name }}"></div>
                            <div class="product-info"><h3>{{ $product->name }}</h3><p>{{ $product->description ?? 'Uma peça especial para a sua rotina.' }}</p><span class="price">R$ {{ number_format((float) $product->price, 2, ',', '.') }}</span><button class="add-button" type="button">Adicionar</button></div>
                        </article>
                    @empty
                        @foreach ([['Camisa Horizonte', 'Algodão orgânico', '189,90'], ['Vestido Brisa', 'Linho leve', '329,90'], ['Blusa Raiz', 'Malha canelada', '159,90'], ['Calça Serena', 'Sarja confortável', '279,90']] as $product)
                            <article class="product-card"><div class="product-image" role="img" aria-label="Imagem ilustrativa de {{ $product[0] }}"></div><div class="product-info"><h3>{{ $product[0] }}</h3><p>{{ $product[1] }}</p><span class="price">R$ {{ $product[2] }}</span><button class="add-button" type="button">Adicionar</button></div></article>
                        @endforeach
                    @endforelse
                </div>
            </section>
        </main>
        <div class="cart-overlay" id="cart-overlay" hidden></div>
        <aside class="cart-drawer" id="cart-drawer" aria-label="Sua sacola" aria-hidden="true">
            <div class="cart-header"><h2>Sua sacola</h2><button class="cart-close" id="cart-close" type="button" aria-label="Fechar sacola">&times;</button></div>
            <div class="cart-items" id="cart-items"><p class="cart-empty">Sua sacola está vazia.</p></div>
            <div class="cart-summary"><span>Total</span><strong id="cart-total">R$ 0,00</strong></div>
            <button class="checkout-button" id="checkout-button" type="button" disabled>Finalizar pedido</button>
        </aside>
        <footer id="sobre">Ateliê Norte &copy; {{ date('Y') }} · Feito para durar.</footer>
    </div>
</body>
</html>

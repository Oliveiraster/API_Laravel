<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media-query.css') }}">
</head>
<body>
    <main>
        <section id="login">
            <div id="imagem">
                <img src="{{ asset('img/login.jpg') }}" alt="Galaxia">
            </div>
            <div id="formulario">
                <h1>Login</h1>
                <p>Seja bem-vindo(a) novamente. Faça login para acessar sua conta e para fazer as configurações no seu ambiente</p>
                <form action="{{ route('logar') }}" method="post" autocomplete="on">
                    @csrf
                    <div class="campo">
                        <span class="material-symbols-outlined">person</span>
                        <input type="email"name="email" id="ilogin" placeholder="seu e-mail" autocomplete="email">
                        <label for="ilogin" >Login</label>
                    </div>
                    <div class="campo">
                        <span class="material-symbols-outlined">vpn_key</span>
                        <input type="password"name="senha" id="isenha" placeholder="sua senha" autocomplete="current-password">
                        <label for="ilogin" required minlength="8" maxlength="20 " >Senha</label>
                    </div>
                    <input type="submit" value="Entrar">
                    <a href="/cadastro" class="botao">
                        Não tenho uma Conta
                    </a>
                </form>
            </div>
        </section>
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
                <form action="{{route('create')}}" method="post" autocomplete="on">
                    @csrf

                    <div class="campo">
                        <span class="material-symbols-outlined">person</span>
                        <input type="text" name="name" id="iname" placeholder="seu nome" autocomplete="name">
                        <label for="iname" >Login</label>
                    </div>

                    <div class="campo">
                        <span class="material-symbols-outlined">mail</span>
                        <input type="email" name="login" id="ilogin" placeholder="seu e-mail" autocomplete="email">
                        <label for="ilogin" >Login</label>
                    </div>

                    <div class="campo">
                        <span class="material-symbols-outlined">settings_accessibility</span>
                        <input type="number" name="idade" id="iidade" placeholder="sua idade" autocomplete="current-password">
                        <label for="iidade" required minlength="8" maxlength="20 " >Senha</label>
                    </div>

                    <div class="campo">
                        <span class="material-symbols-outlined">settings_accessibility</span>
                        <input type="number" name="altura" id="ialtura" placeholder="sua altura" autocomplete="current-password">
                        <label for="ialtura" required minlength="8" maxlength="20 " >Senha</label>
                    </div>

                    <div class="campo">
                        <span class="material-symbols-outlined">settings_accessibility</span>
                        <input type="number" name="peso" id="ipeso" placeholder="seu peso" autocomplete="current-password">
                        <label for="ipeso" required minlength="8" maxlength="20 " >Senha</label>
                    </div>

                    <div class="campo">
                        <span class="material-symbols-outlined">key</span>
                        <input type="password" name="senha" id="isenha" placeholder="sua senha" autocomplete="current-password">
                        <label for="isenha" required minlength="8" maxlength="20 " >Senha</label>
                    </div>

                    <div class="campo">
                        <span class="material-symbols-outlined">key_vertical</span>
                        <input type="password" name="senha_confirmation" id="isenha_confirmation" placeholder="confirme sua senha" autocomplete="current-password">
                        <label for="isenha_confirmation" required minlength="8" maxlength="20 " >Senha</label>
                    </div>

                    <input type="submit" value="Cadastrar">
                    <a href="login" class="botao">
                        Já tenho uma conta
                    </a>
                </form>
            </div>
        </section>
    </main>
</body>
</html>

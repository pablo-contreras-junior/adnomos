<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AdNomos</title>
    <link rel="stylesheet" href="{{asset('views/css/St_Login.css')}}">
</head>
<body>
    <div class="login-container">
        <header>
            <img src="{{asset('views/images/logo(fundoBranco).png')}}" alt="AdNomos Logo" class="logo">

        </header>
        <main>
            <form action="/login" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="username" name="email" placeholder="Digite seu email" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn primary">Entrar</button>
                    <a href="/forgot-password" class="link">Esqueceu sua senha?</a>
                </div>

                @if ($errors->any())
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

            </form>
            <div class="extra-actions">
                <p>Não tem uma conta? <a href="{{ route('stepOne.get') }}" class="link">Cadastre-se</a></p>
            </div>
        </main>
        <footer>
            <p>&copy; 2025 AdNomos. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>

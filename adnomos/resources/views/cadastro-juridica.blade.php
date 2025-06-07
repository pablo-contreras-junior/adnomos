<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AdNomos / Experimente Grátis </title>
    <link rel='stylesheet' type='text/css' media='screen' href="{{asset('views/css/CadJuri_Fisi_Style.css')}}">
    <link rel="shortcut icon" type="imagex/png" href="{{asset('views/images/logo(fundoBranco).png')}}">
</head>
<body>
    

<center><div id="caixaJ">
            <br>
        <center><img src="{{asset('views/images/logo(fundoBranco).png')}}" width="150px"></center>
                <br>
            <h3 align="center">Comece a usar o AdNomos totalmente grátis!</h3>
            <p align="center" id="desc">
                Cadastre-se agora e evolua sua rotinha 
                jurídica com o software jurídico líder 
                do mercado!
        </p>              


        <form action="{{route('finishJuridica.post')}}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>

                <p class="subtitle" align="left">CNPJ:</p>
                    <input type="text" placeholder="Insira seu CNPJ" name="cnpj" class="campo" required> 


                    <br>


                <p class="subtitle" align="left">Razão Social:</p>
                    <input type="text" placeholder="Insira sua Razão Social" name="nome" class="campo" required>


                    <br>

                <p class="subtitle" align="left">Email:</p>
                    <input type="text" placeholder="Insira seu Email" name="email" class="campo" required>


                    <br>


                <p class="subtitle" align="left">Quantidade de Funcionários:</p>
                    <input type="number" placeholder="Insira a quantidade de funcionarios" class="campo" required>


                    <br>


                <p class="subtitle" align="left">Quantidade de Funcionários que Utilizarão o Sistema:</p>
                    <input type="text" placeholder="Insira a quantidade de funcionarios que utilizarão o sistema" class="campo" required>


                    <br>


                <p class="subtitle" align="left">Senha:</p>
                    <input type="password" placeholder="Insira a senha" name="password" class="campo" required>

                    <br>

                <p class="subtitle" align="left">Repita Sua Senha:</p>
                    <input type="password" placeholder="Insira a senha" name="password_confirmation" class="campo" required>

                    <br><br><br>

                <input type="submit" value="Enviar respostas" class="btn">

            </div>
        </form>

            <br><br>

        <p align="center" id="footer">© 2025 AdNomos. Todos os direitos reservados.</p> <!-- Rodapé do AdNomos -->

    </div></center>


    
</body>
</html>
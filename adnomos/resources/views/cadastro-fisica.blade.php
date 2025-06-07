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
    

<center><div id="caixaF">
            <br>
        <center><img src="{{asset('views/images/logo(fundoBranco).png')}}" width="150px"></center>
                <br>
            <h3 align="center">Comece a usar o AdNomos totalmente grátis!</h3>
            <p align="center" id="desc">
                Cadastre-se agora e evolua sua rotinha 
                jurídica com o software jurídico líder 
                do mercado!
        </p>              


        <form action="{{route('finishFisica.post')}}" method="POST">
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

                <p class="subtitle" align="left">Nome completo:</p>
                    <input type="text" placeholder="Insira seu nome completo" name="nome" class="campo" required> 


                    <br>


                <p class="subtitle" align="left">Celular:</p>
                    <input type="text" placeholder="(00) 00000-0000" name="celular" class="campo" required oninput="formatPhone(this)">


                    <br>


                <p class="subtitle" align="left">E-mail:</p>
                    <input type="text" placeholder="Insira seu E-mail" name="email" class="campo" required>


                    <br>


                <p class="subtitle" align="left">CPF:</p>
                    <input type="text" placeholder="Insira seu CPF" name="cpf" class="campo" required oninput="formatCPF(this)">


                    <br>


                <p class="subtitle" align="left">Senha:</p>
                    <input type="password" placeholder="Insira a senha" name="password" class="campo" required>
                    
                    
                    <br>

                <p class="subtitle" align="left">Confirme sua senha:</p>
                    <input type="password" placeholder="Insira a senha" name="password_confirmation" class="campo" required>

                    <p class="subtitle" align="left">Questionario:</p>
                        <p id="desc">Como você conheceu a Adnomos? </p>
                    <center><select name="UF" id="selectBox" class="campo"> <!-- opções -->

                        <option value="1"> Conheci por um amigo/Familiar </option>
                        <option value="2"> Conheci por recomendação de alguem do Ramo</option>
                        <option value="3"> Conheci por um anúncio </option>
                        <option value="4"> Conheci procurando por conta própria </option>
                
                    </select></center>


                    <br><br><br>

                <input type="submit" value="Enviar respostas" class="btn">

            </div>
        </form>

            <br><br>

        <p align="center" id="footer">© 2025 AdNomos. Todos os direitos reservados.</p> <!-- Rodapé do AdNomos -->

    </div></center>


    <script>
        function formatPhone(input) {
            let value = input.value.replace(/\D/g, ''); 
            value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
            value = value.replace(/(\d{5})(\d)/, '$1-$2');
            input.value = value;
        }

        function formatCPF(input) {
            let value = input.value.replace(/\D/g, ''); 
            value = value.replace(/(\d{3})(\d)/, '$1.$2'); 
            value = value.replace(/(\d{3})(\d)/, '$1.$2'); 
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            input.value = value;
        }
    </script>
</body>
</html>
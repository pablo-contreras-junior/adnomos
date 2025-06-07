<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdNomos / Selecionar Cadastro</title>
    <link rel='stylesheet' type='text/css' media='screen' href="{{asset('views/css/Selcad_Style.css')}}">
    <link rel="shortcut icon" type="imagex/png" href="{{asset('views/images/logo(fundoBranco).png')}}">
</head>
<body>


<center>
    <div id="caixa">

        <br>

        <center><img src="{{asset('views/images/logo(fundoBranco).png')}}" width="150px"></center>

                <br>

                    <h3 align="center">Comece a usar o AdNomos totalmente grátis!</h3>

                        <p align="center" id="desc">
                            Cadastre-se agora e evolua sua rotinha 
                            jurídica com o software jurídico líder 
                            do mercado!
                        </p>                          
                
                <br>

                    <h3 align="center">Cadastrar-se como:</h3>

                <br>

            <form action="{{route('stepOne.post')}}" method="POST">
                @csrf
                <table>
                    <tr>
                        <td align="center"><input type="submit" name="tipo_pessoa" id="btnFisica" value="Pessoa Física"></td>
                    </tr>
                    <tr>
                        <td align="center"><input type="submit" name="tipo_pessoa" id="btnJuridica" value="Pessoa Juridica"></td>
                    </tr>
                </table>
            </form>

            <br><br>

            <p align="center" id="footer">© 2025 AdNomos. Todos os direitos reservados.</p> <!-- Rodapé do AdNomos -->

    </div>
</center>

    
</body>
</html>
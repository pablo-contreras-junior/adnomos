<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdNomos / Configuração do Sistema </title>
    <link rel='stylesheet' type='text/css' media='screen' href="{{asset('views/css/vincularOAB_Style.css')}}">
    <link rel="shortcut icon" type="imagex/png" href="{{asset('views/images/logo(fundoBranco).png')}}">
</head>
<body>

<br><br>

<center><div id="caixa"> <!-- Toda caixa -->

    <br>

    <center><img src="{{asset('views/images/logo(fundoBranco).png')}}" width="150px"></center> <!-- Logo -->

    <div id="txt">

        <h2 align="center">Que bom ter você no AdNomos, {{ $nome }}!</h2> 

            <h3 align="center">Vamos configurar seu Sistema?</h3>

                <p align="center" id="desc">Para deixar tudo pronto para você usar, 
                precisamos do número da sua OAB. Assim,
                conseguimos buscar seus processos públicos 
                e configurar o recebimento das suas publicações.
                </p>

    </div>

                <form action="{{route('cadastroOAB.post')}}" method="POST">
                    @csrf
                    
                    <center>
                        <input type="text" placeholder= "Digite seu número de OAB" name="oab" class="campo" required>
                    </center> 

                        <br>

                    <center>
                        <table>
    
                            <tr>

                                <td>
                                    <h3>Selecionar UF:</h3> 
                                </td>
                            
                        
                                <td>
                                    <center>
                                        <select name="uf" id="selectBox">

                                            <option value="AC"> AC </option>
                                            <option value="AL"> AL </option>
                                            <option value="AP"> AP </option>
                                            <option value="AM"> AM </option>
                                            <option value="BA"> BA </option>
                                            <option value="CE"> CE </option>
                                            <option value="DF"> DF </option>
                                            <option value="ES"> ES </option>
                                            <option value="GO"> GO </option>
                                            <option value="MA"> MA </option>
                                            <option value="MT"> MT </option>
                                            <option value="MS"> MS </option>
                                            <option value="MG"> MG  </option>
                                            <option value="PA"> PA </option>
                                            <option value="PB"> PB </option>
                                            <option value="PR"> PR </option>
                                            <option value="PE"> PE </option>
                                            <option value="PI"> PI </option>
                                            <option value="RJ"> RJ </option>
                                            <option value="RN"> RN </option>
                                            <option value="RS"> RS </option>
                                            <option value="RO"> RO </option>
                                            <option value="RR"> RR </option>
                                            <option value="SC"> SC </option>
                                            <option value="SP"> SP </option>
                                            <option value="SE"> SE </option>
                                            <option value="TO"> TO </option>
                                    
                                        </select>
                                    </center>

                                </td>
                            </tr>

                        </table>
                    </center>

                        <br>

                    <center>
                        <button type="submit" id="btnSubmit">Buscar</button>
                        <button id="btnSkip" onclick="window.location.href='/dashboard'">Pular Etapa</button>   
                    </center> 
                </form>
    
    <br>

    <p align="center" id="footer">© 2025 AdNomos. Todos os direitos reservados.</p> 

    <br>

</div></center>

<br>


    
</body>
</html>
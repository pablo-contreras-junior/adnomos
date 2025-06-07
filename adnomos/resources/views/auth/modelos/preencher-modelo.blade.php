<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preencher Modelo - Petição</title>
    <link rel="stylesheet" href="{{ asset('views/css/template-form.css') }}">
</head>
<body>
    <div class="form-container">
        <h1>PETIÇÃO INICIAL</h1>
        <form action="{{ route('peticao.gerar') }}" method="POST">
            @csrf
            
            <!-- Informações da comarca -->
            <div class="form-group">
                <label for="comarca">Comarca:</label>
                <input type="text" id="comarca" name="comarca" placeholder="Ex.: São Paulo"  >
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" placeholder="Ex.: SP"  >
            </div>

            <!-- Informações do autor -->
            <h3>Informações do Autor</h3>
            <div class="form-group">
                <label for="autor_nome">Nome:</label>
                <input type="text" id="autor_nome" name="autor_nome" placeholder="Ex.: João da Silva"  >
            </div>
            <div class="form-group">
                <label for="autor_nacionalidade">Nacionalidade:</label>
                <input type="text" id="autor_nacionalidade" name="autor_nacionalidade" placeholder="Ex.: Brasileiro"  >
            </div>
            <div class="form-group">
                <label for="autor_estado_civil">Estado Civil:</label>
                <select id="autor_estado_civil" name="autor_estado_civil"  >
                    <option value="" disabled selected>Selecione</option>
                    <option value="solteiro">Solteiro</option>
                    <option value="casado">Casado</option>
                    <option value="divorciado">Divorciado</option>
                    <option value="viuvo">Viúvo</option>
                    <option value="uniao_estavel">União Estável</option>
                </select>
            </div>
            <div class="form-group">
                <label for="autor_profissao">Profissão:</label>
                <input type="text" id="autor_profissao" name="autor_profissao" placeholder="Ex.: Engenheiro" >
            </div>
            <div class="form-group">
                <label for="autor_rg">RG:</label>
                <input type="text" id="autor_rg" name="autor_rg" placeholder="Ex.: 12.345.678-9" >
            </div>
            <div class="form-group">
                <label for="autor_cpf">CPF:</label>
                <input type="text" id="autor_cpf" name="autor_cpf" placeholder="Ex.: 123.456.789-00" >
            </div>
            <div class="form-group">
                <label for="autor_endereco">Endereço:</label>
                <input type="text" id="autor_endereco" name="autor_endereco" placeholder="Ex.: Rua das Flores, 123" >
            </div>

            <!-- Informações do advogado -->
            <h3>Informações do Advogado</h3>
            <div class="form-group">
                <label for="advogado_nome">Nome do Advogado:</label>
                <input type="text" id="advogado_nome" name="advogado_nome" placeholder="Ex.: Dr. Carlos Almeida"  >
            </div>
            <div class="form-group">
                <label for="advogado_oab">OAB:</label>
                <input type="text" id="advogado_oab" name="advogado_oab" placeholder="Ex.: 123456/SP"  >
            </div>
            <div class="form-group">
                <label for="advogado_endereco">Endereço do Advogado:</label>
                <input type="text" id="advogado_endereco" name="advogado_endereco" placeholder="Ex.: Rua das Palmeiras, 456"  >
            </div>

            <!-- Informações do réu -->
            <h3>Informações do Réu</h3>
            <div class="form-group">
                <label for="reu_nome">Nome:</label>
                <input type="text" id="reu_nome" name="reu_nome" placeholder="Ex.: Maria Oliveira"  >
            </div>
            <div class="form-group">
                <label for="reu_nacionalidade">Nacionalidade:</label>
                <input type="text" id="reu_nacionalidade" name="reu_nacionalidade" placeholder="Ex.: Brasileira"  >
            </div>
            <div class="form-group">
                <label for="reu_estado_civil">Estado Civil:</label>
                <input type="text" id="reu_estado_civil" name="reu_estado_civil" placeholder="Ex.: Casada"  >
            </div>
            <div class="form-group">
                <label for="reu_profissao">Profissão:</label>
                <input type="text" id="reu_profissao" name="reu_profissao" placeholder="Ex.: Professora"  >
            </div>
            <div class="form-group">
                <label for="reu_rg">RG:</label>
                <input type="text" id="reu_rg" name="reu_rg" placeholder="Ex.: 98.765.432-1"  >
            </div>
            <div class="form-group">
                <label for="reu_cpf">CPF:</label>
                <input type="text" id="reu_cpf" name="reu_cpf" placeholder="Ex.: 987.654.321-00"  >
            </div>
            <div class="form-group">
                <label for="reu_endereco">Endereço:</label>
                <input type="text" id="reu_endereco" name="reu_endereco" placeholder="Ex.: Avenida Central, 789"  >
            </div>

            <!-- Informações adicionais -->
            <h3>Informações Adicionais</h3>
            <div class="form-group">
                <label for="tipo_acao">Tipo de Ação:</label>
                <input type="text" id="tipo_acao" name="tipo_acao" placeholder="Ex.: Ação de Cobrança"  >
            </div>
            <div class="form-group">
                <label for="fatos">Fatos:</label>
                <textarea id="fatos" name="fatos" rows="4" placeholder="Descreva os fatos aqui..."  ></textarea>
            </div>
            <div class="form-group">
                <label for="fundamentacao_juridica">Fundamentação Jurídica:</label>
                <textarea id="fundamentacao_juridica" name="fundamentacao_juridica" rows="4" placeholder="Descreva a fundamentação jurídica aqui..."  ></textarea>
            </div>
            <div class="form-group">
                <label for="valor_causa">Valor da Causa:</label>
                <input type="text" id="valor_causa" name="valor_causa" placeholder="Ex.: R$ 10.000,00"  >
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" placeholder="Ex.: São Paulo"  >
            </div>

            <!-- Botão de envio -->
            <div class="form-actions">
                <button type="submit" class="btn primary">Gerar Petição</button>
            </div>
        </form>
    </div>
</body>
</html>
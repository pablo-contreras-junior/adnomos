# Adnomos

**Adnomos** é um gerenciador de casos jurídicos desenvolvido para auxiliar advogados na organização de prazos e documentos relacionados a processos judiciais.

---

## Sobre o Projeto

Este sistema permite que advogados gerenciem de forma eficiente os prazos e documentos de seus processos, centralizando informações importantes para o acompanhamento jurídico.
O projeto foi desenvolvido com as seguintes tecnologias:

- Laravel (PHP)
- HTML, CSS e JavaScript
- Bootstrap (componentes visuais)
- Banco de dados MySQL
  
Além disso, o sistema depende de uma API paga para algumas funcionalidades.

## Tecnologias Utilizadas

- Laravel
- HTML5
- CSS3
- JavaScript
- Bootstrap
- MySQL

## Como Rodar

Este tutorial guia o leitor pelos passos necessários para configurar e executar o Adnomos em sua máquina local. Cada etapa inclui instruções detalhadas e explicações sobre o que está sendo feito.

### Pré-requisitos

Antes de iniciar, é preciso ter instalado:
• PHP 8.0 ou superior, para garantir compatibilidade com as últimas funcionalidades do Laravel.
• Composer, o gerenciador de dependências do PHP, que irá baixar todas as bibliotecas necessárias.
• MySQL, que será usado como banco de dados relacional.
• Um servidor web (Apache ou Nginx) ou o servidor embutido do Laravel para servir a aplicação.

### Passos

1 - Clone o repositório e entre na pasta do projeto
git clone <URL-do-repositório>
cd <nome-da-pasta-do-projeto>

2 - Instale as dependências PHP com o Composer
composer install

3 - Copie o arquivo de exemplo de ambiente
cp .env.example .env

4 - Abra o arquivo .env e ajuste as variáveis conforme sua máquina, por exemplo:

DB_DATABASE=adnomos_database
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
...
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=“seu-email@gmail.com”
MAIL_PASSWORD=“sua-senha-de-app”
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=“seu-email@gmail.com”
MAIL_FROM_NAME=“${APP_NAME}”

ESCAVADOR_API_KEY=SUACHAVEAPI
ESCAVADOR_BASE_URL=https://api.escavador.com/

5 - Gere a chave de aplicação
php artisan key:generate

6 - Inicie o servidor e as filas em desenvolvimento
composer dev

Acesse o sistema no navegador
http://localhost:8000

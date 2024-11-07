# Gestão de Alunos

# O que é ?

Este projeto é um controle de inscrição de alunos e seus respectivos cursos.
Ele foi feito para o seminário do curso de Análise e Desenvolvimento de Sistemas.
O objetivo deste projeto é ser a prática dos estudos em desenvolvimento web com um CRUD realizando as 4 operações básicas (Create, Read, Update, Delete).
Este projeto é uma aplicação em PHP que usa MySQL como banco de dados.

## Requisitos

- PHP >= 7.4
- MySQL
- Composer (opcional, se o projeto usa dependências PHP externas)
- Git

## Instalação

### 1. Clonar o repositório

git clone https://github.com/Gladson0/Uniasselvi-PHP.git

### 2. Configurar as Variáveis de Ambiente

Copie ou renomeie o arquivo .env.example para .env:

Abra o .env e configure as variáveis de conexão com o banco de dados:

DB_HOST: host do seu banco de dados (por padrão, localhost)
DB_USERNAME: usuário do banco
DB_PASSWORD: senha do banco
DB_DATABASE: nome do banco de dados

### 3. Importar o Banco de Dados

No MySQL, execute o comando para importar o banco a partir do arquivo database/backup.sql:

mysql -u seu_usuario -p nome_do_banco < database/backup.sql

### 4. Iniciar o Servidor Local

Você pode iniciar o servidor local com o comando:

php -S localhost:8000

Abra o navegador e acesse http://localhost:8000 para verificar se tudo está funcionando.

### 5. Implantação em um Servidor Web

Envie os arquivos do projeto para o servidor.
Configure o .env com os dados do servidor.
Importe o banco de dados backup.sql no MySQL do servidor.

<?php
// Função para carregar variáveis do arquivo .env
function loadEnv($file) {
    if (!file_exists($file)) {
        die('.env file is missing.');
    }

    $env = [];
    $lines = file($file);
    foreach ($lines as $line) {
        // Ignora linhas de comentário ou vazias
        if (empty($line) || $line[0] === '#') {
            continue;
        }

        // Separa a chave e o valor por '='
        list($key, $value) = explode('=', trim($line), 2);

        // Remove espaços extras e armazena as variáveis
        $env[$key] = trim($value);
    }

    return $env;
}

// Carregar as variáveis do arquivo .env
$dotenv = loadEnv(__DIR__ . '/.env');

// Define as variáveis de conexão com o banco de dados
define('SERVER', $dotenv['DB_HOST']);
define('USER', $dotenv['DB_USERNAME']);
define('PASSWORD', $dotenv['DB_PASSWORD']);
define('DATA', $dotenv['DB_DATABASE']);

// Realiza a conexão com o banco
$conexao = mysqli_connect(SERVER, USER, PASSWORD, DATA) or die('Não foi possível conectar');

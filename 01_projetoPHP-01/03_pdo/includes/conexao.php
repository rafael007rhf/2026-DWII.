<?php
/*

 ARQUIVO : 03_pdo/includes/conexao.php
 Disciplina : Desenvolvimento Web II (2026-DWII)
 Aula : 05 - PHP + MariaDB: persistência de dados via PDO
 Autor : Gabriel Borba de Oliveira
 Conceitos : catálogo com PDO e MariaDB, htmlspecialchars()


    includes/conexao.php
    Arquivo de conexão PDO - incluir em qualquer página que use o banco
*/

// Configurações da conexão (dados do docker-compose.yml)
$host = '127.0.0.1'; // IP do container MariaDB (network_mode: service:db)
$db = 'dwii_db';

$user = 'dwii_user'; // Usuário criado pela variável MARIADB_USER
$pass = 'dwii2026'; // senha definida em MARIADB_PASSWORD
$charset = 'utf8mb4'; // Suporta emojis e caracteres especiais

// DSN - Data Source Name: string que identifica o banco para o PDO
// sslmode=disabled: comunicação entre containers não usa SSL
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;sslmode=disabled";

// Opções de configuração do PDO
$opcoes = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Erros sql viram exceções
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// Criar a conexao PDO
try {
    $pdo = new PDO($dsn, $user, $pass, $opcoes);
} catch (PDOException $e) {
    die('Erro de conexão com o banco de dados. Verifique o servidor.');
}
?>
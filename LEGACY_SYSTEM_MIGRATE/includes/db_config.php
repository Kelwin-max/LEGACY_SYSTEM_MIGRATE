<?php
// includes/db_config.php

// ATENÇÃO: SUBSTITUA ESSES VALORES PELAS SUAS CREDENCIAIS REAIS DO MYSQL
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'sua_senha_aqui'); 
define('DB_NAME', 'legacy_db');

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Checa a conexão
if ($conn->connect_error) {
    // Para fins de demonstração em produção, você deve logar este erro, não exibi-lo
    die(json_encode(['success' => false, 'message' => "ERROR: Connection failed: " . $conn->connect_error]));
}

// Opcional: Cria a tabela se ela não existir (útil para o primeiro setup)
$sql_create_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql_create_table)) {
    // Log do erro de criação de tabela
    error_log("Error creating table: " . $conn->error);
}

?>
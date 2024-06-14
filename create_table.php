<?php
try {
    // Conexão com o banco de dados SQLite
    $db = new SQLite3('users.db');
    
    // Comando SQL para criar a tabela
    $createTableQuery = "
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT NOT NULL,
        username TEXT NOT NULL,
        dob TEXT NOT NULL,
        address TEXT NOT NULL,
        gender TEXT NOT NULL,
        password TEXT NOT NULL
    )";
    
    // Executa o comando para criar a tabela
    $db->exec($createTableQuery);
    
    echo "Tabela 'users' criada com sucesso.";
    
    // Fecha a conexão com o banco de dados
    $db->close();
} catch (Exception $e) {
    die("Erro ao criar a tabela: " . $e->getMessage());
}
?>

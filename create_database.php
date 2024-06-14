<?php
try {
    $db = new SQLite3('users.db');
    echo "Banco de dados criado com sucesso!";
} catch (Exception $e) {
    echo "Erro ao criar banco de dados: " . $e->getMessage();
}
?>

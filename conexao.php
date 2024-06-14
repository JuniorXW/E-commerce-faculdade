<?php
function getDbConnection() {
    try {
        $db = new SQLite3('users.db');
        return $db;
    } catch (Exception $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        exit();
    }
}
?>

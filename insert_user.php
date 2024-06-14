<?php
include 'conexao.php';

$db = getDbConnection();

$username = 'testuser';
$password = password_hash('testpassword', PASSWORD_DEFAULT);

$query = $db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
$query->bindValue(':username', $username, SQLITE3_TEXT);
$query->bindValue(':password', $password, SQLITE3_TEXT);

if ($query->execute()) {
    echo "Usuário inserido com sucesso!";
} else {
    echo "Erro ao inserir usuário: " . $db->lastErrorMsg();
}
?>
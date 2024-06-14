<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = getDbConnection();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();

    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Inicia a sessão
        session_start();

        // Define uma variável de sessão para armazenar o nome do usuário
        $_SESSION['username'] = $user['username'];

        // Redireciona para a página principal
        header("Location: index.html");
        exit(); // Termina o script para garantir que o redirecionamento ocorra corretamente
    } else {
        echo "Nome de usuário ou senha incorretos.";
    }

    $db->close();
} else {
    echo "Método de requisição inválido.";
}
?>

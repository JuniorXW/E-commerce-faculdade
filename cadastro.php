<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = getDbConnection();

    // Verifica se a senha tem exatamente 4 ou 8 caracteres
    $password = $_POST['password'];
    $passwordLength = strlen($password);
    if ($passwordLength != 4 && $passwordLength != 8) {
        die("A senha deve ter exatamente 4 ou 8 caracteres. Por favor, atualize sua senha.");
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    // Prepare a consulta SQL para inserir os dados do formulário na tabela
    $stmt = $db->prepare("INSERT INTO users (email, username, dob, address, gender, password) VALUES (:email, :username, :dob, :address, :gender, :password)");

    // Vincula os parâmetros com os valores dos campos do formulário
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':dob', $dob);
    $stmt->bindValue(':address', $address);
    $stmt->bindValue(':gender', $gender);
    $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT)); // Use password_hash para armazenar a senha de forma segura

    // Executa a consulta e verifica o resultado
    $result = $stmt->execute();

    if ($result) {
        // Redireciona para a página de login após o cadastro bem-sucedido
        header("Location: login.html");
        exit(); // Certifique-se de que o script seja interrompido após o redirecionamento
    } else {
        echo "Erro ao cadastrar os dados.";
    }

    $db->close();
} else {
    echo "Método de requisição inválido.";
}
?>

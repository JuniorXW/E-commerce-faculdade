<?php
include 'conexao.php';

$db = getDbConnection();

// Consulta SQL para selecionar todos os dados da tabela 'users'
$query = "SELECT * FROM users";
$result = $db->query($query);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die("Erro ao consultar os dados: " . $db->lastErrorMsg());
}

echo "<h2>Lista de Usuários</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Email</th><th>Nome de Usuário</th><th>Data de Nascimento</th><th>Endereço</th><th>Sexo</th></tr>";

// Itera sobre os resultados e exibe os dados em uma tabela
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
    echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
    echo "<td>" . htmlspecialchars($row['address']) . "</td>";
    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Fecha a conexão com o banco de dados
$db->close();
?>

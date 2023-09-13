<?php
//perguntar sobre senha hash pra sisi berbebt

// Inclua o arquivo de conexão com o banco de dados
/*include('conexaoBD.php');

// Consulta para recuperar todas as senhas em texto plano da tabela
$sql = "SELECT id, senha FROM login";
$result = $pdo->query($sql);

// Loop através dos resultados
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $senha_em_texto_plano = $row['senha'];

    // Calcule o hash da senha em texto plano
    $senha_hash = password_hash($senha_em_texto_plano, PASSWORD_DEFAULT);

    // Atualize a coluna do hash da senha no banco de dados
    $updateSql = "UPDATE login SET senha_hash = :senha_hash WHERE id = :id";
    $stmt = $pdo->prepare($updateSql);
    $stmt->bindParam(':senha_hash', $senha_hash, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
*/
// Encerre a conexão com o banco de dados após a migração
//$pdo = null;

session_start();

try {
    include('conexaoBD.php');
    
    if (isset($_POST['submit'])) {
        $usuario = $_POST['username'];
        $senha_inserida = $_POST['password'];

        // Consulta para obter o hash da senha e o username armazenados no banco de dados
        $stmt = $pdo->prepare("SELECT usuario, level, senha_hash FROM login WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar se a senha inserida corresponde ao hash armazenado
            if (password_verify($senha_inserida, $result['senha_hash'])) {
                // Credenciais válidas
                $_SESSION['level'] = $result["level"];
                $_SESSION['username'] = $result["usuario"];

                header("Location: index.php");
                exit();
            } else {
                // Credenciais inválidas
                echo "<span style='color: black;'>Usuário ou senha incorretos!</span>";
            }
        } else {
            echo "<span style='color: black;'>Usuário não encontrado!</span>";
        }
    }
} catch (PDOException $e) {
    // Tratar qualquer erro de conexão com o banco de dados
    echo "Erro de banco de dados: " . $e->getMessage();
}

$pdo = null;
?>



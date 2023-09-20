<?php
function conexaoBd(){
    try {        
        // conexão PDO    // IP, nomeBD, usuario, senha   
        $db = 'mysql:host=143.106.241.3;dbname=cl201272;charset=utf8';
        $user = 'cl201272';
        $passwd = 'cl*26082005';
        $pdo = new PDO($db, $user, $passwd);
    
        // ativar o depurador de erros para gerar exceptions em caso de erros
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    } catch (PDOException $e) {
        $output = 'Impossível conectar BD : ' . $e . '<br>';
        echo $output;
    }    
    return $pdo;
}
//perguntar sobre senha hash pra sisi berbebt

// Inclua o arquivo de conexão com o banco de dados


/*
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

// Encerre a conexão com o banco de dados após a migração
$pdo = null;
*/
function login(){
session_start();
try {
    $pdo = conexaoBd();
    
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
}
 function buscarLogin($code, $pdo){
    
    $stmt = $pdo->prepare("select * from login where id = :code");
    $stmt->bindParam(':id', $code);
    $stmt->execute();
    $rows = $stmt->rowCount();
    return $rows;

 }
















?>




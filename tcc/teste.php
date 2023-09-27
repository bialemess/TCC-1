
<?php
define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

  if(isset($_POST['cadProduto'])){


    try {            
        $nome = $_POST["nome"];
        $code = $_POST["code"];
        $category = $_POST["category"];
        $unidadeMedida = $_POST["unidadeMedida"];

       
         $uploaddir = 'upload/fotos/'; //diretório onde será gravado a imagem

         $foto = $_FILES['foto'];
         $nomeFoto = $foto['name'];
         $tipoFoto = $foto['type'];
         $tamanhoFoto = $foto['size'];

         $info = new SplFileInfo($nomeFoto);
         $extensaoArq = $info->getExtension();
         $novoNomeFoto = $nome . "." . $extensaoArq;

        if ((trim($nome) == "") || (trim($code) == "")) {
            echo "<span id='warning'>Insira o nome e código do produto!</span>";
        }  else if ( ($nomeFoto != "") && (!preg_match('/^image\/(jpeg|png|gif)$/', $tipoFoto)) ) { //validção tipo arquivo
            echo "<span id='error'>Isso não é uma imagem válida</span>";

        } else if ( ($nomeFoto != "") && ($tamanhoFoto > TAMANHO_MAXIMO) ) { //validação tamanho arquivo
            echo "<span id='error'>A imagem deve possuir no máximo 2 MB</span>";}

            else {
            include("bd.php");
            $pdo = conexaoBd();
            $stmt = $pdo->prepare("select * from produtoTCC where nome = :nome");
            $stmt->bindParam(':nome', $nome);
            $stmt->execute();

            $rows = $stmt->rowCount();

            if ($rows <= 0) {
              if (
                ($nomeFoto != "") && 
                (move_uploaded_file($_FILES['foto']['tmp_name'], 
                                   $uploaddir . $novoNomeFoto)
              )
           ) {
               // caminho/nome da imagem p/ gravar no BD
               $uploadfile = $uploaddir . $novoNomeFoto; 
           } else {
               $uploadfile = null;
               echo "Sem upload de imagem.";
           }
                $stmt = $pdo->prepare("insert into produtoTCC (nome, code, category, unidadeMedida,arquivoFoto) values(:nome, :code, :category, :unidadeMedida,:arquivoFoto)");
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':code', $code);
                $stmt->bindParam(':category', $category);
                $stmt->bindParam(':unidadeMedida',$unidadeMedida);
                $stmt->bindParam(':arquivoFoto', $uploadfile);
                $stmt->execute();

                echo "<span id='sucess'>Produto Cadastrado!</span>";
            } else {
                echo "<span id='error'>Produto já existente!</span>";
            }
        }

    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $pdo = null;
}
}

?>
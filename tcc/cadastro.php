<?php
ini_set('display_errors', 0);
set_error_handler('tratarAviso');
function tratarAviso($errno, $errstr, $errfile, $errline)
{
  // Exibir a tela bonita ao invés do aviso padrão
  include 'login.php';
  exit(); // Encerra a execução do script após exibir a tela bonita
}

session_start();

$username = $_SESSION['username'];

if (isset($_SESSION['username']) && null !== $_SESSION['level']) {

  $username = $_SESSION['username'];

  $level = $_SESSION['level'];
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Cadastro | AlmoxariSars</title>
    <link rel="icon" type="image/png" href="logo/1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleteste6.css">
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <style>
      body {
        height: 100vh;
    background: linear-gradient(45deg,#257bcf,#5088bf,#75a7d9);
    background-size: 300% 600%;
    animation: gradientAnimation 2s ease infinite;
      }
      @keyframes gradientAnimation {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

      form {
        margin-top: 80px;
        margin-left: 25%;

      }

      label {
        color: white;
      }
        #zoom:hover {
        transform: scale(1.1, 1.1);
      }



     




      .form-row .form-group {
        padding-right: 15px;
        padding-left: 15px;
      }

      .custom-file-input {
        width: 100%;
      }

      select.form-control {
        bottom: auto;
      }


      #custom-alert {
        position: fixed;
        top: 300px;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.5);
        color: #fff;
        padding: 20px;
        font-weight: bold;
        border-radius: 15px;
        text-align: center;
        z-index: 500;
        border: 2px solid #fff;
      }

      #custom-alert p {
        margin-bottom: 10px;
      }

      #ok-button {

        background-color: #fff;
    font-size: 13px;
    width: 100px; /* Reduzi a largura para ajustar melhor */
    cursor: pointer;
    color: #000000;
    border: none;
    margin-left: 5px;
    border-radius: 20px;
    padding: 6px;
   
    transition: .2s;
    box-shadow: 0px 2px 4px rgba(0, 174, 255, 0.3);
   
    font-weight: normal;
    text-align: center;

      }

      #ok-button:hover {
        width: 99px;
    margin-left:6px;
    box-shadow: 0px 4px 8px rgba(7, 95, 136, 0.3);
    transition: .2s;

      }

      .
    .divItemA {
        margin-top:10px;
        position: fixed;
        margin-left:250px;

      }
  
      .w3-bar-item{
        color: #fff !important;
        font-weight: 700px;
        background: rgba(255, 255, 255, 0.5) !important;
        padding: 3px;
        border-radius:20px;
        text-align: center;
        font-size: 15px;
         font-weight: bold;
         padding:5px;
          margin-top:5px ;
          justify-content:space-between;
          margin-left:5px;
          margin-top:20px;
          border: 2px #fff solid;
          text-decoration: none;
      }

      .w3-button:hover {
        color: #fff !important;
        font-weight: 700px;
        background: rgba(255, 255, 255, 0.5) !important;
        padding: 3px;
        border-radius:20px;
        text-align: center;
        font-size: 15px;
         font-weight: bold;
         padding:5px;
          margin-top:5px ;
          justify-content:space-between;
          border: 2px #fff solid;
          text-decoration: none;

      }



      #form1 {

        background: rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    justify-content: center;
    align-items: center;
    height: 500px;
    width: 450px;
    color: #fff;
    left: 450px;
    top:270px;
    transform: translate(-50%, -50%); /* Centraliza horizontal e verticalmente */
   
    margin-top: 10px;
    position: fixed;
    border: 2px #fff solid;
       


      }

      #form2 {
    background: rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    justify-content: center;
    align-items: center;
    height: 500px;
    width: 450px;
    color: #fff;
    left: 450px;
    top:270px;
    transform: translate(-50%, -50%); /* Centraliza horizontal e verticalmente */
   
    margin-top: 10px;
    position: fixed;
    border: 2px #fff solid;
       
      }


      #form3 {

        background: rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    justify-content: center;
    align-items: center;
    height: 500px;
    width: 450px;
    color: #fff;
    left: 450px;
    top:270px;
    transform: translate(-50%, -50%); /* Centraliza horizontal e verticalmente */
   
    margin-top: 10px;
    position: fixed;
    border: 2px #fff solid;


      }

      #form4 {

       
        background: rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    justify-content: center;
    align-items: center;
    height: 500px;
    width: 450px;
    color: #fff;
    left: 450px;
    top:270px;
    transform: translate(-50%, -50%); /* Centraliza horizontal e verticalmente */
   
    margin-top: 10px;
    position: fixed;
    border: 2px #fff solid;
       

      }


      .form-content {
        background-color: #000;
        padding: 20px;
        border-radius: 5px;
      }

      #content {
        display: none;
      }

      body {
        margin: 0;

      }

      .unicamp {
        position: absolute;
        top: 50%;
        left: 60%;
        transform: translate(-50%, -50%);
        height: 400px;
        width: 500px;
        z-index: 2;
      }
      .button-container {
  display: flex;
  justify-content: center; 
  margin-top: 450px; 
  margin-left:70px;
  position: fixed;
  
}

.button-container button {
  margin: 0 5px; 
}
.button-container {
  display: flex;
  justify-content: center; 
  margin-top: 450px; 
  margin-left:70px;
  position: fixed;
  
}
.iconeBuscar{
    margin-right: 200px;
    
}

.button-container button {
  margin: 0 5px; 
}
    </style>
  </head>

  <body>
  <?php
  include 'menuLateral.php';
?>
<div class="navSup">
<button class="btnLogOut" onclick="window.location.href='logout.php'" >sair</button>
</div>



    <div id="custom-alert">
      <p><?php echo $username ?>, clique no item com o qual deseja trabalhar</p>
      <button id="ok-button" aria-required="click">Ok</button>
    </div>

        <?php if ($level == 3) {
          //ordem: produtos, pessoas, unidades de medidas, categorias
          include('form/produto.php');
          include('form/pessoas.php');
          include('form/medidas.php');
          include('form/categorias.php');
        } else
          if ($level == 2) {
            include('form/medidas.php');
          }
}
?>

    <!--PRODUTO  OK-->
    <div class="col-md-10 ml-sm-auto">
      <form id="form1" class="limpar-campos" style="display: none;" method="post">
      <div class="titleRelatorio">
		  <h1>Produto</h1>
      </div>
      <div class="divTextForm">
      <label for="nome">Nome</label>
      <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required  class="formaticTextRelatorio">
  
      <label for="code">Código</label>
      <input type="code" id="code" name="code" placeholder="Digite seu código" required  class="formaticTextRelatorio">
      <label for="category">Categoria</label>
		  <select class="formaticRelatorio" id="category" required name="category">
              <option selected disabled>Selecione uma categoria</option>
              <option value="categoria1">Hidráulica</option>
              <option value="categoria2">Finalização</option>
              <option value="categoria3">Tintas</option>
      </select>
      <label for="unidadeMedida">Unidade de Medida</label>
      <select class="formaticRelatorio" id="unit" required name="unidadeMedida">
              <option selected disabled>Selecione uma unidade de medida</option>
              <option value="média">Bobina</option>
              <option value="alta">Caixa com 10 sachês com 1 grama</option>
              <option value="alta">Cartela com 1 cartela</option>
              <option value="alta">Caixa 50 pares</option>
              <option value="alta">Centena</option>
              <option value="alta">Dezena</option>
              <option value="alta">Fardo</option>
              <option value="alta">Frasco</option>
              <option value="alta">Galão</option>
              <option value="alta">Quilograma</option>
              <option value="alta">Litro</option>
              <option value="alta">Milheiro</option>
              <option value="alta">Peça</option>
              <option value="alta">Pacote (500 folhas)</option>
              <option value="alta">Pacote com 4 blocos com 50 folhas</option>
            </select>
           <label for="formFile">Insira a imagem referente</label>
              <input type="file" id="formFile" class="formaticTextRelatorio" >
          </div> 
                <div class="button-container">
                 <button id="ok-button" aria-required="click">CADASTRAR</button>
                 <button id="ok-button" aria-required="click">ATUALIZAR</button>
                 <button id="ok-button" aria-required="click">EXCLUIR</button>
                </div>   
      </form>
    </div>

    <!--USUÁRIO -->
    <div class="col-md-10 ml-sm-auto">
    <form id="form2" class="limpar-campos" style="display: none;">
    <div class="titleRelatorio">
		  <h1>Usuário</h1>
      </div>
    <div class="form-row">
    <div class="divTextForm2">
      <label for="name">Nome</label>
      <input type="text" class="formaticTextRelatorio" id="name" placeholder="Insira o nome" required>
    
      <div class="iconeBuscar">
            <span class="icon"><i class="bi bi-search"></i>
            <input type="text" class="formaticTextRelatorio" id="search" placeholder="Buscar"></span>
          </div>

      <label for="code">Código de funcionário</label>
      <input type="text" class="formaticTextRelatorio" id="code" placeholder="Insira o código" required>
  
      <label for="unit">Tipo de usuário</label>
      <select class="formaticRelatorio" id="unit" required>
        <option selected disabled>Selecione o tipo de usuário</option>
        <option value="média">Adm</option>
        <option value="alta">nível 1</option>
        <option value="alta">nível 2</option>
      </select>
   
  </div>
  <div class="button-container">
                 <button id="ok-button" aria-required="click">CADASTRAR</button>
                 <button id="ok-button" aria-required="click">ATUALIZAR</button>
                 <button id="ok-button" aria-required="click">EXCLUIR</button>
                </div>   
</form>
</div>
      <!--UNIDADE DE MEDIDA-->
      <form id="form3" class="limpar-campos" style="display: none;">
      <div class="titleRelatorio">
      <h1>Unidade de Medida</h1>
       </div>
        
          <div class="divTextForm1">
            <label for="name">Nova Medida</label>
            <input type="text" class="formaticTextRelatorio" id="name" placeholder="Insira a unidade de medida" required>
            <div class="iconeBuscar">
            <span class="icon"><i class="bi bi-search"></i>
            <input type="text" class="formaticTextRelatorio" id="search" placeholder="Buscar"></span>
          </div>
        </div>
          
        
          <div class="button-container">
                 <button id="ok-button" aria-required="click">CADASTRAR</button>
                 <button id="ok-button" aria-required="click">ATUALIZAR</button>
                 <button id="ok-button" aria-required="click">EXCLUIR</button>
                </div> 
      </form>
    <!--CATEGORIA-->
    <div class="col-md-10 ml-sm-auto">
      <form id="form4" class="limpar-campos" style="display: none;">
      <div class="titleRelatorio">
      <h1>Categoria</h1>
       </div>
        
          <div class="divTextForm1">
            <label for="name">Nova categoria</label>
            <input type="text" class="formaticTextRelatorio" id="name" placeholder="Insira a categoria" required>
         

            <div class="iconeBuscar">
            <span class="icon"><i class="bi bi-search"></i>
            <input type="text" class="formaticTextRelatorio" id="search" placeholder="Buscar"></span>
          </div>

        </div>
        <div class="button-container">
                 <button id="ok-button" aria-required="click">CADASTRAR</button>
                 <button id="ok-button" aria-required="click">ATUALIZAR</button>
                 <button id="ok-button" aria-required="click">EXCLUIR</button>
                </div> 
      </form>
    </div>

  
  


  <footer class="footer">
  <footer>    
  <p class="footer-text">SARS | UNICAMP | COTIL</p>
    <button class="btnRodape" onclick="abrirFormulario()">Contatar Desenvolvedor</button>

</footer>
</body>

<?php



    if ($_SERVER["REQUEST_METHOD"] === 'POST') {

        include("conexaoBD.php");

        try {            
            $nome = $_POST["nome"];
            $code = $_POST["code"];
            $category = $_POST["category"];
            $unidadeMedida = $_POST["unidadeMedida"];

            if ((trim($nome) == "") || (trim($code) == "")) {
                echo "<span id='warning'>Insira o nome e código do produto!</span>";
            } else {
        
                $stmt = $pdo->prepare("select * from produtoTCC where nome = :nome");
                $stmt->bindParam(':nome', $nome);
                $stmt->execute();

                $rows = $stmt->rowCount();

                if ($rows <= 0) {
                    $stmt = $pdo->prepare("insert into produtoTCC (nome, code, category, unidadeMedida) values(:nome, :code, :category, :unidadeMedida)");
                    $stmt->bindParam(':nome', $nome);
                    $stmt->bindParam(':code', $code);
                    $stmt->bindParam(':category', $category);
                    $stmt->bindParam(':unidadeMedida',$unidadeMedida);
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
?>

<script>


  function trocarFormulario(id) {
    // ocultar todos os formulários
    var forms = document.getElementsByTagName("form");
    for (var i = 0; i < forms.length; i++) {
      forms[i].style.display = "none";
    }

    // exibir o formulário correto
    document.getElementById(id).style.display = "block";
  }


  // java do alert inicial vsfffff

  $(document).ready(function () {
    // Adiciona o evento de clique ao botão "OK"
    $('#ok-button').click(function () {
      // Exibe o conteúdo do site
      $('#site-content').css('display', 'block');
      // Oculta o alert personalizado
      $('#custom-alert').css('display', 'none');
    });
  });

</script>
<script>
    function limparCampos() {
        var forms = document.getElementsByClassName("limpar-campos");
        for (var i = 0; i < forms.length; i++) {
            forms[i].reset();
        }
    }
</script>

</html>
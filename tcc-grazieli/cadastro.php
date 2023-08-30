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
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background-color: rgb(0, 127, 130);

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


      /*cor das letras sem hover*/

      .w3-sidebar a {

        padding: 10px;
        margin-bottom: 10px;
        color: white;
        text-align: center;
      }


      @media (max-width: 768px) {
        .w3-sidebar {
          width: 100%;
          height: auto;
        }

        .w3-sidebar a {
          padding: 5px;
          margin-bottom: 5px;
        }
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
    margin-top: 25px;
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


      .w3-sidebar {
        background-color: rgb(10, 96, 102);
        text-align: center;
        width: 20%;
        position: absolute;
      }

      .w3-button:hover {
        color: #000 !important;
        font-weight: 700;
        background-color: rgb(161, 46, 47) !important;
        padding: 3%;

      }



      #form1 {

        z-index: 5;
        position: absolute;
        /* define a largura máxima do formulário */
        max-width: 800px;
        /* define a margem esquerda em 15% para alinhar com a sidebar */
        margin-left: 25%;
        /* demais estilos */
        align-items: center;
        margin-top: 3cm;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        padding: 40px;
        background-color: rgb(10, 96, 102);


      }

      #form2 {


        z-index: 5;
        position: absolute;
        /* define a largura máxima do formulário */
        max-width: 800px;
        /* define a margem esquerda em 15% para alinhar com a sidebar */
        margin-left: 25%;
        /* demais estilos */
        align-items: center;
        margin-top: 3cm;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        padding: 40px;
        background-color: rgb(10, 96, 102);
      }


      #form3 {

        z-index: 5;
        position: absolute;
        /* define a largura máxima do formulário */
        max-width: 800px;
        /* define a margem esquerda em 15% para alinhar com a sidebar */
        margin-left: 25%;
        /* demais estilos */
        align-items: center;
        margin-top: 3cm;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        padding: 40px;
        background-color: rgb(10, 96, 102);


      }

      #form4 {

        z-index: 5;
        position: absolute;
        /* define a largura máxima do formulário */
        max-width: 800px;
        /* define a margem esquerda em 15% para alinhar com a sidebar */
        margin-left: 25%;
        /* demais estilos */
        align-items: center;
        margin-top: 3cm;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        padding: 40px;
        background-color: rgb(10, 96, 102);

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
      <p>Por favor, clique no item com o qual deseja trabalhar</p>
      <button id="ok-button" aria-required="click">Ok</button>
    </div>


    <div id="site-content" style="display: none;">

      <!-- Sidebar -->
      <div class="w3-sidebar w3-bar-block">

        <h4 style="color: white; font-weight: bold; margin-top: 10px;">Cadastro</h4>
        <hr>

        <a href="#" class="w3-bar-item w3-button " style="text-decoration: none;">Adicionar &nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square"
            viewBox="0 0 16 16">
            <path
              d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
            <path fill-rule="evenodd"
              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
          </svg>
        </a>
        <a href="#" class="w3-bar-item w3-button" style="text-decoration: none;">Atualizar &nbsp;&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z" />
          </svg>

        </a>
        <a href="#" class="w3-bar-item w3-button" style="text-decoration: none;">Excluir
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
            viewBox="0 0 16 16">
            <path
              d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
            <path
              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
          </svg>
        </a>
        <a href="#" class="w3-bar-item w3-button" type="submit" style="text-decoration: none;">Confirmar
          &nbsp;&nbsp;&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg"
            viewBox="0 0 16 16">
            <path
              d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
          </svg>
        </a>
        <a href="#" class="w3-bar-item w3-button" style="text-decoration: none;" onclick="limparCampos()">Cancelar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x"
            viewBox="0 0 16 16">
            <path
              d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </a>
        <hr>
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
      <hr>
      <a href="index.php" class="w3-bar-item w3-button" style="text-align: center; text-decoration: none;">Voltar</a>

    </div>
  
//Produto
    <div class="col-md-10 ml-sm-auto">

      <form id="form1" class="limpar-campos" style="display: none;">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Insira o nome" required>
          </div>
          <div class="form-group col-md-6">
            <label for="search"><i class="fas fa-search"></i></label> <input type="text" class="form-control"
              id="search" placeholder="Buscar">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="code">Código</label>
            <input type="text" class="form-control" id="code" placeholder="Insira o código" required>
          </div>
        </div>


        <div class="form-row">
          <div class=" form-group col-md-6">
            <label for="category">Categoria</label>
            <select class="form-control" id="category" required>
              <option selected disabled>Selecione uma categoria</option>
              <option value="categoria1">Hidráulica</option>
              <option value="categoria2">Finalização</option>
              <option value="categoria3">Tintas</option>
            </select>
          </div>
          <div class="form-group col-md-6 dropdown">
            <label for="unit">Unidade de Medida</label>
            <select class="form-control" id="unit" required>
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
          </div>
        </div>


        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="formFile" class="form-label">Insira a imagem referente</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="formFile">
              <label class="custom-file-label" for="formFile">Escolha um arquivo</label>
            </div>
          </div>
        </div>

      </form>
    </div>
///
//Pessoa

    <div class="col-md-10 ml-sm-auto">

      <form id="form2" class="limpar-campos" style="display: none;">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Insira o nome" required>
          </div>
          <div class="form-group col-md-6">
            <label for="search"><i class="fas fa-search"></i></label>
            <input type="text" class="form-control" id="search" placeholder="Buscar">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="code">Código de funcionário</label>
            <input type="text" class="form-control" id="code" placeholder="Insira o código" required>
          </div>
          <div class="form-group col-md-6 dropdown">
            <label for="unit">Tipo de usuário</label>
            <select class="form-control" id="unit" required>
              <option selected disabled>Selecione o tipo de usuário</option>
              <option value="média">Adm</option>
              <option value="alta">nível 1</option>
              <option value="alta">nível 2</option>
            </select>
          </div>
        </div>

      </form>

    </div>
/////




////Unidade de medida
    <div class="col-md-10 ml-sm-auto">
      <form id="form3" class="limpar-campos" style="display: none;">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Unidade de Medida</label>
            <input type="text" class="form-control" id="name" placeholder="Insira a unidade de medida" required>
          </div>
          <div class="form-group col-md-6">
            <label for="search"><i class="fas fa-search" class="buscar"></i></label> <input type="text"
              class="form-control" id="search" placeholder="Buscar">
          </div>
        </div>
      </form>
    </div>
//
//Categoria
    <div class="col-md-10 ml-sm-auto">
      <form id="form4" class="limpar-campos" style="display: none;">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Categoria</label>
            <input type="text" class="form-control" id="name" placeholder="Insira a categoria" required>
          </div>

          <div class="form-group col-md-6">
            <label for="search"><i class="fas fa-search"></i></label> <input type="text" class="form-control"
              id="search" placeholder="Buscar">
          </div>

        </div>
      </form>
    </div>

  </div>

  <footer class="footer">
<footer>    
  <p class="footer-text">SARS | UNICAMP | COTIL</p>
    <button class="btnRodape" onclick="abrirFormulario()">Contatar Desenvolvedor</button>

</footer>
  
</body>


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
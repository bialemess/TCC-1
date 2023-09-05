<?php
//tratar o warnning de erro https://www.totvs.com/  https://admsistemas.com.br/almoxarifado/  https://solucao.digital/?gclid=EAIaIQobChMImafKqsKf_wIVtkZIAB30Tw1pEAAYAiAAEgJLWfD_BwE


  // prova cadastro de php em banco de dados https://nicepage.com/pt/modelos-html
ini_set('display_errors', 0);
set_error_handler('tratarAviso');
function tratarAviso($errno, $errstr, $errfile, $errline)
{
 
  include 'login.php';
  exit(); 
}

session_start();
  
$username = $_SESSION['username'];

if (isset($_SESSION['username']) && null !== $_SESSION['level']) {

  $username = $_SESSION['username'];

  $level = $_SESSION['level'];
  $logado = true;}
  // Verifica o nível de acesso do usuário e exibe os cards correspondente
 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home | AlmoxariSars</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleteste6.css">
    <link rel="icon" type="image/png" href="logo/1.png">
</head>
<body>
<?php
  include 'menuLateral.php';
?>

<div class="navSup">

<button class="btnLogOut" onclick="window.location.href='logout.php'" >sair</button>
</div>


  
<div class="divRelatorio3">
	<form>
		<div class="divWelcome">
    <img src="logo/1.png" alt="Logo da UNICAMP" id="logo">
		<h1 class="textWelcome">Bem Vindo,<?php echo $username ?>!</h1>
</div>
		<div class="divTextRelatorio">
		
    <div class="divWelcome2">
<h2 class="textWelcome2">Realize cadastro de produtos, funcionários e confira pedidos
</h2>
</div>
</div>
	</form>
</div>


<footer class="footer">
<footer>    
  <p class="footer-text">SARS | UNICAMP | COTIL</p>
    <button class="btnRodape" onclick="abrirFormulario()">Contatar Desenvolvedor</button>

</footer>



</body>

</html>
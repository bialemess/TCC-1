<?php
  include("bd.php");
  aviso();
  ?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Pedidos | AlmoxariSars</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleteste7.css">
    <link rel="icon" type="image/png" href="logo/1.png">

</head>
<body>
<?php
  include 'menuLateral.php';
?>





<div class="divRelatorio">
	<form>
		<div class="titleRelatorio">
		<h1>Confira seus pedidos abaixo <?php echo $username ?></h1>
</div>
<div class="divPedido"> </div> 
<a href="novoPedido.php" class="btnRelatorio">Novo Pedido</a>

 
		
	</form>
</div>
    
<footer class="footer">
<footer>    
  <p class="footer-text">SARS | UNICAMP | COTIL</p>
    <button class="btnRodape" onclick="abrirFormulario()">Contatar Desenvolvedor</button>

</footer>

</body>
</html>

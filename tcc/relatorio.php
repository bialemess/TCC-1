
<!DOCTYPE html>
<html>
<head>
	<title>Relatório | AlmoxariSars</title>
	
	</style>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	 <link rel="stylesheet" href="styleteste6.css">
	  <link rel="icon" type="image/png" href="logo/1.png">
</head>
<body>
  <?php
  include 'menuLateral.php';
  
  ?>

  <br><br>
  <div class="divRelatorio1">
	<form>
		<div class="titleRelatorio">
		<h1 >Relatório</h1>
</div>
		<div class="divTextRelatorio1">
		<label for="nome">Id do usuário:</label>

		<input type="text" id="nome" name="nome" placeholder="Digite seu nome" required  class="formaticTextRelatorio">
    <label for="relatorio">Especificações:</label>
		<select id="relatorio" name="relatorio" class="formaticRelatorio">
		<option value="">Selecione um filtro</option>
			<option value="mensal">Hidraulica</option>
			<option value="semestral">Elétrica</option>
      <option value="semestral">Cabeamento</option>
      <option value="semestral">Estrutura (Aço,concreto,alvenaria...)</option>
      <option value="semestral">Cobertura</option>
      <option value="semestral">Impermeabilidade</option>
      <option value="semestral">SPDA</option>
      <option value="semestral">Pintura</option>
      <option value="semestral">Climatização</option>
      <option value="semestral">Pavimentação</option>
      
		</select>
		
		<label for="Periodo">Periodo:</label>
		<select id="Periodo" name="Periodo"  class="formaticRelatorio">
			<option value="mensal">Mensal</option>
			<option value="semestral">Semestral</option>
		</select>
		<a href="novoRelatorio.php" type="submit" class="btnRelatorio2">Visualizar
		</a>
		
</div>
	</form>
</div>
<div class="navSup">

<button class="btnLogOut" onclick="window.location.href='logout.php'" >sair</button>
</div>



<footer class="footer">
<footer>    
  <p class="footer-text">SARS | UNICAMP | COTIL</p>
    <button class="btnRodape" onclick="abrirFormulario()">Contatar Desenvolvedor</button>

</footer>
</body>
</html>
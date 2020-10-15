
<!DOCTYPE html>
<html>
<title>Retenção</title>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='shortcut icon' type='image/x-icon' href='IMG/favicon.ico' />

<link rel='stylesheet' href='CSS/w3.css'>


<?php include 'CONNS/checksession.php'?>
<?php include 'CONNS/getperfil.php'; $perfil;?>


<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-navbar,h1,button {font-family: "Montserrat", sans-serif}
header{
    
    color: white;
    background-color: black;
    clear: left;
    text-align: right;
}
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 1s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

th, td {
    border-bottom: 1px solid #ddd;
	
}

tr:nth-child(even) {background-color: #C0C0C0}
tr:hover {
          background-color: #ffff99;
        }
.cabeçalho{background-color: #00897B; color: white}
.dark-blue{background-color:#00897B; color: white}
select:invalid { color: gray; }
  input[type="date"]:before {
    content: attr(placeholder) !important;
    color: #aaa;
    margin-right: 0.5em;
  }
  input[type="date"]:focus:before,
  input[type="date"]:valid:before {
    content: "";
  }
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <ul class="w3-navbar dark-blue w3-card-2 w3-left-align w3-large">
    <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
      <a class="w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    </li>
 	<li><a href="#" class="w3-padding-large w3-white">CSU</a></li>    
    <li class="w3-hide-small"><a href="inserir.php" class="w3-padding-large w3-hover-white">Adicionar</a></li>
    <li class="w3-hide-small"><a href="consultar.php" class="w3-padding-large w3-hover-white">Consultar</a></li>
    
    <?php
		IF ($perfil=='ADMRET'){
			echo("<li class='w3-hide-small'><a href='validar.php' class='w3-padding-large w3-hover-white'>Validar</a></li>");
			echo("<li class='w3-hide-small'><a href='reset_senha.php' class='w3-padding-large w3-hover-white'>Resetar Senha</a></li>");
		}
	 ?>
	 <li class="w3-hide-small"><a href="alterarsenha.php" class="w3-padding-large w3-hover-white">Alterar Senha</a></li>
	 <li class="w3-hide-small"><a href="conns/sair.php" class="w3-padding-large w3-hover-white">Sair</a></li>
  </ul>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium">
    <ul class="w3-navbar w3-left-align w3-large w3-black">
      <li><a class="w3-padding-large" href="inserir.php">Solicitar Folga</a></li>
      <li><a class="w3-padding-large" href="consultar.php">Consultar</a></li>
      <?php
			IF ($perfil=='ADMRET'){
				echo("<li><a class='w3-padding-large' href='validar.php'>Validar Solicitações</a></li>");
				echo("<li class='w3-hide-small'><a href='reset_senha.php' class='w3-padding-large w3-hover-white'>Resetar Senha</a></li>");
			}
	  ?>
    </ul>
  </div>
</div>
<?php
echo("	<BR> <br> <BR> <br>");
echo("		<center>");
$res=isset($_REQUEST['val'])?$_REQUEST['val']:'';
	IF ($perfil=='ADMRET' && isset($_REQUEST['val'])){
	
	
	
	Function GetAccounts(){
		$resultado = PG_query("SELECT obs FROM ocor_ret WHERE num_chamado = '" . $_REQUEST['val'] . "' order by num_chamado DESC limit 1"); 
	return $resultado;
	}
	    
	$return = GetAccounts();
	
	while($myrow = pg_fetch_assoc($return)) { 
		$OBS =  ($myrow['obs']); 
    } 
	
	$_SESSION['OBS']=$OBS;
	
	echo("<textarea name='Text1' cols='40' rows='5' style='width: 500px;'>". $OBS . "</textarea><br><br>");
	
	
	Function GetAccounts2(){
		$resultado = PG_query("SELECT contrato FROM ocor_ret WHERE num_chamado = '" . $_REQUEST['val'] . "' order by num_chamado DESC limit 1"); 
	return $resultado;
	}
	    
	$return = GetAccounts2();
	
	while($myrow = pg_fetch_assoc($return)) { 
		$contrato =  ($myrow['contrato']); 
    } 
	
	$_SESSION['contrato']=$contrato;
	
	echo("<textarea name='Text2' cols='40' style='width: 500px;'>". $contrato . "</textarea><br><br>");
	}
	IF ($perfil=='ADMRET' && !isset($_REQUEST['val'])){
	echo("	<BR> <br> <BR> <br>");
	}
	
	IF ($perfil=='ADMRET') {



	echo("	<form action='conns/statusupdate.php' method='post'>");
	echo("            <input type='number' name='num_chamado' placeholder='Número do chamado'  size='40' length='6' style='width: 240px;' value=" . $res . "><br><br>");
	echo("			  <select id='status' name='status' size='1' style='width: 240px;'>");
	echo("				<option value='' disabled selected hidden>Status de validação</option>");
	echo("				<option></option>");
	echo("				<option>Tratado</option>");
	echo("				<option>Pendente</option>");
	echo("				<option>Devolvido</option>");
	echo("			</select><br><br>");
	echo("			<textarea type='text' name='obs' placeholder='Observação' size='40' length='6' style='width: 340px;height: 240px;' required cols='40' rows='5' ></textarea><br><br>");
	echo("			<input class='dark-blue' type='submit' name='submit' value='Atualizar Status'>");
	echo("		</center>");
	echo("	</form>	");
	echo("</body>");
	} ELSE {
		header('Location: consultar.php');
	}
?> 
</body>
</html>

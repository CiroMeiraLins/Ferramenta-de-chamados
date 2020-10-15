
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
			}
	  ?>
    </ul>
  </div>
</div>
       
	<form action="conns/resetpassword.php" method="post"> 
		
		<BR>
		<BR>
		<BR>
		<BR>

		<center>
			<input type="text" placeholder="Login (CS)"  name="Login" size="40" style="width: 170px;"><BR> <br>
			<input type="password" placeholder="Nova Senha"  name="novasenha1" size="40" style="width: 170px;"><BR> <br>
			<input type="password" placeholder="Repita a Nova Senha"  name="novasenha2" size="40" style="width: 170px;"><BR> <br>
		
			<input class="dark-blue" type="submit" name="submit" value="Alterar">
		</center>
        
        
	</form> 
</body> 
</html> 




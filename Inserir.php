
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
	  <li class="w3-hide-small"><a href="alterarsenha.php" class="w3-padding-large w3-hover-white">Alterar Senha</a></li>
	  <li class="w3-hide-small"><a href="conns/sair.php" class="w3-padding-large w3-hover-white">Sair</a></li>
    </ul>
  </div>
</div>
       
	<form action="conns/add.php" method="post"> 
		
		<BR>
		<BR>
		<BR>
		<BR>

		<center>
			
			
			
			<textarea type='text' name='contrato' placeholder='Contrato' size='40' length='7' style="width: 340px;height: 30px;" required></textarea><br>
			
			<select id="super" name="super" style="width: 340px;height: 30px;" required>
				<option value="" disabled selected hidden>Supervisor</option>
				
				<OPTION>SUPORTES RETENÇÃO</OPTION>
				<OPTION>SUPORTES 2</OPTION>
				
								
			</select>
			<br><br>
			
			<select id="ocor_ret" name="ocor_ret" style="width: 340px;height: 30px;" onchange=erro_gatlink() required>
				<option value="" disabled selected hidden>Ocorrência</option>
				
				<OPTION>[SUPERVISOR] DESCONTOS REVERSÃO</OPTION>
				<OPTION>[SUPERVISOR] ABERTURA DE CHAMADO</OPTION>
				<OPTION>[SUPERVISOR] ATENDIMENTO AO CLIENTE</OPTION>
				<OPTION>[SUPERVISOR] AUTORIZAÇÃO DE EXCEÇÕES. </OPTION>
				<OPTION>[SUPERVISOR] CASOS PARA ANÁLISE GESTOR/STAFF</OPTION>
				<OPTION>[SUPERVISOR] INIBIÇÃO</OPTION>
				<OPTION>[SUPERVISOR] OUTROS</OPTION>
				<OPTION>[SUPERVISOR] ENVIO DE 2ª VIA DE FATURA</OPTION>
				<OPTION>[SUPERVISOR] ERRO CONTESTAÇÃO</OPTION>
				<OPTION>[SUPERVISOR] CADASTRO DEMAIS PONTOS (PFC , TELECINE, HBO..)</OPTION>
				<OPTION>ACESSO VTA COM LEAD GERADO.</OPTION>
				<OPTION>AUTORIZAÇÃO DE QUEBRA DE CARÊNCIA.</OPTION>
				<OPTION>CO16 (DESCONEXÃO URA)</OPTION>
				<OPTION>DESCONEXÃO COM LEAD GERADO.</OPTION>
				<OPTION>DOIS CONTRATOS NO MESMO ENDEREÇO(DESCONEXÃO)</OPTION>
				<OPTION>ENCAIXE</OPTION>
				<OPTION>LANÇAMENTO DE DESCONTO FORA DA ALÇADA </OPTION>
				<OPTION>SUSPENSÃO TEMPORÁRIA NET FONE</OPTION>
				<OPTION>SUSPENSÃO TEMPORÁRIA TOTAL (TV, VTA E FONE)</OPTION>
				<OPTION>SUSPENSÃO TEMPORÁRIA TV + FONE</OPTION>
				<OPTION>SUSPENSÃO TEMPORÁRIA TV E VIRTUA</OPTION>
				<OPTION>SUSPENSÃO TEMPORÁRIA TV</OPTION>
				<OPTION>SUSPENSÃO TEMPORÁRIA VIRTUA</OPTION>
				<OPTION>SUSPENSÃO TEMPORÁRIA VTA + FONE</OPTION>
				<OPTION>CO85 (DESCONEXÃO ERRO RET/REV)</OPTION>
				<OPTION>CO1 RE – OUTROS CANAIS DE VENDA</OPTION>
				<OPTION>PRODUTO EXCLUSIVO REVERSÃO</OPTION>

			</select>
			<br>
			<br>
			<textarea type='text' id="obs" name='obs' placeholder='Observação' size='40' length='6' style='width: 340px;height: 240px;' required cols="40" rows="5" ></textarea><br><br>
			<script>
			function erro_gatlink() {
				var x = document.getElementById("ocor_ret").value;
				if (x == "[SUPERVISOR] DESCONTOS REVERSÃO"||x == "[SUPERVISOR] ADESÃO OFERTA REVERSÃO (TV GR 2M...)"||x == "LANÇAMENTO DE DESCONTO FORA DA ALÇADA"){
					document.getElementById("obs").innerHTML = "QUAL DESCONTO REVERSÃO?\nCONTRATO:\nFATURA :\nVALOR DO DESCONTO: \nQUAL PRODUTO :\nQUANTO TEMPO DE DESCONTO ?";
				}
				if (x == "ENCAIXE"){
					document.getElementById("obs").innerHTML = "CONTRATO: \nTIPO DE ORDEM DE SERVIÇO:  \nAREA DE DESPACHO:  \nDATA E HORARIO DESEJADO: ";
				}
				else{
					document.getElementById("obs").innerHTML = "";
				}
			}
			</script>
		</center>
		
		<br>
        
		<center>
			<input class="dark-blue" type="submit" name="submit" value="Inserir">
		</center>
        
        
	</form> 
</body> 
</html> 




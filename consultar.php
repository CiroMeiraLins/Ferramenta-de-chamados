
<!DOCTYPE html>
<html>


<script src="js/jquery-2.1.1.min.js"></script>
  <script>
    $(document).ready(function(){
      $("tr").click(function(){
        $(this).find('td').each(function(i) {
          $th = $("thead th")[i];
		  if(i==0){
          $xx=jQuery($th).text() + $(this).html()
		  
		  window.location.href = "validar.php?val="+$xx
		  }
        });                  
      })
    });
	
  </script>
  
    <script>
	function fnExcelReport()
{
    var tab_text = '<table border="1px" style="font-size:15px" ">';
    var textRange; 
    var j = 0;
    var tab = document.getElementById('consulta'); // id of table
    var lines = tab.rows.length;

    // the first headline of the table
    if (lines > 0) {
        tab_text = tab_text + '<tr bgcolor="#DFDFDF">' + tab.rows[0].innerHTML + '</tr>';
    }

    // table data lines, loop starting from 1
    for (j = 1 ; j < lines; j++) {     
        tab_text = tab_text + "<tr>" + tab.rows[j].innerHTML + "</tr>";
    }

    tab_text = tab_text + "</table>";
    tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");             //remove if u want links in your table
    tab_text = tab_text.replace(/<img[^>]*>/gi,"");                 // remove if u want images in your table
    tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, "");    // reomves input params
    // console.log(tab_text); // aktivate so see the result (press F12 in browser)

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

     // if Internet Explorer
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa = txtArea1.document.execCommand("SaveAs", true, "DataTableExport.xls");
    }  
    else // other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}   
</script>



<title>Retenção</title>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='shortcut icon' type='image/x-icon' href='IMG/favicon.ico' />

<link rel='stylesheet' href='CSS/w3.css'>


<?php include 'CONNS/checksession.php'?>
<?php include 'CONNS/getperfil.php'; $perfil;?>
<?php $username = include 'conns/retornar consulta.php'; ?>

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

<!-- CONSULTAINICIO -->
<body class="w3-container">
	<br>
	<br>
	<br>
	<center>
		
		
		
		<br>
		
		<img align="right" src="img/excel.png" id="btnExport" onclick="fnExcelReport()" style="width:30px;height:30px;";>
		<br>
		</center>
		
		
		
		<table id="consulta" class="table table-hover" style="font-size:13px; width: 80; width: 100%;left:0; right:0; " >
            <tbody>
			<tr> 
               <td class="cabeçalho" style="width: 80;"> 
                    <center>Chamado</center>
                </td> 
				<td class="cabeçalho" style="width: 80;"> 
                   <center>Contrato</center>
                </td>
				<td class="cabeçalho" style="width: 80;"> 
                   <center> Ocorrência</center>
                </td>
				<td class="cabeçalho" style="width: 80;"> 
                   <center> Solicitante</center>
                </td>
				<td class="cabeçalho" style="width: 80;"> 
                   <center> Supervisor</center>
                </td>
				<td class="cabeçalho" style="width: 80;"> 
					<center> Hora da Solicitação</center>
				</td>
				<td class="cabeçalho" style="width: 80;"> 
					<center> Status</center>
				</td>
				<td class="cabeçalho" style="width: 80;"> 
                   <center> Validador</center>
                </td>
				<td class="cabeçalho" style="width: 80;"> 
					<center> Hora da Validação</center>
				</td>				
				<td class="cabeçalho" style="width: 80;"> 
					<center> Observação</center>
				</td>
				
			</tr>
			</tbody>
		
		
		
       	<?php 
        
		include 'CONNS/pgConn.php';
			
			IF ($perfil=='ADMRET'){
				$query2 = "SELECT num_chamado, right(contrato,20) as contrato, ocorrencia,left(solicitante,15) as solicitante, super, to_char(datahora_solicitacao, 'yyyy-mm-dd HH24:MI:SS') as Solicitacao, status, left(validador,15) as validador, to_char(dtvalidacao, 'yyyy-mm-dd HH24:MI:SS') as dtvalidacao, obs FROM ocor_ret WHERE super = 'SUPORTES RETENÇÃO' order by super,num_chamado DESC limit 500"; 
				
				$query = "SELECT num_chamado, right(contrato,20) as contrato, ocorrencia,left(solicitante,15) as solicitante, super, to_char(datahora_solicitacao, 'yyyy-mm-dd HH24:MI:SS') as Solicitacao, status, left(validador,15) as validador, to_char(dtvalidacao, 'yyyy-mm-dd HH24:MI:SS') as dtvalidacao, obs FROM ocor_ret WHERE super = '" . $username . "' order by super,num_chamado DESC limit 500"; 
				$result2 = pg_query($query2); 
			} else {
				$query = "SELECT num_chamado, right(contrato,20) as contrato, ocorrencia,left(solicitante,15) as solicitante, super,to_char(datahora_solicitacao, 'yyyy-mm-dd HH24:MI:SS') as Solicitacao, status, left(validador,15) as validador, to_char(dtvalidacao, 'yyyy-mm-dd HH24:MI:SS') as dtvalidacao, obs FROM ocor_ret WHERE solicitante = '" . $username . "' order by num_chamado DESC limit 500"; 
			}
        $result = pg_query($query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 

        while($myrow = pg_fetch_assoc($result)) { 
            printf ("<tr style='font-size:12px' align='center'><td align='center'>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td class='tooltip'><span>Observação</span><span class='tooltiptext'>%s</span></td></tr>", $myrow['num_chamado'],htmlspecialchars($myrow['contrato']),htmlspecialchars($myrow['ocorrencia']), htmlspecialchars($myrow['solicitante']), htmlspecialchars($myrow['super']), htmlspecialchars($myrow['solicitacao']),htmlspecialchars($myrow['status']), htmlspecialchars($myrow['validador']), htmlspecialchars($myrow['dtvalidacao']), htmlspecialchars($myrow['obs'])); 
        } 
		IF ($perfil=='ADMRET'){
			while($myrow = pg_fetch_assoc($result2)) { 
            printf ("<tr style='font-size:12px' align='center'><td align='center'>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td class='tooltip'><span>Observação</span><span class='tooltiptext'>%s</span></td></tr>", $myrow['num_chamado'],htmlspecialchars($myrow['contrato']),htmlspecialchars($myrow['ocorrencia']), htmlspecialchars($myrow['solicitante']), htmlspecialchars($myrow['super']), htmlspecialchars($myrow['solicitacao']),htmlspecialchars($myrow['status']), htmlspecialchars($myrow['validador']), htmlspecialchars($myrow['dtvalidacao']), htmlspecialchars($myrow['obs'])); 
			}
		} 
        ?> 
       </table>      
	
<!-- CONSULTAFIM -->

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>















































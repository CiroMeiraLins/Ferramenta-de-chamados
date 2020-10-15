<!DOCTYPE html>
<html>

<title>Retenção</title>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
<link rel='stylesheet' href='w3.css'>
<link rel='stylesheet' href='estilo.css'>
<link rel='stylesheet' href='w3-theme-black.css'>

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}


.page-background{position:fixed;top:0;left:0;width:100%;height:100%;overflow:hidden;display:block;z-index:-1;background-image:url('../img/BackgroundLogin.jpg');opacity:.8}
header{
    
    color: white;
    background-color: black;
    clear: left;
    text-align: right;
}
.login-button{background-color:#00897B;border:0;border-top:.5px solid #00897B;border-bottom:.5px solid #00897B;padding:8px 5px;font-size:20px;color:#fff;width:290px;text-transform:uppercase;margin:20px auto 0 auto;cursor:pointer;opacity:1;filter:alpha(opacity=100)}
.login-form input.required{background-color:#fee;border:1px solid red;z-index:1}
.formlogin{position:relative;width:290px;margin:auto;display:block;padding:12px 5px;border:1px solid #ccc;font-size:16px;color:#000;opacity:.7;filter:inherit;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;z-index:0}
.formlogin2{position:relative;width:290px;margin:auto;display:block;padding:12px 5px;border:1px solid #ccc;font-size:16px;color:#000;opacity:.7;filter:inherit;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;z-index:0;margin-top:-1px}
input {
    display: block;
    box-sizing: border-box;
}
.xxx{display:inline-block;vertical-align:middle;margin:0 auto}
.content {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

</style>
<body background="img/csu.png">
	<form action="CONNS/checklogin.php" method="post"> 
		<center>  
			<div class="content">
				
				
				<div class="alert">
					<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
					<strong>Senha Errada!</strong>
				</div>
				
				<input type="text" placeholder="Login de Rede (CS)" name="login_rede" class="formlogin" required>
				<input type="password" placeholder="Digite sua senha" name="senha" class="formlogin2" required>
				
				<button type="submit" class="login-button">Login</button><br><br>
			</div>
		</center>
	</form>
</body> 
</html> 


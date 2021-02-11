<?php
session_start();

include('inc/conecta.php');

	if(isset($_POST['email'], $_POST['senha'])){
		
		$email = $_POST['email'];
		// Criptografa a senha digitada pelo usuario
		$senha = hash('sha256', $_POST['senha']);

		// busca no banco um registro de usuario com email e senha iguais ao digitado
		$busca = "SELECT * FROM usuario WHERE ds_email = '".$email."' and ds_senha = '".$senha."'";

		if($result = $mysqli->query($busca)){
			while($obj = $result->fetch_object()){
				// se funcionar armazena dados na sessao e redireciona para a tela inicial
				$_SESSION['login'] = $obj->cd_usuario;
				$_SESSION['nome'] = $obj->nm_usuario;
				header('location: index.php');
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="container">
			<form method="post">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<label>Email:</label><br>
				<input type="email" class="form-control" name="email" id="inpttext">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<label>Senha:</label><br>
				<input type="password" class="form-control" name="senha" id="inpttext">
			</div>
		</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<input type="submit" name="" class="btn btn-primary" id="logar">
				</div>
			</div>
		</div>
			</form>
	</div>

</body>
</html>

<style type="text/css">

	#inpttext{
		border-radius: 0%;
	}

	#logar{
		margin-top: 15px;
		border-radius: 0%;
		width: 100%;
	}

</style>
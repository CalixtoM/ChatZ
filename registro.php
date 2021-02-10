<?php
include('inc/conecta.php');

if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])){
	
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	
	// Criptografa a senha digitada pelo usuario
	$senha = hash('sha256', $_POST['senha']);

	// Define o caminho do arquivo inserido de acordo com seu nome
	$caminho = 'img/'. $_FILES['foto']['name'];
	move_uploaded_file($_FILES['foto']['tmp_name'], $caminho);

	$cadastrar = "INSERT INTO usuario VALUES(NULL, '".$nome."', '".$email."', '".$senha."', '".$caminho."', '0')";

	if($mysqli->query($cadastrar)){
		// Caso o insert funcione direciona para a tela de Login
		echo '<script>window.location.href="login.php"</script>';
	}
	else{
		// Caso não funcione exibe o erro no mysqli
		echo $mysqli->error;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro - ChatZ</title>
</head>
<body>

	<div class="container">
			<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-6">
				<label>Insira Seu Nome:</label>
				<input type="text" name="nome" class="form-control">
			</div>
			<div class="col-sm-6">
				<label>Insira Seu Email:</label>
				<input class="form-control" type="email" name="email">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<label>Insira Sua Senha:</label>
				<input type="password" class="form-control" name="senha">
			</div>
			<div class="col-sm-6">
				<label>Insira Uma Imagem de Perfil:</label>
				<input type="file" name="foto" >
			</div>
		</div><center>
		<div class="row">
			<div class="col-sm-12" id="termos">
				<input type="checkbox" name="termos">
				<label>Li e Concordo Com Os <a href="termos.php">Termos de Uso</a></label>
			</div>
		</div></center>
		<div class="row">
			<div class="col-sm-12">
				<center><input type="submit" name="" value="cadastrar" class="btn btn-primary"></center>
			</div>
		</div>
			</form>
	</div>

</body>
</html>

<style type="text/css">
	#termos{
		margin-top: 10px;
	}
	.container{
		margin-top: 10%;
	}
</style>
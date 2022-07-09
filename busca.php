<?php
session_start();

include('inc/conecta.php');

// Restrição de acesso para apenas usuarios logados 

if(!isset($_SESSION['login'])){

	echo '<script>window.location.href="login.php"</script>';

}

else{

	include('inc/navbar.php');

	if(isset($_POST['pesq'])){
		$pesq = $_POST['pesq'];

		$buscar = "SELECT * FROM Usuario WHERE nm_usuario LIKE '%".$pesq."%'";

		if($result = $mysqli->query($buscar)){
			while ($obj = $result->fetch_object()) {
				$nome = $obj->nm_usuario;
				$foto = $obj->ds_foto;
				$codigo = $obj->cd_usuario;
				echo '';
			}
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
		<div class="row">
			<?php

			if($result = $mysqli->query($buscar)){
				while ($obj = $result->fetch_object()) {
					$nome = $obj->nm_usuario;
					$foto = $obj->ds_foto;
					$codigo = $obj->cd_usuario;

					echo '
						<div class="col-sm-4">
							<div class="card">
								<div class="card-body">
									<img class="card-img-top" id="ftp" src="'.$obj->ds_foto.'">
									<h3 class="card-title">'.$obj->nm_usuario.'</h3>
									<a href="chat.php?destino='.$codigo.'">Conversar</a>
									<a href="add.php?contato2='.$codigo.'">Adicionar</a>
								</div>
							</div>
						</div>
					';
				}
			}

			

			?>
		</div>
	</div>

</body>
</html>

<style type="text/css">
	.container{
		margin-top: 15px;
	}

	.card{
		border-radius: 0%;
	}

	#ftp{
		border-radius: 10%;

	}
</style>
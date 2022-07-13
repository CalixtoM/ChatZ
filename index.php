<?php
session_start();

include('inc/functions.php');
include('inc/conecta.php');

// Restrição de acesso para apenas usuarios logados 
if(!isset($_SESSION['login'])){

	echo '<script>window.location.href="login.php"</script>';

}


include('inc/navbar.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Seus Contatos: </h1>
			</div>
		</div>
		<div class="row">
			<?php 

				$selectContatos = "SELECT * FROM contatos AS c INNER JOIN usuario AS u ON c.id_contato1 = u.cd_usuario INNER JOIN usuario as us ON c.id_contato2 = us.cd_usuario WHERE id_contato1 = '".$_SESSION['login']."' OR id_contato2 = '".$_SESSION['login']."'";

				if($result = $mysqli->query($selectContatos)){
					while ($obj = $result->fetch_object()) {
						$nome = $obj->nm_usuario;
						$foto = $obj->ds_foto;
						$codigo = $obj->cd_usuario;


						if($obj->cd_usuario != $_SESSION['login']){

							$selMsg = "SELECT * FROM mensagens WHERE id_destinatario = '".$_SESSION['login']."' AND id_remetente = '".$codigo."' OR id_remetente = '".$_SESSION['login']."' AND id_destinatario = '".$codigo."' ORDER BY cd_mensagem DESC LIMIT 1";

							if($resulta = $mysqli->query($selMsg)){
								while ($obji = $resulta->fetch_object()) {
									$ultMsg = $obji->ds_mensagem; 
								}
							}							

							echo '<div class="col-sm-4">
								<div class="card">
									<div class="card-body">
										<img class="card-img-top" style="max-width: 120px;" id="ftp" src="'.$obj->ds_foto.'">
										<h3 class="card-title">'.$obj->nm_usuario.'</h3>
										<p>'.$ultMsg.'</p>
										<a href="chat.php?destino='.$codigo.'">Conversar</a>
									</div>
								</div>
							</div>';
						}
						else{
							$selectContatos2 = "SELECT * FROM contatos AS c INNER JOIN usuario AS u ON c.id_contato2 = u.cd_usuario INNER JOIN usuario as us ON c.id_contato1 = us.cd_usuario WHERE id_contato1 = '".$_SESSION['login']."' OR id_contato2 = '".$_SESSION['login']."'";

							if($result = $mysqli->query($selectContatos2)){
								while ($obj = $result->fetch_object()) {
									$nome = $obj->nm_usuario;
									$foto = $obj->ds_foto;
									$codigo = $obj->cd_usuario;

								

									echo '<div class="col-sm-4">
										<div class="card">
											<div class="card-body">
												<img class="card-img-top" id="ftp" style="max-width: 120px;" src="'.$obj->ds_foto.'">
												<h3 class="card-title">'.$obj->nm_usuario.'</h3>
												<a href="chat.php?destino='.$codigo.'">Conversar</a>
											</div>
										</div>
									</div>';
								}
							}
						}
						
					}
				}


			?>
		</div>
	</div>

</body>
</html>

<style type="text/css">

</style>
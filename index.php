<?php
session_start();

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
			<div class="col"></div>
		</div>
	</div>

</body>
</html>

<style type="text/css">
	#btnsair{
		color: darkred;
	}

	#btnsair:hover{
		color: red;
	}

	#inptpesq{

	}

	#btnpesq{
		margin-left: 5px;
	}
</style>
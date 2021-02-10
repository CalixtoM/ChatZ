<?php
session_start();

include('inc/conecta.php');

// Restrição de acesso para apenas usuarios logados 

if(!isset($_SESSION['login'])){

	echo '<script>window.location.href="login.php"</script>';

}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



</body>
</html>
<?php 

session_start();

include('inc/conecta.php');

if(isset($_GET['contato2'])){
    $sql = "INSERT INTO contatos VALUES(NULL, '".$_SESSION['login']."', '".$_GET['contato2']."')";

    if($mysqli->query($sql)){
        
        echo '<script>window.location.href="index.php"</script>';
    }
    else{
        // Caso não funcione exibe o erro no mysqli
        echo $mysqli->error;
    }
}
?>
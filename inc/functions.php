<?php

    include('inc/conecta.php');

// Funções arquivo Login.php

    // Função responsavel por verificar a existencia de usuarios com os determinados email e senha, validando caso real 
    realizaLogin($mysqli){
        
        $senha = hash('sha256', $_POST['pw']);

	    $sql = "SELECT * FROM Usuario WHERE ds_email = '".$_POST['em']."' AND ds_senha = '".$senha."'";

	    if($query = $mysqli->query($sql)){
		    $obj = $query->fetch_object();
		    
            if ($query->num_rows>0) {
			    $_SESSION['login'] = $obj->nm_usuario;
			    header('location: index.php');
		    }
	    }
	    else{
		    echo "falha";
	    }
    }

?>
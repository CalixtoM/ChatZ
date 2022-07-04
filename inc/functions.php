<?php

    include('inc/conecta.php');

// Funções gerais

    //Função responsavel por verificar a sessão.
    //verificarLogin($mysqli){
        
    //}

// Funções arquivo registro.php

    //Função responsavel por cadastrar o usuario.
    function cadastrarUsuario($mysqli){

        $nome = $_POST['nomereg'];
	    $email = $_POST['emailreg'];
	
	    // Criptografa a senha digitada pelo usuario
	    $senha = hash('sha256', $_POST['senhareg']);

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

// Funções arquivo Login.php

    // Função responsavel por verificar a existencia de usuarios com os determinados email e senha, validando caso real 
    function realizarLogin($mysqli){
        
        $senha = hash('sha256', $_POST['pw']);

	    $sql = "SELECT * FROM Usuario WHERE ds_email = '".$_POST['em']."' AND ds_senha = '".$senha."'";

	    if($query = $mysqli->query($sql)){
		    $obj = $query->fetch_object();
		    
            if ($query->num_rows>0) {
			    $_SESSION['login'] = $obj->cd_usuario;
			    header('location: index.php');
		    }
	    }
	    else{
		    echo "falha";
	    }
    }

?>
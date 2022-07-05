<?php 
session_start();
include('inc/conecta.php');

$remetente = $_SESSION['login'];

if(isset($_GET['destino'])){
    $_SESSION['destino'] = $_GET['destino'];
}

$destino = $_SESSION['destino'];
date_default_timezone_set('America/Sao_Paulo');
$horario = date('Y/m/d H:i');

include('inc/navbar.php');
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/chat.css">
        <title></title>
        <script type="text/javascript">
            function ajax(){
                var req = new XMLHttpRequest();
                req.onreadystatechange = function(){
                    if(req.readyState == 4 && req.status == 200) {
                        document.getElementById('chat').innerHTML = req.responseText;
                    }
                }
                req.open('GET', 'chat1.php', true);
                req.send();
            }

            setInterval(function(){ajax();}, 1000);

        </script>
    </head>
    <body>
        <div class="container" id="chat1" style="padding-top: 15px;">
            <div class="row">
                <div class="col-12">
                    <div id='chat'>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="container" id="input-mensagem">
            <div class="row">
                <div class="col-10">
                    <form method="post" action="chat.php">
                        <input type="text" name="mensagem" id="msg" class="form-control" placeholder="Digite Aqui...">
                        
                </div>
                <div class="col-2">
                        <input type="submit" class="btn btn-success" id="botao" value="Enviar" > 
                    </form>
                </div>
            </div>
        </div>
        
        <?php 

            if(isset($_POST['mensagem'])){
                $mensagem = $_POST['mensagem'];

                $insere_mensagem = "INSERT INTO Mensagens SET ds_mensagem = '".$mensagem."', id_remetente = '".$remetente."', id_destinatario = '".$destino."', dt_envio = '".$horario."', st_visualizada = 0";

                $query = "SELECT * FROM Mensagens";

			    if ($query = $mysqli->query($insere_mensagem)){
		 		    //header("location: login.php");
		 		    //echo "<script>location.href='login.php';</script>";
		 	    }
            }
        ?>
    </body>
</html>

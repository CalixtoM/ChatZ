<?php 
session_start();
include('inc/conecta.php');

$select = "SELECT * FROM mensagens AS m INNER JOIN usuario AS  u ON m.id_remetente = u.cd_usuario WHERE id_remetente = '".$_SESSION['login']."' AND id_destinatario = '".$_SESSION['destino']."' OR id_remetente = '".$_SESSION['destino']."' AND id_destinatario = '".$_SESSION['login']."'";

if($result = $mysqli->query($select)){
    while($obj = $result->fetch_object()){

        $data = $obj->dt_envio;
        if($obj->id_remetente == $_SESSION['login']){
            echo '<div class="row" style="background-color: lightblue; padding-left: 10%;">';
            //echo '<h3>'.$obj->nm_usuario.'</h3>';
                echo '<p>'.$obj->ds_mensagem.'<p/>';
            echo '</div>';
            echo '<div class="row">';
                echo '<p>'.$data.'</p>';
            echo '</div>';

        }else{
            echo '<div class="row" style="background-color: silver; padding-left: 10%;">';
            //echo '<h3>'.$obj->nm_usuario.'</h3>';
                echo '<p>'.$obj->ds_mensagem.'<p/>';
            echo '</div>';
            echo '<div class="row">';
                echo '<p>'.$data.'</p>';
            echo '</div>';
        }
        
    }
}

?>
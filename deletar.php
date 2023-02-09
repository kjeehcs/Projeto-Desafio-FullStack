<?php
include('assets/db/conexao.php');

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM dados_usuarios WHERE id='$id'";
    $mysqli->query($sql);

}

header("location: listUsers.php");
exit;

?>

<?php
    session_start();
    require_once("../../../connect/connect.php");

    $status = $_POST['status'];

    $sql = "UPDATE `users` SET `status` = ? WHERE `id_user` = ?";
    $rez = $pdo -> prepare($sql);
    $rez -> execute(array("$status", "$_SESSION[idUser]"));

    echo $status;
?>
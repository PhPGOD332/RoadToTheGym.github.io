<?php
    session_start();
    require_once("../../../connect/connect.php");

    $name = $_POST['name'];

    $sql = "UPDATE `users` SET `name` = ? WHERE `id_user` = ?";
    $rez = $pdo -> prepare($sql);
    $rez -> execute(array("$name", "$_SESSION[idUser]"));

    echo $name;
?>
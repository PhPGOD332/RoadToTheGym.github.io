<?php
    session_start();
    require_once('../../connect/connect.php');

    $timeZone = date_default_timezone_get();
    date_default_timezone_set("Asia/Yekaterinburg");
    $idNews = $_GET['idNews'];
    $textComment = $_GET['textComment'];
    $dateComment = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `comments` SET `id_user` = ?, `id_news` = ?, `text` = ?, `date_comment` = ?";
    $rez = $pdo -> prepare($sql);
    $rez -> execute(array("$_SESSION[idUser]", "$idNews", "$textComment", "$dateComment"));

    $sql = "UPDATE `news` SET `count_comments` = `count_comments` + 1 WHERE `id_news` = ?";
    $rez = $pdo -> prepare($sql);
    $rez -> execute(array("$idNews"));

    $sql = "SELECT * FROM `news` WHERE `id_news` = ?";
    $rez = $pdo -> prepare($sql);
    $rez -> execute(array("$idNews"));
    $line = $rez -> fetch();
    echo $line['count_comments'];
?>
<?php
    session_start();
    require_once("../connect/connect.php");

    // $_SESSION['autorised'] = false;

    if($_SESSION['autorised'] == true) {
        $sql = "SELECT * FROM `users` WHERE `id_user` = ?";
        $rez = $pdo -> prepare($sql);
        $rez -> execute(array("$_SESSION[idUser]"));
        $line = $rez -> fetch();

?>
        <div class="img-block">
            <img src="<?=$line['img']?>" alt="">
        </div>
        <div class="text-block">
            <span class="login"><?=$_SESSION['login']?></span>
            <form action="./php/connect/exit.php">
                <button type="submit" name="exit" class="exit-btn">Выход</button>
            </form>
        </div>
<?
    } else if($_SESSION['autorised'] == false) {
?>
        <a href="./php/reg/autorisation/index.html" class="autoriz-btn">Авторизация</a>        
<?
    }
?>
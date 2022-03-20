<?php
    session_start();
    require_once("../../connect/connect.php");  

    $login = $_POST['login'];
    $pass = md5($_POST['pass']);
    $count = 0;

    $sql = "SELECT * FROM `users`";
    $rez = $pdo -> query($sql);
    $line = $rez -> fetchAll();
    foreach($line as $n) {
        if($login == $n['login'] and $pass == $n['password']) {
            $_SESSION['autorised'] = true;
            $_SESSION['login'] = $n['login'];
            $_SESSION['idUser'] = $n['id_user'];
            echo "<script>location.href='../../../index.html'</script>";
            exit;
        } else {
            $_SESSION['autorised'] = false;
            $count += 1;
            continue;
        }
    }

    if($count > 0) {
        echo 'Вы неверно ввели логин или пароль!';
    }   
?>
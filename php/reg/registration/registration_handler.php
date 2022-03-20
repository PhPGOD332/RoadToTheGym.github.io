<?php
    session_start();
    require_once("../../connect/connect.php");

    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $passRepeat = $_POST['passRepeat'];
    $count = 0;
    $sql = "SELECT * FROM `users`";
    $rez = $pdo -> query($sql);
    $line = $rez -> fetchAll();
    $date = date("Y-m-d");

    foreach($line as $n) {
        if($login == $n['login']) {
            $count += 1;
        } else {
            continue;
        }
    }

    if($count > 0) {
        echo 'Такой логин уже существует!';
    } else {
        if($pass == $passRepeat) {
            $sql = 'INSERT INTO `users` SET `login` = ?, `password` = ?, `img` = "/img/users/anon.jpg", `name` = "-", `status` = "-", `country` = "-", `city` = "-", `gender` = "-", `date_registration` = ?, `role` = "User"';
            $rez = $pdo -> prepare($sql);
            $rez -> execute(array("$login", "$pass", "$date"));

            $sql = 'SELECT * FROM `users` WHERE `login` = ?';
            $rez = $pdo -> prepare($sql);
            $rez -> execute(array("$login"));
            $line2 = $rez -> fetchAll();

            foreach($line2 as $n) {
                $_SESSION['autorised'] = true;
                $_SESSION['login'] = $n['login'];
                $_SESSION['idUser'] = $n['id_user'];
            }  
            
            echo '<script>location.href="../../../index.html"</script>';
        } else {
            echo 'Пароли не совпадают!';
        }
    }
?>
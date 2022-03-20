<?php
    session_start();
    require_once('../../connect/connect.php');

    $sql = "SELECT * FROM `users` WHERE `id_user` = ?";
    $rez = $pdo -> prepare($sql);
    $rez -> execute(array("$_SESSION[idUser]"));
    $line = $rez -> fetch();

?>
    <div class="row-block">
        <div class="title-row-block">
            <span class="title-row">Зарегестрирован: </span>
        </div>
        <div class="value-row-block">
            <span id="registrated" class="value-row"><?=date("d.m.Y", strtotime($line['date_registration']))?></span>
        </div>
    </div>
    <div class="row-block">
        <div class="title-row-block">
            <span class="title-row">Логин: </span>
        </div>
        <div class="value-row-block">
            <span id="registrated" class="value-row"><?=$line['login']?></span>
        </div>
    </div>
    <div class="row-block">
        <div class="title-row-block">
            <span class="title-row">Страна: </span>
        </div>
        <div class="value-row-block">
            <div class="text-block">
                <input maxlength="20" id="country" class="value-row" value="">
            </div>
            <div class="edit-block">
                <button class="edit-btn"><i class="fa fa-solid fa-pencil"></i></button>
            </div>
        </div>
    </div>
    <div class="row-block">
        <div class="title-row-block">
            <span class="title-row">Город: </span>
        </div>
        <div class="value-row-block">
            <span id="city" class="value-row">fds</span>
        </div>
    </div>
    <div class="row-block">
        <div class="title-row-block">
            <span class="title-row">Пол: </span>
        </div>
        <div class="value-row-block">
            <span id="city" class="value-row">fds</span>
        </div>
    </div>
    <div class="row-block">
        <div class="title-row-block">
            <span class="title-row">Возраст: </span>
        </div>
        <div class="value-row-block">
            <span id="city" class="value-row">fds</span>
        </div>
    </div>
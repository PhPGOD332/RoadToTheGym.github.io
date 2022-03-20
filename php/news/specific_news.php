<?php
    session_start();
    require_once('../connect/connect.php');

    $idNews = $_GET['idNews'];
    
    $sql = "SELECT * FROM `news` WHERE `id_news` = ?";
    $rez = $pdo -> prepare($sql);
    $rez -> execute(array("$idNews"));
    $line = $rez -> fetch();
?> 
    <div class="path-block">
        <span class="path-block__path">
            <a href="/index.html" class="main-page">Главная</a>
            <span>&gt;</span>
            <a href="/news.html" class="main-page">Новости</a>
            <span>&gt;</span>
            <span><?=$line['title']?></span>
        </span>
    </div>
    <div class="title-block">
        <span class="title"><?=$line['title']?></span>
    </div>
    <div class="date-block">
        <div class="date-block__btns">
            <a href="/news.html" class="news-btn news-link">Назад к новостям</a>
            <button class="news-btn comments" id="comments-btn">Комментарии</button>
        </div>
        <div class="date-block__text">
            <span class="date-span">Дата публикации: <span class="date"><?=date('d.M.Y', strtotime($line['date']))?></span></span>
        </div>
        
    </div>
    <div class="img-news-block">
        <img src="<?=$line['img']?>" alt="">
    </div>
    <div class="news-text-block">
        <p class="news-text"><?=$line['text']?></p>
    </div>
    <div id="comments" class="comments-block">
        <div class="comments-count-block">
            <span class="comments-count">Комментарии: <span class="count" id="count_comments"><?=$line['count_comments']?></span></span>
        </div>
        <div class="comment-user-block">
            <label class="comment-label">
                Комментарий (не более 300 символов):
                <textarea name="" id="comment-text" cols="30" rows="10" class="comment-text"></textarea>
                <span class="error comment-error"></span>
            </label>
            <button id="comment-submit" class="comment-submit">Отправить</button>
        </div>
        <div id="comments-all-block" class="comments-all-block">
            
        </div>
    </div>

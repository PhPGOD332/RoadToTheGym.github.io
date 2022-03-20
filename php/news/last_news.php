<?php
    session_start();
    require_once("../connect/connect.php");

    $sql = "SELECT * FROM `news` ORDER BY `id_news` DESC LIMIT 2";
    $rez = $pdo -> query($sql);
    $line = $rez -> fetchAll();

    foreach($line as $n) {
?>
        <div class="news-card">
            <div class="top-block">
                <div class="news-title">
                    <h1 class=""><?=$n['title']?>
                    </h1>
                </div>
                <div class="news-text">
                    <p class="text"><?=mb_substr($n['text'], 0, 285, 'UTF-8').'...'?></p>
                </div>
            </div>
            <div class="bottom-block">
                <div class="date-block">
                    <span class="date-span">Дата публикации: <span class="date"><?=date('d.m.Y', strtotime($n['date']))?></span></span>
                </div>
                <div class="btn-block">
                    <a href="../../specific_news.html?id_news=<?=$n['id_news']?>" class="detailed-btn">Подробнее</a>
                </div>
            </div>
        </div>
<?
    }
?>
<?php
    session_start();
    require_once('../../connect/connect.php');

    $idNews = $_GET['idNews'];

    $sql = "SELECT `users`.`img`, `users`.`login`, `comments`.`date_comment`, `comments`.`text` FROM `comments` INNER JOIN `users` ON `users`.`id_user` = `comments`.`id_user` WHERE `id_news` = ? ORDER BY `id_comment` DESC";
    $rez = $pdo -> prepare($sql);
    $rez -> execute(array("$idNews"));
    $line = $rez -> fetchAll();

    foreach($line as $n) {
?>
    <div class="users-comment">
        <div class="img-block">
            <img src="<?=$n['img']?>" alt="">
        </div>
        <div class="comment-content">
            <div class="user-block">
                <div class="name-block">
                    <span class="name__span" style="
                    <?php
                        if($n['login'] == $_SESSION['login']) {
                            echo "color: #BF0404;";
                        }    
                    ?>
                    "><?=$n['login']?></span>
                </div>
                <div class="date-comment-block">
                    <span class="date__span"><?=date('d.m.Y H:i', strtotime($n['date_comment']))?></span>
                </div>
            </div>
            <div class="comment">
                <span class="comment__span"><?=$n['text']?></span>
            </div>
        </div>
    </div>
<?php
    }
?>
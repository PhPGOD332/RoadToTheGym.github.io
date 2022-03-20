<?php
    session_start();
    require_once("../connect/connect.php");

    $sql = "SELECT * FROM `news` LIMIT 5,50";
    $rez = $pdo -> query($sql);
    $line = $rez -> fetchAll();

    foreach($line as $n) {
?>
        <a href="./specific_news.html?id_news=<?=$n['id_news']?>"  class="news
        <?php
            if($n['rate'] == 1) {
                echo "news1" + " " + "news3" + " " + "news4" + " " + "news5";
            } else if($n['rate'] == 2) {
                echo "news2rate";
            } else {
                echo "news3rate";
            }
        ?>
        " style="background: url('<?=$n['img']?>') no-repeat center center; background-size: cover;">
            <input type="hidden" class="id_news">
            <div class="title-block">
                <?=mb_substr($n['title'], 0, 25, 'UTF-8');?>
            </div>
            <div class="addit-block">
                <div class="date-block">
                    <span class="date"><?=date('d.m.Y', strtotime($n['date']));?></span>
                </div>
                <div class="comments-count-block">
                    <span class="comments-count"><?=$n['count_comments']?></span>
                    <i class="fa fa-solid fa-comment"></i>
                </div>
            </div>
        </a>
<?php
    }
?>


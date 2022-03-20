<?php
    session_start();
    require_once("../../connect/connect.php");

    $sql = "SELECT * FROM `users` WHERE `id_user` = ?";
    $rez = $pdo -> prepare($sql);
    $rez -> execute(array("$_SESSION[idUser]"));
    $line = $rez -> fetch();
?>

<div class="title-user-block">
    <span class="title-user">Пользователь</span>
</div>
<div class="img-block">
    <img src="<?=$line['img']?>" alt="">
    <button class="edit-btn" id="img-btn">
        <i class="fa fa-solid fa-pencil"></i>
    </button>
</div>
<div class="img-load-block">
    <input type="file" accept=".jpg, .jpeg, .png, .gif" id="img-load" class="img-load">
    <button class="load-submit" id="load-submit">Загрузить</button>
</div>
<div class="name-block">
    <textarea resize="none" maxlength="25" rows="1" id="name" class="name" disabled><?=$line['name']?></textarea>
    <button class="edit-btn" id="name-btn">
        <i class="fa fa-solid fa-pencil"></i>
    </button>
</div>
<div class="status-block">
    <textarea id="status" maxlength="50" rows="3" maxrows="3" class="status" disabled><?=$line['status']?></textarea>
    <button class="edit-btn" id="status-btn">
        <i class="fa fa-solid fa-pencil"></i>
    </button>
</div>
<div class="links-block">
    <a href="#"><i class="fa fa-brands fa-vk icon"></i></a>
    <a href="#"><i class="fa fa-brands fa-twitter icon"></i></a>
</div>
<script>
    $(document).ready(function() {
        // Изменение аватарки
        $("#img-btn").click(function() {
            $("#bodyProfile .profile-block .avatar-block #img-btn").css("color", "#740000");
            $(".img-load-block").slideDown(1000, function() {

            });
        });

        // Изменение имени
        $("#name-btn").click(function() {
            $("#name").prop("disabled", false);
            $("#name").css("outline", "1px solid #000");
            $("#bodyProfile .profile-block .avatar-block #name-btn").css("color", "#740000");
            $("#name").focus();
        });

        $("#name").blur(function() {
            let name = $("#name").val();
            $.ajax({
                url: "./php/user/profile/handlers/name_edit.php",
                cache: false,
                method: "POST",
                data: {name : name}
            })
            .done(function(rez) {
                $("#name").html(rez);
                // location.reload();
            })

            $("#bodyProfile .profile-block .avatar-block #name-btn").css("color", "#000");
            $("#name").css("outline", "none");
            $("#name").prop("disabled", true);
        });

        // Измениние статуса
        $("#status-btn").click(function() {
            $("#status").prop("disabled", false);
            $("#status").css("outline", "1px solid #000");
            $("#bodyProfile .profile-block .avatar-block #status-btn").css("color", "#740000");
            $("#status").focus();
        });

        $("#status").blur(function() {
            let status = $("#status").val();
            $.ajax({
                url: "./php/user/profile/handlers/status_edit.php",
                cache: false,
                method: "POST",
                data: {status : status}
            })
            .done(function(rez) {
                $("#status").html(rez);
                // location.reload();
            })

            $("#bodyProfile .profile-block .avatar-block #status-btn").css("color", "#000");
            $("#status").css("outline", "none");
            $("#status").prop("disabled", true);
        });
    });
</script>
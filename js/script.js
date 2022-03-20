$(document).ready(function() {

	//Вывод блока "Новости"
	$.ajax({
		url: "/php/news/last_news.php",
		cache: false,
		method: "POST"
	})
	.done(function(rez) {
		$("#lastNews").html(rez);
	})

	//Вывод пользователя
	$.ajax({
		url: "/php/user/user.php",
		cache: false,
		method: "POST"
	})
	.done(function(rez) {
		$("#user-info").html(rez);
	})
});
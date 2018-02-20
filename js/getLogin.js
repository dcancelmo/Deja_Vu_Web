$(document).ready(function () {
	$.ajax({
		type: "GET",
		url: "/cgi-bin/cookie_checker.py",
		data: { param: " "},
		dataType: 'text',
		success: function (response) {
			$('#response').html(response);
		},
		error: function (jqXHR, textStatus, error) {
			location.href = "login.php";
		}
	});
});
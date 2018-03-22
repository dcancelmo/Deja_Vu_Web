$(document).ready(function () {
	$.ajax({
		type: "GET",
		url: "/cgi-bin/query.py",
		data: { param: " "},
		dataType: 'text',
		success: function (response) {
			$('#response').html(response);
		},
		error: function (jqXHR, textStatus, error) {
			$('#response').text("Sorry, an error has occurred.");
		}
	});
});
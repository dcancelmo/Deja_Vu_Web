var name = sessionStorage.getItem('user');
if (name != null) {
	window.location = "dashboard.php";
}
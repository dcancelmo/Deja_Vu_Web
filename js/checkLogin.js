var user = sessionStorage.getItem('user');
console.log(user);
if (user  == null) {
	window.location = "login.php";
}
function login() {
	var loginUser_e = document.getElementById("loginUser");
	var loginUserval = loginUser_e.value;
	var loginPass_e = document.getElementById("loginPass");
	var loginPassval = loginPass_e.value;

	const xhttp_login = new XMLHttpRequest();
	xhttp_login.open(
		"POST",
		"login.php",
		false
	);
	xhttp_login.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp_login.send("user=" + loginUserval + "&pass=" + loginPassval);
	_isAccount = xhttp_login.responseText;

	const xhttp_seshmanager_loggedin_set = new XMLHttpRequest();
	if (_isAccount === "true") {
		const xhttp_seshmanager_cookie_set = new XMLHttpRequest();
		xhttp_seshmanager_cookie_set.open(
			"GET",
			"seshmanager.php?op=set&key=cookie&val=" + loginUserval,
			false
		);
		xhttp_seshmanager_cookie_set.send();

		xhttp_seshmanager_loggedin_set.open(
			"GET",
			"seshmanager.php?op=set&key=loggedin&val=true",
			false
		);
		xhttp_seshmanager_loggedin_set.send();

	}
	else {
		xhttp_seshmanager_loggedin_set.open(
			"GET",
			"seshmanager.php?op=set&key=redirect&val=false",
			false
		);
		xhttp_seshmanager_loggedin_set.send();
		if (_isAccount === "false user") {
			alert("No account exists");
		}
		else {
			alert("incorrect password");
		}
	}
}
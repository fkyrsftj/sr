<!DOCTYPE html>
<html>
<head>
	<title>Alien Designed 2FA Login Page</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jsqrcode/0.6.2/jsqrcode-combined.min.js"></script>
</head>
<body>
	<h1>Alien Designed 2FA Login Page</h1>
	<form>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>
		<button type="button" onclick="generateOTP()">Generate OTP</button><br><br>
		<label for="otp">One-Time Password:</label>
		<input type="text" id="otp" name="otp"><br><br>
		<button type="button" onclick="authenticate()">Authenticate</button>
	</form>

	<script>
		function generateOTP() {
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var otp = JSON.parse(this.responseText).otp;
					document.getElementById("otp").value = otp;
				}
			};
			xhr.open("GET", "http://localhost:3000/generate-otp?username=" + encodeURIComponent(document.getElementById("username").value) + "&password=" + encodeURIComponent(document.getElementById("password").value), true);
			xhr.send();
		}

		function authenticate() {
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (this.readyState == 4) {
					if (this.status == 200) {
						alert("Authentication successful!");
					} else if (this.status == 401) {
						alert("Authentication failed!");
					}
				}
			};
			xhr.open("GET", "http://localhost:3000/authenticate?username=" + encodeURIComponent(document.getElementById("username").value) + "&password=" + encodeURIComponent(document.getElementById("password").value) + "&otp=" + encodeURIComponent(document.getElementById("otp").value), true);
			xhr.send();
		}
	</script>
</body>
</html>
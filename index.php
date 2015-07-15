<?php
if(file_exists("DatabaseConnection.php"))
{

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>BabyUrl</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1>BabyUrl</h1>
				<p>A simple link shortener application<br />
				at your service. Brought to you by <a href="http://facebook.com/railani1" target="_blank">Ravi Ailani</a>.</p>
			</header>

		<!-- Signup Form -->
			<form id="signup-form" method="post" action="#">
				<input type="text" name="longLink" id="longLink" placeholder="Original Link" />
				<input type="button" value="Shorten Link" onclick="getShortLink()"/>
			</form>

				<span id="shortLink"></span>

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="http://twitter.com/rvailani" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="http://instagram.com/rv_2095" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="http://github.com/rvbugs0" class="icon fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="mailto:rvbugs0@gmail.com" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; Bugs Studios</li><li>Credits: <a href="https://www.linkedin.com/pub/ravi-ailani/8a/487/aba">Ravi Ailani</a></li>
				</ul>
			</footer>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/linkprocess.js"></script>
	</body>
</html>
<?php

}
else
{
include("InstallationForm.php");
}

?>

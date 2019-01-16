<?php session_start(); ?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
	<title>Anmelden - Möbel anschauen von Kunde zu Kunde</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<meta name="description" content="Kostenlos und einfach Inserate in Ihrer N&auml;he aufgeben. Mit firsdhand erm&ouml;glichen Sie es anderen Kunden von Online-Shops Ihre gekauften Artikel bei Ihnen vorab anzuschauen." >
	<meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
	<meta name="author" content="firsdhand" >
	<meta name="distribution" content="global">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" >

	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div class="top-bar-menu">
		<span class="logo_font_header"><a href="index.htm">firsdhand</a> <span class="beta-letter">(BETA)</span></span>
	</div>
	<main>
		<div class="header-text">
			<h1>
				Anmelden
				<hr>
			</h1>
			<p class="text-heading-below">Neu bei firsdhand? Hier <b><a class="registration-link" href="index.htm">registrieren</b></a></p>
		</div>

		<div class="wrapper-box">
			<form action="" method="post">
				<table>
					<tr>
						<td colspan="2"><input type="email" name="Email" placeholder="E-Mail eingeben" id="email-login"></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="hidden" name="token">
							<input type="password" name="Passwort" autocomplete="off" placeholder="Passwort eingeben" id="password-login"></td>
						</tr>
						<tr>
							<td align="right"><input name="Remember" type="checkbox" id="remember-login"> </td>
							<td align="left"><a class="link" href="#">Angemeldet bleiben</a></td>
						</tr>
						<tr>
							<td colspan="2"><input type="button" value="Anmelden" id="button-login"></td>
						</tr>
					</table>
				</form>
			</div>
		</main>
		<nav class="footer">
			<span><a href="datenschutz.htm">Datenschutz</a></span>
			<span><a href="nutzungsbedingungen.htm">Nutzungsbedingungen</a></span>
			<span><a href="kontakt.htm">Kontakt</a></span>
			<span><a href="hilfe.htm">Hilfe</a></span>
			<span><a href="impressum.htm">Impressum</a></span>
		</nav>
			<!-- https://www.w3schools.com/howto/howto_css_modals.asp -->
			<div id="myModal" class="modal">
				<div class="modal-content">
					<div class="close-outer">
						<span class="close">&times;</span>
					</div>
					<p id="modalMessageText"></p>
				</div>
			</div>
			<!--End https://www.w3schools.com/howto/howto_css_modals.asp -->
		</div>
	</body>
	</html>
<script src="js/libs/eventTargetPolyfill.js"></script>
<script src="js/libs/jquery_3_3_1.js"></script>
<script src="js/firsdhandApp.js"></script>
<script src="js/config.js"></script>
<script src="js/controller.js"></script>
<script src="js/model.js"></script>
<script src="js/view.js"></script>
<script>
Firsdhand.init();
</script>

<?php if(isset($_SESSION['userid'])): ?>

<script>
window.location = "./index.php";
</script>
<?php endif ?>

<?php if(isset($_COOKIE['userid'])): ?>
<script>
window.location = "./index.php";
</script>
<?php endif ?>

<?php if(!isset($_SESSION['userid'])&& !isset($_COOKIE['userid']) ): ?>
<script>
//nothing goin on here
</script>
<?php endif ?>

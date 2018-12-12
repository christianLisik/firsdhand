<?php session_start(); ?>






<!DOCTYPE html>
<html lang=de>
<head>
	<title>Firsdhand - Möbel anschauen von Kunde zu Kunde</title>
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
<body id="content">
	<header>
		<div class="top-bar-menu">
			<span class="logo_font_header"><a href="index.htm">firsdhand</a> <span class="beta-letter">(BETA)</span></span>
			<div class='login-button-header'>
				<a href="anmelden.htm">Anmelden</a>
			</div>
		</div>
		<div class="header-text">
			<p>
				<h1>Werde jetzt erweiterter Kunde</h1>
				<span class="text-heading-below">... und erm&ouml;gliche es anderen deine Möbel bei dir anzuschauen!</span>
			</p>
		</div>
		<div class="registration-box">
			<span class="logo_font_header">firsdhand</span><br />
			<hr>
			<p>
				<span class="register_text">Registriere dich, um deine Artikel zu ver&ouml;ffentlichen</span>
			</p>
			<table>
				<form action="" method="post">
					<tr>
						<td>
						</td>
					</tr>
					<tr>
						<td>
							<div class="field">
								<input type="email" name="Email" placeholder="E-Mail eingeben" autocomplete="off" id="email-register">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="field">
								<input type="password" placeholder="Passwort eingeben" name="Passwort" id="password-register">
								<input type="hidden" name="token" value="">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="field">
								<input type="password" placeholder="Passwort wiederholen" name="Passwort_wiederholen" id="password-register-repeat">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<input type="button" value="registrieren" id="button-register">
						</td>
					</tr>
				</form>
				<tr>
					<td>
						<br />Mit der Registrierung stimme ich den
						<a href="#"><b>Nutzungsbedingungen</b></a> und
						<a href="#"><b>Daterichtlinien</b></a>  zu.</td>
					</tr>
				</table>
			</div>
			<div class="login-box_below">
				Du hast bereits ein Konto? <a href="anmelden.htm">Melde dich an!</a><br />
			</div>
		</header>
		<main>
			<div class="header-text product-of">
				<p class="font40px">Ein Produkt der</p>
				<span class="mm24-font">
					Massivmoebel24 GmbH
				</span>
			</div>
		</main>
		<div class="info-box-firsdhand">
			<div class="info-box-firsdhand-inner">
				<h1>Über FIRSDHAND</h1>
				<hr>
				<p>
					Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext
					Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext
					Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext
					Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext
					Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext
				</p>
				<p>
					Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext
					Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext
					Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext
					Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext
					Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext Beispieltext
				</p>
			</div>
		</div>
		<nav>
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
var myNode = document.getElementById("content");
while (myNode.firstChild) {
    myNode.removeChild(myNode.firstChild);
}
	
            $(function () {
                $.get("user.php", function (data) {
                    $("#content").append(data);
                });
            });
</script>

<?php endif ?>




<?php if(isset($_COOKIE['userid'])): ?>
<script>
<script>
var myNode = document.getElementById("content");
while (myNode.firstChild) {
    myNode.removeChild(myNode.firstChild);
}
	
            $(function () {
                $.get("user.php", function (data) {
                    $("#content").append(data);
                });
            });
</script>
</script>
<?php endif ?>

<?php if(!isset($_SESSION['userid'])&& !isset($_COOKIE['userid']) ): ?>
<script>
	
</script>

<?php endif ?>



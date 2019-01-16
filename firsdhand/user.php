<?php
session_start();
//echo $_SESSION['userid'];
?>

<body>
	<div class="top-bar-menu">
		<span class="logo_font_header"><a href="index.htm">firsdhand</a> <span class="beta-letter">(BETA)</span></span>
		<div class='login-button-header'>
			<a href="../actions/logout.php">logout</a>
		</div>
	</div>
	
	<div class="list_products_user_outer">
		<div id="user-products" class="list_products_user"></div>
		<span class="add-product-text">Produkt hinzufügen</span> <input id="add-user-product" type="button" value=" + "> 	
	</div>
	
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

<div id="first-page" class="shop-list"></div>
<div id="second-page" class="products-list"></div>
<div id="third-page" class="address-list">
	<div style="display:none" class="field">
		<span>Geben Sie die PLZ oder den Ort ein</span>
			<input type="text" name="City" placeholder="z.B. 1204, Berlin" id="product-city">
			<input type="button" value="fertig" id="button-finished">
	</div>
</div>
<script>
	Firsdhand.initServerComponents(<?php echo $_SESSION['userid']; ?>);
</script>
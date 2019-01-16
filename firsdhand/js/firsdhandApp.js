var Firsdhand = Firsdhand || {};

Firsdhand = (function() {

  "use strict";
  var that = {},
  controller, model, view, obj, productId, user;
  
  function init() {
	  initFirsdhandModels(initFirsdhandRegister());
	  initFirsdhandModels(initFirsdhandLogin());
	  }
	  
	  function initServerComponents(userId){
		  user=userId;
		  initFirsdhandLoads(userId);
		  initFirsdhandModels(initFirsdhandAddProducts());
		  initFirsdhandModels(initFirsdhandFinished());
		  }
		  
		  function setProducts(products){
			  obj=products;
			  }
			  
			  function initServerModals(){
				  let clickShopList = document.getElementsByClassName("shop-selection");
				  let clickProductList = document.getElementsByClassName("product-selection");
				  
				  for(let i=0;i<clickShopList.length;i++){
					  initFirsdhandModels(clickShopList[i]);									 
					  }
					  
					  for(let i=0;i<clickProductList.length;i++){
						  initFirsdhandModels(clickProductList[i]);
						  }
						  }
						  
						  function initFirsdhandFinished(){
							  let buttonFinished = document.getElementById("button-finished");
							  buttonFinished.disabled = true;
							  return buttonFinished;
							  }
							  
							  function initFirsdhandRegister(){
								  let buttonRegister = document.querySelector("#button-register");
								  return buttonRegister;
								  }
								  
								  function initFirsdhandLogin(){
									  let buttonLogin = document.querySelector("#button-login");
									  return buttonLogin;
									  }
									  
									  function initFirsdhandAddProducts(){
										  let buttonAddProducts = document.querySelector("#add-user-product");
										  return buttonAddProducts;
										  }
										  
										  //These is for buttons
										  function initFirsdhandModels(initFirsdhandButtons){
											  controller = new Firsdhand.Controller();
											  model = new Firsdhand.Model();
											  view = new Firsdhand.View();
											  
											  if(initFirsdhandButtons !== null){
												  let buttonId = initFirsdhandButtons.getAttribute("id");
												  let buttonClass = initFirsdhandButtons.getAttribute("class");

												  controller.eventClickButton(initFirsdhandButtons);
												  controller.addEventListener("eventCheckInputs", initFirsdhandInputs, false);
												  controller.buttonId=buttonId;
												  controller.buttonClass=buttonClass;
												  }
												  }
												  
												  //These is for loads
												  function initFirsdhandLoads(userId){
													  controller = new Firsdhand.Controller();
													  model = new Firsdhand.Model();
													  view = new Firsdhand.View();
													  
													  model.loadUserProducts(userId);
													  }
													  
													  function checkForUndefined(message){
														  if (typeof(message) != "undefined"){
															  view.modalMessage(message);
															  }
															 }
															 
															 function inputAddress(e){
																 let productCity = document.querySelector("#product-city");
																 let isProductCityCorrect=model.validationProductCity(productCity);
																 
																 if(isProductCityCorrect){
																	 view.enableProductAdd(initFirsdhandFinished());
																	 }
																	}
																	
																	function getHashValue(key) {
																		var matches = location.hash.match(new RegExp(key+'=([^&]*)'));
																		return matches ? matches[1] : null;
																		}
																		
																		function initFirsdhandInputs(e){
																			switch(e.target.buttonId || e.target.buttonClass){
																				case "button-register":
																				let emailRegister = document.querySelector("#email-register"),
																				passwordRegister = document.querySelector("#password-register"),
																				passwordRegisterRepeat = document.querySelector("#password-register-repeat");
																				
																				let registerMessage = model.validationCheckRegister(emailRegister, passwordRegister, passwordRegisterRepeat);
																				checkForUndefined(registerMessage);
																				break;

																				//Check if button was Clicked for the anmdlen.htm site
																				case "button-login":
																				let emailLogin = document.querySelector("#email-login"),
																				passwordLogin = document.querySelector("#password-login"),
																				
																				rememberLogin = document.querySelector("#remember-login");
																				let loginMessage = model.validationCheckLogin(emailLogin, passwordLogin, rememberLogin);
																				checkForUndefined(loginMessage);
																				break;
																				
																				case "button-finished":
																				let objProduct=model.getProduct(productId,obj,user);
																				break;
																				
																				case "add-user-product":
																				document.getElementsByClassName('modal-content')[0].appendChild(
																				document.getElementById('first-page'));
																				
																				model.loadShops();
																				view.modalMessage("In welchem Shop haben Sie Ihr Produkt gekauft?");
																				break;
																				}
																				
																				switch(e.target.buttonClass){
																					case "shop-selection":
																					document.getElementsByClassName('modal-content')[0].appendChild(
																					document.getElementById('second-page'));
																					document.getElementById('first-page').innerHTML="";
																					
																					model.loadProducts(e.target.buttonId);
																					view.modalMessage("Welchen Artikel haben Sie erworben?");
																					break;
																					
																					case "product-selection":
																					document.getElementsByClassName('modal-content')[0].appendChild(
																					document.getElementById('third-page'));
																					
																					let field = document.getElementsByClassName('field')[0];
																					field.style.display="block";
																					document.getElementById('second-page').innerHTML="";
																					document.getElementById('first-page').innerHTML="";
																					
																					view.modalMessage("Wo kann man sich Ihren Artikel anschauen?");
																					let productCity = document.querySelector("#product-city");
																					
																					controller.eventInputField(productCity);
																					controller.addEventListener("eventCheckInputs2", inputAddress, false);
																					productId=e.target.buttonId;
																					break;
																					default:;
																					}
																				}
																				
																				that.setProducts=setProducts;
																				that.initServerModals = initServerModals;
																				that.initServerComponents = initServerComponents;
																				that.init = init;
																				return that;
																				}());
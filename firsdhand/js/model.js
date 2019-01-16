var Firsdhand = Firsdhand || {};

Firsdhand.Model = function() {

  "use strict";
  var that={},serverMessage;
  
  function validationProductCity(productCity){
	  if(productCity.value != '' && productCity.value.length>4){
		  return true;
		  }else{
			  return false;
			  }
			 }
			 
			 function validationCheckRegister(emailRegister,passwordRegister,passwordRegisterRepeat){
				 if(emailRegister.value === '' || passwordRegister.value === '' || passwordRegisterRepeat.value === ''){
					 return Config.REGISTER_MESSAGE_NO_FIELDS_FILLED;
					 }
					 else{
						 if(validateEmail(emailRegister.value)){
							 if(passwordRegister.value === passwordRegisterRepeat.value){
								 if(passwordRegister.value.length <= Config.MIN_CHARACTERS){
									 return Config.REGISTER_MESSAGE_PASSWORD_NOT_SAFE;
									 }
									 else{
										 createObjectRegisterUser("https://h2795767.stratoserver.net/loader/actions/set.php","setUserIntoDB",emailRegister.value,passwordRegister.value);
										}
										 }
										 else{
											 return Config.REGISTER_MESSAGE_PASSWORD_NOT_CORRECT;
											 }
											}
											 else{
												 return Config.REGISTER_MESSAGE_EMAIL_NOT_CORRECT;
												 }
												}
											}
											
											function getProduct(productId,allProducts,userId){
												for(let i=0;i<allProducts.length;i++){
													if(productId==allProducts[i].id){
														createObjectSetUserProduct("https://h2795767.stratoserver.net/loader/actions/set.php","setUserProduct",allProducts[i].product_name,allProducts[i].art_nr,allProducts[i].product_url,userId);
														}
													}
												}
												
												function loadProducts(shopId){
													createObjectLoadProducts("https://h2795767.stratoserver.net/loader/actions/get.php","getShopProducts",shopId);																
													}
													
													function loadShops(){
														createObjectLoadShops("https://h2795767.stratoserver.net/loader/actions/get.php","getShops");																	
														}
														
														function loadUserProducts(userId){
															createObjectUserProducts("https://h2795767.stratoserver.net/loader/actions/get.php","getUserProducts",userId);
															}
															
															function createObjectSetUserProduct(url,action,productName,artNr,productUrl,user){
																var object = {
																	action:action,
																	productName:productName,
																	productUrl:productUrl,
																	artNr:artNr,
																	user:user
																	};
																	ajaxRequest(url,object);
																}
																
																function createObjectLoadShops(url,action){
																	var object = {
																		action:action
																		};
																		ajaxRequest(url,object);
																	}
																	
																	function createObjectLoadProducts(url,action,shopId){
																		var object = {
																			action:action,
																			shopId:shopId
																			};
																			ajaxRequest(url,object);															
																	}
																	
																	function createObjectUserProducts(url,action,userId){
																		var object = {
																			action:action,
																			userId:userId
																			};
																			ajaxRequest(url,object);
																		}
																		
																		function createObjectLoginUser(url,action,email,password,rememberChecked){
																			var object = {
																				action:action,
																				email:email,
																				password:password,
																				keepLogged:rememberChecked
																				};
																				ajaxRequest(url,object);
																			}
																			
																			function createObjectRegisterUser(url, action, email, password){
																				var object = {
																					action:action,
																					email:email,
																					password:password
																					};
																					ajaxRequest(url,object);
																					}
																					
																					function validationCheckLogin(emailLogin,passwordLogin,rememberLogin){
																						if(emailLogin.value === '' || passwordLogin.value === ''){
																							return Config.LOGIN_MESSAGE_NO_FIELDS_FILLED;
																							}
																							else{
																								if(rememberLogin.checked){
																									createObjectLoginUser("https://h2795767.stratoserver.net/loader/actions/login.php","tryLogin",emailLogin.value,passwordLogin.value,"true");
																									}
																									else{
																										createObjectLoginUser("https://h2795767.stratoserver.net/loader/actions/login.php","tryLogin",emailLogin.value,passwordLogin.value,"false");
																										}
																									}
																								}
																								
																								//copied by https://codepen.io/johnaleman/pen/yLcDl
																								function ajaxRequest(url,object){					
																								
																								let $promise = $.ajax({
																									
																									url: url,
																									type: 'POST',
																									data: object,
																									cache: false,
																									beforeSend: function(){
																										serverMessage = new Firsdhand.View();
																										},
																										success: function (response, status) {
																											prepareAction(response.trim(),object.action);
																											},
																											error: function (XMLHttpRequest, textStatus, errorThrown) {
																										}
																									});
																								}
																								
																								function prepareAction(response, action){
																								switch(action){
																									case "setUserIntoDB":
																									serverMessage.modalMessage(response);
																									break;
																									
																									case "tryLogin":
																									if(response=="true"){
																										location.reload(); 
																										}
																										else{
																											serverMessage.modalMessage(response);
																											}
																											break;
																											
																											case "getUserProducts":			
		try{
		//If the server outputs more than 0 entries of products
		let userProductsObject = JSON.parse(response);
		serverMessage.listUserProducts(userProductsObject);
		}catch(e){
		//If the server outputs zero entries of products
		serverMessage.userProductsMessage("Noch keine Artikel vorhanden");
		}
		break;	
		
		case "getShops":
		try{
		//If the server outputs more than 0 entries of products
		let shopNames = JSON.parse(response);
		serverMessage.listShopNames(shopNames);
		}catch(e){
		//If the server outputs zero entries of products
		serverMessage.userProductsMessage("Keine Shops vorhanden");
		}
		break;
																	
		case "getShopProducts":
		try{
		let shopProducts = JSON.parse(response);
		serverMessage.listShopProducts(shopProducts);
		Firsdhand.setProducts(shopProducts);
		}catch(e){
		serverMessage.modalMessage("Keine Produkte vorhanden");
		}
		break;
		
		case "setUserProduct":
		refreshPage();
		break;
    }
  }
											
  //copied by https://stackoverflow.com/questions/46155/how-to-validate-an-email-address-in-javascript
  function validateEmail(email) {
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }

  //copied by https://stackoverflow.com/questions/21245803/how-to-refresh-the-page-only-one-time-after-5-sec-in-javascript
  function refreshPage(){
    if (document.referrer !== document.location.href) {
      setTimeout(function() {
        document.location.reload()
      }, 1000);
    }
  }
that.getProduct=getProduct;
that.validationProductCity= validationProductCity;
that.loadProducts= loadProducts;
that.loadShops = loadShops;
that.loadUserProducts = loadUserProducts;
that.validationCheckLogin = validationCheckLogin;
that.validationCheckRegister = validationCheckRegister;
return that;
};

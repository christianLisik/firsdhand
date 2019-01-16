var Firsdhand = Firsdhand || {};

Firsdhand.View = function() {
  "use strict";
  var that={}, modal, span, modalMessageText,modalContent, divMessageText, divFirstPage, divSecondPage;

  function initModal(){
    modal = document.getElementById('myModal');
	modalContent = document.getElementsByClassName("modal-content")[0];
    span = document.getElementsByClassName("close")[0];
    modalMessageText = document.getElementById('modalMessageText');

    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }
  
  function initContainer() {
	  divMessageText = document.getElementById('user-products');
	  divFirstPage = document.getElementById('first-page');
	  divSecondPage = document.getElementById('second-page');
	  }
	  
	  function modalMessage(message){
		  initModal();
		  modal.style.display = "block";
		  modal.style.textAlign ="center";
		  modalMessageText.innerHTML = message;
		  }
		  
		  function userProductsMessage(message){
			  initContainer();
			  divMessageText.innerHTML = message;
			  }
			  
			  function enableProductAdd(buttonFinished){
				  buttonFinished.disabled = false;
				  buttonFinished.style.backgroundColor="#4285f4";
				  }
				  
				  function listShopProducts(shopProductsList){
					  initModal();
					  initContainer();
					  
					  divFirstPage.innerHTML="";
					  modalContent.style.height="100%";
					  
					  var table = document.createElement("table");
					  table.setAttribute("class", "product-list-table"); 
					  
					  var tableNode = divSecondPage.appendChild(table);
					  
					  for (let i = 0; i < shopProductsList.length; i++) {
						  let textNode, img, tr, a, trNode, column;
						  
						  tr = document.createElement("tr"); 
						  trNode = tableNode.appendChild(tr);
						  
						  trNode.setAttribute("class", "product-selection");
						  trNode.setAttribute("id", shopProductsList[i].id);
						  
						  img = document.createElement("img");
						  img.src = shopProductsList[i].product_url;									
						  column=createTableColumns(img, trNode);	
						  column.style.borderStyle="none";
						  
						  textNode=document.createTextNode(shopProductsList[i].product_name);										
						  column=createTableColumns(textNode, trNode);
						  column.style.borderStyle="none";
						  
						  textNode=document.createTextNode(shopProductsList[i].art_nr);										
						  column=createTableColumns(textNode, trNode);
						  column.style.borderStyle="none";
						  }
						  Firsdhand.initServerModals(); 
						 }
						 
						 function listShopNames(shopNamesList){
							 initContainer();
							 divFirstPage.innerHTML="";
							 
							 var table = document.createElement("table");
							 table.setAttribute("class", "product-list-table"); 
							 
							 var tableNode = divFirstPage.appendChild(table);
							 
							 for (let i = 0; i < shopNamesList.length; i++) {
								 let textNode, img, tr, a, trNode, column;											
								 
								 tr = document.createElement("tr");  
								 trNode = tableNode.appendChild(tr); 
								 
								 textNode=document.createTextNode(shopNamesList[i].shop_url);										
								 column=createTableColumns(textNode, trNode);
								 
								 a = document.createElement('a');
								 a.appendChild(textNode);
								 a.title = shopNamesList[i].name;
								 a.setAttribute("class", "shop-selection");
								 a.setAttribute("id", shopNamesList[i].id);
								 a.style.fontWeight = "bold";
								 column.appendChild(a);
								 }
								 Firsdhand.initServerModals(); 
								}
								
								function listUserProducts(userProductsList){
									initContainer();
									divMessageText.style.lineHeight="100px";
									divMessageText.innerHTML="Ihre Produkte";
									
									var table = document.createElement("table");
									table.setAttribute("class", "product-list-table"); 
									
									var tableNode = divMessageText.appendChild(table); 
									
									for (let i = 0; i < userProductsList.length; i++) {
										let textNode, img, tr, a, trNode, column;											
										tr = document.createElement("tr");  
										trNode = tableNode.appendChild(tr); 
										
										img = document.createElement("img");
										img.src = userProductsList[i].product_url;									
										column=createTableColumns(img, trNode);		
										
										textNode=document.createTextNode(userProductsList[i].product_name);										
										column=createTableColumns(textNode, trNode);
										
										textNode=document.createTextNode(userProductsList[i].shop_name);
										column=createTableColumns(textNode, trNode);											
										column.setAttribute("id", "shop-name-in-list"); 
										
										textNode=document.createTextNode("löschen");
										column=createTableColumns(textNode, trNode);
										
										a = document.createElement('a');
										a.appendChild(textNode);
										a.title = "Löschen";
										a.href = "#";
										a.setAttribute("id", "delete-in-list"); 
										a.style.fontWeight = "bold"; 
										column.appendChild(a);																					 
									} 
								}
								
								function createTableColumns(node, trNode){
									let tdNode, td;
									
									td = document.createElement("td");
									tdNode = trNode.appendChild(td); 
									tdNode.appendChild(node);
									return tdNode;
									}
									
									that.enableProductAdd=enableProductAdd;
									that.listShopProducts=listShopProducts;
									that.listShopNames = listShopNames;
									that.createTableColumns = createTableColumns;
									that.listUserProducts = listUserProducts;
									that.initModal = initModal;
									that.initContainer = initContainer;
									that.modalMessage = modalMessage;
									that.userProductsMessage = userProductsMessage;
									return that;
									};

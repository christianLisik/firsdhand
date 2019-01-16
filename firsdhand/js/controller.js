var Firsdhand = Firsdhand || {};

Firsdhand.Controller= function() {
  "use strict";
  var that = new EventTarget();

  function eventClickButton(initFirsdhandButton){
      initFirsdhandButton.addEventListener("click", buttonClicked, false);
  }

  function eventInputField(initFirsdhandInput){
      initFirsdhandInput.addEventListener("keyup", inputTyped, false);
	  }
  
  function buttonClicked(){
	  let event = new Event("eventCheckInputs");
	  that.dispatchEvent(event,"test"); //testEvent will be replaced
	  }
	  
	function inputTyped(){
		let event = new Event("eventCheckInputs2");
		that.dispatchEvent(event,"test2"); //testEvent2 will be replaced
	}

  that.inputTyped = inputTyped;
  that.eventInputField = eventInputField;
  that.buttonClicked = buttonClicked;
  that.eventClickButton = eventClickButton;
  return that;
};

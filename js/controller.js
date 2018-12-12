var Firsdhand = Firsdhand || {};

Firsdhand.Controller= function() {
  "use strict";
  var that = new EventTarget();

  function eventClickButton(initFirsdhandButton){
      initFirsdhandButton.addEventListener("click", buttonClicked, false);
  }

  function buttonClicked(){
    let event = new Event("eventCheckInputs");
    that.dispatchEvent(event,"test");
  }

  that.buttonClicked = buttonClicked;
  that.eventClickButton = eventClickButton;
  return that;
};

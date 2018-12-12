var Firsdhand = Firsdhand || {};

Firsdhand = (function() {

  "use strict";
  var that = {},
  controller, model, view;

  function init() {
    initFirsdhandModels(initFirsdhandRegister());
    initFirsdhandModels(initFirsdhandLogin());
  }

  function initFirsdhandRegister(){
    let buttonRegister = document.querySelector("#button-register");
    return buttonRegister;
  }

  function initFirsdhandLogin(){
    let buttonLogin = document.querySelector("#button-login");
    return buttonLogin;
  }

  function initFirsdhandModels(initFirsdhandButtons){
    controller = new Firsdhand.Controller();
    model = new Firsdhand.Model();
    view = new Firsdhand.View();

    if(initFirsdhandButtons !== null){
      let buttonId = initFirsdhandButtons.getAttribute("id");

      controller.eventClickButton(initFirsdhandButtons);
      controller.addEventListener("eventCheckInputs", initFirsdhandInputs, false);
      controller.buttonId=buttonId;
    }
  }

  function checkForUndefined(message){
    if (typeof(message) != "undefined"){
      view.modalMessage(message);
    }
  }

  function initFirsdhandInputs(e){
    switch(e.target.buttonId){
      //Check if button was Clicked for the index.htm site
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

      default:;

    }
  }

  that.init = init;
  return that;

}());

var Firsdhand = Firsdhand || {};

Firsdhand.Model = function() {

  "use strict";
  var that={},serverMessage;

  function validationCheckRegister(emailRegister,passwordRegister,passwordRegisterRepeat){
    if(emailRegister.value === '' || passwordRegister.value === '' || passwordRegisterRepeat.value === ''){
      return Config.REGISTER_MESSAGE_NO_FIELDS_FILLED;
    }else{
      if(validateEmail(emailRegister.value)){
        if(passwordRegister.value === passwordRegisterRepeat.value){
          if(passwordRegister.value.length <= Config.MIN_CHARACTERS){
            return Config.REGISTER_MESSAGE_PASSWORD_NOT_SAFE;
          }else{
          //  refreshPage();
          createObjectRegisterUser("https://h2795767.stratoserver.net/loader/actions/set.php","setUserIntoDB",emailRegister.value,passwordRegister.value);
          }
        }else{
          return Config.REGISTER_MESSAGE_PASSWORD_NOT_CORRECT;
        }
      }else{
        return Config.REGISTER_MESSAGE_EMAIL_NOT_CORRECT;
      }
    }
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
    }else{
      if(rememberLogin.checked){

          createObjectLoginUser("https://h2795767.stratoserver.net/loader/actions/login.php","tryLogin",emailLogin.value,passwordLogin.value,"true");
      }else{
        
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
        console.log(textStatus);
        //serverMessage.modalMessage(textStatus);
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
      console.log("loginSucess");

      }else{
        serverMessage.modalMessage(response);
      }
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
      }, Config.REFRESH_TIMEOUT);
    }
  }

  that.validationCheckLogin = validationCheckLogin;
  that.validationCheckRegister = validationCheckRegister;
  return that;
};

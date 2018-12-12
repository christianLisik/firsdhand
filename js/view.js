var Firsdhand = Firsdhand || {};

Firsdhand.View = function() {
  "use strict";
  var that={}, modal, span, modalMessageText;

  function initModal(){
    modal = document.getElementById('myModal');
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

  function modalMessage(message){
    initModal();
    modal.style.display = "block";
    modal.style.textAlign ="center";
    modalMessageText.innerHTML = message;
  }

that.initModal = initModal;
that.modalMessage = modalMessage;
return that;
};

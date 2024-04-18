const password = document.getElementById('inputSenha');
const icon = document.getElementById('icon');


function showHide() {
   if(password.type === 'password'){
      password.setAttribute('type','text');
      icon.classList.add('hide');
   }
   else{
      password.setAttribute('type','password');
      icon.classList.remove('hide')
   }
}

const passwords = document.getElementById('senha');
const icons = document.getElementById('icone');

function showHides() {
   if(passwords.type === 'password'){
      passwords.setAttribute('type','text');
      icons.classList.add('hides');
   }
   else{
      passwords.setAttribute('type','password');
      icons.classList.remove('hides')
   }
}

// pop esqueci senha
function openPopup() {
   var popup = document.getElementById("forgotPasswordPopup");
   popup.style.display = "block";

   window.onclick = function(event) {
       if (event.target == popup) {
           closePopup();
       }
   };
}

function closePopup() {
   document.getElementById("forgotPasswordPopup").style.display = "none";
}

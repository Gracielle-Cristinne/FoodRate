
// olho magico senha
if (window.location.href.includes('cadastro.html') || window.location.href.includes('index.html')) {
   function showHidePassword(passwordElement, iconElement) {
      if (passwordElement.type === 'password') {
         passwordElement.setAttribute('type', 'text');
         iconElement.classList.add('hide');
      }
      else {
         passwordElement.setAttribute('type', 'password');
         iconElement.classList.remove('hide');
      }
   }

   const password = document.getElementById('inputSenha');
   const password2 = document.getElementById('inputSenhaCadastro');
   const password3 = document.getElementById('inputConfirmSenha');
   const icon = document.getElementById('icon');
   const icon2 = document.getElementById('icon2');
   const icon3 = document.getElementById('icon3');

   function showHide() {
      showHidePassword(password, icon);
   }

   function showHide1() {
      showHidePassword(password2, icon2);
   }

   function showHide2() {
      showHidePassword(password3, icon3);
   }


   // popup de esqueci a senha

   function openPopup() {
      var popup = document.getElementById("forgotPasswordPopup");
      popup.style.display = "block";

      window.onclick = function (event) {
         if (event.target == popup) {
            closePopup();
         }
      };
   }

   function closePopup() {
      document.getElementById("forgotPasswordPopup").style.display = "none";
   }


   // popup de senha cadastro e termos

   function openPopup2() {
      var popup = document.getElementById("forgotPasswordPopup2");
      popup.style.display = "block";

      window.onclick = function (event) {
         if (event.target == popup) {
            closePopup2();
         }
      };
   }

   function closePopup2() {
      document.getElementById("forgotPasswordPopup2").style.display = "none";
   }

   // Validar senha de cadastro e termos

   document.getElementById("formCadastro").addEventListener("submit", function (event) {
      var password = document.getElementById("inputSenhaCadastro").value;
      var confirmPassword = document.getElementById("inputConfirmSenha").value;
      var checkbox = document.getElementById("checkboxTermos").checked;
      var p1 = document.getElementById("p1");
      var p2 = document.getElementById("p2");

      if (password !== confirmPassword || !checkbox) {
         event.preventDefault();

         if (password !== confirmPassword) {
            p2.style.display = "block";
         } else {
            p2.style.display = "none";
         }

         if (!checkbox) {
            p1.style.display = "block";
         } else {
            p1.style.display = "none";
         }
         openPopup2();
      }
   });
}


if (window.location.href.includes('home.html')){
 
   // passa os slides e comentarios  da home

   let currentPanelSlides = 1;
   const totalPanels = 3;

   function changePanel(direction) {
      currentPanelSlides += direction;
   
      if (currentPanelSlides < 1) {
          currentPanelSlides = totalPanels;
      } else if (currentPanelSlides > totalPanels) {
          currentPanelSlides = 1;
      }
   
      updateCarousel('.mudar-slides', currentPanelSlides);
   }

   function updateCarousel(selector, currentPanel) {
      const carousel = document.querySelector(selector);
      const panelWidthPercent = 100 / totalPanels;
      const translateValue = -panelWidthPercent * (currentPanel - 1);
      carousel.style.transform = `translateX(${translateValue}%)`;
   }

   // para aperta em algum link e rolar para a parte onde ele esta na tela
   
   function scrollToSection(sectionId) {
      var section = document.getElementById(sectionId);
      if (section) {
         section.scrollIntoView({ behavior: 'smooth' });
      }
   }

   // popup button outros e contatos da home

   function openPopupContatos() {
      var popup = document.getElementById("popupContatos");
      popup.style.display = "block";
  
      window.onclick = function (event) {
          if (event.target == popup) {
              closePopupContatos();
          }
      };
  }
  
  function closePopupContatos() {
      document.getElementById("popupContatos").style.display = "none";
  }
  
  function openPopupButtonOutros() {
      var popup = document.getElementById("button-outros-restaurantes");
      popup.style.display = "block";
  
      window.onclick = function (event) {
          if (event.target == popup) {
              closePopupButtonOutros();
          }
      };
  }
  
  function closePopupButtonOutros() {
      document.getElementById("button-outros-restaurantes").style.display = "none";
  }

}

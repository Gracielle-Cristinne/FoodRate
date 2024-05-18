if (window.location.href.includes('cadastro.php') || window.location.href.includes('index.php')) {

   // olho magico senha

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


if (window.location.href.includes('home.php') || window.location.href.includes('blog.php') || window.location.href.includes('restaurantes.php') || window.location.href.includes('maps.php')) {

   // passa os slides da home

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

   // passar comentarios

   let currentPanelComentarios = 1;

   document.querySelectorAll('.mudar-comentarios .img-comentarios').forEach((img, index) => {
      if (index !== 0) {
         img.style.display = 'none';
      }
   });

   function changePanelComentarios(direction) {
      currentPanelComentarios += direction;
      const totalPanels = document.querySelectorAll('.mudar-comentarios .img-comentarios').length;

      if (currentPanelComentarios < 1) {
         currentPanelComentarios = totalPanels;
      } else if (currentPanelComentarios > totalPanels) {
         currentPanelComentarios = 1;
      }

      updateCarouselComentarios('.mudar-comentarios', currentPanelComentarios);
   }

   function updateCarouselComentarios(selector, panelToShow) {
      const panels = document.querySelectorAll(selector + ' .img-comentarios');
      panels.forEach((panel, index) => {
         if (index + 1 === panelToShow) {
            panel.style.display = 'flex';
         } else {
            panel.style.display = 'none';
         }
      });
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

   // popup button outros restaurantes

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

   // popup responder comentarios

   function openPopupComentarios() {
      var popup = document.getElementById("popupComentarios");
      popup.style.display = "block";

      window.onclick = function (event) {
         if (event.target == popup) {
            closePopupComentarios();
         }
      };
   }

   function closePopupComentarios() {
      document.getElementById("popupComentarios").style.display = "none";
   }
   // Estrela de avaliação da tela restaurante

   const allStar = document.querySelectorAll('.restaurante-avaliacao .star');

   allStar.forEach((item, idx) => {
      item.addEventListener('click', function () {
         for (let i = 0; i < allStar.length; i++) {
            if (i <= idx) {
               allStar[i].classList.replace('bx-star', 'bxs-star');
               //allStar[i].classList.add('active') ativa uma animcao da estrela pulando
            } else {
               allStar[i].classList.replace('bxs-star', 'bx-star');
               //  i.classList.remove('active')ativa uma animaçaõ da estrela pulando
            }
         }
      });
   });

   //AREA DE COMENTARIO

   function submitComment() {
      var text = document.getElementById('comment-text').value;
      if (text.trim() === '') {
         alert('Por favor, escreva um comentário.');
         return;
      }

      var comment = document.createElement('div');
      comment.classList.add('comment');
      comment.innerHTML = `
       <div class="comment-author">Usuário</div>
       <div class="comment-text">${text}</div>
   `;

      document.getElementById('comments').appendChild(comment);
      document.getElementById('comment-text').value = '';
   }


   // Função para filtrar os restaurantes com base na entrada do usuário
   function filterRestaurants(input) {
      const searchValue = input.value.toLowerCase();
      const restaurantItems = input.closest('.dropdown').querySelectorAll('.dropdown-item');

      restaurantItems.forEach(item => {
         const restaurantName = item.textContent.toLowerCase();
         if (restaurantName.includes(searchValue)) {
            item.style.display = 'block';
         } else {
            item.style.display = 'none';
         }
      });
   }

   // Event listener para abrir/fechar o menu suspenso
   const dropdownButtons = document.querySelectorAll('.dropdown-toggle');
   const dropdownMenus = document.querySelectorAll('.dropdown-menu');

   dropdownButtons.forEach((button, index) => {
      button.addEventListener('click', () => {
         dropdownMenus[index].style.display = dropdownMenus[index].style.display === 'block' ? 'none' : 'block';
      });
   });
}


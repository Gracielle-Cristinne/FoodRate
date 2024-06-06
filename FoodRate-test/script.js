


document.addEventListener("DOMContentLoaded", function () {
   const login = localStorage.getItem('auth');
   const currentPath = window.location.pathname;
   const id = localStorage.getItem('idrestaurante');
   if(id){
      document.getElementById('idrest').value = id;
   }
  

   if (login) {
      const loginObj = JSON.parse(login); 
      console.log(loginObj)// Converte a string JSON em um objeto
      document.getElementById('idusu').value = loginObj.idUsuario;
      const usuario = loginObj.login_usuario // Acessa a propriedade idUsuario do objeto
  }
   // Ajuste para ambientes locais e com prefixos
   const protectedPaths = ['/home.php', '/maps.php', '/restaurante2.php', '/restaurante3.php', '/restaurantes.php'];
   const isProtectedPath = protectedPaths.some(path => currentPath.endsWith(path));

   if (login) {
      console.log("Usuário autenticado.");
   } else {
      if (isProtectedPath) {
         console.log("Usuário não autenticado, redirecionando para index.php.");
         window.location.href = 'index.php';
      } else {
         console.log("Usuário não autenticado, mas em página não protegida.");
      }
   }
});




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


if (window.location.href.includes('home.php') || window.location.href.includes('blog.php') || window.location.href.includes('restaurantes.php') || window.location.href.includes('maps.php') || window.location.href.includes('restaurante2.php') || window.location.href.includes('restaurante3.php')) {
document.addEventListener("DOMContentLoaded", function() {
    const authData = localStorage.getItem('auth');
    if (authData) {
        const user = JSON.parse(authData);

        // Função para enviar comentário
        window.submitComment = function() {
            const commentText = document.getElementById('comment-text').value;
            const userId = user.idUsuario; // Certifique-se de que esta chave está correta
            const userName = user.login_usuario;
            const restaurantId = 1; // Substitua pelo ID do restaurante relevante

            if (commentText.trim() === "") {
                alert("Por favor, escreva um comentário.");
                return;
            }

            // Preparar dados para envio
            const commentData = {
                userId: userId,
                comment: commentText,
                restaurantId: restaurantId
            };

            // Verifique os dados antes de enviar
            console.log('Dados do comentário:', commentData);

            // Enviar dados para o backend usando AJAX (Exemplo com Fetch API)
            fetch('submit_comment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(commentData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Adicionar comentário na tela
                    const commentSection = document.getElementById('comments');
                    const newComment = document.createElement('div');
                    newComment.classList.add('comment');
                    newComment.innerHTML = `<strong>${userName}</strong>: ${commentText}`;
                    commentSection.appendChild(newComment);

                    // Limpar o campo de comentário
                    document.getElementById('comment-text').value = '';
                } else {
                    alert("Erro ao enviar comentário: " + data.message);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert("Erro ao enviar comentário.");
            });
        };
    } else {
        alert("Usuário não autenticado.");
        window.location.href = 'index.php'; // Redirecionar para a página de login
    }
});



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
   function logoff() {
      localStorage.removeItem('auth');
      window.location.href = 'index.php'
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
   // Numero de avaliação da tela restaurante

   document.querySelectorAll('.avaliacao-btn').forEach((button, idx, buttons) => {
      button.addEventListener('click', () => {
         // Remove active class from all buttons
         buttons.forEach(btn => btn.classList.remove('active'));

         // Add active class to the clicked button and previous buttons
         buttons.forEach((btn, i) => {
            if (i <= idx) {
               btn.classList.add('active');
            }
         });

         // Update hidden input value
         document.querySelector('.number').value = button.getAttribute('data-value');
      });
   });

   //AREA DE COMENTARIO

   function submitComment() {
      const authData = localStorage.getItem('auth');
      if (authData) {
         const user = JSON.parse(authData);

         // Função para enviar comentário
         window.submitComment = function () {
            const commentText = document.getElementById('comment-text').value;
            const userId = user.idUsuario;
            const userName = user.login_usuario;
            const restaurantId = 1; // Substitua pelo ID do restaurante relevante

            if (commentText.trim() === "") {
               alert("Por favor, escreva um comentário.");
               return;
            }

            // Preparar dados para envio
            const commentData = {
               userId: userId,
               userName: userName,
               restaurantId: restaurantId,
               comment: commentText
            };

            // Enviar dados para o backend usando AJAX (Exemplo com Fetch API)
            fetch('submit_comment.php', {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/json'
               },
               body: JSON.stringify(commentData)
            })
               .then(response => response.json())
               .then(data => {
                  if (data.success) {
                     // Adicionar comentário na tela
                     const commentSection = document.getElementById('comments');
                     const newComment = document.createElement('div');
                     newComment.classList.add('comment');
                     newComment.innerHTML = `<strong>${userName}</strong>: ${commentText}`;
                     commentSection.appendChild(newComment);

                     // Limpar o campo de comentário
                     document.getElementById('comment-text').value = '';
                  } else {
                     alert("Erro ao enviar comentário.");
                  }
               })
               .catch(error => {
                  console.error('Erro:', error);
                  alert("Erro ao enviar comentário.");
               });
         };
      }
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

   function openModal(modalId) {
      var popup = document.getElementById(modalId);
      popup.style.display = "block";
      var list1 = document.getElementById('restaurantsList1');
      var list2 = document.getElementById('restaurantsList2');
      var list3 = document.getElementById('restaurantsList3');
      var list4 = document.getElementById('restaurantsList4');
      var list5 = document.getElementById('restaurantsList5');
      var list6 = document.getElementById('restaurantsList6');
      list1.style.display = 'none';
      list2.style.display = 'none';
      list3.style.display = 'none';
      list4.style.display = 'none';
      list5.style.display = 'none';
      list6.style.display = 'none';
      window.onclick = function (event) {
         if (event.target == popup) {
            closeModal(modalId);
         }
      };
   }

   // Função para fechar o popup
   function closeModal(modalId) {
      document.getElementById(modalId).style.display = "none";
   }
}


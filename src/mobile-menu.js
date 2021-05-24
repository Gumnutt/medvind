export const mobileMenu = () => {
  let hamburger = document.getElementById('hamburgerbtn');
  let mobileMenu = document.getElementById('mainMenu');
  hamburger.addEventListener('click', function(){
      mobileMenu.classList.toggle('gov-hidden');
  });
}
window.onscroll = function() {nav_stick()};
var navbar = document.getElementById('nav-bar');
var sideMenu = document.getElementById('side-menu');
var logoTop = document.getElementById('logo-img-top');
var logoNav = document.getElementById('logo-img-nav');
var welcomeBar = document.getElementById('welcome-bar')
var sticky = navbar.offsetTop;
function nav_stick() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add('sticky');
    logoTop.style.display = 'none';
    logoNav.style.display = 'inline';
    sideMenu.style.margin='0';
    sideMenu.style.position='fixed';
    sideMenu.style.height='100%';
  } else {
    navbar.classList.remove('sticky');
    logoTop.style.display = 'block';
    logoNav.style.display = 'none';
    sideMenu.style.marginTop='100px';
    sideMenu.style.position='absolute';
  }
}
function scrollToTop(){
  document.querySelector('.title').scrollIntoView({
  behavior: 'smooth'
});
}
$(document).ready(nav_stick());

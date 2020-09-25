const elTimeBox = document.querySelector('.date__time');
const elDateBox = document.querySelector('.exact-date');
const elMenuBtn = document.querySelector('.btn-menu');
const d = new Date();
const elNavBar = document.querySelector('.navbar');
const elWeatherBox = document.querySelector('.weather-box');
const elLanguagesBox = document.querySelector('.languages');

const elMenuMask = document.querySelector('.menu-mask')

elDateBox.textContent = getFullDate(d);
elTimeBox.textContent = getTime(d);


elMenuBtn.addEventListener('click', () => {
  elMenuBtn.classList.toggle('menu-btn--active');
  document.querySelector('body').classList.toggle('open-menu');
  elMenuMask.classList.toggle('menu-mask--active');
});
elMenuMask.addEventListener('click', evt => {
  if (!evt.target.matches('.navbar')) {
    
    elMenuBtn.classList.toggle('menu-btn--active');
    document.querySelector('body').classList.toggle('open-menu');
    elMenuMask.classList.toggle('menu-mask--active');
  }
});

const elAdBlock = document.querySelector('.small-ad');
const elAdMask = document.querySelector('.small-ad-mask');
const margin = 20;
let startPosition = null;

const modifiers = {
    fixed: 'item--fixed',
    adMask: 'small-ad-mask--active'
};

const sticky = new Sticky('[data-sticky]');



if (window.innerWidth <= 768) {
  addListenerToButtons();
}

window.addEventListener('resize', () => {
  if (window.innerWidth <= 768) {
    addListenerToButtons();
  } else {
    elWeatherBox.classList.add('weather-box');
    elWeatherBox.classList.remove('weather-box--mobile');
    elLanguagesBox.classList.add('languages');
    elLanguagesBox.classList.remove('languages--mobile');
  }
})


// Get the offset position of the navbar
const elLogo = document.querySelector('.logo-wrapper')
const stickyOffset = elLogo.offsetTop;
const elLogoMask = document.querySelector('.logo-mask')
window.addEventListener('scroll', () => {
  elLogoMask.classList.toggle('logo-mask--active', window.scrollY > stickyOffset + 60)
  elLogo.classList.toggle('logo--sticky', window.scrollY > stickyOffset + 60);
  elMenuBtn.classList.toggle('menu-btn-sticky', window.scrollY > stickyOffset + 60);
});

// Get the navbar


// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  
}


function getFullDate(date) {
  const day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
  const month = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
  const year = date.getFullYear();

  return `${day}.${month}.${year}`;
}

function getTime(date) {
  const hour = date.getHours() < 10 ? '0' + date.getHours() : date.getHours();
  const minute = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes();
  
  return `${hour}:${minute}`;
}

function addListenerToButtons() {
  

  elWeatherBox.classList.remove('weather-box');
  elWeatherBox.classList.add('weather-box--mobile');
  elLanguagesBox.classList.remove('languages');
  elLanguagesBox.classList.add('languages--mobile');
  
  elWeatherBox.addEventListener('click', () => {
    elWeatherBox.classList.toggle('weather-box--active');
  });

  elLanguagesBox.addEventListener('click', () => {
    elLanguagesBox.classList.toggle('languages--active');
  });
}
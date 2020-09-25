const elTimeBox = document.querySelector('.date__time');
const elDateBox = document.querySelector('.exact-date');
const elMenuBtn = document.querySelector('.btn-menu');
const d = new Date();
const elNavBar = document.querySelector('.navbar');
const elWeatherBox = document.querySelector('.weather-box');
const elLanguagesBox = document.querySelector('.languages');
const elMenuMask = document.querySelector('.menu-mask')
const elModal = document.querySelector('.layer');
const elCancelModal = document.querySelector('.hide-modal-btn');

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

$('.visually-hidden').click(function(){
  if ($(this).is(':checked')) {
      $('.googness-modal').addClass('goodness-modal--active');
    $body.addClass("loading");
    $body = $("body");
    $div=$('#resultLatestPost');
    $resultSidebarPost=$('#resultSidebarPost');
    $resultAnons=$('#resAnons');
    $resultTopPosts=$('#resTopPosts');
      
    $.get('/load-latest-posts', function(response) { //append data
      $html = $(response).find("#resultLatestPost").html(); 
      $div.html($html);
      $.get('/load-sidebar-posts', function(res) { //append data 
        $resultSidebarPost.html(res);
        $.get('/load-anons', function(anons) { //append data 
          $resultAnons.html(anons);
          $.get('/load-top-posts', function(top_posts) { //append data 
            $resultTopPosts.html(top_posts);
            $body.removeClass("loading"); 
          });
        });
      });
    });

  }else{
    window.location.href="/";
  }
})

    var $ul = $("ul.pagination");
    $ul.hide();
    $body = $("body");
    $('.loadMoreBtn').click(function(e){
      $body.addClass("loading");  
      $div = $($(this).attr('data-div')); //div to append
      $link = $(this).attr('data-link'); //current URL

      $page = $(this).attr('data-page'); //get the next page #
      $href = $link + $page; //complete URL
      $.get($href, function(response) { //append data
        $html = $(response).find("#resultLatestPost").html(); 
        $div.append($html);
        $body.removeClass("loading"); 
      });
      $(this).attr('data-page', (parseInt($page) + 1)); //update page #
    })

    fetch('https://coronavirus-19-api.herokuapp.com/countries/uzbekistan')
      .then(response => response.json())
      .then( function(data){
      $('.covid-infected').html(data.cases)
      $('.covid-died').html(data.deaths)
      $('.covid-recovered').html(data.recovered)
    });

    fetch('https://api.openweathermap.org/data/2.5/weather?q=Tashkent&appid=0e695f70b4fc658773b511d44b35cc79')
      .then(response => response.json())
      .then( function(data){
          $('.region__temperature').html(Math.round(data.main.temp - 273) + '   &degC');
          $('.wh-image').html(`<img class="weather-img" src="https://openweathermap.org/img/w/${data.weather[0]['icon']}.png" alt="">`)
          
      });

    $('.getWeather').click(function(){
      var id=$(this).data('id');
      var reg_name=$(this).html();
      fetch('https://api.openweathermap.org/data/2.5/weather?q='+id+'&appid=0e695f70b4fc658773b511d44b35cc79')
      .then(response => response.json())
      .then( function(data){
          $('.region__temperature').html(Math.round(data.main.temp - 273) + '   &degC');
          $('.region__name').html(reg_name);
          $('.wh-image').html(`<img class="weather-img" src="https://openweathermap.org/img/w/${data.weather[0]['icon']}.png" alt="">`)
          console.log(data.weather[0]['icon']);
      });
    })


if(location.href=="http://uzbek24.uz/"){
    setTimeout(function(){
    elModal.classList.add('modal--show');
    }, 40000)
}
  
function showLayer(){
  elModal.classList.add('modal--show');
}

setInterval(showLayer, 90000);

elCancelModal.addEventListener('click', () => {
  elModal.classList.remove('modal--show');
});


    
    
    
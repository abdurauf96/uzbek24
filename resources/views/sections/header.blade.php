<header class="main-header">
    <div class="container">
      <div class="basic-flex responsive-header-wrapper">
        <div class="basic-flex responsive-top">
          <div class="logo-wrapper">
            <a href="/" class="logo">
              <img src="/img/logo.png" alt="uzbek24.uz logo">
            </a>
          </div>
          <div class="logo-mask"></div>
          <div class="hader__date">
            <span class="exact-date">22.05.2020</span>
            <span class="date__time">12:25</span>
          </div>
          <div class="weather-box basic-flex">
            <div class="wh-image">
            </div>
            
            <div class="region--active basic-flex">
              <span class="region__name">@lang('messages.tash')</span>
              <span class="region__temperature" data-sign="+"></span>
            </div>
            <ul class="regions-list">
              <li class="regions__item"><a class="getWeather" data-id="Namangan" href="#">@lang('messages.nam')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Nukus" href="#">@lang('messages.nukus')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Tashkent" href="#">@lang('messages.tash_o').</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Andijon" href="#">@lang('messages.and')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Buxoro" href="#">@lang('messages.bux')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Sirdaryo" href="#">@lang('messages.sir')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Navoiy" href="#">@lang('messages.nav')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Urganch" href="#">@lang('messages.urg')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Fergana" href="#">@lang('messages.fer')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Samarkand" href="#">@lang('messages.sam')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Termiz" href="#">@lang('messages.ter')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Tashkent" href="#">@lang('messages.tash')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Jizzax" href="#">@lang('messages.jiz')</a></li>
              <li class="regions__item"><a class="getWeather" data-id="Qarshi" href="#">@lang('messages.qar')</a></li>
            </ul>
          </div>
        </div>
        <div class="basic-flex responsive-bottom">
          <form method="GET" class="search-form" action="/search">
            {{ csrf_field() }}
            <label for="search-input">
              <input type="text" id="search-input" name="q" placeholder="@lang('messages.search')" required>
            </label>
            <button type="submit" class="btn search-btn"></button>
          </form>
          <a href="https://t.me/joinchat/AAAAAFffjxaO-5u2S7Jggw" class="join-telegram-link basic-flex" target="_blank">@lang('messages.our_channel')</a>
          <div class="languages">
            @if(\App::getLocale()=='ru')
            <button type="button" class="btn language__option language__option--active basic-flex">Русский</button>
            <div class="languages__list">
              <a href="/lang/uz" type="button" class="btn language__option language__option--uz" data-status="disabled">O'zbekcha</a>
              <a href="/lang/o`z" type="button" class="btn language__option language__option--uz-kirill" data-status="disabled">Ўзбекча</a>
            </div>
            @elseif(\App::getLocale()=='uz')
            <button type="button" class="btn language__option language__option--active basic-flex">O'zbekcha</button>
            <div class="languages__list">
              <a href="/lang/ru" type="button" class="btn language__option language__option--ru" data-status="disabled">Русский</a>
              <a href="/lang/o`z" type="button" class="btn language__option language__option--uz-kirill" data-status="disabled">Ўзбекча</a>
            </div>
            @else
            <button type="button" class="btn language__option language__option--active basic-flex">Ўзбекча</button>
            <div class="languages__list">
              <a href="/lang/ru" type="button" class="btn language__option language__option--ru" data-status="disabled">Русский</a>
              <a href="/lang/uz" type="button" class="btn language__option language__option--uz" data-status="disabled">O'zbekcha</a> 
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
</header>

<nav data-sticky-class="navbar-mask--active" class="navbar" data-sticky-wrap=true class="small-ad" data-sticky-for="1024" data-sticky> 
    <ul class="navbar__menu">
      <li class="menu__item"><a href="/" class="menu__link {{ \Request::is('/') ? 'menu__link--active' : ''  }} ">@lang('messages.home')  </a></li>
      @foreach ($categories as $cat)
      @if($cat->translate(\App::getLocale())->name!='')
      <li class="menu__item"><a href="/category/{{ $cat->slug }}" class="menu__link 
      
      {{ \Request::url()=='http://uzbek24.uz/category/'.$cat->slug ? 'menu__link--active' : '' }} ">
          {{ $cat->translate(\App::getLocale())->name }} </a></li>
      @endif
      @endforeach
      
    </ul>
    <ul class="social-links basic-flex">
      <li class="social__item"><a href="#"><img src="/img/fb.png" alt="Facebook"></a></li>
      <li class="social__item"><a href="#"><img src="/img/insta.png" alt="Instagram"></a></li>
      <li class="social__item"><a href="#"><img src="/img/twitter.png" alt="Twitter"></a></li>
      <li class="social__item"><a href="#"><img src="/img/whatsapp.png" alt="WhatsApp"></a></li>
      <li class="social__item"><a href="#"><img src="/img/youtube.png" alt="YouTube"></a></li>
      <li class="social__item"><a href="#"><img src="/img/telegram.png" alt="Telegram"></a></li>
    </ul>
    <div class="googness-box">
      <label class="goodness__label">@lang('messages.lenta')
        <input type="checkbox" class="visually-hidden" name="checkbox">
        <span class="custom-toglle"></span></label>
      <div class="googness-modal">
        <h5 class="goodness__title">@lang('messages.lenta_activ').
          </h5>
        <p class="goodness__description">@lang('messages.this').</p>
        <img src="/img/emoji.png" alt="emoji">
      </div>
    </div>
  </nav>
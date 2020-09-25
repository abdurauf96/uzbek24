<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uzbek24.uz – Сиз излаган сўнгги янгиликлар</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="description" content="Ўзбекистон ва дунё янгиликлари. Сиёсат, иқтисодиёт, спорт, шоу бизнес.">  <meta name="keywords" content="янгиликлар, хабарлар, сўнгги янгиликлар, сўнгги хабарлар, ўзбекистон янгиликлари, дунё хабарлари, сиёсий янгиликлар, ўзбекистон янгиликлари, янги хабарлар, охирги воқеалар, тезкор хабарлар">  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Ўзбекистондаги энг сўнгги янгиликлар">
  <meta name="robots" content="index,follow">	
  <meta property="og:site_name" content="Сиз излаган сўнгги янгиликлар">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://uzbek24.uz/">
  <meta property="og:title" content="Uzbek24.uz">
  <meta property="og:description" content="Uzbek24.uz — сўнгги янгиликлар.">
  <meta property="og:image" content="https://uzbek24.uz/12.png">
  
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@uzbek24_uz">
  <meta name="twitter:title" content="Uzbek24">
  <meta name="twitter:description" content="Uzbek24.uz — сўнгги янгиликлар.">
  <meta name="twitter:image" content="https://uzbek24.uz/12.png">

    <link rel="apple-touch-icon" sizes="57x57" href="/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
    <link rel="manifest" href="/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  @yield('css')
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/my.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="layer">
    <div class="modal-box basic-flex">
      <button type="button" class="btn hide-modal-btn">x</button>
      <h4>{{ __('messages.podpis') }}</h4>
      <div class="telegram-join basic-flex">
        <a href="https://t.me/joinchat/AAAAAFffjxaO-5u2S7Jggw">{{ __('messages.podpisatsa') }}</a>
      </div>
    </div>
  </div>
  <div class="top-banner-ads container">
    @yield('ad')
  </div>
  <div class="menu-mask"></div>
  
  @yield('content')

  <footer class="main-footer">
    <div class="container">
      <div class="footer__top">
        {{ menu('footer_menu', 'layouts.footer_menu') }}
        <div class="footer__social-links basic-flex">
          <a href="https://t.me/joinchat/AAAAAFffjxaO-5u2S7Jggw" target="_blank" class="telegram-footer-join">
            @lang('messages.our_channel')
          </a>
          <ul class="social-links__menu basic-flex">
            <li class="social__item"><a href="#"><img src="/img/fb.png" alt="Facebook"></a></li>
            <li class="social__item"><a href="#"><img src="/img/insta.png" alt="Instagram"></a></li>
            <li class="social__item"><a href="#"><img src="/img/twitter.png" alt="Twitter"></a></li>
            <li class="social__item"><a href="#"><img src="/img/whatsapp.png" alt="WhatsApp"></a></li>
            <li class="social__item"><a href="#"><img src="/img/youtube.png" alt="YouTube"></a></li>
            <li class="social__item"><a href="https://t.me/joinchat/AAAAAFffjxaO-5u2S7Jggw"><img src="/img/telegram.png" alt="Telegram"></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="container basic-flex">
        <p class="copyright">Copyright © 2020</p>
        <p>@lang('messages.develop')</p>
      </div>
    </div>
  </footer>
  <div class="modal"><!-- Place at bottom of page --></div>
  <script src="/js/sticky.min.js"></script>
  
  @yield('scripts')

  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/main.js"></script>
  
</body>
</html>
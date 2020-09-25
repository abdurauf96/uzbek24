<ul class="footer__menu basic-flex">
    @foreach($items as $item)
    <li class="footer-menu__item"><a href="{{ $item->url }}">{{ $item->getTranslatedAttribute('title', \App::getLocale()) }} </a></li>
    @endforeach
</ul>
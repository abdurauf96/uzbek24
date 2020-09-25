<div class="big-post basic-flex" id="resAnons">
  @if (isset($anons))
    <div class="big-post__img">
      <img src="{{ Voyager::image($anons->image) }}" alt="Main Post">
    </div>
    <div class="big-post__content">
      <a class="big-post__title" href="/post/{{ $anons->id }}">
        {{ $anons->translate(\App::getLocale())->title }}
      </a>
      <br>
      {{-- <h4 class="big-post__subtitle">{{ $anons->translate(\App::getLocale())->excerpt }}</h4> --}}
      <p class="big-post__description">{{ $anons->translate(\App::getLocale())->excerpt }}
      </p>
      
    </div>
    @endif
</div>
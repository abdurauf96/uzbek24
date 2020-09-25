@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="/css/tiny-slider.css">
@endsection

@isset($ad)
@section('ad')
<a href="#"><img src=" {{ Voyager::image($ad->image_top) }}" alt="ads"></a>
@endsection
@endisset

@section('content')
@include('sections.header')
<main class="article">
    <div class="container">
      <div class="basic-flex main-wrapper">
        <button type="button" class="btn btn-menu">
          <span class="hamburger"></span>
        </button>
        @include('layouts.menu_sidebar')
        <section class="article-block middle-section">
          @include('sections.info')
          <div class="article-post">
            <div class="article__img">
              <img src="{{ Voyager::image($post->image) }}" alt="Article">
            </div>
            <div class="article__content">
              <h3 class="article__title">{{ $post->translate(\App::getLocale())->title }}</h3>
             
              <p class="article__description">
                {!! $post->translate(\App::getLocale())->body !!}
              </p>  
            </div>
          </div>
          <div class="related-posts basic-flex">
            @foreach ($related as $item)
              @if($item->translate(\App::getLocale())->title!='')
              <a href="/post/{{ $item->id }}" class="related-posts__item">
                  <img src="{{ Voyager::image($item->thumbnail('medium')) }}" alt="related-post">
                  <h5>{{ $item->translate(\App::getLocale())->title }}</h5>
              </a>
              @endif
            @endforeach 
            
          </div>
          @include('sections.app')
        </section>
       @include('layouts.latest_posts_sidebar')
      </div>
    </div>
  </main>
@endsection

@section('scripts')
<script src="/js/tiny-slider.js"></script>
<script>
  const slider = tns({
    container: '.related-posts',
    items: 1,
    autoHeight: true,
    responsive: {
      768: {
        items: 2
      },
      450: {
        items: 1,
        gutter: 0
      }
    }
  });
</script>
@endsection
  
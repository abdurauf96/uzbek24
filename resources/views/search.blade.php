@extends('layouts.index')

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
          <div class="most-viewed" >
            <h3 class="most-viewed__title">@lang('messages.result') {{ count($posts) }}</h3>
              @foreach ($posts as $post)
              <a class="most-viewed__post basic-flex" href="/post/{{ $post->id }}">
                <div class="most-viewed-img">
                  <img src="{{ Voyager::image($post->thumbnail('medium')) }}" alt="Post">
                </div>
                <div class="post__content">
                  <h4 class="post__title">{{ $post->translate(\App::getLocale())->title }}</h4>
                  <p class="post__description">{{ $post->translate(\App::getLocale())->excerpt }}</p>
                  <div class="post__date basic-flex">
                    <span class="post-date-time">{{ $post->created_at->format('H:i') }}</span>
                    <span class="post-date-day">{{ $post->created_at->format(' d.m.Y') }}</span>
                  </div>
                </div>
              </a>
              @endforeach
          </div>
          @include('sections.app')
        </section>
        @include('layouts.latest_posts_sidebar')
      </div>
    </div>
  </main>
@endsection
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
            
            <div class="article__content">
              <h3 class="article__title">{{ $page->translate(\App::getLocale())->title }}</h3>
             
              <p class="article__description">
                {!! $page->translate(\App::getLocale())->body !!}
              </p>  
            </div>
          </div>
         
          @include('sections.app')
        </section>
       @include('layouts.latest_posts_sidebar')
      </div>
    </div>
  </main>
@endsection
@extends('layouts.index')

@isset($ad)
@section('ad')
<a href="#"><img src=" {{ Voyager::image($ad->image_top) }}" alt="ads"></a>
@endsection
@endisset

@section('content')
@include('sections.header')
<main>
    <div class="container">
      <div class="basic-flex main-wrapper">
        <button type="button" class="btn btn-menu">
          <span class="hamburger"></span>
        </button>
        @include('layouts.menu_sidebar')
        <section class="middle-section">
          
          @include('sections.info')
          @include('sections.anons')
          @include('sections.latest_posts_mobile')
          @include('sections.top_posts')
          @include('sections.app')
 
        </section>
        
        @include('layouts.latest_posts_sidebar')
      </div>
      @include('sections.latest_posts')
    </div>
  </main>


@endsection
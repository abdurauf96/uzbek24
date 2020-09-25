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
          <div class="form__wrapper">
            @if(Session::has('flash'))
            <div class="alert">
              <p>{{ Session::get('flash') }}</p>
            </div>
            @endif
            @if(Session::has('error_msg'))
            <div class="danger">
              <p>{{ Session::get('error_msg') }}</p>
            </div>
            @endif
            <form method="POST" class="contact-form" action="/contact" enctype="multipart/form-data">
                {{ csrf_field() }}
              <h2 class="contact-form__title">@lang('messages.write')</h2>
              <div class="text-form-wrapper basic-flex">
                <div class="basic-details">
                  <label>
                    <input type="text" placeholder="@lang('messages.name')" required name="name">
                  </label>
                  <label>
                    <input type="email"  placeholder="@lang('messages.email')" name="email" >
                  </label>
                  <label>
                    <input type="text" placeholder="@lang('messages.phone')" required name="phone">
                  </label>
                  <label>
                    <input type="text" placeholder="@lang('messages.thema')" name="theme">
                  </label>
                </div>
                <div class="texarea-wrapper">
                  <textarea class="contact-texarea" placeholder="@lang('messages.text')" name="text" required></textarea>
                </div>
              </div>
              <div class="more-details basic-flex">
                <div class="input-file-wrapper">
                  <input type="file" name="file" id="file" class="inputfile visually-hidden">
                  <label for="file" class="basic-flex">@lang('messages.upload')</label>
                </div>
                <div class="verification-code-wrapper basic-flex">
                  <label>
                    <input type="text" placeholder="@lang('messages.kod')" name="input_kod" required>
                  </label>
                  <input type="hidden" value="4zdw9"  name="kod">
                  <span class="verification-code">4 z d w 9</span>
                </div>
                <button type="submit" class="btn send-btn">@lang('messages.send')</button>
              </div>
            </form>
          </div>
        </section>
       @include('layouts.latest_posts_sidebar')
      </div>
    </div>
  </main>
@endsection
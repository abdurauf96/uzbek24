<h3 class="most-viewed__title">@lang('messages.faq')</h3>
    
    @foreach ($top_posts as $post)
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
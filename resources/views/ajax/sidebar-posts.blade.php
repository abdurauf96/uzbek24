
     
        <h3 class="latest-news__title">@lang('messages.latest')  </h3>
        @foreach ($posts as $post)
          <a href="/post/{{ $post->id }}" class="latest-news__item">
            <span class="lates-news__date">{{ $post->created_at->format('H:i') }} / @if(date('d')==$post->created_at->format('d')) @lang('messages.today') @else {{ $post->created_at->format(' d.m.Y') }} @endif</span>
            <h4 class="lates-news-item__title">{{ $post->translate(\App::getLocale())->title }}</h4>
          </a>
        @endforeach

      
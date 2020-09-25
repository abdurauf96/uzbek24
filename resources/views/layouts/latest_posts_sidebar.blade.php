<section class="latest-news">
    <div class="latest-news__wrapper" id="resultSidebarPost">
      <h3 class="latest-news__title">@lang('messages.latest')  </h3>
      @foreach ($posts as $post)
        <a href="/post/{{ $post->id }}" class="latest-news__item">
          <span class="lates-news__date">{{ $post->created_at->format('H:i') }} / @if(date('d')==$post->created_at->format('d')) @lang('messages.today') @else {{ $post->created_at->format(' d.m.Y') }} @endif&nbsp
          <i class="far fa-eye"></i> &nbsp{{ $post->view }} </span>
          <h4 class="lates-news-item__title">{{ $post->translate(\App::getLocale())->title }}</h4>
        </a>
      @endforeach
    </div>
    <div data-sticky-wrap=true class="small-ad" data-sticky-for="768" data-sticky data-sticky-class="mask--active">
      @isset($ad)
      <a href="#">
        <img src="{{ Voyager::image($ad->image_right) }}" alt="Ad">
      </a>
      @endisset
    </div>
   </section>
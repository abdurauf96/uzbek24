<section class="latest-news latest-news-mobile">
  <div class="latest-news__wrapper">
    <h3 class="latest-news__title">@lang('messages.latest')  </h3>
    @foreach ($latests_posts as $post)
      <a href="/post/{{ $post->id }}" class="latest-news__item">
        <span class="lates-news__date">{{ $post->created_at->format('H:i') }} / @if(date('d')==$post->created_at->format('d')) @lang('messages.today') @else {{ $post->created_at->format(' d.m.Y') }} @endif    &nbsp&nbsp
        <i class="far fa-eye"></i> &nbsp{{ $post->view }} </span>
        
        <h4 class="lates-news-item__title">{{ $post->translate(\App::getLocale())->title }}</h4>
      </a>
    @endforeach
  </div>
  <div data-sticky-wrap=true class="small-ad" data-sticky-for="768" data-sticky data-sticky-class="mask--active">
    <a href="#">
      <img src="/img/simple-ad.png" alt="Ad">
    </a>
  </div>
 </section>
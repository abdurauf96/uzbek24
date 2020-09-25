<section class="latest-news-section">
    <ul class="latest-news-list basic-flex" id="resultLatestPost">
      @foreach ($latest_posts as $post)
      <li class="basic-flex clearfix">
        <div class="itemImage">
          <a href="/post/{{ $post->id }}">
            <img src="{{ Voyager::image($post->thumbnail('medium')) }}" alt="Post">
          </a>
        </div>
        <div class="itemDatas">
          <div class="itemCat">
            <a href="/category/{{ $post->category->slug }}">{{ $post->category->translate(\App::getLocale())->name }}</a>
          </div>
          <div class="itemData">
            <span class="h-date">{{ $post->created_at->format('H:i') }} / @if(date('d')==$post->created_at->format('d')) @lang('messages.today') @else {{ $post->created_at->format(' d.m.Y') }} @endif
            </span>
            <span><i class="far fa-eye"></i> {{ $post->view }}</span>
          </div>
          <div class="itemTitle"><a href="/post/{{ $post->id }}">{{ $post->getTranslatedAttribute('title', \App::getLocale()) }}</a></div>
          <div class="itemText">{{ $post->getTranslatedAttribute('excerpt', \App::getLocale()) }}</div>
        </div>
      </li>
      @endforeach
    </ul>
    <a id="loadMore" href="#loadMore" class="load-more-latest-news loadMoreBtn more-load-link"  data-page="2" data-link="?page=" data-div="#resultLatestPost">@lang('messages.more') </a>
    {{ $latest_posts->links() }}
</section>
<div class="currencies basic-flex">
    <div class="currency">
      <span class="currency__name">USD</span>
      <span class="currency__amount currency__amount--increased">{{$json['0']['Rate']}}</span>
    </div>
    <div class="currency">
      <span class="currency__name">EUR</span>
      <span class="currency__amount currency__amount--increased">{{$json['1']['Rate']}}</span>
    </div>
    <div class="currency">
      <span class="currency__name">RUB</span>
      <span class="currency__amount currency__amount--decreased">{{$json['2']['Rate']}}</span>
    </div>
  </div>
  <div class="covid-box">
    <h2 class="covid__title">COVID-19</h2>
    <p class="covid__description">@lang('messages.lat-news') </p>
    <div class="covid-block basic-flex">
      <div class="stats__item basic-flex">
        <div class="stats__img"></div>
        <div class="stats-text-box">
          <h4>@lang('messages.infec')</h4>
          <p class="covid-infected"></p>
        </div>
      </div>
      <div class="stats__item basic-flex">
        <div class="stats__img"></div>
        <div class="stats-text-box">
          <h4>@lang('messages.vizd')</h4>
          <p class="covid-recovered"></p>
        </div>
      </div>
      <div class="stats__item basic-flex">
        <div class="stats__img"></div>
        <div class="stats-text-box">
          <h4>@lang('messages.died')</h4>
          <p class="covid-died"></p>
        </div>
      </div>
    </div>
  </div>
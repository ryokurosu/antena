@extends('layouts.app')
@include('layouts.defaultpart')

@section('title',$detail->title)
@section('description',$detail->description)
@section('image',$detail->imagePath())
@section('breadcrumbs')
{{ Breadcrumbs::render('page',$detail) }}
@stop



@section('content')

<div class="panel panel-default" itemscope itemtype="http://schema.org/Article">
  <div class="panel-heading"><h1 itemprop="name">{{$detail->title}}</h1></div>
  <meta itemprop="datePublished" content="{{$detail->created_at->format('Y/m/d')}}">
  <meta itemprop="dateModified" content="{{$detail->updated_at->format('Y-m-d')}}">
  <div class="panel-body">
    <div class="thumbnail-wrap">
      <img src="{{$detail->imagePath()}}" alt="{{$detail->title}}" itemprop="image">
    </div>
    <span class="cat-domain" itemprop="author">
        @php
        echo parse_url($detail->url, PHP_URL_HOST);
        @endphp
      </span>
    <span itemprop="publisher" itemscope="itemscope" itemtype='https://schema.org/Organization'>
      <meta itemprop="url" content="{{config('app.url')}}">
      <meta itemprop="name" content="{{config('app.name')}}">
      <span itemprop='logo' itemscope='itemscope' itemtype='https://schema.org/ImageObject'>
        <meta itemprop='url' content="{{url('/logo24.png')}}">
      </span>
    </span>
    <div class="block">
      <p>
        <a href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">[PR]【最新版】病院にいる9割の医者が知らないアトピー完治のコツを公開！？</a>
      </p>
      <p>
        <a target="_blank" href="https://www.amazon.co.jp/b?_encoding=UTF8&tag=matome07f-22&linkCode=ur2&linkId=2eab754447a4631cc40220ba5e4bc5b3&camp=247&creative=1211&node=466282">【PR】今、TwitterやFacebookでみんなが読んでるビジネス書籍</a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=matome07f-22&l=ur2&o=9" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
      </p>
    </div>
    <div class="meta-wrap" itemprop="headline">
      <p>{{$detail->description}}</p>
    </div>
    <div class="link-wrap">
      <p class="text-center">スポンサーリンク</p>
      <div class="text-center">
        @yield('link-ad')
      </div>
      <p>
        <a href="https://koikatsu.mykoi.jp/" rel="nofollow" target="_blank">[PR][無料]恋愛や婚活に悩める女性がいい出会いを得るために今すぐ見るべきサイトはこちら</a>
      </p>
      <p>
        <a href="https://kaso-trade.com/" rel="nofollow" target="_blank">[PR][無料]仮想通貨って結局稼げるの！？初心者が仮想通貨投資で利益を出す方法まとめ</a>
      </p>
      <p>
        <a href="http://daigakuzyuken-pro.com/" rel="nofollow" target="_blank">[PR]あの「受験の神様」も使っている勉強法を難関大学合格者が毎週更新中</a>
      </p>
    </div>
    <div class="block text-center">
      <script type="text/javascript">var a8='a17022183659_2TCG6P_ES9MOI_249K_BUB81';var rankParam='yH-IFKjwrem0z_GDFK-8l2mCo2dJjBqDAf-7Flj0E2GFE_lBW7iJXch2kHW0rBqDAf-7Flj0E2GFE_lBW7lYCcyxx';var trackingParam='bTDnieXAvfLTnHw-iB5-iHLHv7NV3BNer_EWrQhxx';var bannerType='0';var bannerKind='item.fix.kind7';var frame='1';var ranking='1';var category='本';</script><script type="text/javascript" src="//amz-ad.a8.net/amazon/amazon_ranking.js"></script>
    </div>
    <div id="tweet-list">
      <ul class="list-group noback">
        <li class="list-group-item">
          <p><a href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">{{'@kei'}}</a></p>
          <p>このサイト参考にしたら、アトピーが治りました。今まで夜は痒くて痒くて仕方なかったりしたのに助かった。。。<a style="text-decoration: underline;" href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">http://bit.ly/2qB2KIe</p>
          </li>
          <li class="list-group-item">
            <p><a href="https://xn--wdk7ak.com/subaru/" rel="nofollow" target="_blank">{{'@salesman'}}</a></p>
            <p>営業力ないと生きていけないって知ってた？<a style="text-decoration: underline;" href="https://xn--wdk7ak.com/subaru/" rel="nofollow" target="_blank">https://xn--wdk7ak.com/subaru/</p>
            </li>
            <li class="list-group-item">
              <p><a href="https://masakuraudo2.com/archives/2051" rel="nofollow" target="_blank">{{'@mama_nerse'}}</a></p>
              <p><a style="text-decoration: underline;" href="https://masakuraudo2.com/archives/2051" rel="nofollow" target="_blank">看護師・介護士のセクハラ被害の実態...</a></p>
            </li>
            <p class="text-center">この記事に対するTwitterでの反応</p>
            @foreach($twitters as $tweet)
            <li class="list-group-item">
              <p>{{'@'}}{{$tweet->user_id}}</p>
              <p>{{$tweet->text}}</p>
              <span class="time">{{$tweet->updated_at->format('Y/n/j H:i:s')}}</span>
            </li>
            @endforeach
          </ul>
        </div>

        <div class="meta-wrap block">
          <p><center><a href="{{$detail->url}}" class="btn btn-primary" rel="nofollow" target="_blank">記事を読む</a></center></p>
        </div>

      </div>
    </div>
    @endsection

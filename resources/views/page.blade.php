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
        <a target="_blank" href="https://www.amazon.co.jp/b?_encoding=UTF8&tag=matome07f-22&linkCode=ur2&linkId=2eab754447a4631cc40220ba5e4bc5b3&camp=247&creative=1211&node=466282">【PR】今、TwitterやFacebookでみんなが読んでるビジネス書籍</a>
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
          </ul>
        </div>
        <div class="block text-center">
          <script type="text/javascript">var a8='a17022183659_2TCG6P_ES9MOI_249K_BUB81';var rankParam='9w6v_OBAZ5yqYtuU_O6P04yHm4I.B38U216-_0BqQ4u_Qt0OHW03HWpuHU_U2w6PoOBq6OgaXwgP_Sy3q-0OK-p9e-0zx';var trackingParam='XNaI2BzF6lZNI8Pp2O3p28Z864nyROnB9weo95Yxx';var bannerType='0';var bannerKind='item.fix.kind7';var frame='1';var ranking='1';var category='食品＆飲料';</script><script type="text/javascript" src="//amz-ad.a8.net/amazon/amazon_ranking.js"></script>
        </div>
        <div class="meta-wrap block">
          <p><center><a href="{{$detail->url}}" class="btn btn-primary" rel="nofollow" target="_blank">記事を読む</a></center></p>
        </div>

      </div>
    </div>
    @endsection

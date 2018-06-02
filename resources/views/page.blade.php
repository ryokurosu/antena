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
    <div class="text-center">
      @yield('link-ad')
    </div>
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
    </div>
    <div class="meta-wrap" itemprop="headline">
      <p>{{$detail->description}}</p>
    </div>
    <div class="link-wrap">
      <p class="text-center">スポンサーリンク</p>
      <div class="text-center">
        @yield('page-ad')
      </div>
    </div>
    <div class="block text-center">
     <script type="text/javascript">var a8='a17022183659_2TCFED_6W9V4I_2HOM_BUB81';var rankParam='YU_20rufc.zNOqo0cCz79Rz84.z8a6aF0WHcJ6ufaCvcnEYxx';var bannerType='1';var bannerKind='item.variable.kind2';var vertical='5';var horizontal='1';var alignment='0';var frame='0';var ranking='1';var category='性別年代';</script><script type="text/javascript" src="//rws.a8.net/rakuten/ranking.js"></script>
   </div>
   <div id="tweet-list">
    <hr>
    <p><a href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">このサイト参考にしたら、アトピーが治りました。今まで夜は痒くて痒くて仕方なかったりしたのに助かった。。。</a></p>
    <hr>
    <p><a href="https://xn--wdk7ak.com/subaru/" rel="nofollow" target="_blank">営業力ないと生きていけないって知ってた？</a></p>
    <hr>
    @foreach(\App\Article::popular()->take(10)->get() as $article)
    @if($loop->iteration == 1)
    <p><a href="https://lim-jp.com/archives/449" rel="nofollow">【悲報】ローラ、ガチ乳首ポロリ動画をインスタグラムにアップしてしまう...</a></p>
    <hr>
    @elseif($loop->iteration == 4)
    <p><a href="https://masakuraudo2.com/archives/2051" rel="nofollow">看護師・介護士のセクハラ被害の実態...。実際に体を触られた例も...</a></p>
    <hr>
    @endif
    <p><a href="{{$article->path()}}" >{{$article->title}}</a></p>
    <hr>
    @endforeach
  </div>
  <div class="block text-center">
    <script type="text/javascript">rakuten_affiliateId="0ea62065.34400275.0ea62066.204f04c0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_recommend="on";rakuten_design="slide";rakuten_size="300x160";rakuten_target="_blank";rakuten_border="on";rakuten_auto_mode="on";rakuten_adNetworkId="a8Net";rakuten_adNetworkUrl="https%3A%2F%2Frpx.a8.net%2Fsvt%2Fejp%3Fa8mat%3D2TCFED%2B6W9V4I%2B2HOM%2BBS629%26rakuten%3Dy%26a8ejpredirect%3D";rakuten_pointbackId="a17022183659_2TCFED_6W9V4I_2HOM_BS629";rakuten_mediaId="20011816";</script><script type="text/javascript" src="//xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js"></script>
    <img border="0" width="1" height="1" src="https://www15.a8.net/0.gif?a8mat=2TCFED+6W9V4I+2HOM+BS629" alt="">
  </div>
  <div id="tweet-list">
    <hr>
    @foreach(\App\Article::latest()->take(10)->get() as $article)
    <p><a href="{{$article->path()}}" >{{$article->title}}</a></p>
    <hr>
    @endforeach
  </div>
  <div class="meta-wrap block">
    <p><center><a href="{{$detail->url}}" class="btn btn-primary" rel="nofollow" target="_blank">記事を読む</a></center></p>
  </div>

</div>
</div>
@endsection

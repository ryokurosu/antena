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
   <div id="tweet-list">
    <hr>
    <p><a href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">このサイト参考にしたら、アトピーが治りました。今まで夜は痒くて痒くて仕方なかったりしたのに助かった。。。</a></p>
    <hr>
    <p><a href="https://xn--wdk7ak.com/subaru/" rel="nofollow" target="_blank">営業力ないと生きていけないって知ってた？</a></p>
    <hr>
    @foreach(\App\Article::popular()->take(10)->get() as $article)
    @if($loop->iteration == 1)
    <p><a href="https://qume.life/archives/449" rel="nofollow">【悲報】ローラ、ガチ乳首ポロリ動画をインスタグラムにアップしてしまう...</a></p>
    <hr>
    @elseif($loop->iteration == 4)
    <p><a href="https://masakuraudo2.com/archives/2051" rel="nofollow">看護師・介護士のセクハラ被害の実態...。実際に体を触られた例も...</a></p>
    <hr>
    @endif
    <p><a href="{{$article->path()}}" >{{$article->title}}</a></p>
    <hr>
    @endforeach
  </div>
  <div class="link-wrap">
      <p class="text-center">スポンサーリンク</p>
      <div class="text-center">
        @yield('link-ad')
      </div>
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

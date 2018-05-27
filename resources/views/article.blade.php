@extends('layouts.app')
@include('layouts.defaultpart')

@section('breadcrumbs')
{{ Breadcrumbs::render('home') }}
@stop
@section('amp'){{url('/index.amp')}}@stop

@isset($detail)
@section('title',$detail->title)
@section('description',$detail->description)
@section('image',$detail->imagePath())
@section('breadcrumbs')
{{ Breadcrumbs::render('list',$detail) }}
@overwrite
@section('amp'){{url()->current().'.amp'}}@overwrite
@endisset

@isset($word)
@section('title',$word->text.'に関する記事一覧')
@section('description',$word->text.'に関する記事一覧')
@section('breadcrumbs')
{{ Breadcrumbs::render('word',$word) }}
@overwrite
@section('amp'){{url()->current().'.amp'}}@overwrite
@endisset

@section('content')
<div class="panel panel-default">
  @if(isset($detail) || isset($word))
  <div class="panel-heading"><h1 class="small">@yield('title')</h1></div>
  @endif
  <ul class="list-group">
    @foreach($articles as $article)
    <li class="list-group-item" itemscope itemtype="http://schema.org/Article">
        <div class="col-xs-3 thumbnail">
          <a href="{{$article->path()}}">
            <img src="{{$article->thumbnailPath()}}" alt="{{$article->title}}" itemprop="image">
          </a>
        </div>
        <div class="col-xs-9 title">
          <a href="{{$article->path()}}" itemprop="name">
           {{$article->title}}
         </a>
         <p class="text-muted description" itemprop="headline">
          @php
          echo mb_strimwidth($article->description, 0, 120, '', 'utf8');
          @endphp
        </p>
      </div>
      <div class="clear"></div>
      <div class="col-xs-12 cat">
        <span itemprop="publisher" itemscope="itemscope" itemtype='https://schema.org/Organization'>
          <meta itemprop="url" content="{{config('app.url')}}">
          <meta itemprop="name" content="{{config('app.name')}}">
          <span itemprop='logo' itemscope='itemscope' itemtype='https://schema.org/ImageObject'>
            <meta itemprop='url' content="{{url('/logo24.png')}}">
          </span>
        </span>
        <span class="cat-item">
          {{$article->word->text}}
        </span>
        <meta itemprop="datePublished" content="{{$article->updated_at->format('Y/m/d')}}">
        <span class="cat-domain" itemprop="author">
          @php
          echo parse_url($article->url, PHP_URL_HOST);
          @endphp
        </span>
        <a href="{{$article->path()}}" class="link-btn">サイトへ</a>
      </div>
      <span class="view">{{$article->view}} view</span>
  </li>
  @endforeach
</ul>
</div>
{{$articles->links()}}
@endsection

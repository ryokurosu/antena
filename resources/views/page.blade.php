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
  <div class="panel-body">
    <div class="thumbnail-wrap">
      <img src="{{$detail->imagePath()}}" alt="{{$detail->title}}" itemprop="image">
    </div>
    <div class="block">
      <span class="cat-item" itemprop="publisher">{{$detail->word->text}}</span>
      <span class="cat-domain" itemprop="datePublished">作成：{{$detail->created_at->format("y/m/d")}}</span> 
      <span class="cat-domain" itemprop="dateModified">更新：{{$detail->updated_at->format("y/m/d")}}</span>
      <span class="cat-domain" itemprop="author">{{parse_url($detail->url, PHP_URL_HOST)}}</span>
    </div>
    <div class="block">
      <p>
        <a href="http://bit.ly/2qB2KIe" rel="nofollow" target="_blank">[PR]【最新版】病院にいる9割の医者が知らないアトピー完治のコツを公開！？</a>
      </p>
      <p>
        <a href="https://uranai-cafe.jp/animal/" rel="nofollow" target="_blank">[PR]動物キャラ占い(無料)で、あなたの性格・恋愛傾向・毎日の運勢・今後の人生の運気がわかります。</a>
      </p>
    </div>
    <div class="meta-wrap" itemname="headline">
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
              <p><a style="text-decoration: underline;" href="https://masakuraudo2.com/archives/2051" rel="nofollow" target="_blank">看護師・介護士のセクハラ被害の実態...</p>
              </li>
              @foreach($twitters as $tweet)
              <li class="list-group-item">
                <p><a href="{{$tweet->userLink()}}" rel="nofollow" target="_blank">{{'@'}}{{$tweet->user_id}}</a></p>
                <p>{{$tweet->text}}</p>
                <span class="time"><a href="{{$tweet->tweetLink()}}" rel="nofollow" target="_blank">{{$tweet->updated_at->format('Y/n/j H:i:s')}}</a></span>
              </li>
              @endforeach
            </ul>
          </div>

          <ul class="list-group noback">
            @foreach($articles as $article)
            @if($loop->iteration == 1)
            <li class="list-group-item">
              <div class="col-xs-3 thumbnail">
                <a href="https://lim-jp.com/archives/449">
                  <img src="{{url('/uydagfea.jpg')}}" alt="【悲報】ローラ、ガチ乳首ポロリ動画をインスタグラムにアップしてしまう...">
                </a>
              </div>
              <div class="col-xs-9 title">
                <a href="https://lim-jp.com/archives/449">
                 【悲報】ローラ、ガチ乳首ポロリ動画をインスタグラムにアップしてしまう...
               </a>
               <p class="text-muted description">
                @php
                echo mb_strimwidth("ローラのインスタグラムは「写真が素敵」「服が可愛い」と何かと話題です。最近でもニュースになった「バギー」や「ジム」の画像から、ローラの写真加工に関する情報もまとめてみました。", 0, 120, '', 'utf8');
                @endphp
              </p>
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 cat">
              <span class="cat-item">
                芸能
              </span>
              <span class="cat-domain">
                @php
                echo parse_url("https://lim-jp.com/archives/449", PHP_URL_HOST);
                @endphp
              </span>
              <a href="https://lim-jp.com/archives/449" class="link-btn">サイトへ</a>
            </div>
            <span class="view">{{$article->view * 2 + 32}} view</span>
          </li>
          @elseif($loop->iteration == 4)
          <li class="list-group-item">
            <div class="col-xs-3 thumbnail">
              <a href="https://masakuraudo2.com/archives/2051">
                <img src="{{url('/ufahefiah.jpg')}}" alt="看護師・介護士のセクハラ被害の実態...。実際に体を触られた例も...">
              </a>
            </div>
            <div class="col-xs-9 title">
              <a href="https://masakuraudo2.com/archives/2051">
               看護師・介護士のセクハラ被害の実態...。実際に体を触られた例も...
             </a>
             <p class="text-muted description">
              @php
              echo mb_strimwidth("私も急に抱きつかれたことがあって。しかも夜中だったからめっちゃ怖かったです。。手のひらにキスされたのはほんと嫌でした。速攻手指消毒しました", 0, 120, '', 'utf8');
              @endphp
            </a>
          </div>
          <div class="clear"></div>
          <div class="col-xs-12 cat">
            <span class="cat-item">
              医療
            </span>
            <span class="cat-domain">
              @php
              echo parse_url("https://masakuraudo2.com/archives/2051", PHP_URL_HOST);
              @endphp
            </span>
            <a href="https://masakuraudo2.com/archives/2051" class="link-btn">サイトへ</a>
          </div>
          <span class="view">{{$article->view}} view</span>
        </li>
        @endif
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
         <span class="cat-item" itemname="publisher">
            {{$article->word->text}}
          </span>
          <span class="cat-domain" itemprop="datePublished">
           {{$article->created_at->format("Y/m/d")}}
         </span>
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

  <div class="meta-wrap block">
    <p><center><a href="{{$detail->url}}" class="btn btn-primary" rel="nofollow" target="_blank">記事を読む</a></center></p>
  </div>

</div>
</div>
@endsection

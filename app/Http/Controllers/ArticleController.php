<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Twitter;
use App\Word;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id = null)
    {
        $parse_url = $this->parseUrl($request->url());
        $is_amp = $this->isAmp($parse_url);
        // canonical設定用URL
        $canonical_url = $this->getCanonicalUrl($request->url());


        $articles = Article::latest()->with('word')->paginate(12);
        if($id){
            $detail = Article::findOrFail($id);
            $ret = [
               'canonical_url' => $canonical_url,
               'articles' => $articles,
               'detail' => $detail,
           ];
           if($is_amp) {
              return view('amp.article',$ret);
          } else {
             return view('article',$ret);
         }
     }else{
        $ret = [
           'canonical_url' => $canonical_url,
           'articles' => $articles,
       ];
       if($is_amp) {
          return view('amp.article',$ret);
      } else {
         return view('article',$ret);
     }
 }
}

public function page(Request $request,$id){
    $parse_url = $this->parseUrl($request->url());
    $is_amp = $this->isAmp($parse_url);
        // canonical設定用URL
    $canonical_url = $this->getCanonicalUrl($request->url());



    $article = Article::findOrFail($id);
    $article->increment('view',rand(1,3));

    $ret = [
        'canonical_url' => $canonical_url,
        'detail' => $article,
    ];
    if($is_amp) {
        return view('amp.page',$ret);
    } else {
     return view('page',$ret);
 }
}

public function word(Request $request,$id){
    $parse_url = $this->parseUrl($request->url());
    $is_amp = $this->isAmp($parse_url);
        // canonical設定用URL
    $canonical_url = $this->getCanonicalUrl($request->url());

    $word = Word::findOrFail($id);
    $articles = Article::where('word_id',$id)->latest()->with('word')->paginate(12);
    $ret = [
        'canonical_url' => $canonical_url,
        'articles' => $articles,
        'word' => $word
    ];
    if($is_amp) {
        return view('amp.article',$ret);
    } else {
     return view('article',$ret);
 }
}
private function parseUrl($url) {
    return parse_url($url);
}
private function isAmp($parse_url) {

    if(isset($parse_url['path']) && strpos($parse_url['path'],'.amp') !== false){
      return true;
  } else {
      return false;
  }
}
private function getCanonicalUrl($url) {
    if(strpos($url,'.amp') !== false){
      return str_replace('.amp', '', $url);
  } else {
      return sprintf('%s.amp', $url);
  }
}

}

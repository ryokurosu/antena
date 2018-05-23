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
    public function index($id = null)
    {
        $articles = Article::latest()->with('word')->paginate(12);
        if($id){
            $detail = Article::findOrFail($id);
            return view('article',[
                'articles' => $articles,
                'detail' => $detail,
            ]);

        }else{
            return view('article',[
                'articles' => $articles
            ]);
        }
    }

    public function page($id){
     $article = Article::findOrFail($id);
     $article->increment('view',rand(1,3));
     $twitters = Twitter::where('article_id',$id)->take(10)->cursor();
     $articles = Article::where('word_id',$article->word->id)->take(10)->cursor();
     return view('page',[
        'detail' => $article,
        'articles' => $articles,
        'twitters' => $twitters
    ]);
 }

 public function word($id){
    $word = Word::findOrFail($id);
    $articles = Article::where('word_id',$id)->latest()->with('word')->paginate(12);
    return view('article',[
        'articles' => $articles,
        'word' => $word
    ]);
}
}

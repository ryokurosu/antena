<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\ImageManagerStatic as Image;
use App\Word;
use App\Reader;
use App\Article;
use Exception;
use Goutte\Client;

class AddArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:article';

    private $count;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add articles from reader url';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $time_start = microtime(true);
      $this->count = 0;

      $readers = Reader::inRandomOrder()->get();
      $words = Word::inRandomOrder()->get();
      $one_week = date('Y-m-d', strtotime("-7 day"));

      foreach ($readers as $reader) {
        $time = microtime(true) - $time_start;
        $time = number_format($time,2);
        if(!set_time_limit(30) || $time > 10000){
          break;
        }
        try {
          $client = new Client();
          $sitemap = $client->request('GET', $reader->url);
          $sitemap->filter('item')->each(function($node) use ($words,$one_week) {
            $title = $node->filter('title')->text();
            $url = $node->filter('link')->text();
            if(!Article::whereDate('created_at','<',$one_week)->where('url',$url)->first()){
              foreach($words as $w){
                if(strpos($title,$w->text) !== false){
                //'abcd'のなかに'bc'が含まれている場合
                  $this->setArticle($url,$title,$w);
                  break;
                }
              }
            }
            sleep(15);


          });
        } catch (Exception $e) {
          echo $e->getMessage();
          // $reader->delete();
          // try{
          //   \Artisan::call('delete:reader',['rss' => $reader->url]);
          // }catch(Exception $e){

          // }
          postToDiscord($e);
          continue;
        }
      }

      $time = microtime(true) - $time_start;
      $time = number_format($time,2);
      $count = $this->count;
      noticeDiscord("Add {$count} articles. {$time} s");

    }
    public function setArticle($url,$title,$word){


      $article = Article::where('url',$url)->first();
      if($article){
        $description = $article->description;
        if($article->thumbnail != 'noimage.jpg' && $description != ''){
          return false;
        }
      }else{
        $article = new Article;
        $imageName = 'noimage.jpg';
        $description = '';
      }

      $client = new Client();
      $crawler = $client->request('GET', $url);
      $imageUrl = '';

      try{
       $crawler->filter('meta')->each(function($node) use (&$imageUrl,&$description){
        if($node->attr('property') =='og:image'){
         $imageUrl =  $node->attr('content');
       }
       if($node->attr('property') =='og:description'){
         $description =  $node->attr('content');
       }
     });

       if($description == ""){
        $description = "この記事には説明文はありません。";
      }

      $imageUrl = strtok($imageUrl, '?');
      $image = Image::make(file_get_contents($imageUrl));
      $temp = explode('.',$imageUrl);
      $extension = $temp[count($temp) - 1];

      $image->resize(750, null, function ($constraint) {
        $constraint->aspectRatio();
      });

      $imageName = makeRandStr(8).'.'.$extension;
      $image->save(public_path('images/'.$imageName));

      $image->resize(120, null, function ($constraint) {
        $constraint->aspectRatio();
      });

      $image->save(public_path('thumbnail/'.$imageName));

    }catch(Exception $e){
      echo $e->getLine().":".$e->getMessage()."\n";
      $imageName = 'noimage.jpg';
    }

    $description = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S', '', $description);

    $article->fill([
      'word_id' => $word->id,
      'url' => $url,
      'title' => $title,
      'description' => $description,
      'thumbnail' => $imageName,
    ])->save();
   
    if($article->id % 3000 == 0){
      \Artisan::call('ping');
    }
    $this->count++;

  }
}

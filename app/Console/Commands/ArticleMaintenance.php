<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\ImageManagerStatic as Image;
use App\Word;
use App\Reader;
use App\Article;
use Exception;
use Goutte\Client;

class ArticleMaintenance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:maintenance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $one_month = date('Y-m-d', strtotime("-2 month"));
        $articles = Article::whereDate('updated_at','<',$one_month)->where('view','<',1000)->get();
        foreach($articles as $article){
            foreach($article->twitters as $tweet){
                $tweet->delete();
            }
            $article->delete();
        }
      //   foreach(Article::cursor() as $a){
      //       $thumbnail = $a->thumbnail;
      //       if(\File::exists(public_path('images/'.$thumbnail))){
      //           // echo "true";
      //       }else{
      //         $a->fill(['thumbnail' => 'noimage.jpg'])->save();
      //         // echo "|";
      //     }
      // }
  }
}

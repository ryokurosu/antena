<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddAccessTicker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:access';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add access command';

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
        $count = 0;
        \App\Article::orderBy('updated_at','desc')->take(2000)->chunk(500,function($articles) use (&$count){
            foreach($articles as $v){
                $v->increment('view');
                $count++;
            }
        });
        $time = microtime(true) - $time_start;
        $time = number_format($time,2);
        noticeDiscord("Ticker {$count} articles. {$time} s");
    }
}

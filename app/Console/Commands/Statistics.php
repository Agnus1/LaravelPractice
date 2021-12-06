<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\StatisticsCollectorContract;

class Statistics extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'shows statistics of your application';

    private $collector;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(StatisticsCollectorContract $collector)
    {
        parent::__construct();
        $this->collector = $collector;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = $this->collector->collectData();
        
        $this->table(
            ['Количество машин', 'Количество статей', 'Самый часто используемый тег', 'Среднее количество новостей у тега'], 
            [[$data['carsCount'], $data['articlesCount'], $data['mostUsefulTag']->name, $data['averageCountOfTags']]]
        );

        $longestArticle = $data['longestArticle'];
        $shortesArticle = $data['shortesArticle'];
        $mostTagedArticle = $data['mostTagedArticle'];
        $this->table(
            ['','id новоси', 'Название', 'Длина новости'],
            [
                [
                    'Самая длинная новость',
                    $longestArticle->id,
                    $longestArticle->title,
                    \Str::of($longestArticle->body)->length()
                ],
                [
                    'Самая короткая новость',
                    $shortesArticle->id,
                    $shortesArticle->title,
                    \Str::of($shortesArticle->body)->length()
                ],
                [
                    'Самая тегированная новость',
                    $mostTagedArticle->id,
                    $mostTagedArticle->title,
                    \Str::of($mostTagedArticle->body)->length(),
                ]
            ]
        );


        return Command::SUCCESS;
    }
}

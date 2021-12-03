<?php

namespace App\Services;

use App\Repositories\CarsRepositoryContract;
use App\Repositories\ArticlesRepositoryContract;
use App\Repositories\TagsRepositoryContract;

class StatisticsCollector implements StatisticsCollectorContract
{
    private $carsRepository;
    private $tagsRepository;
    private $articlesRepository;

    public function __construct(CarsRepositoryContract $carsRepository, 
                                TagsRepositoryContract $tagsRepository,
                                ArticlesRepositoryContract $articlesRepository)
    {
        $this->carsRepository = $carsRepository;
        $this->tagsRepository = $tagsRepository;
        $this->articlesRepository = $articlesRepository;
    }

    public function collectData() : array
    {
        $data = array(
            'carsCount' => $this->carsRepository->getCount(),
            'articlesCount' => $this->articlesRepository->getCount(),
            'mostUsefulTag' => $this->tagsRepository->getMostUsefulTag(),
            'longestArticle' => $this->articlesRepository->getOrderByBody(),
            'shortesArticle' => $this->articlesRepository->getOrderByBody('asc'),
            'averageCountOfTags' => $this->tagsRepository->getAverageArticlesCount(),
            'mostTagedArticle' => $this->articlesRepository->getMostTaged(),
        );
        return $data;
    }


}
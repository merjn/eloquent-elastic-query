<?php


namespace App\Elastic;


use App\Elastic\Contracts\EloquentModelVisitorFactoryInterface;
use Illuminate\Support\ServiceProvider;

class ElasticServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(EloquentModelVisitorFactoryInterface::class, EloquentModelVisitorFactory::class);
    }
}

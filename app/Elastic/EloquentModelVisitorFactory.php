<?php


namespace App\Elastic;


use App\Elastic\Contracts\EloquentModelVisitorFactoryInterface;
use App\Elastic\Contracts\EloquentModelVisitorInterface;
use App\Elastic\ModelVisitors\CreateElasticPostQueryVisitor;
use Illuminate\Contracts\Foundation\Application;

class EloquentModelVisitorFactory implements EloquentModelVisitorFactoryInterface
{
    public function __construct(
        private Application $application
    ) { }

    public function createVisitor(string $option): EloquentModelVisitorInterface
    {
        return match($option) {
            ElasticQueryOption::CREATE => $this->application->make(CreateElasticPostQueryVisitor::class),
        };
    }
}

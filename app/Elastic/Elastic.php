<?php


namespace App\Elastic;


use App\Elastic\Services\EloquentModelSerializerService;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Elastic
{
    public function __construct(
        private EloquentModel $model,
        private EloquentModelSerializerService $eloquentModelParser
    ) { }

    public function toCreateQuery(): array
    {
        return $this->eloquentModelParser->serialize(ElasticQueryOption::CREATE, $this->model);
    }
}

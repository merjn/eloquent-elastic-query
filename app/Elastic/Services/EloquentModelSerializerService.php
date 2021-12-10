<?php


namespace App\Elastic\Services;


use App\Elastic\Contracts\EloquentModelVisitorFactoryInterface;
use App\Elastic\Contracts\Visitable;
use App\Elastic\Contracts\WithQuery;
use App\Elastic\EloquentModelParser;
use App\Elastic\EloquentModelVisitorFactory;
use Illuminate\Database\Eloquent\Model;
use RuntimeException;

class EloquentModelSerializerService
{
    /**
     * EloquentModelSerializerService constructor.
     * @param EloquentModelParser $eloquentModelParser
     * @param EloquentModelVisitorFactory $eloquentModelVisitorFactory
     */
    public function __construct(
        private EloquentModelParser $eloquentModelParser,
        private EloquentModelVisitorFactoryInterface $eloquentModelVisitorFactory,
    ) { }

    public function serialize(string $serializationOption, Model $model): array
    {
        $token = $this->eloquentModelParser->parse($model);
        $visitor = $this->eloquentModelVisitorFactory->createVisitor($serializationOption);
        if (!$visitor instanceof WithQuery) {
            throw new RuntimeException("Visitor does not implement the WithQuery interface");
        }

        $token->accept($visitor);

        return $visitor->getQuery();
    }
}

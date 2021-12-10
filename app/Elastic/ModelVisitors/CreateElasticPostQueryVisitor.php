<?php


namespace App\Elastic\ModelVisitors;


use App\Elastic\Contracts\EloquentModelVisitorInterface;
use App\Elastic\Contracts\Visitable;
use App\Elastic\Contracts\WithQuery;
use App\Elastic\Token\Attribute;
use App\Elastic\Token\ModelRoot;

class CreateElasticPostQueryVisitor implements EloquentModelVisitorInterface, WithQuery
{
    private array $query = [];

    public function visitModelRoot(ModelRoot $modelRoot)
    {
        $this->query['index'] = $modelRoot->getTable();

        /** @var Visitable $node */
        foreach ($modelRoot->getNodes() as $node) {
            $node->accept($this);
        }
    }

    public function visitAttribute(Attribute $attribute)
    {
        if (!array_key_exists('body', $this->query)) {
            $this->query['body'] = [];
        }

        $this->query['body'][] = [
            $attribute->field => $attribute->value,
        ];
    }

    public function getQuery(): array
    {
        return $this->query;
    }
}

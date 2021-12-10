<?php


namespace App\Elastic\Token;


use App\Elastic\Contracts\EloquentModelVisitorInterface;
use App\Elastic\Contracts\Visitable;

class ModelRoot implements Visitable
{
    public function __construct(
        private string $model,
        private array $nodes
    ) { }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getNodes(): array
    {
        return $this->nodes;
    }

    public function accept(EloquentModelVisitorInterface $visitor)
    {
        // TODO: Implement accept() method.
    }
}

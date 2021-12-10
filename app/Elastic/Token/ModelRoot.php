<?php


namespace App\Elastic\Token;


use App\Elastic\Contracts\EloquentModelVisitorInterface;
use App\Elastic\Contracts\Visitable;

class ModelRoot implements Visitable
{
    private array $nodes;

    public function __construct(
        private string $table,
    ) { }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getNodes(): array
    {
        return $this->nodes;
    }

    public function setNodes(array $nodes): void
    {
        $this->nodes = $nodes;
    }

    public function accept(EloquentModelVisitorInterface $visitor)
    {
        $visitor->visitModelRoot($this);
    }
}

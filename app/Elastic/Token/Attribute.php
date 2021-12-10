<?php


namespace App\Elastic\Token;


use App\Elastic\Contracts\EloquentModelVisitorInterface;
use App\Elastic\Contracts\Visitable;

class Attribute implements Visitable
{
    public function __construct(
        public string $field,
        public string $value,
    ) { }

    public function accept(EloquentModelVisitorInterface $visitor)
    {
        $visitor->visitAttribute($this);
    }
}

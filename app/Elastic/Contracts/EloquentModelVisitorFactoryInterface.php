<?php


namespace App\Elastic\Contracts;


interface EloquentModelVisitorFactoryInterface
{
    /**
     * Create a new visitor.
     *
     * @param string $option
     * @return EloquentModelVisitorInterface
     */
    public function createVisitor(string $option): EloquentModelVisitorInterface;
}

<?php


namespace App\Elastic\Contracts;


interface Visitable
{
    public function accept(EloquentModelVisitorInterface $visitor);
}

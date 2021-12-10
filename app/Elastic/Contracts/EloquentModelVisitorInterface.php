<?php


namespace App\Elastic\Contracts;


use App\Elastic\Token\Attribute;

interface EloquentModelVisitorInterface
{
    public function visitAttribute(Attribute $attribute);
}

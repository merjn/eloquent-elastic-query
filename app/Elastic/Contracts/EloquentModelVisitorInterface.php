<?php


namespace App\Elastic\Contracts;


use App\Elastic\Token\Attribute;
use App\Elastic\Token\ModelRoot;

interface EloquentModelVisitorInterface
{
    public function visitModelRoot(ModelRoot $modelRoot);

    public function visitAttribute(Attribute $attribute);
}

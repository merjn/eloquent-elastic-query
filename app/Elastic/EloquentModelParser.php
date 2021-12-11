<?php


namespace App\Elastic;


use App\Elastic\Token\Attribute;
use App\Elastic\Token\ModelRoot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class EloquentModelParser
{
    public function parse(Model $model): ModelRoot
    {
        $attributes = $model->getAttributes();

        if (isset($model->elasticExcludes)) {
            Arr::forget($attributes, $model->elasticExcludes);
        }

        $attributes = collect($attributes)
            ->transform(function (mixed $attributeValue, string $attributeName) {
                return new Attribute($attributeName, $attributeValue);
            })
            ->values()
            ->toArray();

        return tap(new ModelRoot($model->id, $model->getTable()), fn (ModelRoot $modelRoot) => $modelRoot->setNodes($attributes));
    }
}

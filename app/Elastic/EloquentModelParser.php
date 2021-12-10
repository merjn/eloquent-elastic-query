<?php


namespace App\Elastic;


use App\Elastic\Token\Attribute;
use App\Elastic\Token\ModelRoot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class EloquentModelParser
{
    /**
     * Parse the model.
     *
     * @param Model $model
     * @return ModelRoot
     */
    public function parse(Model $model): ModelRoot
    {
        $modelRoot = new ModelRoot($model->getTable());

        $attributes = $model->getAttributes();

        // Remove all attributes that are defined in the exclusion field. This ensures that only the attributes
        // are parsed.
        if (isset($model->elasticExcludes)) {
            Arr::forget($attributes, $model->elasticExcludes);
        }

        $attributes = collect($attributes)->map(function (mixed $attributeValue, string $attributeName) {
            return new Attribute($attributeName, $attributeValue);
        });

        $attributes = array_values($attributes->toArray());

        return tap($modelRoot, fn (ModelRoot $modelRoot) => $modelRoot->setNodes($attributes));
    }
}

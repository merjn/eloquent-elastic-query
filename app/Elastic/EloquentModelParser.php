<?php


namespace App\Elastic;


use App\Elastic\Token\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class EloquentModelParser
{
    /**
     * Parse the model.
     *
     * @param Model $model
     * @return array
     */
    public function parse(Model $model): array
    {
        $attributes = $model->getAttributes();

        // Remove all attributes that are defined in the exclusion field. This ensures that only the attributes
        // are parsed.
        if (isset($model->elasticExcludes)) {
            Arr::forget($attributes, $model->elasticExcludes);
        }

        return collect($attributes)->transform(function (string $attributeName, mixed $attributeValue) {
            return new Attribute($attributeName, $attributeValue);
        })->toArray();
    }
}

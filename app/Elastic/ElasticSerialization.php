<?php


namespace App\Elastic;


trait ElasticSerialization
{
    /**
     * Create an Elastic create query.
     *
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function toElasticCreateQuery(): array
    {
        $instance = app()->make(Elastic::class, ['model' => $this]);

        return $instance->serialize(ElasticQueryOption::CREATE);
    }
}

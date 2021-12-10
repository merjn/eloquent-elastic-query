<?php


namespace App\Elastic;


trait ElasticSerialization
{
    /**
     * Get the Elastic facade.
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function elastic(): Elastic
    {
        return app()->make(Elastic::class, ['model' => $this]);
    }
}

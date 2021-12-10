<?php


namespace App\Elastic\Contracts;


interface WithQuery
{
    public function getQuery(): array;
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Elasticsearch\Client as ElasticClient;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class AddUserToElasticController extends Controller
{
    public function __construct(
        private ElasticClient $elasticClient
    ) { }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResource
     */
    public function __invoke(Request $request): JsonResource
    {
        /** @var array $user */
        $user = User::first()
            ->elastic()
            ->toCreateQuery();

        $elasticResponse = $this->elasticClient->create($user);

        // Store mapped data to Elastic
        return new JsonResource($elasticResponse);
    }
}

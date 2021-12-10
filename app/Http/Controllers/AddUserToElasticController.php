<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class AddUserToElasticController extends Controller
{
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

        // Store mapped data to Elastic

        return new JsonResource($user);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Favor\CreateRequest;
use App\Http\Requests\Api\Favor\EditRequest;
use App\Http\Resources\FavorResource;
use App\Models\Favor;
use App\Services\FavorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FavorController extends Controller
{
    public function __construct(private FavorService $service)
    {
    }

    public function create(CreateRequest $request): FavorResource
    {
        $favor = $this->service->create($request->validated());

        return new FavorResource($favor);
    }

    public function update(EditRequest $request, Favor $favor): JsonResponse
    {
        $this->service->update($favor, $request->validated());

        return response()->json([
            'Favor updated'
        ], 200);
    }

    public function delete(Favor $favor): JsonResponse
    {
        $this->service->delete($favor);

        return response()->json([
            'Favor deleted'
        ], 204);
    }

    public function index(): AnonymousResourceCollection
    {
        $favors = Favor::all();

        return FavorResource::collection($favors);
    }

    public function show(Favor $favor): FavorResource
    {
        return new FavorResource($favor);
    }
}

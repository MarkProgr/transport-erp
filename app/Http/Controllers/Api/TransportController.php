<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Transport\CreateRequest;
use App\Http\Requests\Api\Transport\EditRequest;
use App\Http\Resources\TransportResource;
use App\Models\Transport;
use App\Services\TransportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TransportController extends Controller
{
    public function __construct(private TransportService $service)
    {
    }

    public function create(CreateRequest $request): TransportResource
    {
        $transport = $this->service->create($request->validated());

        return new TransportResource($transport);
    }

    public function update(EditRequest $request, Transport $transport): JsonResponse
    {
        $this->service->update($transport, $request->validated());

        return response()->json([
            'Successfully updated this transport'
        ], 200);
    }

    public function index(): AnonymousResourceCollection
    {
        $transports = Transport::all();

        return TransportResource::collection($transports);
    }

    public function delete(Transport $transport): JsonResponse
    {
        $this->service->delete($transport);

        return response()->json([
            'Successfully deleted this transport'
        ], 204);
    }

    public function show(Transport $transport): TransportResource
    {
        return new TransportResource($transport);
    }
}

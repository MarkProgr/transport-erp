<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Driver\CreateRequest;
use App\Http\Requests\Api\Driver\EditRequest;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use App\Services\DriverService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DriverController extends Controller
{
    public function __construct(private DriverService $service)
    {
    }

    public function create(CreateRequest $request): DriverResource
    {
        $driver = $this->service->create($request->validated());

        return new DriverResource($driver);
    }

    public function update(EditRequest $request, Driver $driver): JsonResponse
    {
        $this->service->update($driver, $request->validated());

        return response()->json([
            'This driver successfully updated'
        ], 200);
    }

    public function delete(Driver $driver)
    {
        $this->service->delete($driver);

        return response()->json([
            'This driver successfully deleted'
        ], 204);
    }

    public function index(): AnonymousResourceCollection
    {
        $drivers = Driver::all();

        return DriverResource::collection($drivers);
    }

    public function show(Driver $driver): DriverResource
    {
        return new DriverResource($driver);
    }
}

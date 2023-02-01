<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Customer\CreateRequest;
use App\Http\Requests\Api\Customer\EditRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerController extends Controller
{
    public function __construct(private CustomerService $service)
    {
    }

    public function create(CreateRequest $request): CustomerResource
    {
        $customer = $this->service->create($request->validated());

        return new CustomerResource($customer);
    }

    public function update(EditRequest $request, Customer $customer): JsonResponse
    {
        $this->service->update($customer, $request->validated());

        return response()->json([
            'Customer updated'
        ], 200);
    }

    public function delete(Customer $customer): JsonResponse
    {
        $this->service->delete($customer);

        return response()->json([
            'Customer deleted'
        ], 204);
    }

    public function index(): AnonymousResourceCollection
    {
        $customers = Customer::all();

        return CustomerResource::collection($customers);
    }

    public function show(Customer $customer): CustomerResource
    {
        return new CustomerResource($customer);
    }
}

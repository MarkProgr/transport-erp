<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\CreateRequest;
use App\Http\Requests\Customer\EditRequest;
use App\Models\Customer;
use App\Models\Favor;
use App\Services\CustomerService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(private CustomerService $service)
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        $query = Customer::query()
            ->with('favors');

        if ($request->has('customer')) {
            $searchingValue = '%' . $request->get('customer') . '%';
            $query
                ->where('name', 'like', $searchingValue)
                ->orWhere('country', 'like', $searchingValue);
        }

        $customers = $query
            ->orderByDesc('created_at')
            ->paginate(2)
            ->appends($request->query());

        return view('customers.index', compact('customers'));
    }

    public function create(): Factory|View|Application
    {
        $favors = Favor::all();

        return view('customers.create', compact('favors'));
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());

        return redirect()->route('customers.index');
    }

    public function show(Customer $customer): Factory|View|Application
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer): Factory|View|Application
    {
        $favors = Favor::all();

        return view('customers.edit', compact('customer', 'favors'));
    }

    public function update(EditRequest $request, Customer $customer): RedirectResponse
    {
        $this->service->update($customer, $request->validated());

        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        $this->service->delete($customer);

        return redirect()->route('customers.index');
    }
}

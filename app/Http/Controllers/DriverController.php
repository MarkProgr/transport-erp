<?php

namespace App\Http\Controllers;

use App\Http\Requests\Driver\CreateRequest;
use App\Http\Requests\Driver\EditRequest;
use App\Models\Driver;
use App\Models\Transport;
use App\Services\DriverService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function __construct(private DriverService $service)
    {
    }

    public function index(Request $request): View|Factory|Application
    {
        $query = Driver::query()->with('transport');

        if ($request->has('search_driver')) {
            $searchingValue = '%' . $request->get('search_driver') . '%';
            $query
                ->where('name', 'like', $searchingValue)
                ->orWhere('surname', 'like', $searchingValue)
                ->orWhere('email', 'like', $searchingValue);
        }

        if ($request->has('search_driver_by_car')) {
            $searchingValue = '%' . $request->get('search_driver_by_car') . '%';
            $query
                ->whereHas('transports', function ($q) use ($searchingValue) {
                    $q->where('transports.name', 'like', $searchingValue);
                });
        }

        $drivers = $query
            ->paginate(3)
            ->appends($request->query());

        return view('drivers.index', compact('drivers'));
    }


    public function create(): View|Factory|Application
    {
        $transports = Transport::all();

        return view('drivers.create', compact('transports'));
    }


    public function store(CreateRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());

        return redirect()->route('drivers.index');
    }

    public function show(Driver $driver): Factory|View|Application
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver): Factory|View|Application
    {
        $transports = Transport::all();

        return view('drivers.edit', compact('driver', 'transports'));
    }

    public function update(EditRequest $request, Driver $driver): RedirectResponse
    {
        $this->service->update($driver, $request->validated());

        return redirect()->route('drivers.show', ['driver' => $driver->id]);
    }

    public function destroy(Driver $driver): RedirectResponse
    {
        $this->service->delete($driver);

        return redirect()->route('drivers.index');
    }
}

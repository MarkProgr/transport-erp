<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transport\CreateRequest;
use App\Http\Requests\Transport\EditRequest;
use App\Models\Transport;
use App\Services\TransportService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class TransportController extends Controller
{
    public function __construct(private TransportService $service)
    {
    }

    public function index(Request $request): View|Factory|Application
    {
        $query = Transport::query();

        if ($request->has('search')) {
            $searchingValue = '%' . $request->get('search') . '%';

            $query
                ->where('name', 'like', $searchingValue)
                ->orWhere('type', 'like', $searchingValue);
        }

        $transports = $query
            ->paginate(3)
            ->appends($request->query());

        return view('transports.index', compact('transports'));
    }

    public function create(): View|Factory|Application
    {
        return view('transports.create');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());

        return redirect()->route('transports.index');
    }

    public function show(Transport $transport): View|Factory|Application
    {
        return view('transports.show', compact('transport'));
    }

    public function edit(Transport $transport): View|Factory|Application
    {
        return view('transports.edit', compact('transport'));
    }

    public function update(EditRequest $request, Transport $transport): RedirectResponse
    {
        $this->service->update($transport, $request->validated());

        return redirect()->route('transports.show', ['transport' => $transport->id]);
    }

    public function destroy(Transport $transport): RedirectResponse
    {
        $this->service->delete($transport);

        return redirect()->route('transports.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Favor\CreateRequest;
use App\Http\Requests\Favor\EditRequest;
use App\Models\Favor;
use App\Models\Transport;
use App\Services\FavorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FavorController extends Controller
{
    public function __construct(private FavorService $service)
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        $query = Favor::query()->with('transport');

        if ($request->has('favor')) {
            $searchingValue = '%' . $request->get('favor') . '%';
            $query
                ->where('name', 'like', $searchingValue);
        }

        if ($request->has('favor_cost')) {
            $query
                ->orderBy('cost', $request->get('favor_cost'));
        }

        $favors = $query
            ->paginate(3)
            ->appends($request->query());

        return view('favors.index', compact('favors'));
    }

    public function create(Request $request): Factory|View|Application
    {
        $type = $request->get('type');

        $transports = Transport::query()
            ->where('type', $type)
            ->where('status', 'At parking')
            ->get();

        return view('favors.create', compact('transports'));
    }

    public function chooseTypeForm(): Factory|View|Application
    {
        $types = Transport::query()->distinct()->get('type');

        return view('favors.choose-type', compact('types'));
    }

    public function chooseType(Request $request): RedirectResponse
    {
        return redirect()->route('favors.create', ['type' => $request->get('type')]);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());

        return redirect()->route('favors.index');
    }

    public function show(Favor $favor): Factory|View|Application
    {
        return view('favors.show', compact('favor'));
    }

    public function edit(Favor $favor): Factory|View|Application
    {
        $transport = $favor->transport();

        $transports = Transport::query()
            ->where('type', $transport->type)
            ->where('status', 'At parking')
            ->get();

        return view('favors.edit', compact('favor', 'transports'));
    }

    public function update(EditRequest $request, Favor $favor): RedirectResponse
    {
        $this->service->update($favor, $request->validated());

        return redirect()->route('favors.index');
    }

    public function destroy(Favor $favor): RedirectResponse
    {
        $this->service->delete($favor);

        return redirect()->route('favors.index');
    }
}

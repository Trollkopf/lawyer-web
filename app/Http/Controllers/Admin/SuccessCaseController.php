<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuccessCaseRequest;
use App\Models\SuccessCase;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class SuccessCaseController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/SuccessCases/Index', [
            'successCases' => SuccessCase::query()->orderBy('sort_order')->orderBy('title')->get(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/SuccessCases/Create');
    }

    public function store(SuccessCaseRequest $request): RedirectResponse
    {
        SuccessCase::query()->create($request->validated());

        return to_route('dashboard.success-cases.index')->with('success', 'Caso guardado correctamente.');
    }

    public function edit(SuccessCase $successCase): Response
    {
        return Inertia::render('Admin/SuccessCases/Edit', [
            'successCase' => $successCase,
        ]);
    }

    public function update(SuccessCaseRequest $request, SuccessCase $successCase): RedirectResponse
    {
        $successCase->update($request->validated());

        return to_route('dashboard.success-cases.index')->with('success', 'Caso actualizado correctamente.');
    }

    public function destroy(SuccessCase $successCase): RedirectResponse
    {
        $successCase->delete();

        return back()->with('success', 'Caso eliminado.');
    }
}

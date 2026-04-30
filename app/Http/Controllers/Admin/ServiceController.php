<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ServiceController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Services/Index', [
            'services' => Service::query()->orderBy('sort_order')->orderBy('title')->get(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Services/Create');
    }

    public function store(ServiceRequest $request): RedirectResponse
    {
        Service::query()->create($request->validated());

        return to_route('dashboard.services.index')->with('success', 'Servicio creado correctamente.');
    }

    public function edit(Service $service): Response
    {
        return Inertia::render('Admin/Services/Edit', [
            'service' => $service,
        ]);
    }

    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $service->update($request->validated());

        return to_route('dashboard.services.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return back()->with('success', 'Servicio eliminado.');
    }
}

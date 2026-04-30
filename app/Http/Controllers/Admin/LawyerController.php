<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LawyerRequest;
use App\Models\Lawyer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class LawyerController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Lawyers/Index', [
            'lawyers' => Lawyer::query()->orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Lawyers/Create');
    }

    public function store(LawyerRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['image_path'] = $request->file('photo')->store('lawyers', 'public');
        }

        unset($validated['photo']);

        Lawyer::query()->create($validated);

        return to_route('dashboard.lawyers.index')->with('success', 'Perfil creado correctamente.');
    }

    public function edit(Lawyer $lawyer): Response
    {
        return Inertia::render('Admin/Lawyers/Edit', [
            'lawyer' => $lawyer,
        ]);
    }

    public function update(LawyerRequest $request, Lawyer $lawyer): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($lawyer->image_path) {
                Storage::disk('public')->delete($lawyer->image_path);
            }

            $validated['image_path'] = $request->file('photo')->store('lawyers', 'public');
        }

        unset($validated['photo']);

        $lawyer->update($validated);

        return to_route('dashboard.lawyers.index')->with('success', 'Perfil actualizado correctamente.');
    }

    public function destroy(Lawyer $lawyer): RedirectResponse
    {
        if ($lawyer->image_path) {
            Storage::disk('public')->delete($lawyer->image_path);
        }

        $lawyer->delete();

        return back()->with('success', 'Perfil eliminado.');
    }
}

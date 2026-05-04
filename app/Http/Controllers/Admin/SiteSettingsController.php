<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSiteSettingsRequest;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class SiteSettingsController extends Controller
{
    public function edit(): Response
    {
        $setting = SiteSetting::query()->first();
        $settings = array_replace_recursive(
            SiteSetting::defaults(),
            $setting?->toArray() ?? [],
        );

        return Inertia::render('Admin/SiteSettings/Edit', [
            'settings' => $settings,
            'logoUrl' => $setting?->logo_path
                ? Storage::url($setting->logo_path)
                : null,
            'faviconUrl' => $setting?->logo_path
                ? Storage::url($setting->logo_path)
                : null,
            'heroImageUrl' => $setting?->hero_image_path
                ? Storage::url($setting->hero_image_path)
                : null,
        ]);
    }

    public function update(UpdateSiteSettingsRequest $request): RedirectResponse
    {
        $setting = SiteSetting::query()->firstOrNew(['id' => 1]);
        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            if ($setting->logo_path) {
                Storage::disk('public')->delete($setting->logo_path);
            }

            $validated['logo_path'] = $request->file('logo')->store('site', 'public');
        }

        if ($request->hasFile('hero_image')) {
            if ($setting->hero_image_path) {
                Storage::disk('public')->delete($setting->hero_image_path);
            }

            $validated['hero_image_path'] = $request->file('hero_image')->store('site', 'public');
        }

        unset($validated['logo'], $validated['hero_image']);

        $setting->fill($validated);
        $setting->save();

        return back()->with('success', 'La configuracion de la home se ha actualizado.');
    }
}

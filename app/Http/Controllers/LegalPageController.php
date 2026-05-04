<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class LegalPageController extends Controller
{
    public function privacy(): Response
    {
        return Inertia::render('LegalPage', [
            'variant' => 'privacy',
            'settings' => $this->resolvedSettings(),
        ]);
    }

    public function legal(): Response
    {
        return Inertia::render('LegalPage', [
            'variant' => 'legal',
            'settings' => $this->resolvedSettings(),
        ]);
    }

    private function resolvedSettings(): array
    {
        $rawSettings = SiteSetting::query()->first();
        $settings = array_replace_recursive(
            SiteSetting::defaults(),
            $rawSettings?->toArray() ?? [],
        );

        $settings['hero_image_url'] = $rawSettings?->hero_image_path
            ? Storage::url($rawSettings->hero_image_path)
            : null;
        $settings['logo_url'] = $rawSettings?->logo_path
            ? Storage::url($rawSettings->logo_path)
            : null;
        $settings['favicon_url'] = $rawSettings?->logo_path
            ? Storage::url($rawSettings->logo_path)
            : null;

        $settings['contact']['privacy_url'] = blank(data_get($settings, 'contact.privacy_url'))
            || data_get($settings, 'contact.privacy_url') === '#'
            ? route('privacy-policy')
            : data_get($settings, 'contact.privacy_url');

        $settings['contact']['legal_url'] = blank(data_get($settings, 'contact.legal_url'))
            || data_get($settings, 'contact.legal_url') === '#'
            ? route('legal-notice')
            : data_get($settings, 'contact.legal_url');

        return $settings;
    }
}

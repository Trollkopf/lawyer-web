<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\SuccessCase;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
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

        return Inertia::render('Home', [
            'settings' => $settings,
            'services' => Service::query()
                ->where('is_published', true)
                ->orderBy('sort_order')
                ->orderBy('title')
                ->get(),
            'lawyers' => Lawyer::query()
                ->where('is_published', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get(),
            'successCases' => SuccessCase::query()
                ->where('is_published', true)
                ->orderBy('sort_order')
                ->orderBy('title')
                ->get(),
            'testimonials' => Testimonial::query()
                ->where('is_published', true)
                ->orderBy('sort_order')
                ->orderBy('client_name')
                ->get(),
        ]);
    }
}

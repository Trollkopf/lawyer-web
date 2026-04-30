<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\Lawyer;
use App\Models\Service;
use App\Models\SuccessCase;
use App\Models\Testimonial;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Dashboard', [
            'stats' => [
                'services' => Service::count(),
                'lawyers' => Lawyer::count(),
                'successCases' => SuccessCase::count(),
                'testimonials' => Testimonial::count(),
                'contactSubmissions' => ContactSubmission::count(),
            ],
            'latestContacts' => ContactSubmission::query()
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}

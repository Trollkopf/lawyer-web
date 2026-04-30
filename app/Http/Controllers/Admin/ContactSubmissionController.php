<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Inertia\Inertia;
use Inertia\Response;

class ContactSubmissionController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/ContactSubmissions/Index', [
            'submissions' => ContactSubmission::query()->latest()->paginate(12),
        ]);
    }
}

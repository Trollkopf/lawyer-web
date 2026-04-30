<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactSubmissionRequest;
use App\Models\ContactSubmission;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;

class ContactSubmissionController extends Controller
{
    public function store(StoreContactSubmissionRequest $request): RedirectResponse
    {
        ContactSubmission::query()->create([
            'name' => $request->string('name')->toString(),
            'email' => $request->string('email')->toString(),
            'phone' => $request->string('phone')->toString(),
            'message' => $request->string('message')->toString(),
            'accepted_privacy_at' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $settings = array_replace_recursive(
            SiteSetting::defaults(),
            SiteSetting::query()->first()?->toArray() ?? [],
        );

        return to_route('home')->with(
            'success',
            data_get($settings, 'contact.success_message', 'Hemos recibido tu mensaje.')
        );
    }
}

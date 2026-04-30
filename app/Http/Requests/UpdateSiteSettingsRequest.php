<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'site_name' => ['required', 'string', 'max:255'],
            'site_city' => ['nullable', 'string', 'max:255'],
            'site_tagline' => ['nullable', 'string', 'max:255'],
            'primary_phone' => ['nullable', 'string', 'max:255'],
            'primary_email' => ['nullable', 'email', 'max:255'],
            'office_address' => ['nullable', 'string'],
            'office_hours' => ['nullable', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'hero_image' => ['nullable', 'image', 'max:4096'],

            'hero.eyebrow' => ['nullable', 'string', 'max:255'],
            'hero.title' => ['required', 'string', 'max:255'],
            'hero.description' => ['required', 'string'],
            'hero.primary_label' => ['required', 'string', 'max:255'],
            'hero.primary_target' => ['required', 'string', 'max:255'],
            'hero.secondary_label' => ['nullable', 'string', 'max:255'],
            'hero.secondary_target' => ['nullable', 'string', 'max:255'],
            'hero.highlight_title' => ['nullable', 'string', 'max:255'],
            'hero.highlight_text' => ['nullable', 'string'],

            'presentation.eyebrow' => ['nullable', 'string', 'max:255'],
            'presentation.title' => ['required', 'string', 'max:255'],
            'presentation.body' => ['required', 'string'],
            'presentation.quote' => ['nullable', 'string', 'max:255'],
            'presentation.signature' => ['nullable', 'string', 'max:255'],

            'services.eyebrow' => ['nullable', 'string', 'max:255'],
            'services.title' => ['required', 'string', 'max:255'],
            'services.description' => ['required', 'string'],

            'team.eyebrow' => ['nullable', 'string', 'max:255'],
            'team.title' => ['required', 'string', 'max:255'],
            'team.description' => ['required', 'string'],

            'cases.eyebrow' => ['nullable', 'string', 'max:255'],
            'cases.title' => ['required', 'string', 'max:255'],
            'cases.description' => ['required', 'string'],

            'testimonials.eyebrow' => ['nullable', 'string', 'max:255'],
            'testimonials.title' => ['required', 'string', 'max:255'],
            'testimonials.description' => ['required', 'string'],

            'contact.eyebrow' => ['nullable', 'string', 'max:255'],
            'contact.title' => ['required', 'string', 'max:255'],
            'contact.description' => ['required', 'string'],
            'contact.form_heading' => ['required', 'string', 'max:255'],
            'contact.privacy_url' => ['required', 'string', 'max:255'],
            'contact.legal_url' => ['required', 'string', 'max:255'],
            'contact.map_url' => ['nullable', 'string'],
            'contact.success_message' => ['required', 'string', 'max:255'],

            'footer.note' => ['nullable', 'string', 'max:255'],
        ];
    }
}

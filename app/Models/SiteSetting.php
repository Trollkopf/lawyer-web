<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'site_city',
        'site_tagline',
        'primary_phone',
        'primary_email',
        'office_address',
        'office_hours',
        'meta_title',
        'meta_description',
        'logo_path',
        'hero_image_path',
        'theme',
        'hero',
        'presentation',
        'services',
        'team',
        'cases',
        'testimonials',
        'contact',
        'footer',
    ];

    protected $casts = [
        'hero' => 'array',
        'theme' => 'array',
        'presentation' => 'array',
        'services' => 'array',
        'team' => 'array',
        'cases' => 'array',
        'testimonials' => 'array',
        'contact' => 'array',
        'footer' => 'array',
    ];

    public static function defaults(): array
    {
        return [
            'site_name' => 'Nombre del despacho',
            'site_city' => 'Ciudad',
            'site_tagline' => 'Asesoramiento y defensa legal con claridad, rigor y cercania.',
            'primary_phone' => '+34 600 000 000',
            'primary_email' => 'contacto@despacho-legal.es',
            'office_address' => 'Direccion pendiente de confirmar',
            'office_hours' => 'Lunes a viernes, de 9:00 a 18:00',
            'meta_title' => 'Abogado en Ciudad | Nombre del despacho',
            'meta_description' => 'Despacho juridico en Ciudad. Asesoramiento y defensa legal con un enfoque claro, riguroso y personalizado.',
            'logo_path' => null,
            'hero_image_path' => null,
            'theme' => [
                'bg' => '#ffffff',
                'bg_soft' => '#f6faf7',
                'green_light' => '#dceee3',
                'green' => '#8eb99f',
                'green_dark' => '#456b55',
                'burgundy' => '#6d1f2f',
                'burgundy_dark' => '#48131f',
                'text' => '#1f2421',
                'text_muted' => '#68726b',
                'border' => '#e4e8e5',
                'gold_soft' => '#c8a96a',
            ],
            'hero' => [
                'eyebrow' => 'Despacho legal',
                'title' => 'Defensa juridica serena, rigurosa y estrategica.',
                'description' => 'Acompanamos a particulares y empresas con un asesoramiento claro, honesto y adaptado a cada caso.',
                'primary_label' => 'Solicitar consulta',
                'primary_target' => '#contacto',
                'secondary_label' => 'Ver servicios',
                'secondary_target' => '#servicios',
                'highlight_title' => 'Trabajo preciso, trato personal',
                'highlight_text' => 'La web esta preparada para incorporar una fotografia editorial del abogado o del despacho desde el panel.',
            ],
            'presentation' => [
                'is_enabled' => true,
                'enable_read_more' => true,
                'eyebrow' => 'Presentacion',
                'title' => 'Cada asunto exige escucha, analisis y una estrategia bien definida.',
                'body' => 'Nuestro despacho trabaja desde la claridad y la confianza, explicando cada fase del proceso para que el cliente pueda tomar decisiones con seguridad.',
                'quote' => 'Priorizamos la discrecion, la cercania y la defensa eficaz de sus intereses.',
                'signature' => 'Firma o nombre del abogado',
            ],
            'services' => [
                'is_enabled' => true,
                'enable_read_more' => true,
                'eyebrow' => 'Servicios',
                'title' => 'Asesoramiento legal adaptado a cada situacion.',
                'description' => 'Desde la prevencion de conflictos hasta la defensa judicial, cada servicio puede editarse individualmente desde el backoffice.',
            ],
            'team' => [
                'is_enabled' => true,
                'eyebrow' => 'Equipo legal',
                'title' => 'Perfiles profesionales con enfoque claro y trato personalizado.',
                'description' => 'Cada abogado puede mostrar su enfoque de trabajo, tipo de cliente y principales areas de acompanamiento.',
            ],
            'cases' => [
                'is_enabled' => true,
                'enable_read_more' => true,
                'eyebrow' => 'Casos de exito',
                'title' => 'Experiencia aplicada con prudencia y confidencialidad.',
                'description' => 'Esta seccion esta pensada para publicar casos reales anonimizados y autorizados, sin comprometer informacion sensible.',
            ],
            'testimonials' => [
                'is_enabled' => true,
                'enable_read_more' => true,
                'eyebrow' => 'Opiniones',
                'title' => 'Valoraciones reales, presentadas con sobriedad.',
                'description' => 'Cuando el cliente facilite resenas verificadas, podran publicarse aqui y ordenarse desde el panel.',
            ],
            'contact' => [
                'is_enabled' => true,
                'eyebrow' => 'Contacto',
                'title' => 'Cuentanos tu caso.',
                'description' => 'Estudiaremos tu situacion y te indicaremos la mejor forma de proceder con claridad y honestidad.',
                'form_heading' => 'Solicita una primera consulta',
                'privacy_url' => '#',
                'legal_url' => '#',
                'map_url' => '',
                'success_message' => 'Hemos recibido tu mensaje. Te responderemos lo antes posible.',
            ],
            'footer' => [
                'note' => 'Despacho juridico orientado a una relacion profesional clara, discreta y cercana.',
            ],
        ];
    }
}

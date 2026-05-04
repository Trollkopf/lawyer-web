<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import AdminSectionSwitch from '@/Components/Site/content/AdminSectionSwitch.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    settings: {
        type: Object,
        required: true,
    },
    logoUrl: {
        type: String,
        default: null,
    },
    faviconUrl: {
        type: String,
        default: null,
    },
    heroImageUrl: {
        type: String,
        default: null,
    },
});

const form = useForm({
    site_name: props.settings.site_name ?? '',
    site_city: props.settings.site_city ?? '',
    site_tagline: props.settings.site_tagline ?? '',
    primary_phone: props.settings.primary_phone ?? '',
    primary_email: props.settings.primary_email ?? '',
    office_address: props.settings.office_address ?? '',
    office_hours: props.settings.office_hours ?? '',
    meta_title: props.settings.meta_title ?? '',
    meta_description: props.settings.meta_description ?? '',
    logo: null,
    hero_image: null,
    theme: {
        bg: props.settings.theme?.bg ?? '#ffffff',
        bg_soft: props.settings.theme?.bg_soft ?? '#f6faf7',
        green_light: props.settings.theme?.green_light ?? '#dceee3',
        green: props.settings.theme?.green ?? '#8eb99f',
        green_dark: props.settings.theme?.green_dark ?? '#456b55',
        burgundy: props.settings.theme?.burgundy ?? '#6d1f2f',
        burgundy_dark: props.settings.theme?.burgundy_dark ?? '#48131f',
        text: props.settings.theme?.text ?? '#1f2421',
        text_muted: props.settings.theme?.text_muted ?? '#68726b',
        border: props.settings.theme?.border ?? '#e4e8e5',
        gold_soft: props.settings.theme?.gold_soft ?? '#c8a96a',
    },
    hero: {
        eyebrow: props.settings.hero?.eyebrow ?? '',
        title: props.settings.hero?.title ?? '',
        description: props.settings.hero?.description ?? '',
        primary_label: props.settings.hero?.primary_label ?? '',
        primary_target: props.settings.hero?.primary_target ?? '',
        secondary_label: props.settings.hero?.secondary_label ?? '',
        secondary_target: props.settings.hero?.secondary_target ?? '',
        highlight_title: props.settings.hero?.highlight_title ?? '',
        highlight_text: props.settings.hero?.highlight_text ?? '',
    },
    presentation: {
        is_enabled: props.settings.presentation?.is_enabled ?? true,
        enable_read_more: props.settings.presentation?.enable_read_more ?? true,
        eyebrow: props.settings.presentation?.eyebrow ?? '',
        title: props.settings.presentation?.title ?? '',
        body: props.settings.presentation?.body ?? '',
        quote: props.settings.presentation?.quote ?? '',
        signature: props.settings.presentation?.signature ?? '',
    },
    services: {
        is_enabled: props.settings.services?.is_enabled ?? true,
        enable_read_more: props.settings.services?.enable_read_more ?? true,
        eyebrow: props.settings.services?.eyebrow ?? '',
        title: props.settings.services?.title ?? '',
        description: props.settings.services?.description ?? '',
    },
    team: {
        is_enabled: props.settings.team?.is_enabled ?? true,
        eyebrow: props.settings.team?.eyebrow ?? '',
        title: props.settings.team?.title ?? '',
        description: props.settings.team?.description ?? '',
    },
    cases: {
        is_enabled: props.settings.cases?.is_enabled ?? true,
        enable_read_more: props.settings.cases?.enable_read_more ?? true,
        eyebrow: props.settings.cases?.eyebrow ?? '',
        title: props.settings.cases?.title ?? '',
        description: props.settings.cases?.description ?? '',
    },
    testimonials: {
        is_enabled: props.settings.testimonials?.is_enabled ?? true,
        enable_read_more: props.settings.testimonials?.enable_read_more ?? true,
        eyebrow: props.settings.testimonials?.eyebrow ?? '',
        title: props.settings.testimonials?.title ?? '',
        description: props.settings.testimonials?.description ?? '',
    },
    contact: {
        is_enabled: props.settings.contact?.is_enabled ?? true,
        eyebrow: props.settings.contact?.eyebrow ?? '',
        title: props.settings.contact?.title ?? '',
        description: props.settings.contact?.description ?? '',
        form_heading: props.settings.contact?.form_heading ?? '',
        privacy_url: props.settings.contact?.privacy_url ?? '',
        legal_url: props.settings.contact?.legal_url ?? '',
        map_url: props.settings.contact?.map_url ?? '',
        success_message: props.settings.contact?.success_message ?? '',
    },
    footer: {
        note: props.settings.footer?.note ?? '',
    },
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        presentation: {
            ...data.presentation,
            is_enabled: data.presentation.is_enabled ? 1 : 0,
            enable_read_more: data.presentation.enable_read_more ? 1 : 0,
        },
        services: {
            ...data.services,
            is_enabled: data.services.is_enabled ? 1 : 0,
            enable_read_more: data.services.enable_read_more ? 1 : 0,
        },
        team: {
            ...data.team,
            is_enabled: data.team.is_enabled ? 1 : 0,
        },
        cases: {
            ...data.cases,
            is_enabled: data.cases.is_enabled ? 1 : 0,
            enable_read_more: data.cases.enable_read_more ? 1 : 0,
        },
        testimonials: {
            ...data.testimonials,
            is_enabled: data.testimonials.is_enabled ? 1 : 0,
            enable_read_more: data.testimonials.enable_read_more ? 1 : 0,
        },
        contact: {
            ...data.contact,
            is_enabled: data.contact.is_enabled ? 1 : 0,
        },
        _method: 'put',
    })).post(route('dashboard.settings.update'), {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => form.reset('logo', 'hero_image'),
    });
};
</script>

<template>
    <Head title="Configuracion de la home" />

    <AuthenticatedLayout>
        <template #header>
            <div>
                <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                    Backoffice
                </p>
                <h1 class="mt-2 font-serif text-3xl text-stone-900">
                    Configuracion de la home
                </h1>
                <p class="mt-2 text-sm text-stone-500">
                    Aqui controlas los textos generales, SEO, hero, contacto y mensajes de cada seccion.
                </p>
            </div>
        </template>

        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <form class="grid gap-6" @submit.prevent="submit">
                <section class="admin-card">
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                        <div class="max-w-2xl">
                            <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                                Identidad
                            </p>
                            <h2 class="mt-2 font-serif text-2xl text-stone-900">
                                Datos principales del despacho
                            </h2>
                        </div>
                    </div>

                    <div class="mt-8 grid gap-6 lg:grid-cols-2">
                        <div>
                            <InputLabel for="site_name" value="Nombre del despacho" />
                            <TextInput id="site_name" v-model="form.site_name" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors.site_name" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="site_city" value="Ciudad" />
                            <TextInput id="site_city" v-model="form.site_city" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors.site_city" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="site_tagline" value="Subtitulo institucional" />
                            <TextInput id="site_tagline" v-model="form.site_tagline" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors.site_tagline" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="primary_phone" value="Telefono" />
                            <TextInput id="primary_phone" v-model="form.primary_phone" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors.primary_phone" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="primary_email" value="Email" />
                            <TextInput id="primary_email" v-model="form.primary_email" type="email" class="mt-2 block w-full" />
                            <InputError :message="form.errors.primary_email" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="office_hours" value="Horario" />
                            <TextInput id="office_hours" v-model="form.office_hours" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors.office_hours" class="mt-2" />
                        </div>
                        <div class="lg:col-span-2">
                            <InputLabel for="office_address" value="Direccion" />
                            <textarea id="office_address" v-model="form.office_address" rows="3" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <InputError :message="form.errors.office_address" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="logo" value="Logotipo" />
                            <input id="logo" type="file" accept="image/*" class="mt-2 block w-full rounded-2xl border border-stone-300 px-4 py-3 text-sm" @input="form.logo = $event.target.files[0]" />
                            <p class="mt-2 text-sm text-stone-500">
                                Si no cargas logo, la web mostrara las iniciales como fallback. El logotipo subido se reutiliza tambien como favicon.
                            </p>
                            <InputError :message="form.errors.logo" class="mt-2" />
                        </div>
                        <div v-if="logoUrl" class="rounded-3xl border border-stone-200 p-4">
                            <p class="text-sm font-semibold text-stone-900">
                                Logo actual
                            </p>
                            <div class="mt-4 flex h-28 items-center justify-center rounded-2xl bg-stone-50 p-4">
                                <img :src="logoUrl" :alt="`Logo de ${form.site_name}`" class="max-h-full max-w-full object-contain">
                            </div>
                            <p v-if="faviconUrl" class="mt-3 text-sm text-stone-500">
                                El navegador usara este mismo archivo como favicon.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="admin-card">
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        Identidad visual
                    </p>
                    <h2 class="mt-2 font-serif text-2xl text-stone-900">
                        Colores de la web
                    </h2>
                    <p class="mt-2 max-w-3xl text-sm text-stone-500">
                        Puedes ajustar la paleta principal de la web desde aqui. Se aplicara a la parte publica, no al backoffice.
                    </p>

                    <div class="mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                        <div class="rounded-3xl border border-stone-200 p-4" v-for="field in [
                            { key: 'bg', label: 'Fondo base' },
                            { key: 'bg_soft', label: 'Fondo suave' },
                            { key: 'green_light', label: 'Verde claro' },
                            { key: 'green', label: 'Verde principal' },
                            { key: 'green_dark', label: 'Verde oscuro' },
                            { key: 'burgundy', label: 'Granate principal' },
                            { key: 'burgundy_dark', label: 'Granate oscuro' },
                            { key: 'text', label: 'Texto principal' },
                            { key: 'text_muted', label: 'Texto secundario' },
                            { key: 'border', label: 'Bordes' },
                            { key: 'gold_soft', label: 'Dorado suave' },
                        ]" :key="field.key">
                            <label :for="`theme_${field.key}`" class="block text-sm font-semibold text-stone-900">
                                {{ field.label }}
                            </label>
                            <div class="mt-3 flex items-center gap-3">
                                <input
                                    :id="`theme_${field.key}`"
                                    v-model="form.theme[field.key]"
                                    type="color"
                                    class="h-12 w-16 cursor-pointer rounded-xl border border-stone-300 bg-white p-1"
                                >
                                <TextInput v-model="form.theme[field.key]" type="text" class="block w-full uppercase" />
                            </div>
                            <InputError :message="form.errors[`theme.${field.key}`]" class="mt-2" />
                        </div>
                    </div>
                </section>

                <section class="admin-card">
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        SEO
                    </p>
                    <h2 class="mt-2 font-serif text-2xl text-stone-900">
                        Metadatos de la home
                    </h2>

                    <div class="mt-8 grid gap-6">
                        <div>
                            <InputLabel for="meta_title" value="Meta title" />
                            <TextInput id="meta_title" v-model="form.meta_title" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors.meta_title" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="meta_description" value="Meta description" />
                            <textarea id="meta_description" v-model="form.meta_description" rows="3" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <InputError :message="form.errors.meta_description" class="mt-2" />
                        </div>
                    </div>
                </section>

                <section class="admin-card">
                    <div class="flex flex-col gap-6 lg:flex-row lg:justify-between">
                        <div class="max-w-2xl">
                            <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                                Hero
                            </p>
                            <h2 class="mt-2 font-serif text-2xl text-stone-900">
                                Carta de presentacion
                            </h2>
                        </div>
                        <div v-if="heroImageUrl" class="w-full max-w-48 rounded-3xl border border-stone-200 p-3">
                            <div class="h-40 rounded-2xl bg-cover bg-center" :style="{ backgroundImage: `url(${heroImageUrl})` }" />
                        </div>
                    </div>

                    <div class="mt-8 grid gap-6 lg:grid-cols-2">
                        <div>
                            <InputLabel for="hero_eyebrow" value="Etiqueta" />
                            <TextInput id="hero_eyebrow" v-model="form.hero.eyebrow" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['hero.eyebrow']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="hero_image" value="Fotografia subliminal" />
                            <input id="hero_image" type="file" accept="image/*" class="mt-2 block w-full rounded-2xl border border-stone-300 px-4 py-3 text-sm" @input="form.hero_image = $event.target.files[0]" />
                            <InputError :message="form.errors.hero_image" class="mt-2" />
                        </div>
                        <div class="lg:col-span-2">
                            <InputLabel for="hero_title" value="Titular principal" />
                            <textarea id="hero_title" v-model="form.hero.title" rows="2" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <InputError :message="form.errors['hero.title']" class="mt-2" />
                        </div>
                        <div class="lg:col-span-2">
                            <InputLabel for="hero_description" value="Subtitulo" />
                            <textarea id="hero_description" v-model="form.hero.description" rows="4" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <InputError :message="form.errors['hero.description']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="hero_primary_label" value="CTA principal" />
                            <TextInput id="hero_primary_label" v-model="form.hero.primary_label" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['hero.primary_label']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="hero_primary_target" value="Destino CTA principal" />
                            <TextInput id="hero_primary_target" v-model="form.hero.primary_target" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['hero.primary_target']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="hero_secondary_label" value="CTA secundaria" />
                            <TextInput id="hero_secondary_label" v-model="form.hero.secondary_label" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['hero.secondary_label']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="hero_secondary_target" value="Destino CTA secundaria" />
                            <TextInput id="hero_secondary_target" v-model="form.hero.secondary_target" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['hero.secondary_target']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="hero_highlight_title" value="Titulo del bloque lateral" />
                            <TextInput id="hero_highlight_title" v-model="form.hero.highlight_title" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['hero.highlight_title']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="hero_highlight_text" value="Texto del bloque lateral" />
                            <textarea id="hero_highlight_text" v-model="form.hero.highlight_text" rows="3" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <InputError :message="form.errors['hero.highlight_text']" class="mt-2" />
                        </div>
                    </div>
                </section>

                <section class="admin-card">
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        Presentacion
                    </p>
                    <h2 class="mt-2 font-serif text-2xl text-stone-900">
                        Filosofia y posicionamiento
                    </h2>

                    <div class="mt-8 grid gap-6">
                        <AdminSectionSwitch
                            v-model="form.presentation.is_enabled"
                            label="Mostrar presentacion en la home"
                            hint="Si lo desactivas, la seccion desaparece de la home y de la navegacion."
                        />
                        <AdminSectionSwitch
                            v-model="form.presentation.enable_read_more"
                            label='Activar "ver mas" en presentacion'
                            hint="En movil se aplicara siempre; este ajuste controla sobre todo la version de escritorio."
                        />
                        <div>
                            <InputLabel for="presentation_eyebrow" value="Etiqueta" />
                            <TextInput id="presentation_eyebrow" v-model="form.presentation.eyebrow" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['presentation.eyebrow']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="presentation_title" value="Titulo" />
                            <textarea id="presentation_title" v-model="form.presentation.title" rows="2" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <InputError :message="form.errors['presentation.title']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="presentation_body" value="Texto principal" />
                            <textarea id="presentation_body" v-model="form.presentation.body" rows="5" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <InputError :message="form.errors['presentation.body']" class="mt-2" />
                        </div>
                        <div class="grid gap-6 lg:grid-cols-2">
                            <div>
                                <InputLabel for="presentation_quote" value="Cita destacada" />
                                <textarea id="presentation_quote" v-model="form.presentation.quote" rows="3" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                                <InputError :message="form.errors['presentation.quote']" class="mt-2" />
                            </div>
                            <div>
                                <InputLabel for="presentation_signature" value="Firma o nombre" />
                                <TextInput id="presentation_signature" v-model="form.presentation.signature" type="text" class="mt-2 block w-full" />
                                <InputError :message="form.errors['presentation.signature']" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </section>

                <section class="admin-card">
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        Titulares de seccion
                    </p>
                    <h2 class="mt-2 font-serif text-2xl text-stone-900">
                        Roles, abogados, casos y opiniones
                    </h2>

                    <div class="mt-8 grid gap-6 lg:grid-cols-2">
                        <div class="rounded-3xl border border-stone-200 p-5">
                            <h3 class="font-serif text-xl text-stone-900">Roles</h3>
                            <div class="mt-4 space-y-4">
                                <AdminSectionSwitch
                                    v-model="form.services.is_enabled"
                                    label="Mostrar roles en la home"
                                />
                                <AdminSectionSwitch
                                    v-model="form.services.enable_read_more"
                                    label='Activar "ver mas" en roles'
                                />
                                <TextInput v-model="form.services.eyebrow" type="text" class="block w-full" placeholder="Etiqueta" />
                                <textarea v-model="form.services.title" rows="2" class="block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm" placeholder="Titulo" />
                                <textarea v-model="form.services.description" rows="8" class="block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm" placeholder="Texto introductorio de la seccion de roles" />
                            </div>
                        </div>

                        <div class="rounded-3xl border border-stone-200 p-5">
                            <h3 class="font-serif text-xl text-stone-900">Abogados</h3>
                            <div class="mt-4 space-y-4">
                                <AdminSectionSwitch
                                    v-model="form.team.is_enabled"
                                    label="Mostrar abogados en la home"
                                />
                                <TextInput v-model="form.team.eyebrow" type="text" class="block w-full" placeholder="Etiqueta" />
                                <textarea v-model="form.team.title" rows="2" class="block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm" placeholder="Titulo" />
                                <textarea v-model="form.team.description" rows="3" class="block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm" placeholder="Descripcion" />
                            </div>
                        </div>

                        <div class="rounded-3xl border border-stone-200 p-5">
                            <h3 class="font-serif text-xl text-stone-900">Casos</h3>
                            <div class="mt-4 space-y-4">
                                <AdminSectionSwitch
                                    v-model="form.cases.is_enabled"
                                    label="Mostrar casos en la home"
                                />
                                <AdminSectionSwitch
                                    v-model="form.cases.enable_read_more"
                                    label='Activar "ver mas" en casos'
                                />
                                <TextInput v-model="form.cases.eyebrow" type="text" class="block w-full" placeholder="Etiqueta" />
                                <textarea v-model="form.cases.title" rows="2" class="block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm" placeholder="Titulo" />
                                <textarea v-model="form.cases.description" rows="3" class="block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm" placeholder="Descripcion" />
                            </div>
                        </div>

                        <div class="rounded-3xl border border-stone-200 p-5">
                            <h3 class="font-serif text-xl text-stone-900">Opiniones</h3>
                            <div class="mt-4 space-y-4">
                                <AdminSectionSwitch
                                    v-model="form.testimonials.is_enabled"
                                    label="Mostrar opiniones en la home"
                                />
                                <AdminSectionSwitch
                                    v-model="form.testimonials.enable_read_more"
                                    label='Activar "ver mas" en opiniones'
                                />
                                <TextInput v-model="form.testimonials.eyebrow" type="text" class="block w-full" placeholder="Etiqueta" />
                                <textarea v-model="form.testimonials.title" rows="2" class="block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm" placeholder="Titulo" />
                                <textarea v-model="form.testimonials.description" rows="3" class="block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm" placeholder="Descripcion" />
                            </div>
                        </div>
                    </div>

                    <div class="sr-only">
                        <InputError :message="form.errors['services.title']" />
                        <InputError :message="form.errors['team.title']" />
                        <InputError :message="form.errors['cases.title']" />
                        <InputError :message="form.errors['testimonials.title']" />
                    </div>
                </section>

                <section class="admin-card">
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        Contacto y footer
                    </p>
                    <h2 class="mt-2 font-serif text-2xl text-stone-900">
                        Formulario, enlaces legales y cierre
                    </h2>

                    <div class="mt-8 grid gap-6 lg:grid-cols-2">
                        <div class="lg:col-span-2">
                            <AdminSectionSwitch
                                v-model="form.contact.is_enabled"
                                label="Mostrar contacto en la home"
                                hint="Controla la seccion de contacto y su enlace en la navegacion."
                            />
                        </div>
                        <div>
                            <InputLabel for="contact_eyebrow" value="Etiqueta" />
                            <TextInput id="contact_eyebrow" v-model="form.contact.eyebrow" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['contact.eyebrow']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="contact_form_heading" value="Titulo del formulario" />
                            <TextInput id="contact_form_heading" v-model="form.contact.form_heading" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['contact.form_heading']" class="mt-2" />
                        </div>
                        <div class="lg:col-span-2">
                            <InputLabel for="contact_title" value="Titulo de seccion" />
                            <textarea id="contact_title" v-model="form.contact.title" rows="2" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <InputError :message="form.errors['contact.title']" class="mt-2" />
                        </div>
                        <div class="lg:col-span-2">
                            <InputLabel for="contact_description" value="Texto de apoyo" />
                            <textarea id="contact_description" v-model="form.contact.description" rows="4" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <InputError :message="form.errors['contact.description']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="privacy_url" value="URL politica de privacidad" />
                            <TextInput id="privacy_url" v-model="form.contact.privacy_url" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['contact.privacy_url']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="legal_url" value="URL aviso legal" />
                            <TextInput id="legal_url" v-model="form.contact.legal_url" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['contact.legal_url']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="map_url" value="Mapa embebido (opcional)" />
                            <textarea id="map_url" v-model="form.contact.map_url" rows="3" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <p class="mt-2 text-sm text-stone-500">
                                Puedes pegar la URL de embebido o el iframe completo de Google Maps.
                            </p>
                            <InputError :message="form.errors['contact.map_url']" class="mt-2" />
                        </div>
                        <div>
                            <InputLabel for="success_message" value="Mensaje tras enviar formulario" />
                            <textarea id="success_message" v-model="form.contact.success_message" rows="3" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                            <InputError :message="form.errors['contact.success_message']" class="mt-2" />
                        </div>
                        <div class="lg:col-span-2">
                            <InputLabel for="footer_note" value="Nota de footer" />
                            <TextInput id="footer_note" v-model="form.footer.note" type="text" class="mt-2 block w-full" />
                            <InputError :message="form.errors['footer.note']" class="mt-2" />
                        </div>
                    </div>
                </section>

                <div class="flex justify-end">
                    <button type="submit" class="cta-primary" :disabled="form.processing">
                        {{ form.processing ? 'Guardando...' : 'Guardar configuracion' }}
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

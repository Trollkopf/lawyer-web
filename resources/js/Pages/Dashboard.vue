<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    stats: {
        type: Object,
        required: true,
    },
    latestContacts: {
        type: Array,
        required: true,
    },
});

const cards = [
    {
        label: 'Servicios',
        key: 'services',
        route: 'dashboard.services.index',
    },
    {
        label: 'Abogados',
        key: 'lawyers',
        route: 'dashboard.lawyers.index',
    },
    {
        label: 'Casos de exito',
        key: 'successCases',
        route: 'dashboard.success-cases.index',
    },
    {
        label: 'Opiniones',
        key: 'testimonials',
        route: 'dashboard.testimonials.index',
    },
    {
        label: 'Contactos',
        key: 'contactSubmissions',
        route: 'dashboard.contact-submissions.index',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div>
                <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                    Resumen
                </p>
                <h1 class="mt-2 font-serif text-3xl text-stone-900">
                    Panel del despacho
                </h1>
                <p class="mt-2 text-sm text-stone-500">
                    Desde aqui puedes editar la home, gestionar secciones y revisar mensajes recibidos.
                </p>
            </div>
        </template>

        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-5">
                <Link
                    v-for="card in cards"
                    :key="card.key"
                    :href="route(card.route)"
                    class="admin-card transition hover:-translate-y-1 hover:shadow-lg"
                >
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        {{ card.label }}
                    </p>
                    <p class="mt-4 font-serif text-5xl text-stone-900">
                        {{ stats[card.key] }}
                    </p>
                    <p class="mt-4 text-sm text-stone-500">
                        Gestionar
                    </p>
                </Link>
            </div>

            <div class="mt-8 grid gap-6 xl:grid-cols-[1.15fr_0.85fr]">
                <section class="admin-card">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                                Home
                            </p>
                            <h2 class="mt-2 font-serif text-2xl text-stone-900">
                                Configuracion general
                            </h2>
                        </div>
                        <Link :href="route('dashboard.settings.edit')" class="cta-primary">
                            Editar home
                        </Link>
                    </div>

                    <div class="mt-6 grid gap-4 md:grid-cols-2">
                        <div class="rounded-3xl bg-[var(--color-bg-soft)] p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-green-dark)]">
                                Hero, presentacion y contacto
                            </p>
                            <p class="mt-3 text-sm leading-7 text-stone-600">
                                Los textos estructurales y las llamadas a la accion se editan desde una sola pantalla.
                            </p>
                        </div>
                        <div class="rounded-3xl bg-[var(--color-bg-soft)] p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-green-dark)]">
                                SEO y legal
                            </p>
                            <p class="mt-3 text-sm leading-7 text-stone-600">
                                Tambien puedes ajustar metatitulo, metadescripcion y enlaces legales.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="admin-card">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                                Contactos
                            </p>
                            <h2 class="mt-2 font-serif text-2xl text-stone-900">
                                Ultimos mensajes
                            </h2>
                        </div>
                        <Link :href="route('dashboard.contact-submissions.index')" class="cta-secondary">
                            Ver todos
                        </Link>
                    </div>

                    <div class="mt-6 space-y-4">
                        <article
                            v-for="contact in latestContacts"
                            :key="contact.id"
                            class="rounded-3xl border border-stone-200 p-5"
                        >
                            <div class="flex flex-wrap items-center gap-3">
                                <h3 class="font-serif text-xl text-stone-900">
                                    {{ contact.name }}
                                </h3>
                                <span class="text-sm text-stone-500">
                                    {{ contact.email }}
                                </span>
                            </div>
                            <p class="mt-3 line-clamp-3 text-sm leading-7 text-stone-600">
                                {{ contact.message }}
                            </p>
                        </article>

                        <p v-if="!latestContacts.length" class="rounded-3xl border border-dashed border-stone-300 p-5 text-sm text-stone-500">
                            Todavia no ha entrado ningun mensaje desde el formulario publico.
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    services: {
        type: Array,
        required: true,
    },
});

const destroyService = (service) => {
    if (!window.confirm(`Eliminar "${service.title}"?`)) {
        return;
    }

    router.delete(route('dashboard.services.destroy', service.id), {
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Servicios" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        Backoffice
                    </p>
                    <h1 class="mt-2 font-serif text-3xl text-stone-900">
                        Servicios
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Gestiona las areas de trabajo mostradas en la portada.
                    </p>
                </div>
                <Link :href="route('dashboard.services.create')" class="cta-primary">
                    Nuevo servicio
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <div class="grid gap-6">
                <article
                    v-for="service in services"
                    :key="service.id"
                    class="admin-card"
                >
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                        <div class="max-w-3xl">
                            <div class="flex flex-wrap items-center gap-3">
                                <span class="rounded-full bg-[var(--color-bg-soft)] px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-burgundy)]">
                                    Orden {{ service.sort_order }}
                                </span>
                                <span
                                    class="rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em]"
                                    :class="service.is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-stone-200 text-stone-600'"
                                >
                                    {{ service.is_published ? 'Publicado' : 'Oculto' }}
                                </span>
                            </div>

                            <h2 class="mt-4 font-serif text-2xl text-stone-900">
                                {{ service.title }}
                            </h2>
                            <p class="mt-3 text-sm leading-7 text-stone-600">
                                {{ service.summary }}
                            </p>

                            <div class="mt-5 grid gap-4 lg:grid-cols-2">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-green-dark)]">
                                        Cliente objetivo
                                    </p>
                                    <p class="mt-2 text-sm leading-7 text-stone-600">
                                        {{ service.target_client || 'Sin definir' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-green-dark)]">
                                        Resultado
                                    </p>
                                    <p class="mt-2 text-sm leading-7 text-stone-600">
                                        {{ service.key_result || 'Sin definir' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <Link :href="route('dashboard.services.edit', service.id)" class="cta-secondary">
                                Editar
                            </Link>
                            <button type="button" class="rounded-full border border-rose-200 px-5 py-3 text-sm font-semibold text-rose-600 transition hover:bg-rose-50" @click="destroyService(service)">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </article>

                <div v-if="!services.length" class="admin-card text-center">
                    <h2 class="font-serif text-2xl text-stone-900">
                        Aun no hay servicios
                    </h2>
                    <p class="mt-3 text-sm text-stone-500">
                        Crea el primero para que aparezca en la portada.
                    </p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

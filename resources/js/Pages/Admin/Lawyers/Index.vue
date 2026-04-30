<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    lawyers: {
        type: Array,
        required: true,
    },
});

const destroyLawyer = (lawyer) => {
    if (!window.confirm(`Eliminar el perfil de "${lawyer.name}"?`)) {
        return;
    }

    router.delete(route('dashboard.lawyers.destroy', lawyer.id), {
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Abogados" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        Backoffice
                    </p>
                    <h1 class="mt-2 font-serif text-3xl text-stone-900">
                        Abogados
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Gestiona perfiles individuales con fotografia, enfoque y datos de contacto.
                    </p>
                </div>
                <Link :href="route('dashboard.lawyers.create')" class="cta-primary">
                    Nuevo perfil
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <div class="grid gap-6">
                <article
                    v-for="lawyer in lawyers"
                    :key="lawyer.id"
                    class="admin-card"
                >
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                        <div class="flex flex-col gap-6 md:flex-row">
                            <div
                                class="h-32 w-32 shrink-0 rounded-3xl bg-[var(--color-green-light)] bg-cover bg-center"
                                :style="lawyer.image_url ? { backgroundImage: `url(${lawyer.image_url})` } : {}"
                            >
                                <div
                                    v-if="!lawyer.image_url"
                                    class="flex h-full items-center justify-center font-serif text-3xl text-[var(--color-burgundy)]"
                                >
                                    {{ lawyer.name.split(' ').map((part) => part[0]).join('').slice(0, 2) }}
                                </div>
                            </div>

                            <div class="max-w-3xl">
                                <div class="flex flex-wrap items-center gap-3">
                                    <span class="rounded-full bg-[var(--color-bg-soft)] px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-burgundy)]">
                                        {{ lawyer.role }}
                                    </span>
                                    <span
                                        class="rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em]"
                                        :class="lawyer.is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-stone-200 text-stone-600'"
                                    >
                                        {{ lawyer.is_published ? 'Publicado' : 'Oculto' }}
                                    </span>
                                </div>

                                <h2 class="mt-4 font-serif text-2xl text-stone-900">
                                    {{ lawyer.name }}
                                </h2>
                                <p class="mt-3 text-sm leading-7 text-stone-600">
                                    {{ lawyer.intro }}
                                </p>

                                <div class="mt-5 grid gap-4 lg:grid-cols-3">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-green-dark)]">
                                            Approach
                                        </p>
                                        <p class="mt-2 text-sm leading-7 text-stone-600">
                                            {{ lawyer.approach }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-green-dark)]">
                                            Target client
                                        </p>
                                        <p class="mt-2 text-sm leading-7 text-stone-600">
                                            {{ lawyer.target_client || 'Sin definir' }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-green-dark)]">
                                            Portfolio o service
                                        </p>
                                        <p class="mt-2 text-sm leading-7 text-stone-600">
                                            {{ lawyer.portfolio || 'Sin definir' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <Link :href="route('dashboard.lawyers.edit', lawyer.id)" class="cta-secondary">
                                Editar
                            </Link>
                            <button type="button" class="rounded-full border border-rose-200 px-5 py-3 text-sm font-semibold text-rose-600 transition hover:bg-rose-50" @click="destroyLawyer(lawyer)">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </article>

                <div v-if="!lawyers.length" class="admin-card text-center">
                    <h2 class="font-serif text-2xl text-stone-900">
                        Aun no hay perfiles
                    </h2>
                    <p class="mt-3 text-sm text-stone-500">
                        Crea el primer abogado para alimentar la seccion del equipo.
                    </p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

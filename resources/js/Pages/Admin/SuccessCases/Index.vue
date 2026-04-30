<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    successCases: {
        type: Array,
        required: true,
    },
});

const destroyCase = (caseItem) => {
    if (!window.confirm(`Eliminar "${caseItem.title}"?`)) {
        return;
    }

    router.delete(route('dashboard.success-cases.destroy', caseItem.id), {
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Casos de exito" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        Backoffice
                    </p>
                    <h1 class="mt-2 font-serif text-3xl text-stone-900">
                        Casos de exito
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Publica ejemplos reales con un tono prudente y sin datos sensibles.
                    </p>
                </div>
                <Link :href="route('dashboard.success-cases.create')" class="cta-primary">
                    Nuevo caso
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <div class="grid gap-6">
                <article
                    v-for="caseItem in successCases"
                    :key="caseItem.id"
                    class="admin-card"
                >
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                        <div class="max-w-4xl">
                            <div class="flex flex-wrap items-center gap-3">
                                <span class="rounded-full bg-[var(--color-bg-soft)] px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-burgundy)]">
                                    {{ caseItem.practice_area || 'Area juridica' }}
                                </span>
                                <span
                                    class="rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em]"
                                    :class="caseItem.is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-stone-200 text-stone-600'"
                                >
                                    {{ caseItem.is_published ? 'Publicado' : 'Oculto' }}
                                </span>
                            </div>

                            <h2 class="mt-4 font-serif text-2xl text-stone-900">
                                {{ caseItem.title }}
                            </h2>

                            <div class="mt-5 grid gap-4 lg:grid-cols-3">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-green-dark)]">
                                        Problema inicial
                                    </p>
                                    <p class="mt-2 text-sm leading-7 text-stone-600">
                                        {{ caseItem.challenge }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-green-dark)]">
                                        Intervencion
                                    </p>
                                    <p class="mt-2 text-sm leading-7 text-stone-600">
                                        {{ caseItem.approach }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-green-dark)]">
                                        Resultado
                                    </p>
                                    <p class="mt-2 text-sm leading-7 text-stone-600">
                                        {{ caseItem.outcome }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <Link :href="route('dashboard.success-cases.edit', caseItem.id)" class="cta-secondary">
                                Editar
                            </Link>
                            <button type="button" class="rounded-full border border-rose-200 px-5 py-3 text-sm font-semibold text-rose-600 transition hover:bg-rose-50" @click="destroyCase(caseItem)">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </article>

                <div v-if="!successCases.length" class="admin-card text-center">
                    <h2 class="font-serif text-2xl text-stone-900">
                        Aun no hay casos
                    </h2>
                    <p class="mt-3 text-sm text-stone-500">
                        Cuando tengas ejemplos autorizados, podras publicarlos aqui.
                    </p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

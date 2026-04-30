<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    submissions: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Contactos" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        Backoffice
                    </p>
                    <h1 class="mt-2 font-serif text-3xl text-stone-900">
                        Contactos recibidos
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Mensajes enviados desde el formulario publico.
                    </p>
                </div>
                <Link :href="route('dashboard.settings.edit')" class="cta-secondary">
                    Configurar home
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <div class="grid gap-6">
                <article
                    v-for="submission in submissions.data"
                    :key="submission.id"
                    class="admin-card"
                >
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                        <div class="max-w-3xl">
                            <div class="flex flex-wrap items-center gap-4">
                                <h2 class="font-serif text-2xl text-stone-900">
                                    {{ submission.name }}
                                </h2>
                                <span class="rounded-full bg-[var(--color-bg-soft)] px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-burgundy)]">
                                    {{ new Date(submission.created_at).toLocaleDateString('es-ES') }}
                                </span>
                            </div>

                            <div class="mt-3 flex flex-wrap gap-5 text-sm text-stone-500">
                                <span>{{ submission.email }}</span>
                                <span>{{ submission.phone || 'Sin telefono' }}</span>
                            </div>

                            <p class="mt-5 text-sm leading-7 text-stone-600">
                                {{ submission.message }}
                            </p>
                        </div>
                    </div>
                </article>

                <div v-if="!submissions.data.length" class="admin-card text-center">
                    <h2 class="font-serif text-2xl text-stone-900">
                        Aun no hay mensajes
                    </h2>
                    <p class="mt-3 text-sm text-stone-500">
                        Cuando alguien use el formulario de contacto, aparecera aqui.
                    </p>
                </div>

                <div v-if="submissions.links?.length > 3" class="flex flex-wrap gap-3">
                    <Link
                        v-for="link in submissions.links"
                        :key="`${link.label}-${link.url}`"
                        :href="link.url || '#'"
                        class="rounded-full px-4 py-2 text-sm font-semibold transition"
                        :class="[
                            link.active ? 'bg-[var(--color-burgundy)] text-white' : 'bg-white text-stone-600 border border-stone-200',
                            !link.url && 'pointer-events-none opacity-50',
                        ]"
                        v-html="link.label"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

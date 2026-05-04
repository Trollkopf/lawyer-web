<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    testimonials: {
        type: Array,
        required: true,
    },
});

const destroyTestimonial = (testimonial) => {
    if (!window.confirm(`Eliminar "${testimonial.client_name}"?`)) {
        return;
    }

    router.delete(route('dashboard.testimonials.destroy', testimonial.id), {
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Opiniones" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                        Backoffice
                    </p>
                    <h1 class="mt-2 font-serif text-3xl text-stone-900">
                        Opiniones
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Organiza articulos de opinion y reflexiones para la seccion editorial.
                    </p>
                </div>
                <Link :href="route('dashboard.testimonials.create')" class="cta-primary">
                    Nueva opinion
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <div class="grid gap-6">
                <article
                    v-for="testimonial in testimonials"
                    :key="testimonial.id"
                    class="admin-card"
                >
                    <div class="flex flex-col gap-5">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="font-serif text-2xl text-stone-900">
                                    {{ testimonial.client_name }}
                                </p>
                                <p class="mt-2 text-sm text-stone-500">
                                    {{ testimonial.matter || 'Tema sin especificar' }}
                                </p>
                            </div>
                            <span
                                class="rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em]"
                                :class="testimonial.is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-stone-200 text-stone-600'"
                            >
                                {{ testimonial.is_published ? 'Publicado' : 'Oculto' }}
                            </span>
                        </div>

                        <p class="whitespace-pre-line text-sm leading-7 text-stone-600">
                            {{ testimonial.quote }}
                        </p>

                        <div class="flex gap-3 pt-2">
                            <Link :href="route('dashboard.testimonials.edit', testimonial.id)" class="cta-secondary">
                                Editar
                            </Link>
                            <button type="button" class="rounded-full border border-rose-200 px-5 py-3 text-sm font-semibold text-rose-600 transition hover:bg-rose-50" @click="destroyTestimonial(testimonial)">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </article>

                <div v-if="!testimonials.length" class="admin-card text-center">
                    <h2 class="font-serif text-2xl text-stone-900">
                        Aun no hay opiniones
                    </h2>
                    <p class="mt-3 text-sm text-stone-500">
                        Publica aqui articulos u opiniones cuando el contenido este revisado.
                    </p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

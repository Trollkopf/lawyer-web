<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from '@/Pages/Admin/Testimonials/Form.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    testimonial: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    client_name: props.testimonial.client_name,
    matter: props.testimonial.matter ?? '',
    quote: props.testimonial.quote,
    rating: props.testimonial.rating ?? 5,
    sort_order: props.testimonial.sort_order ?? 0,
    is_published: Boolean(props.testimonial.is_published),
});

const submit = () => {
    form.put(route('dashboard.testimonials.update', props.testimonial.id));
};
</script>

<template>
    <Head title="Editar opinion" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl text-stone-900">
                        Editar opinion
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Ajusta el texto editorial antes de publicarlo.
                    </p>
                </div>
                <Link :href="route('dashboard.testimonials.index')" class="cta-secondary">
                    Volver
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
            <form @submit.prevent="submit">
                <Form :form="form" submit-label="Guardar cambios" />
            </form>
        </div>
    </AuthenticatedLayout>
</template>

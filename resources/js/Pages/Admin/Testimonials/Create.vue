<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from '@/Pages/Admin/Testimonials/Form.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    client_name: '',
    matter: '',
    quote: '',
    rating: 5,
    sort_order: 0,
    is_published: true,
});

const submit = () => {
    form.post(route('dashboard.testimonials.store'));
};
</script>

<template>
    <Head title="Nueva opinion" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl text-stone-900">
                        Nueva opinion
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Crea una reseña lista para publicarse en la home.
                    </p>
                </div>
                <Link :href="route('dashboard.testimonials.index')" class="cta-secondary">
                    Volver
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
            <form @submit.prevent="submit">
                <Form :form="form" submit-label="Crear opinion" />
            </form>
        </div>
    </AuthenticatedLayout>
</template>

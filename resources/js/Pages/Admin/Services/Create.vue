<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from '@/Pages/Admin/Services/Form.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    summary: '',
    target_client: '',
    key_result: '',
    sort_order: 0,
    is_published: true,
});

const submit = () => {
    form.post(route('dashboard.services.store'));
};
</script>

<template>
    <Head title="Nuevo servicio" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl text-stone-900">
                        Nuevo servicio
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Da de alta un bloque para la seccion de servicios.
                    </p>
                </div>
                <Link :href="route('dashboard.services.index')" class="cta-secondary">
                    Volver
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
            <form @submit.prevent="submit">
                <Form :form="form" submit-label="Crear servicio" />
            </form>
        </div>
    </AuthenticatedLayout>
</template>

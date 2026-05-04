<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from '@/Pages/Admin/SuccessCases/Form.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    challenge: '',
    diagnosis: '',
    approach: '',
    outcome: '',
    takeaway: '',
    practice_area: '',
    sort_order: 0,
    is_published: true,
});

const submit = () => {
    form.post(route('dashboard.success-cases.store'));
};
</script>

<template>
    <Head title="Nuevo caso" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl text-stone-900">
                        Nuevo caso de exito
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Crea una ficha prudente y apta para web publica.
                    </p>
                </div>
                <Link :href="route('dashboard.success-cases.index')" class="cta-secondary">
                    Volver
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
            <form @submit.prevent="submit">
                <Form :form="form" submit-label="Crear caso" />
            </form>
        </div>
    </AuthenticatedLayout>
</template>

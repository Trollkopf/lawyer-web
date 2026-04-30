<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from '@/Pages/Admin/Lawyers/Form.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    role: '',
    intro: '',
    approach: '',
    target_client: '',
    portfolio: '',
    email: '',
    phone: '',
    photo: null,
    sort_order: 0,
    is_published: true,
});

const submit = () => {
    form.post(route('dashboard.lawyers.store'), {
        forceFormData: true,
    });
};
</script>

<template>
    <Head title="Nuevo abogado" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl text-stone-900">
                        Nuevo abogado
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Crea un perfil profesional editable desde el panel.
                    </p>
                </div>
                <Link :href="route('dashboard.lawyers.index')" class="cta-secondary">
                    Volver
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
            <form @submit.prevent="submit">
                <Form :form="form" submit-label="Crear perfil" />
            </form>
        </div>
    </AuthenticatedLayout>
</template>

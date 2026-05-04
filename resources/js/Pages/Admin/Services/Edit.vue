<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from '@/Pages/Admin/Services/Form.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    service: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    title: props.service.title,
    summary: props.service.summary,
    target_client: props.service.target_client ?? '',
    key_result: props.service.key_result ?? '',
    sort_order: props.service.sort_order ?? 0,
    is_published: Boolean(props.service.is_published),
});

const submit = () => {
    form.put(route('dashboard.services.update', props.service.id));
};
</script>

<template>
    <Head title="Editar rol" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl text-stone-900">
                        Editar rol
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Ajusta contenido, orden o visibilidad del rol profesional.
                    </p>
                </div>
                <Link :href="route('dashboard.services.index')" class="cta-secondary">
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

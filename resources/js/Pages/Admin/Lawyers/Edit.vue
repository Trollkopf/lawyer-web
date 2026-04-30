<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from '@/Pages/Admin/Lawyers/Form.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    lawyer: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: props.lawyer.name,
    role: props.lawyer.role,
    intro: props.lawyer.intro,
    approach: props.lawyer.approach,
    target_client: props.lawyer.target_client ?? '',
    portfolio: props.lawyer.portfolio ?? '',
    email: props.lawyer.email ?? '',
    phone: props.lawyer.phone ?? '',
    photo: null,
    sort_order: props.lawyer.sort_order ?? 0,
    is_published: Boolean(props.lawyer.is_published),
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        _method: 'put',
    })).post(route('dashboard.lawyers.update', props.lawyer.id), {
        forceFormData: true,
        onSuccess: () => form.reset('photo'),
    });
};
</script>

<template>
    <Head title="Editar abogado" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl text-stone-900">
                        Editar abogado
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Actualiza el perfil que se muestra en la home.
                    </p>
                </div>
                <Link :href="route('dashboard.lawyers.index')" class="cta-secondary">
                    Volver
                </Link>
            </div>
        </template>

        <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
            <form @submit.prevent="submit">
                <Form :form="form" :current-image-url="lawyer.image_url" submit-label="Guardar cambios" />
            </form>
        </div>
    </AuthenticatedLayout>
</template>

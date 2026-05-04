<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Form from '@/Pages/Admin/SuccessCases/Form.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    successCase: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    title: props.successCase.title,
    challenge: props.successCase.challenge,
    diagnosis: props.successCase.diagnosis ?? '',
    approach: props.successCase.approach,
    outcome: props.successCase.outcome,
    takeaway: props.successCase.takeaway ?? '',
    practice_area: props.successCase.practice_area ?? '',
    sort_order: props.successCase.sort_order ?? 0,
    is_published: Boolean(props.successCase.is_published),
});

const submit = () => {
    form.put(route('dashboard.success-cases.update', props.successCase.id));
};
</script>

<template>
    <Head title="Editar caso" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h1 class="font-serif text-3xl text-stone-900">
                        Editar caso de exito
                    </h1>
                    <p class="mt-2 text-sm text-stone-500">
                        Ajusta el contenido antes de publicarlo o reutilizarlo.
                    </p>
                </div>
                <Link :href="route('dashboard.success-cases.index')" class="cta-secondary">
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

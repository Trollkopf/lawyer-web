<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    form: {
        type: Object,
        required: true,
    },
    submitLabel: {
        type: String,
        default: 'Guardar',
    },
});
</script>

<template>
    <div class="grid gap-6">
        <div class="grid gap-6 lg:grid-cols-3">
            <div class="admin-card">
                <InputLabel for="client_name" value="Nombre o iniciales" />
                <TextInput id="client_name" v-model="form.client_name" type="text" class="mt-2 block w-full" />
                <InputError :message="form.errors.client_name" class="mt-2" />
            </div>

            <div class="admin-card lg:col-span-2">
                <InputLabel for="matter" value="Tipo de asunto" />
                <TextInput id="matter" v-model="form.matter" type="text" class="mt-2 block w-full" />
                <InputError :message="form.errors.matter" class="mt-2" />
            </div>
        </div>

        <div class="admin-card">
            <InputLabel for="quote" value="Opinion" />
            <textarea id="quote" v-model="form.quote" rows="6" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
            <InputError :message="form.errors.quote" class="mt-2" />
        </div>

        <div class="grid gap-6 lg:grid-cols-[220px_220px_1fr]">
            <div class="admin-card">
                <InputLabel for="rating" value="Valoracion" />
                <TextInput id="rating" v-model="form.rating" type="number" min="1" max="5" class="mt-2 block w-full" />
                <InputError :message="form.errors.rating" class="mt-2" />
            </div>

            <div class="admin-card">
                <InputLabel for="testimonial_sort_order" value="Orden" />
                <TextInput id="testimonial_sort_order" v-model="form.sort_order" type="number" min="0" class="mt-2 block w-full" />
                <InputError :message="form.errors.sort_order" class="mt-2" />
            </div>

            <div class="admin-card flex items-center gap-3">
                <Checkbox id="testimonial_is_published" v-model:checked="form.is_published" />
                <div>
                    <InputLabel for="testimonial_is_published" value="Publicado en la home" />
                    <p class="mt-1 text-sm text-stone-500">
                        Usa solo opiniones reales verificadas por el cliente.
                    </p>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="cta-primary" :disabled="form.processing">
                {{ form.processing ? 'Guardando...' : submitLabel }}
            </button>
        </div>
    </div>
</template>

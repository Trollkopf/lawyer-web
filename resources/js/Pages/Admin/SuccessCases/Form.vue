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
        <div class="grid gap-6 lg:grid-cols-2">
            <div class="admin-card">
                <InputLabel for="case_title" value="Titulo generico" />
                <TextInput id="case_title" v-model="form.title" type="text" class="mt-2 block w-full" />
                <InputError :message="form.errors.title" class="mt-2" />
            </div>

            <div class="admin-card">
                <InputLabel for="practice_area" value="Area juridica" />
                <TextInput id="practice_area" v-model="form.practice_area" type="text" class="mt-2 block w-full" />
                <InputError :message="form.errors.practice_area" class="mt-2" />
            </div>
        </div>

        <div class="admin-card">
            <InputLabel for="challenge" value="Problema inicial" />
            <textarea id="challenge" v-model="form.challenge" rows="5" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
            <InputError :message="form.errors.challenge" class="mt-2" />
        </div>

        <div class="admin-card">
            <InputLabel for="approach_case" value="Intervencion del despacho" />
            <textarea id="approach_case" v-model="form.approach" rows="5" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
            <InputError :message="form.errors.approach" class="mt-2" />
        </div>

        <div class="admin-card">
            <InputLabel for="outcome" value="Resultado o valor aportado" />
            <textarea id="outcome" v-model="form.outcome" rows="5" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
            <InputError :message="form.errors.outcome" class="mt-2" />
        </div>

        <div class="grid gap-6 lg:grid-cols-[220px_1fr]">
            <div class="admin-card">
                <InputLabel for="case_sort_order" value="Orden" />
                <TextInput id="case_sort_order" v-model="form.sort_order" type="number" min="0" class="mt-2 block w-full" />
                <InputError :message="form.errors.sort_order" class="mt-2" />
            </div>

            <div class="admin-card flex items-center gap-3">
                <Checkbox id="case_is_published" v-model:checked="form.is_published" />
                <div>
                    <InputLabel for="case_is_published" value="Publicado en la home" />
                    <p class="mt-1 text-sm text-stone-500">
                        Publica solo casos autorizados y debidamente anonimizados.
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

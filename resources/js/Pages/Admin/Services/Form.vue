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
        <div class="admin-card">
            <InputLabel for="title" value="Nombre del rol" />
            <TextInput id="title" v-model="form.title" type="text" class="mt-2 block w-full" />
            <InputError :message="form.errors.title" class="mt-2" />
        </div>

        <div class="admin-card">
            <InputLabel for="summary" value="Approach / Enfoque" />
            <textarea id="summary" v-model="form.summary" rows="8" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
            <InputError :message="form.errors.summary" class="mt-2" />
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="admin-card">
                <InputLabel for="target_client" value="Target client / Cliente objetivo" />
                <textarea id="target_client" v-model="form.target_client" rows="8" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                <InputError :message="form.errors.target_client" class="mt-2" />
            </div>

            <div class="admin-card">
                <InputLabel for="key_result" value="Portfolio of services / Catalogo de servicios" />
                <textarea id="key_result" v-model="form.key_result" rows="12" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                <InputError :message="form.errors.key_result" class="mt-2" />
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-[220px_1fr]">
            <div class="admin-card">
                <InputLabel for="sort_order" value="Orden" />
                <TextInput id="sort_order" v-model="form.sort_order" type="number" min="0" class="mt-2 block w-full" />
                <InputError :message="form.errors.sort_order" class="mt-2" />
            </div>

            <div class="admin-card flex items-center gap-3">
                <Checkbox id="is_published" v-model:checked="form.is_published" />
                <div>
                    <InputLabel for="is_published" value="Publicado en la home" />
                    <p class="mt-1 text-sm text-stone-500">
                        Desactivalo si quieres conservarlo en panel sin mostrarlo aun.
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

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
    currentImageUrl: {
        type: String,
        default: null,
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
                <InputLabel for="name" value="Nombre" />
                <TextInput id="name" v-model="form.name" type="text" class="mt-2 block w-full" />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="admin-card">
                <InputLabel for="role" value="Cargo o especialidad" />
                <TextInput id="role" v-model="form.role" type="text" class="mt-2 block w-full" />
                <InputError :message="form.errors.role" class="mt-2" />
            </div>
        </div>

        <div class="admin-card">
            <InputLabel for="intro" value="Presentacion breve" />
            <textarea id="intro" v-model="form.intro" rows="4" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
            <InputError :message="form.errors.intro" class="mt-2" />
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="admin-card">
                <InputLabel for="approach" value="Approach" />
                <textarea id="approach" v-model="form.approach" rows="5" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                <InputError :message="form.errors.approach" class="mt-2" />
            </div>

            <div class="admin-card">
                <InputLabel for="target_client" value="Target client" />
                <textarea id="target_client" v-model="form.target_client" rows="5" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
                <InputError :message="form.errors.target_client" class="mt-2" />
            </div>
        </div>

        <div class="admin-card">
            <InputLabel for="portfolio" value="Portfolio o service" />
            <textarea id="portfolio" v-model="form.portfolio" rows="5" class="mt-2 block w-full rounded-2xl border-stone-300 px-4 py-3 text-sm shadow-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]" />
            <InputError :message="form.errors.portfolio" class="mt-2" />
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            <div class="admin-card">
                <InputLabel for="email" value="Email" />
                <TextInput id="email" v-model="form.email" type="email" class="mt-2 block w-full" />
                <InputError :message="form.errors.email" class="mt-2" />
            </div>

            <div class="admin-card">
                <InputLabel for="phone" value="Telefono" />
                <TextInput id="phone" v-model="form.phone" type="text" class="mt-2 block w-full" />
                <InputError :message="form.errors.phone" class="mt-2" />
            </div>

            <div class="admin-card">
                <InputLabel for="sort_order" value="Orden" />
                <TextInput id="sort_order" v-model="form.sort_order" type="number" min="0" class="mt-2 block w-full" />
                <InputError :message="form.errors.sort_order" class="mt-2" />
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-[1fr_auto]">
            <div class="admin-card">
                <InputLabel for="photo" value="Fotografia" />
                <input id="photo" type="file" accept="image/*" class="mt-2 block w-full rounded-2xl border border-stone-300 px-4 py-3 text-sm" @input="form.photo = $event.target.files[0]" />
                <InputError :message="form.errors.photo" class="mt-2" />
            </div>

            <div v-if="currentImageUrl" class="admin-card w-full lg:w-48">
                <p class="text-sm font-semibold text-stone-900">
                    Imagen actual
                </p>
                <div class="mt-4 h-48 rounded-2xl bg-cover bg-center" :style="{ backgroundImage: `url(${currentImageUrl})` }" />
            </div>
        </div>

        <div class="admin-card flex items-center gap-3">
            <Checkbox id="lawyer_is_published" v-model:checked="form.is_published" />
            <div>
                <InputLabel for="lawyer_is_published" value="Publicado en la home" />
                <p class="mt-1 text-sm text-stone-500">
                    El perfil solo aparecera en la web publica si esta marcado.
                </p>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="cta-primary" :disabled="form.processing">
                {{ form.processing ? 'Guardando...' : submitLabel }}
            </button>
        </div>
    </div>
</template>

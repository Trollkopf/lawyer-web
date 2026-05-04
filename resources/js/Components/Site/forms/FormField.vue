<script setup>
defineProps({
    id: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        required: true,
    },
    modelValue: {
        type: String,
        default: '',
    },
    type: {
        type: String,
        default: 'text',
    },
    error: {
        type: String,
        default: '',
    },
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div>
        <label class="text-sm font-semibold text-[var(--color-text)]" :for="id">
            {{ label }}
        </label>
        <input
            :id="id"
            :value="modelValue"
            :type="type"
            class="mt-2 block w-full rounded-lg border-[var(--color-border)] bg-white px-4 py-3 text-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]"
            @input="emit('update:modelValue', $event.target.value)"
        >
        <p v-if="error" class="mt-2 text-sm text-[var(--color-burgundy)]">
            {{ error }}
        </p>
    </div>
</template>

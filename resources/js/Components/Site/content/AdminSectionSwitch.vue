<script setup>
defineProps({
    modelValue: {
        type: Boolean,
        default: true,
    },
    label: {
        type: String,
        required: true,
    },
    hint: {
        type: String,
        default: '',
    },
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <label class="admin-switch">
        <div>
            <p class="text-sm font-semibold text-stone-900">
                {{ label }}
            </p>
            <p v-if="hint" class="mt-1 text-sm text-stone-500">
                {{ hint }}
            </p>
        </div>
        <button
            type="button"
            class="admin-switch-track"
            :class="modelValue ? 'admin-switch-track-on' : 'admin-switch-track-off'"
            :aria-pressed="modelValue ? 'true' : 'false'"
            @click="emit('update:modelValue', !modelValue)"
        >
            <span
                class="admin-switch-thumb"
                :class="modelValue ? 'translate-x-5' : 'translate-x-0'"
            />
        </button>
    </label>
</template>

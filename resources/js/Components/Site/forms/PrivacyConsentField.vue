<script setup>
defineProps({
    modelValue: {
        type: Boolean,
        default: false,
    },
    privacyUrl: {
        type: String,
        required: true,
    },
    legalUrl: {
        type: String,
        required: true,
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
        <label class="flex items-start gap-3 rounded-lg bg-[var(--color-bg-soft)] px-4 py-4 text-sm leading-6 text-[var(--color-text-muted)]">
            <input
                :checked="modelValue"
                type="checkbox"
                class="mt-1 rounded border-[var(--color-border)] text-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]"
                @change="emit('update:modelValue', $event.target.checked)"
            >
            <span>
                Acepto la
                <a :href="privacyUrl" class="font-semibold text-[var(--color-burgundy)] underline">
                    politica de privacidad
                </a>
                y he leido el
                <a :href="legalUrl" class="font-semibold text-[var(--color-burgundy)] underline">
                    aviso legal
                </a>.
            </span>
        </label>
        <p v-if="error" class="text-sm text-[var(--color-burgundy)]">
            {{ error }}
        </p>
    </div>
</template>

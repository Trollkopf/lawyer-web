<script setup>
defineProps({
    quote: {
        type: String,
        default: '',
    },
    signature: {
        type: String,
        default: '',
    },
});
</script>

<template>
    <div class="surface-panel p-8 md:p-10">
        <div class="eyebrow-divider" />
        <p class="mt-6 font-serif text-2xl leading-10 text-[var(--color-text)]">
            “{{ quote }}”
        </p>
        <p v-if="signature" class="mt-6 text-sm font-semibold uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
            {{ signature }}
        </p>
    </div>
</template>

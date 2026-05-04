<script setup>
defineProps({
    label: {
        type: String,
        required: true,
    },
    value: {
        type: String,
        required: true,
    },
    compact: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <div class="hero-stat">
        <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--color-burgundy)]">
            {{ label }}
        </p>
        <p :class="compact ? 'mt-3 text-sm leading-7 text-[var(--color-text)]' : 'mt-3 font-sans text-xl font-semibold uppercase tracking-[-0.03em] text-[var(--color-text)]'">
            {{ value }}
        </p>
    </div>
</template>

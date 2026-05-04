<script setup>
defineProps({
    expanded: {
        type: Boolean,
        default: false,
    },
    moreLabel: {
        type: String,
        default: 'Ver mas',
    },
    lessLabel: {
        type: String,
        default: 'Ver menos',
    },
});

const emit = defineEmits(['toggle']);
</script>

<template>
    <button
        type="button"
        class="inline-flex items-center gap-2 rounded-full border border-[var(--color-green)] bg-white px-4 py-2 text-sm font-semibold text-[var(--color-green-dark)] transition hover:border-[var(--color-burgundy)] hover:text-[var(--color-burgundy)] focus:outline-none focus:ring-2 focus:ring-[var(--color-burgundy)] focus:ring-offset-2"
        @click="emit('toggle')"
    >
        {{ expanded ? lessLabel : moreLabel }}
    </button>
</template>

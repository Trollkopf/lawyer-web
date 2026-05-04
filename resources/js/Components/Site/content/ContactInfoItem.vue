<script setup>
defineProps({
    label: {
        type: String,
        required: true,
    },
    value: {
        type: String,
        default: '',
    },
});
</script>

<template>
    <div>
        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--color-gold-soft)]">
            {{ label }}
        </p>
        <p class="mt-2 text-lg text-white">
            {{ value }}
        </p>
    </div>
</template>

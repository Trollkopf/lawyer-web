<script setup>
defineProps({
    city: {
        type: String,
        default: '',
    },
    title: {
        type: String,
        default: '',
    },
    text: {
        type: String,
        default: '',
    },
});
</script>

<template>
    <div v-if="title || text" class="hero-highlight">
        <div class="hero-chip mb-6 w-fit">
            {{ city }}
        </div>
        <p v-if="title" class="font-sans text-xl font-semibold uppercase tracking-[-0.03em] text-[var(--color-text)]">
            {{ title }}
        </p>
        <p v-if="text" class="mt-4 text-sm leading-7 text-[var(--color-text-muted)]">
            {{ text }}
        </p>
    </div>
</template>

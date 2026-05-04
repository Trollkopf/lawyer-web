<script setup>
defineProps({
    paragraphs: {
        type: Array,
        required: true,
    },
    paragraphClass: {
        type: String,
        default: 'max-w-5xl text-lg leading-9 text-[var(--color-text-muted)]',
    },
});
</script>

<template>
    <div class="space-y-6">
        <p
            v-for="(paragraph, index) in paragraphs"
            :key="`paragraph-${index}`"
            :class="paragraphClass"
        >
            {{ paragraph }}
        </p>
    </div>
</template>

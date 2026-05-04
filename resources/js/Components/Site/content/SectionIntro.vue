<script setup>
defineProps({
    eyebrow: {
        type: String,
        default: '',
    },
    title: {
        type: String,
        default: '',
    },
    description: {
        type: String,
        default: '',
    },
    titleClass: {
        type: String,
        default: '',
    },
    copyClass: {
        type: String,
        default: '',
    },
    kickerClass: {
        type: String,
        default: '',
    },
});
</script>

<template>
    <p :class="['section-kicker', kickerClass]">
        {{ eyebrow }}
    </p>
    <h2 :class="['section-title', titleClass]">
        {{ title }}
    </h2>
    <p v-if="description" :class="['section-copy whitespace-pre-line', copyClass]">
        {{ description }}
    </p>
</template>

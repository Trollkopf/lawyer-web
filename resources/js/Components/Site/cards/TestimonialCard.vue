<script setup>
import { computed, ref } from 'vue';
import ExpandToggleButton from '../content/ExpandToggleButton.vue';
import { splitParagraphs } from '../utils/site.js';

const props = defineProps({
    testimonial: {
        type: Object,
        required: true,
    },
    allowExpand: {
        type: Boolean,
        default: false,
    },
});

const paragraphs = computed(() => splitParagraphs(props.testimonial.quote));
const expanded = ref(false);
</script>

<template>
    <article class="surface-panel p-8">
        <p v-if="testimonial.matter" class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
            {{ testimonial.matter }}
        </p>
        <h3 class="mt-4 font-serif text-2xl leading-tight text-[var(--color-text)]">
            {{ testimonial.client_name }}
        </h3>
        <div
            class="mt-6 space-y-5 text-sm leading-7 text-[var(--color-text-muted)]"
            :class="allowExpand && !expanded ? 'content-fade-panel content-fade-panel-md' : ''"
        >
            <p
                v-for="(paragraph, index) in paragraphs"
                :key="`testimonial-paragraph-${index}`"
            >
                {{ paragraph }}
            </p>
        </div>
        <div v-if="allowExpand" class="mt-6">
            <ExpandToggleButton :expanded="expanded" @toggle="expanded = !expanded" />
        </div>
    </article>
</template>

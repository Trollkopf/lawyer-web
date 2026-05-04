<script setup>
import { ref } from 'vue';
import ExpandToggleButton from './ExpandToggleButton.vue';

const props = defineProps({
    paragraphs: {
        type: Array,
        required: true,
    },
    paragraphClass: {
        type: String,
        default: 'max-w-5xl text-lg leading-9 text-[var(--color-text-muted)]',
    },
    allowExpand: {
        type: Boolean,
        default: false,
    },
    collapseClass: {
        type: String,
        default: 'content-fade-panel content-fade-panel-md',
    },
});

const expanded = ref(false);
</script>

<template>
    <div>
        <div class="space-y-6" :class="allowExpand && !expanded ? collapseClass : ''">
            <p
                v-for="(paragraph, index) in paragraphs"
                :key="`paragraph-${index}`"
                :class="paragraphClass"
            >
                {{ paragraph }}
            </p>
        </div>
        <div v-if="allowExpand" class="mt-6">
            <ExpandToggleButton :expanded="expanded" @toggle="expanded = !expanded" />
        </div>
    </div>
</template>

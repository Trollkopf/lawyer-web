<script setup>
import { ref } from 'vue';
import ExpandToggleButton from '../content/ExpandToggleButton.vue';

const props = defineProps({
    caseItem: {
        type: Object,
        required: true,
    },
    allowExpand: {
        type: Boolean,
        default: false,
    },
});

const expanded = ref(false);
</script>

<template>
    <article class="surface-panel p-8">
        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
            {{ caseItem.practice_area || 'Caso representativo' }}
        </p>
        <h3 class="mt-5 font-serif text-2xl text-[var(--color-text)]">
            {{ caseItem.title }}
        </h3>
        <div
            class="mt-6 space-y-5 text-sm leading-7 text-[var(--color-text-muted)]"
            :class="allowExpand && !expanded ? 'content-fade-panel content-fade-panel-md' : ''"
        >
            <div>
                <p class="font-semibold text-[var(--color-green-dark)]">
                    Supuesto de hecho
                </p>
                <p class="mt-1 whitespace-pre-line">
                    {{ caseItem.challenge }}
                </p>
            </div>
            <div v-if="caseItem.diagnosis">
                <p class="font-semibold text-[var(--color-green-dark)]">
                    Primer diagnostico
                </p>
                <p class="mt-1 whitespace-pre-line">
                    {{ caseItem.diagnosis }}
                </p>
            </div>
            <div>
                <p class="font-semibold text-[var(--color-green-dark)]">
                    Metodologia aplicada
                </p>
                <p class="mt-1 whitespace-pre-line">
                    {{ caseItem.approach }}
                </p>
            </div>
            <div>
                <p class="font-semibold text-[var(--color-green-dark)]">
                    Resultado
                </p>
                <p class="mt-1 whitespace-pre-line">
                    {{ caseItem.outcome }}
                </p>
            </div>
            <div v-if="caseItem.takeaway">
                <p class="font-semibold text-[var(--color-green-dark)]">
                    Moraleja
                </p>
                <p class="mt-1 whitespace-pre-line">
                    {{ caseItem.takeaway }}
                </p>
            </div>
        </div>
        <div v-if="allowExpand" class="mt-6">
            <ExpandToggleButton :expanded="expanded" @toggle="expanded = !expanded" />
        </div>
    </article>
</template>

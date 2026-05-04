<script setup>
import { computed, ref, watch } from 'vue';
import SectionIntro from '../content/SectionIntro.vue';
import SectionTabList from '../content/SectionTabList.vue';
import SuccessCaseCard from '../cards/SuccessCaseCard.vue';
import { isSectionEnabled } from '../utils/site.js';

const props = defineProps({
    settings: {
        type: Object,
        required: true,
    },
    successCases: {
        type: Array,
        required: true,
    },
    forceReadMore: {
        type: Boolean,
        default: false,
    },
});

const activeCaseId = ref(props.successCases[0]?.id ?? null);

watch(
    () => props.successCases,
    (items) => {
        if (!items.length) {
            activeCaseId.value = null;
            return;
        }

        if (!items.some((item) => item.id === activeCaseId.value)) {
            activeCaseId.value = items[0].id;
        }
    },
    { immediate: true },
);

const activeCase = computed(() => props.successCases.find((item) => item.id === activeCaseId.value) ?? null);
const allowExpand = computed(() => (
    props.forceReadMore
    || props.settings.cases?.enable_read_more === true
    || props.settings.cases?.enable_read_more === 1
    || props.settings.cases?.enable_read_more === '1'
));
</script>

<template>
    <section v-if="isSectionEnabled(settings.cases)" id="casos" class="section-shell bg-[var(--color-bg-soft)]">
        <div class="site-container site-container-wide">
            <SectionIntro
                :eyebrow="settings.cases.eyebrow"
                :title="settings.cases.title"
                :description="settings.cases.description"
            />

            <div class="mt-12 grid gap-6 lg:grid-cols-[17rem_minmax(0,1fr)] lg:items-start">
                <SectionTabList
                    v-if="successCases.length"
                    :items="successCases"
                    :active-id="activeCaseId"
                    secondary-key="practice_area"
                    @select="activeCaseId = $event"
                />

                <SuccessCaseCard
                    v-if="activeCase"
                    :case-item="activeCase"
                    :allow-expand="allowExpand"
                />

                <article v-if="!successCases.length" class="surface-panel p-8 lg:col-span-2">
                    <h3 class="font-serif text-2xl text-[var(--color-text)]">
                        Casos listos para publicar con criterio prudente
                    </h3>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-[var(--color-text-muted)]">
                        La estructura ya contempla problema inicial, intervencion y resultado, pero conviene cargar solo ejemplos reales debidamente anonimizados y autorizados.
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

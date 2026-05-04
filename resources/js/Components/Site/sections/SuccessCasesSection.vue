<script setup>
import SectionIntro from '../content/SectionIntro.vue';
import SuccessCaseCard from '../cards/SuccessCaseCard.vue';

defineProps({
    settings: {
        type: Object,
        required: true,
    },
    successCases: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <section id="casos" class="section-shell bg-[var(--color-bg-soft)]">
        <div class="site-container">
            <SectionIntro
                :eyebrow="settings.cases.eyebrow"
                :title="settings.cases.title"
                :description="settings.cases.description"
            />

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                <SuccessCaseCard
                    v-for="caseItem in successCases"
                    :key="caseItem.id"
                    :case-item="caseItem"
                />

                <article v-if="!successCases.length" class="surface-panel p-8 lg:col-span-3">
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

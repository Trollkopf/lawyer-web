<script setup>
import SectionIntro from '../content/SectionIntro.vue';
import LawyerCard from '../cards/LawyerCard.vue';

defineProps({
    settings: {
        type: Object,
        required: true,
    },
    lawyers: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <section id="abogados" class="section-shell">
        <div class="site-container">
            <SectionIntro
                :eyebrow="settings.team.eyebrow"
                :title="settings.team.title"
                :description="settings.team.description"
            />

            <div class="mt-12 grid gap-8 lg:grid-cols-2">
                <LawyerCard
                    v-for="lawyer in lawyers"
                    :key="lawyer.id"
                    :lawyer="lawyer"
                />

                <article v-if="!lawyers.length" class="surface-panel p-8 lg:col-span-2">
                    <h3 class="font-serif text-2xl text-[var(--color-text)]">
                        El bloque del equipo ya esta preparado
                    </h3>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-[var(--color-text-muted)]">
                        Puedes cargar un unico abogado o varios perfiles desde el backoffice, incluyendo fotografia, enfoque, cliente objetivo y areas de trabajo principales.
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

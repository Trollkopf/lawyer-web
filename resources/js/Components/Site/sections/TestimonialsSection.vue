<script setup>
import { computed, ref, watch } from 'vue';
import SectionIntro from '../content/SectionIntro.vue';
import SectionTabList from '../content/SectionTabList.vue';
import TestimonialCard from '../cards/TestimonialCard.vue';

const props = defineProps({
    settings: {
        type: Object,
        required: true,
    },
    testimonials: {
        type: Array,
        required: true,
    },
});

const activeOpinionId = ref(props.testimonials[0]?.id ?? null);

watch(
    () => props.testimonials,
    (items) => {
        if (!items.length) {
            activeOpinionId.value = null;
            return;
        }

        if (!items.some((item) => item.id === activeOpinionId.value)) {
            activeOpinionId.value = items[0].id;
        }
    },
    { immediate: true },
);

const activeOpinion = computed(() => props.testimonials.find((item) => item.id === activeOpinionId.value) ?? null);
</script>

<template>
    <section v-if="settings.testimonials?.is_enabled !== false" id="opiniones" class="section-shell">
        <div class="site-container site-container-wide">
            <SectionIntro
                :eyebrow="settings.testimonials.eyebrow"
                :title="settings.testimonials.title"
                :description="settings.testimonials.description"
            />

            <div class="mt-12 grid gap-6 lg:grid-cols-[17rem_minmax(0,1fr)] lg:items-start">
                <SectionTabList
                    v-if="testimonials.length"
                    :items="testimonials"
                    :active-id="activeOpinionId"
                    label-key="client_name"
                    secondary-key="matter"
                    @select="activeOpinionId = $event"
                />

                <TestimonialCard
                    v-if="activeOpinion"
                    :testimonial="activeOpinion"
                />

                <article v-if="!testimonials.length" class="surface-panel p-8 lg:col-span-2">
                    <h3 class="font-serif text-2xl text-[var(--color-text)]">
                        La seccion de opiniones esta lista para testimonios reales
                    </h3>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-[var(--color-text-muted)]">
                        He dejado el bloque preparado para publicar reseñas verificadas cuando el cliente las facilite. Asi evitamos inventar opiniones y mantenemos credibilidad.
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

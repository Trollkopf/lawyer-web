<script setup>
import SectionIntro from '../content/SectionIntro.vue';
import TestimonialCard from '../cards/TestimonialCard.vue';

defineProps({
    settings: {
        type: Object,
        required: true,
    },
    testimonials: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <section id="opiniones" class="section-shell">
        <div class="site-container">
            <SectionIntro
                :eyebrow="settings.testimonials.eyebrow"
                :title="settings.testimonials.title"
                :description="settings.testimonials.description"
            />

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                <TestimonialCard
                    v-for="testimonial in testimonials"
                    :key="testimonial.id"
                    :testimonial="testimonial"
                />

                <article v-if="!testimonials.length" class="surface-panel p-8 lg:col-span-3">
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

<script setup>
import SectionIntro from '../content/SectionIntro.vue';
import ServiceCard from '../cards/ServiceCard.vue';

defineProps({
    settings: {
        type: Object,
        required: true,
    },
    services: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <section id="servicios" class="section-shell bg-[var(--color-bg-soft)]">
        <div class="site-container">
            <SectionIntro
                :eyebrow="settings.services.eyebrow"
                :title="settings.services.title"
                :description="settings.services.description"
            />

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                <ServiceCard
                    v-for="service in services"
                    :key="service.id"
                    :service="service"
                />

                <article v-if="!services.length" class="surface-panel p-8 lg:col-span-3">
                    <h3 class="font-serif text-2xl text-[var(--color-text)]">
                        Seccion lista para cargar servicios reales
                    </h3>
                    <p class="mt-4 max-w-2xl text-sm leading-7 text-[var(--color-text-muted)]">
                        Desde el backoffice podras crear las areas de trabajo, el tipo de cliente y el objetivo de cada servicio para que la home no dependa de texto fijo.
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>

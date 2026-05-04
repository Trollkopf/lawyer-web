<script setup>
import { computed, ref, watch } from 'vue';
import SectionIntro from '../content/SectionIntro.vue';
import SectionTabList from '../content/SectionTabList.vue';
import ServiceCard from '../cards/ServiceCard.vue';

const props = defineProps({
    settings: {
        type: Object,
        required: true,
    },
    services: {
        type: Array,
        required: true,
    },
});

const activeServiceId = ref(props.services[0]?.id ?? null);

watch(
    () => props.services,
    (items) => {
        if (!items.length) {
            activeServiceId.value = null;
            return;
        }

        if (!items.some((item) => item.id === activeServiceId.value)) {
            activeServiceId.value = items[0].id;
        }
    },
    { immediate: true },
);

const activeService = computed(() => props.services.find((item) => item.id === activeServiceId.value) ?? null);
</script>

<template>
    <section v-if="settings.services?.is_enabled !== false" id="servicios" class="section-shell bg-[var(--color-bg-soft)]">
        <div class="site-container">
            <SectionIntro
                :eyebrow="settings.services.eyebrow"
                :title="settings.services.title"
                :description="settings.services.description"
            />

            <div class="mt-12 grid gap-6 lg:grid-cols-[19rem_minmax(0,1fr)] lg:items-start">
                <SectionTabList
                    v-if="services.length"
                    :items="services"
                    :active-id="activeServiceId"
                    @select="activeServiceId = $event"
                />

                <ServiceCard
                    v-if="activeService"
                    :service="activeService"
                />

                <article v-if="!services.length" class="surface-panel p-8 lg:col-span-2">
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

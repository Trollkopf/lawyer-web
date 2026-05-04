<script setup>
import { computed, ref, watch } from 'vue';
import SectionIntro from '../content/SectionIntro.vue';
import SectionTabList from '../content/SectionTabList.vue';
import ServiceCard from '../cards/ServiceCard.vue';
import { isSectionEnabled } from '../utils/site.js';

const props = defineProps({
    settings: {
        type: Object,
        required: true,
    },
    services: {
        type: Array,
        required: true,
    },
    forceReadMore: {
        type: Boolean,
        default: false,
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
const allowExpand = computed(() => (
    props.forceReadMore
    || props.settings.services?.enable_read_more === true
    || props.settings.services?.enable_read_more === 1
    || props.settings.services?.enable_read_more === '1'
));
</script>

<template>
    <section v-if="isSectionEnabled(settings.services)" id="servicios" class="section-shell bg-[var(--color-bg-soft)]">
        <div class="site-container site-container-wide">
            <SectionIntro
                :eyebrow="settings.services.eyebrow"
                :title="settings.services.title"
                :description="settings.services.description"
            />

            <div class="mt-12 grid gap-6 lg:grid-cols-[17rem_minmax(0,1fr)] lg:items-start">
                <SectionTabList
                    v-if="services.length"
                    :items="services"
                    :active-id="activeServiceId"
                    @select="activeServiceId = $event"
                />

                <ServiceCard
                    v-if="activeService"
                    :service="activeService"
                    :allow-expand="allowExpand"
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

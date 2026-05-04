<script setup>
import { computed } from 'vue';
import ContactFormCard from '../forms/ContactFormCard.vue';
import ContactInfoCard from '../cards/ContactInfoCard.vue';
import SectionIntro from '../content/SectionIntro.vue';
import { isSectionEnabled } from '../utils/site.js';

const props = defineProps({
    settings: {
        type: Object,
        required: true,
    },
    contactForm: {
        type: Object,
        required: true,
    },
    flashSuccess: {
        type: String,
        default: '',
    },
    submitLabel: {
        type: String,
        required: true,
    },
});

defineEmits(['submit']);

const mapEmbedUrl = computed(() => {
    const rawValue = props.settings.contact?.map_url?.trim();

    if (!rawValue) {
        return '';
    }

    const iframeMatch = rawValue.match(/<iframe[^>]+src=["']([^"']+)["']/i);

    if (iframeMatch?.[1]) {
        return iframeMatch[1];
    }

    return rawValue;
});
</script>

<template>
    <section v-if="isSectionEnabled(settings.contact)" id="contacto" class="section-shell bg-[var(--color-text)] text-white">
        <div class="site-container grid gap-10 lg:grid-cols-[0.92fr_1.08fr]">
            <div>
                <SectionIntro
                    :eyebrow="settings.contact.eyebrow"
                    :title="settings.contact.title"
                    :description="settings.contact.description"
                    kicker-class="text-[var(--color-gold-soft)]"
                    title-class="mt-4 max-w-3xl text-4xl leading-tight md:text-5xl"
                    copy-class="mt-5 max-w-xl text-lg leading-8 text-white/72"
                />

                <ContactInfoCard :settings="settings" />
            </div>

            <div class="space-y-6">
                <ContactFormCard
                    :settings="settings"
                    :contact-form="contactForm"
                    :flash-success="flashSuccess"
                    :submit-label="submitLabel"
                    @submit="$emit('submit')"
                />
            </div>

            <iframe
                v-if="mapEmbedUrl"
                :src="mapEmbedUrl"
                class="h-80 w-full rounded-xl border border-white/10 lg:col-span-2"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            />
        </div>
    </section>
</template>

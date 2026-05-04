<script setup>
import ContactFormCard from '../forms/ContactFormCard.vue';
import ContactInfoCard from '../cards/ContactInfoCard.vue';
import SectionIntro from '../content/SectionIntro.vue';

defineProps({
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
</script>

<template>
    <section id="contacto" class="section-shell bg-[var(--color-text)] text-white">
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

                <iframe
                    v-if="settings.contact.map_url"
                    :src="settings.contact.map_url"
                    class="h-72 w-full rounded-xl border border-white/10"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                />
            </div>
        </div>
    </section>
</template>

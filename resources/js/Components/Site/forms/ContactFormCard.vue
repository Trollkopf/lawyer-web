<script setup>
import FormField from './FormField.vue';
import PrivacyConsentField from './PrivacyConsentField.vue';
import TextareaField from './TextareaField.vue';

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
    <div class="rounded-xl border border-white/10 bg-white p-8 text-[var(--color-text)] shadow-[0_28px_70px_rgba(0,0,0,0.18)] md:p-10">
        <h3 class="font-serif text-3xl text-[var(--color-text)]">
            {{ settings.contact.form_heading }}
        </h3>
        <p v-if="flashSuccess" class="mt-4 rounded-lg border border-[var(--color-green)]/35 bg-[var(--color-green-light)] px-4 py-3 text-sm text-[var(--color-green-dark)]">
            {{ flashSuccess }}
        </p>

        <form class="mt-8 space-y-5" @submit.prevent="$emit('submit')">
            <div class="grid gap-5 md:grid-cols-2">
                <FormField id="contact-name" v-model="contactForm.name" label="Nombre" :error="contactForm.errors.name" />
                <FormField id="contact-email" v-model="contactForm.email" type="email" label="Email" :error="contactForm.errors.email" />
            </div>

            <FormField id="contact-phone" v-model="contactForm.phone" label="Telefono" :error="contactForm.errors.phone" />

            <div class="hidden">
                <label for="contact-company">Empresa</label>
                <input id="contact-company" v-model="contactForm.company" type="text">
            </div>

            <TextareaField id="contact-message" v-model="contactForm.message" label="Mensaje" :error="contactForm.errors.message" />

            <PrivacyConsentField
                v-model="contactForm.accept_privacy"
                :privacy-url="settings.contact.privacy_url"
                :legal-url="settings.contact.legal_url"
                :error="contactForm.errors.accept_privacy"
            />

            <button type="submit" class="cta-primary w-full sm:w-auto" :disabled="contactForm.processing">
                {{ contactForm.processing ? 'Enviando...' : submitLabel }}
            </button>
        </form>
    </div>
</template>

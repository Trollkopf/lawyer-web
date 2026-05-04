<script setup>
import ContactInfoItem from '../content/ContactInfoItem.vue';

defineProps({
    settings: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="mt-10 space-y-6 rounded-xl border border-white/10 bg-white/5 p-8 backdrop-blur">
        <ContactInfoItem label="Telefono" :value="settings.primary_phone" />
        <ContactInfoItem label="Email" :value="settings.primary_email" />
        <ContactInfoItem label="Direccion" :value="settings.office_address" />
        <ContactInfoItem label="Horario" :value="settings.office_hours" />
    </div>
</template>

<script setup>
defineProps({
    settings: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <footer class="border-t border-[var(--color-border)] bg-white">
        <div class="site-container flex flex-col gap-4 py-8 text-sm text-[var(--color-text-muted)] md:flex-row md:items-center md:justify-between">
            <p>
                {{ settings.footer.note }}
            </p>
            <div class="flex flex-wrap gap-4">
                <a :href="settings.contact.legal_url" class="hover:text-[var(--color-burgundy)]">
                    Aviso legal
                </a>
                <a :href="settings.contact.privacy_url" class="hover:text-[var(--color-burgundy)]">
                    Politica de privacidad
                </a>
            </div>
        </div>
    </footer>
</template>

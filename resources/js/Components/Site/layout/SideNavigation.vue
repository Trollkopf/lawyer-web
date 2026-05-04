<script setup>
import { initialsFor } from '../utils/site.js';

defineProps({
    settings: {
        type: Object,
        required: true,
    },
    navigation: {
        type: Array,
        required: true,
    },
    isScrolled: {
        type: Boolean,
        required: true,
    },
});
</script>

<template>
    <nav
        class="pointer-events-none fixed left-0 top-0 z-50 hidden h-screen transition duration-300 lg:block"
        :class="isScrolled ? 'translate-x-0 opacity-100' : '-translate-x-8 opacity-0'"
        aria-label="Navegacion lateral"
    >
        <div class="pointer-events-auto side-nav-rail">
            <a href="#inicio" class="side-nav-brand">
                <div
                    v-if="settings.logo_url"
                    class="flex h-14 items-center justify-center"
                >
                    <img :src="settings.logo_url" :alt="`Logo de ${settings.site_name}`" class="max-h-11 w-auto object-contain">
                </div>
                <div
                    v-else
                    class="flex h-12 w-12 items-center justify-center font-serif text-2xl font-semibold text-[var(--color-burgundy)]"
                >
                    {{ initialsFor(settings.site_name || 'DL').slice(0, 2) }}
                </div>
                <div class="flex flex-col">
                    <p class="font-serif text-lg font-semibold leading-tight text-[var(--color-text)]">
                        {{ settings.site_name }}
                    </p>
                    <p class="text-sm text-[var(--color-text-muted)]">
                        {{ settings.site_city }}
                    </p>
                </div>
            </a>

            <a
                v-for="item in navigation"
                :key="`${item.href}-side`"
                :href="item.href"
                class="side-nav-link"
            >
                <span>{{ item.label }}</span>
            </a>
        </div>
    </nav>
</template>

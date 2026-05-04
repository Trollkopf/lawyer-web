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
    menuOpen: {
        type: Boolean,
        required: true,
    },
    isScrolled: {
        type: Boolean,
        required: true,
    },
});

const emit = defineEmits(['toggle-menu', 'close-menu']);
</script>

<template>
    <header class="sticky top-0 z-40 border-b border-[var(--color-border)] bg-white/85 backdrop-blur-xl">
        <div class="site-container flex h-20 items-center justify-between gap-6">
            <a href="#inicio" class="flex items-center gap-4">
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

            <nav
                class="hidden items-center gap-8 transition duration-300 lg:flex"
                :class="isScrolled ? 'pointer-events-none translate-y-[-0.75rem] opacity-0' : 'translate-y-0 opacity-100'"
            >
                <a
                    v-for="item in navigation"
                    :key="item.href"
                    :href="item.href"
                    class="text-sm font-semibold text-[var(--color-text-muted)] transition hover:text-[var(--color-burgundy)]"
                >
                    {{ item.label }}
                </a>
            </nav>

            <div class="hidden items-center gap-3 lg:flex">
                <a :href="settings.hero.primary_target" class="cta-primary">
                    {{ settings.hero.primary_label }}
                </a>
            </div>

            <button
                type="button"
                class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-[var(--color-border)] text-[var(--color-text)] lg:hidden"
                @click="emit('toggle-menu')"
            >
                <span class="sr-only">Abrir menu</span>
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </button>
        </div>

        <div v-if="menuOpen" class="border-t border-[var(--color-border)] bg-white lg:hidden">
            <div class="site-container flex flex-col gap-4 py-5">
                <a
                    v-for="item in navigation"
                    :key="item.href"
                    :href="item.href"
                    class="text-sm font-semibold text-[var(--color-text-muted)]"
                    @click="emit('close-menu')"
                >
                    {{ item.label }}
                </a>
                <a :href="settings.hero.primary_target" class="cta-primary text-center" @click="emit('close-menu')">
                    {{ settings.hero.primary_label }}
                </a>
            </div>
        </div>
    </header>
</template>

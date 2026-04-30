<script setup>
import { computed, ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link, usePage } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
const page = usePage();

const brandingInitials = computed(() => (page.props.branding?.siteName ?? 'DL')
    .split(' ')
    .slice(0, 2)
    .map((part) => part.charAt(0).toUpperCase())
    .join(''));

const navigation = [
    {
        label: 'Resumen',
        routeName: 'dashboard',
        match: 'dashboard',
    },
    {
        label: 'Home',
        routeName: 'dashboard.settings.edit',
        match: 'dashboard.settings.*',
    },
    {
        label: 'Servicios',
        routeName: 'dashboard.services.index',
        match: 'dashboard.services.*',
    },
    {
        label: 'Abogados',
        routeName: 'dashboard.lawyers.index',
        match: 'dashboard.lawyers.*',
    },
    {
        label: 'Casos',
        routeName: 'dashboard.success-cases.index',
        match: 'dashboard.success-cases.*',
    },
    {
        label: 'Opiniones',
        routeName: 'dashboard.testimonials.index',
        match: 'dashboard.testimonials.*',
    },
    {
        label: 'Contactos',
        routeName: 'dashboard.contact-submissions.index',
        match: 'dashboard.contact-submissions.*',
    },
];
</script>

<template>
    <div class="min-h-screen bg-stone-100">
        <nav class="border-b border-stone-200 bg-white/90 backdrop-blur">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex min-h-20 items-center justify-between gap-6">
                    <div class="flex items-center gap-8">
                        <Link :href="route('dashboard')" class="flex items-center gap-4">
                            <div
                                v-if="$page.props.branding?.logoUrl"
                                class="flex h-12 min-w-[3rem] items-center justify-center rounded-md border border-stone-200 bg-white px-3"
                            >
                                <img :src="$page.props.branding.logoUrl" :alt="`Logo de ${$page.props.branding.siteName}`" class="max-h-8 w-auto object-contain">
                            </div>
                            <div
                                v-else
                                class="flex h-12 w-12 items-center justify-center rounded-full bg-[var(--color-bg-soft)] font-serif text-lg font-semibold text-[var(--color-burgundy)]"
                            >
                                {{ brandingInitials }}
                            </div>
                            <div class="hidden sm:block">
                                <p class="font-serif text-lg font-semibold text-stone-900">
                                    {{ $page.props.branding?.siteName || 'Panel del despacho' }}
                                </p>
                                <p class="text-sm text-stone-500">
                                    Gestion de contenidos
                                </p>
                            </div>
                        </Link>

                        <div class="hidden xl:flex xl:flex-wrap xl:items-center xl:gap-2">
                            <Link
                                v-for="item in navigation"
                                :key="item.routeName"
                                :href="route(item.routeName)"
                                class="rounded-md px-4 py-2 text-sm font-semibold transition"
                                :class="route().current(item.match) ? 'bg-[var(--color-burgundy)] text-white' : 'text-stone-600 hover:bg-stone-100 hover:text-stone-900'"
                            >
                                {{ item.label }}
                            </Link>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:gap-3">
                        <Link :href="route('home')" class="cta-secondary">
                            Ver web
                        </Link>

                        <Dropdown align="right" width="56">
                            <template #trigger>
                                <span class="inline-flex rounded-full">
                                    <button
                                        type="button"
                                        class="inline-flex items-center gap-3 rounded-md border border-stone-200 bg-white px-4 py-2 text-sm font-semibold text-stone-600 transition hover:text-stone-900 focus:outline-none"
                                    >
                                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-stone-100 text-stone-900">
                                            {{ $page.props.auth.user.name.charAt(0).toUpperCase() }}
                                        </span>
                                        <span class="hidden md:block">
                                            {{ $page.props.auth.user.name }}
                                        </span>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')">
                                    Perfil
                                </DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    Cerrar sesion
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>

                    <button
                        type="button"
                        class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-stone-200 text-stone-500 xl:hidden"
                        @click="showingNavigationDropdown = !showingNavigationDropdown"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4 7h16M4 12h16M4 17h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <div v-if="showingNavigationDropdown" class="border-t border-stone-200 bg-white xl:hidden">
                <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-4 sm:px-6 lg:px-8">
                    <Link
                        v-for="item in navigation"
                        :key="`mobile-${item.routeName}`"
                        :href="route(item.routeName)"
                        class="rounded-md px-4 py-3 text-sm font-semibold"
                        :class="route().current(item.match) ? 'bg-[var(--color-burgundy)] text-white' : 'bg-stone-50 text-stone-700'"
                    >
                        {{ item.label }}
                    </Link>

                    <div class="mt-2 grid gap-2 sm:hidden">
                        <Link :href="route('home')" class="cta-secondary text-center">
                            Ver web
                        </Link>
                        <Link :href="route('profile.edit')" class="rounded-md bg-stone-50 px-4 py-3 text-sm font-semibold text-stone-700">
                            Perfil
                        </Link>
                        <Link :href="route('logout')" method="post" as="button" class="rounded-md bg-stone-50 px-4 py-3 text-left text-sm font-semibold text-stone-700">
                            Cerrar sesion
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <div v-if="$page.props.flash.success" class="mx-auto mt-6 max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700">
                {{ $page.props.flash.success }}
            </div>
        </div>

        <header v-if="$slots.header" class="mx-auto max-w-7xl px-4 pt-8 sm:px-6 lg:px-8">
            <slot name="header" />
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>

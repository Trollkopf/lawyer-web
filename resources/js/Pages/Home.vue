<script setup>
import { computed, onBeforeUnmount, onMounted, ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import PublicSiteHeader from '@/Components/Site/layout/PublicSiteHeader.vue';
import SideNavigation from '@/Components/Site/layout/SideNavigation.vue';
import SiteFooter from '@/Components/Site/layout/SiteFooter.vue';
import HeroSection from '@/Components/Site/sections/HeroSection.vue';
import PresentationSection from '@/Components/Site/sections/PresentationSection.vue';
import ServicesSection from '@/Components/Site/sections/ServicesSection.vue';
import TeamSection from '@/Components/Site/sections/TeamSection.vue';
import SuccessCasesSection from '@/Components/Site/sections/SuccessCasesSection.vue';
import TestimonialsSection from '@/Components/Site/sections/TestimonialsSection.vue';
import ContactSection from '@/Components/Site/sections/ContactSection.vue';
import { isSectionEnabled, splitParagraphs } from '@/Components/Site/utils/site.js';

const props = defineProps({
    settings: {
        type: Object,
        required: true,
    },
    services: {
        type: Array,
        required: true,
    },
    lawyers: {
        type: Array,
        required: true,
    },
    successCases: {
        type: Array,
        required: true,
    },
    testimonials: {
        type: Array,
        required: true,
    },
});

const menuOpen = ref(false);
const isScrolled = ref(false);
const isMobileViewport = ref(false);

const contactForm = useForm({
    name: '',
    email: '',
    phone: '',
    message: '',
    accept_privacy: false,
    company: '',
});

const navigation = computed(() => {
    const items = [{ label: 'Inicio', href: '#inicio' }];

    if (isSectionEnabled(props.settings.presentation)) {
        items.push({ label: 'Presentacion', href: '#presentacion' });
    }

    if (isSectionEnabled(props.settings.services)) {
        items.push({ label: 'Roles', href: '#servicios' });
    }

    if (isSectionEnabled(props.settings.team)) {
        items.push({ label: 'Abogados', href: '#abogados' });
    }

    if (isSectionEnabled(props.settings.cases)) {
        items.push({ label: 'Casos', href: '#casos' });
    }

    if (isSectionEnabled(props.settings.testimonials)) {
        items.push({ label: 'Opiniones', href: '#opiniones' });
    }

    if (isSectionEnabled(props.settings.contact)) {
        items.push({ label: 'Contacto', href: '#contacto' });
    }

    return items;
});

const syncScrolledState = () => {
    if (typeof window === 'undefined') {
        return;
    }

    isScrolled.value = window.scrollY > 24;
};

const syncViewportState = () => {
    if (typeof window === 'undefined') {
        return;
    }

    isMobileViewport.value = window.innerWidth < 768;
};

const heroBackgroundStyle = computed(() => {
    if (!props.settings.hero_image_url) {
        return {
            background:
                'linear-gradient(135deg, rgba(246, 250, 247, 0.98) 0%, rgba(220, 238, 227, 0.94) 44%, rgba(255, 255, 255, 0.9) 100%)',
        };
    }

    return {
        backgroundImage: `linear-gradient(90deg, rgba(247, 249, 246, 0.96) 0%, rgba(247, 249, 246, 0.9) 34%, rgba(247, 249, 246, 0.7) 54%, rgba(31, 36, 33, 0.48) 100%), linear-gradient(180deg, rgba(69, 107, 85, 0.08), rgba(31, 36, 33, 0.18)), url(${props.settings.hero_image_url})`,
        backgroundSize: 'cover',
        backgroundPosition: 'center',
    };
});

const presentationParagraphs = computed(() => splitParagraphs(props.settings.presentation?.body));

const structuredData = computed(() => JSON.stringify({
    '@context': 'https://schema.org',
    '@type': 'LegalService',
    name: props.settings.site_name,
    description: props.settings.meta_description,
    areaServed: props.settings.site_city,
    telephone: props.settings.primary_phone,
    email: props.settings.primary_email,
    address: props.settings.office_address
        ? {
            '@type': 'PostalAddress',
            streetAddress: props.settings.office_address,
            addressLocality: props.settings.site_city,
        }
        : undefined,
}));

const submitContactForm = () => {
    contactForm.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => {
            contactForm.reset();
            contactForm.accept_privacy = false;
        },
    });
};

const scrollToTop = () => {
    if (typeof window === 'undefined') {
        return;
    }

    window.scrollTo({ top: 0, behavior: 'smooth' });
};

onMounted(() => {
    syncScrolledState();
    syncViewportState();
    window.addEventListener('scroll', syncScrolledState, { passive: true });
    window.addEventListener('resize', syncViewportState, { passive: true });
});

onBeforeUnmount(() => {
    window.removeEventListener('scroll', syncScrolledState);
    window.removeEventListener('resize', syncViewportState);
});
</script>

<template>
    <Head :title="settings.meta_title || settings.site_name">
        <meta head-key="description" name="description" :content="settings.meta_description" />
        <component
            :is="'script'"
            head-key="structured-data"
            type="application/ld+json"
            v-text="structuredData"
        />
    </Head>

    <div class="page-shell">
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[36rem] bg-[radial-gradient(circle_at_top_left,_rgba(220,238,227,0.62),_transparent_58%)]" />
        <div class="pointer-events-none absolute right-0 top-48 -z-10 h-[26rem] w-[26rem] rounded-full bg-[radial-gradient(circle,_rgba(109,31,47,0.06),_transparent_68%)] blur-3xl" />

        <PublicSiteHeader
            :settings="settings"
            :navigation="navigation"
            :menu-open="menuOpen"
            :is-scrolled="isScrolled"
            @toggle-menu="menuOpen = !menuOpen"
            @close-menu="menuOpen = false"
        />

        <SideNavigation :navigation="navigation" :is-scrolled="isScrolled" />

        <main>
            <HeroSection :settings="settings" :hero-background-style="heroBackgroundStyle" />
            <PresentationSection :settings="settings" :paragraphs="presentationParagraphs" :force-read-more="isMobileViewport" />
            <ServicesSection :settings="settings" :services="services" :force-read-more="isMobileViewport" />
            <TeamSection :settings="settings" :lawyers="lawyers" />
            <SuccessCasesSection :settings="settings" :success-cases="successCases" :force-read-more="isMobileViewport" />
            <TestimonialsSection :settings="settings" :testimonials="testimonials" :force-read-more="isMobileViewport" />
            <ContactSection
                :settings="settings"
                :contact-form="contactForm"
                :flash-success="$page.props.flash.success"
                :submit-label="settings.hero.primary_label"
                @submit="submitContactForm"
            />
        </main>

        <button
            v-if="isMobileViewport && isScrolled"
            type="button"
            class="back-to-top-mobile"
            aria-label="Volver arriba"
            @click="scrollToTop"
        >
            <svg class="h-4 w-4" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path
                    d="M8 12V4M8 4 4.5 7.5M8 4l3.5 3.5"
                    stroke="currentColor"
                    stroke-width="1.7"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
            <span>Volver arriba</span>
        </button>

        <SiteFooter :settings="settings" />
    </div>
</template>

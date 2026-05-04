<script setup>
import { computed, onBeforeUnmount, onMounted, ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';

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

const contactForm = useForm({
    name: '',
    email: '',
    phone: '',
    message: '',
    accept_privacy: false,
    company: '',
});

const navigation = [
    { label: 'Inicio', href: '#inicio' },
    { label: 'Presentacion', href: '#presentacion' },
    { label: 'Servicios', href: '#servicios' },
    { label: 'Abogados', href: '#abogados' },
    { label: 'Casos', href: '#casos' },
    { label: 'Opiniones', href: '#opiniones' },
    { label: 'Contacto', href: '#contacto' },
];

const syncScrolledState = () => {
    if (typeof window === 'undefined') {
        return;
    }

    isScrolled.value = window.scrollY > 24;
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

const presentationParagraphs = computed(() => (props.settings.presentation?.body || '')
    .split(/\r?\n\s*\r?\n/)
    .map((paragraph) => paragraph.trim())
    .filter(Boolean));

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

const initialsFor = (name) => name
    .split(' ')
    .slice(0, 2)
    .map((part) => part.charAt(0).toUpperCase())
    .join('');

onMounted(() => {
    syncScrolledState();
    window.addEventListener('scroll', syncScrolledState, { passive: true });
});

onBeforeUnmount(() => {
    window.removeEventListener('scroll', syncScrolledState);
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
                    @click="menuOpen = !menuOpen"
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
                        @click="menuOpen = false"
                    >
                        {{ item.label }}
                    </a>
                    <a :href="settings.hero.primary_target" class="cta-primary text-center" @click="menuOpen = false">
                        {{ settings.hero.primary_label }}
                    </a>
                </div>
            </div>
        </header>

        <nav
            class="pointer-events-none fixed left-0 top-0 z-50 hidden h-screen transition duration-300 lg:block"
            :class="isScrolled ? 'translate-x-0 opacity-100' : '-translate-x-8 opacity-0'"
            aria-label="Navegacion lateral"
        >
            <div class="pointer-events-auto side-nav-rail">
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

        <main>
            <section id="inicio" class="relative overflow-hidden">
                <div class="hero-stage" :style="heroBackgroundStyle">
                    <div class="hero-stage-overlay" />
                    <div class="site-container relative min-h-[36rem] py-16 md:min-h-[40rem] md:py-20 lg:grid lg:grid-cols-[minmax(0,1.1fr)_minmax(18rem,0.55fr)] lg:items-end lg:gap-10 lg:py-24">
                        <div class="max-w-3xl">
                            <p class="hero-kicker">
                                {{ settings.hero.eyebrow }}
                            </p>
                            <h1 class="hero-title">
                                {{ settings.hero.title }}
                            </h1>
                            <p class="hero-copy">
                                {{ settings.hero.description }}
                            </p>

                            <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                                <a :href="settings.hero.primary_target" class="cta-primary">
                                    {{ settings.hero.primary_label }}
                                </a>
                                <a
                                    v-if="settings.hero.secondary_label"
                                    :href="settings.hero.secondary_target"
                                    class="cta-secondary hero-secondary-button"
                                >
                                    {{ settings.hero.secondary_label }}
                                </a>
                            </div>

                            <div class="mt-12 grid gap-4 sm:grid-cols-3">
                                <div class="hero-stat">
                                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--color-burgundy)]">
                                        Ciudad
                                    </p>
                                    <p class="mt-3 font-sans text-xl font-semibold uppercase tracking-[-0.03em] text-[var(--color-text)]">
                                        {{ settings.site_city }}
                                    </p>
                                </div>
                                <div class="hero-stat">
                                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--color-burgundy)]">
                                        Contacto
                                    </p>
                                    <p class="mt-3 text-sm leading-7 text-[var(--color-text)]">
                                        {{ settings.primary_phone }}
                                    </p>
                                </div>
                                <div class="hero-stat">
                                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--color-burgundy)]">
                                        Enfoque
                                    </p>
                                    <p class="mt-3 text-sm leading-7 text-[var(--color-text)]">
                                        {{ settings.site_tagline }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div v-if="settings.hero.highlight_title || settings.hero.highlight_text" class="mt-10 flex lg:mt-0 lg:justify-end">
                            <div class="hero-highlight">
                                <div class="hero-chip mb-6 w-fit">
                                    {{ settings.site_city }}
                                </div>
                                <p v-if="settings.hero.highlight_title" class="font-sans text-xl font-semibold uppercase tracking-[-0.03em] text-[var(--color-text)]">
                                    {{ settings.hero.highlight_title }}
                                </p>
                                <p v-if="settings.hero.highlight_text" class="mt-4 text-sm leading-7 text-[var(--color-text-muted)]">
                                    {{ settings.hero.highlight_text }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section id="presentacion" class="section-shell">
                <div class="site-container">
                    <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                        <div>
                            <p class="section-kicker">
                                {{ settings.presentation.eyebrow }}
                            </p>
                            <h2 class="section-title">
                                {{ settings.presentation.title }}
                            </h2>
                        </div>

                        <div class="surface-panel p-8 md:p-10">
                                <div class="eyebrow-divider" />
                                <p class="mt-6 font-serif text-2xl leading-10 text-[var(--color-text)]">
                                    “{{ settings.presentation.quote }}”
                                </p>
                                <p class="mt-6 text-sm font-semibold uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                                    {{ settings.presentation.signature }}
                                </p>
                            </div>
                        </div>

                    <div class="mt-12 space-y-6">
                        <p
                            v-for="(paragraph, index) in presentationParagraphs"
                            :key="`presentation-paragraph-${index}`"
                            class="max-w-5xl text-lg leading-9 text-[var(--color-text-muted)]"
                        >
                            {{ paragraph }}
                        </p>
                    </div>
                </div>
            </section>

            <section id="servicios" class="section-shell bg-[var(--color-bg-soft)]">
                <div class="site-container">
                    <p class="section-kicker">
                        {{ settings.services.eyebrow }}
                    </p>
                    <h2 class="section-title">
                        {{ settings.services.title }}
                    </h2>
                    <p class="section-copy">
                        {{ settings.services.description }}
                    </p>

                    <div class="mt-12 grid gap-6 lg:grid-cols-3">
                        <article
                            v-for="service in services"
                            :key="service.id"
                            class="surface-panel p-8"
                        >
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                                Servicio {{ String(service.sort_order + 1).padStart(2, '0') }}
                            </p>
                            <h3 class="mt-5 font-serif text-2xl text-[var(--color-text)]">
                                {{ service.title }}
                            </h3>
                            <p class="mt-4 text-sm leading-7 text-[var(--color-text-muted)]">
                                {{ service.summary }}
                            </p>
                            <dl class="mt-8 space-y-4 text-sm text-[var(--color-text)]">
                                <div>
                                    <dt class="font-semibold text-[var(--color-green-dark)]">
                                        Cliente objetivo
                                    </dt>
                                    <dd class="mt-1 leading-7 text-[var(--color-text-muted)]">
                                        {{ service.target_client || 'Pendiente de definir en el panel.' }}
                                    </dd>
                                </div>
                                <div>
                                    <dt class="font-semibold text-[var(--color-green-dark)]">
                                        Resultado buscado
                                    </dt>
                                    <dd class="mt-1 leading-7 text-[var(--color-text-muted)]">
                                        {{ service.key_result || 'Pendiente de definir en el panel.' }}
                                    </dd>
                                </div>
                            </dl>
                        </article>

                        <article v-if="!services.length" class="surface-panel p-8 lg:col-span-3">
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

            <section id="abogados" class="section-shell">
                <div class="site-container">
                    <p class="section-kicker">
                        {{ settings.team.eyebrow }}
                    </p>
                    <h2 class="section-title">
                        {{ settings.team.title }}
                    </h2>
                    <p class="section-copy">
                        {{ settings.team.description }}
                    </p>

                    <div class="mt-12 grid gap-8 lg:grid-cols-2">
                        <article
                            v-for="lawyer in lawyers"
                            :key="lawyer.id"
                            class="surface-panel overflow-hidden"
                        >
                            <div class="grid h-full gap-0 md:grid-cols-[0.44fr_0.56fr]">
                                <div class="min-h-72 border-b border-[var(--color-border)] bg-[var(--color-green-light)] md:min-h-full md:border-b-0 md:border-r">
                                    <div
                                        v-if="lawyer.image_url"
                                        class="h-full min-h-72 bg-cover bg-center"
                                        :style="{ backgroundImage: `linear-gradient(180deg, rgba(255,255,255,0.12), rgba(31,36,33,0.26)), url(${lawyer.image_url})` }"
                                    />
                                    <div
                                        v-else
                                        class="flex h-full min-h-72 items-center justify-center bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.55),_transparent_55%)] font-serif text-6xl text-[var(--color-burgundy)]"
                                    >
                                        {{ initialsFor(lawyer.name) }}
                                    </div>
                                </div>

                                <div class="p-8">
                                    <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                                        {{ lawyer.role }}
                                    </p>
                                    <h3 class="mt-4 font-serif text-3xl text-[var(--color-text)]">
                                        {{ lawyer.name }}
                                    </h3>
                                    <p class="mt-4 text-sm leading-7 text-[var(--color-text-muted)]">
                                        {{ lawyer.intro }}
                                    </p>

                                    <dl class="mt-8 space-y-5 text-sm leading-7">
                                        <div>
                                            <dt class="font-semibold text-[var(--color-green-dark)]">
                                                Approach
                                            </dt>
                                            <dd class="mt-1 text-[var(--color-text-muted)]">
                                                {{ lawyer.approach }}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="font-semibold text-[var(--color-green-dark)]">
                                                Target client
                                            </dt>
                                            <dd class="mt-1 text-[var(--color-text-muted)]">
                                                {{ lawyer.target_client || 'Pendiente de completar.' }}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="font-semibold text-[var(--color-green-dark)]">
                                                Portfolio o service
                                            </dt>
                                            <dd class="mt-1 text-[var(--color-text-muted)]">
                                                {{ lawyer.portfolio || 'Pendiente de completar.' }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </article>

                        <article v-if="!lawyers.length" class="surface-panel p-8 lg:col-span-2">
                            <h3 class="font-serif text-2xl text-[var(--color-text)]">
                                El bloque del equipo ya esta preparado
                            </h3>
                            <p class="mt-4 max-w-2xl text-sm leading-7 text-[var(--color-text-muted)]">
                                Puedes cargar un unico abogado o varios perfiles desde el backoffice, incluyendo fotografia, enfoque, cliente objetivo y areas de trabajo principales.
                            </p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="casos" class="section-shell bg-[var(--color-bg-soft)]">
                <div class="site-container">
                    <p class="section-kicker">
                        {{ settings.cases.eyebrow }}
                    </p>
                    <h2 class="section-title">
                        {{ settings.cases.title }}
                    </h2>
                    <p class="section-copy">
                        {{ settings.cases.description }}
                    </p>

                    <div class="mt-12 grid gap-6 lg:grid-cols-3">
                        <article
                            v-for="caseItem in successCases"
                            :key="caseItem.id"
                            class="surface-panel p-8"
                        >
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--color-burgundy)]">
                                {{ caseItem.practice_area || 'Caso representativo' }}
                            </p>
                            <h3 class="mt-5 font-serif text-2xl text-[var(--color-text)]">
                                {{ caseItem.title }}
                            </h3>
                            <div class="mt-6 space-y-5 text-sm leading-7 text-[var(--color-text-muted)]">
                                <div>
                                    <p class="font-semibold text-[var(--color-green-dark)]">
                                        Problema inicial
                                    </p>
                                    <p class="mt-1">
                                        {{ caseItem.challenge }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-semibold text-[var(--color-green-dark)]">
                                        Intervencion
                                    </p>
                                    <p class="mt-1">
                                        {{ caseItem.approach }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-semibold text-[var(--color-green-dark)]">
                                        Valor aportado
                                    </p>
                                    <p class="mt-1">
                                        {{ caseItem.outcome }}
                                    </p>
                                </div>
                            </div>
                        </article>

                        <article v-if="!successCases.length" class="surface-panel p-8 lg:col-span-3">
                            <h3 class="font-serif text-2xl text-[var(--color-text)]">
                                Casos listos para publicar con criterio prudente
                            </h3>
                            <p class="mt-4 max-w-2xl text-sm leading-7 text-[var(--color-text-muted)]">
                                La estructura ya contempla problema inicial, intervencion y resultado, pero conviene cargar solo ejemplos reales debidamente anonimizados y autorizados.
                            </p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="opiniones" class="section-shell">
                <div class="site-container">
                    <p class="section-kicker">
                        {{ settings.testimonials.eyebrow }}
                    </p>
                    <h2 class="section-title">
                        {{ settings.testimonials.title }}
                    </h2>
                    <p class="section-copy">
                        {{ settings.testimonials.description }}
                    </p>

                    <div class="mt-12 grid gap-6 lg:grid-cols-3">
                        <article
                            v-for="testimonial in testimonials"
                            :key="testimonial.id"
                            class="surface-panel p-8"
                        >
                            <p class="text-sm tracking-[0.35em] text-[var(--color-gold-soft)]">
                                {{ '★'.repeat(testimonial.rating || 5) }}
                            </p>
                            <p class="mt-6 font-serif text-2xl leading-10 text-[var(--color-text)]">
                                “{{ testimonial.quote }}”
                            </p>
                            <div class="mt-8 border-t border-[var(--color-border)] pt-6">
                                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[var(--color-burgundy)]">
                                    {{ testimonial.client_name }}
                                </p>
                                <p class="mt-2 text-sm text-[var(--color-text-muted)]">
                                    {{ testimonial.matter || 'Asunto indicado en panel' }}
                                </p>
                            </div>
                        </article>

                        <article v-if="!testimonials.length" class="surface-panel p-8 lg:col-span-3">
                            <h3 class="font-serif text-2xl text-[var(--color-text)]">
                                La seccion de opiniones esta lista para testimonios reales
                            </h3>
                            <p class="mt-4 max-w-2xl text-sm leading-7 text-[var(--color-text-muted)]">
                                He dejado el bloque preparado para publicar reseñas verificadas cuando el cliente las facilite. Asi evitamos inventar opiniones y mantenemos credibilidad.
                            </p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="contacto" class="section-shell bg-[var(--color-text)] text-white">
                <div class="site-container grid gap-10 lg:grid-cols-[0.92fr_1.08fr]">
                    <div>
                        <p class="section-kicker text-[var(--color-gold-soft)]">
                            {{ settings.contact.eyebrow }}
                        </p>
                        <h2 class="mt-4 max-w-3xl font-serif text-4xl leading-tight md:text-5xl">
                            {{ settings.contact.title }}
                        </h2>
                        <p class="mt-5 max-w-xl text-lg leading-8 text-white/72">
                            {{ settings.contact.description }}
                        </p>

                        <div class="mt-10 space-y-6 rounded-xl border border-white/10 bg-white/5 p-8 backdrop-blur">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--color-gold-soft)]">
                                    Telefono
                                </p>
                                <p class="mt-2 text-lg text-white">
                                    {{ settings.primary_phone }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--color-gold-soft)]">
                                    Email
                                </p>
                                <p class="mt-2 text-lg text-white">
                                    {{ settings.primary_email }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--color-gold-soft)]">
                                    Direccion
                                </p>
                                <p class="mt-2 text-lg text-white">
                                    {{ settings.office_address }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[var(--color-gold-soft)]">
                                    Horario
                                </p>
                                <p class="mt-2 text-lg text-white">
                                    {{ settings.office_hours }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="rounded-xl border border-white/10 bg-white p-8 text-[var(--color-text)] shadow-[0_28px_70px_rgba(0,0,0,0.18)] md:p-10">
                            <h3 class="font-serif text-3xl text-[var(--color-text)]">
                                {{ settings.contact.form_heading }}
                            </h3>
                            <p v-if="$page.props.flash.success" class="mt-4 rounded-lg border border-[var(--color-green)]/35 bg-[var(--color-green-light)] px-4 py-3 text-sm text-[var(--color-green-dark)]">
                                {{ $page.props.flash.success }}
                            </p>

                            <form class="mt-8 space-y-5" @submit.prevent="submitContactForm">
                                <div class="grid gap-5 md:grid-cols-2">
                                    <div>
                                        <label class="text-sm font-semibold text-[var(--color-text)]" for="contact-name">
                                            Nombre
                                        </label>
                                        <input
                                            id="contact-name"
                                            v-model="contactForm.name"
                                            type="text"
                                            class="mt-2 block w-full rounded-lg border-[var(--color-border)] bg-white px-4 py-3 text-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]"
                                        >
                                        <p v-if="contactForm.errors.name" class="mt-2 text-sm text-[var(--color-burgundy)]">
                                            {{ contactForm.errors.name }}
                                        </p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold text-[var(--color-text)]" for="contact-email">
                                            Email
                                        </label>
                                        <input
                                            id="contact-email"
                                            v-model="contactForm.email"
                                            type="email"
                                            class="mt-2 block w-full rounded-lg border-[var(--color-border)] bg-white px-4 py-3 text-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]"
                                        >
                                        <p v-if="contactForm.errors.email" class="mt-2 text-sm text-[var(--color-burgundy)]">
                                            {{ contactForm.errors.email }}
                                        </p>
                                    </div>
                                </div>

                                <div>
                                    <label class="text-sm font-semibold text-[var(--color-text)]" for="contact-phone">
                                        Telefono
                                    </label>
                                    <input
                                        id="contact-phone"
                                        v-model="contactForm.phone"
                                        type="text"
                                        class="mt-2 block w-full rounded-lg border-[var(--color-border)] bg-white px-4 py-3 text-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]"
                                    >
                                    <p v-if="contactForm.errors.phone" class="mt-2 text-sm text-[var(--color-burgundy)]">
                                        {{ contactForm.errors.phone }}
                                    </p>
                                </div>

                                <div class="hidden">
                                    <label for="contact-company">Empresa</label>
                                    <input id="contact-company" v-model="contactForm.company" type="text">
                                </div>

                                <div>
                                    <label class="text-sm font-semibold text-[var(--color-text)]" for="contact-message">
                                        Mensaje
                                    </label>
                                    <textarea
                                        id="contact-message"
                                        v-model="contactForm.message"
                                        rows="5"
                                        class="mt-2 block w-full rounded-lg border-[var(--color-border)] bg-white px-4 py-3 text-sm focus:border-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]"
                                    />
                                    <p v-if="contactForm.errors.message" class="mt-2 text-sm text-[var(--color-burgundy)]">
                                        {{ contactForm.errors.message }}
                                    </p>
                                </div>

                                <label class="flex items-start gap-3 rounded-lg bg-[var(--color-bg-soft)] px-4 py-4 text-sm leading-6 text-[var(--color-text-muted)]">
                                    <input
                                        v-model="contactForm.accept_privacy"
                                        type="checkbox"
                                        class="mt-1 rounded border-[var(--color-border)] text-[var(--color-burgundy)] focus:ring-[var(--color-burgundy)]"
                                    >
                                    <span>
                                        Acepto la
                                        <a :href="settings.contact.privacy_url" class="font-semibold text-[var(--color-burgundy)] underline">
                                            politica de privacidad
                                        </a>
                                        y he leido el
                                        <a :href="settings.contact.legal_url" class="font-semibold text-[var(--color-burgundy)] underline">
                                            aviso legal
                                        </a>.
                                    </span>
                                </label>
                                <p v-if="contactForm.errors.accept_privacy" class="text-sm text-[var(--color-burgundy)]">
                                    {{ contactForm.errors.accept_privacy }}
                                </p>

                                <button type="submit" class="cta-primary w-full sm:w-auto" :disabled="contactForm.processing">
                                    {{ contactForm.processing ? 'Enviando...' : settings.hero.primary_label }}
                                </button>
                            </form>
                        </div>

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
        </main>

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
    </div>
</template>

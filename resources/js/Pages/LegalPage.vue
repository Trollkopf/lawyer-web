<script setup>
import { computed, ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import SiteFooter from '@/Components/Site/layout/SiteFooter.vue';
import { initialsFor } from '@/Components/Site/utils/site.js';

const props = defineProps({
    settings: {
        type: Object,
        required: true,
    },
    variant: {
        type: String,
        required: true,
    },
});

const menuOpen = ref(false);

const themeStyle = computed(() => ({
    '--color-bg': props.settings.theme?.bg ?? '#ffffff',
    '--color-bg-soft': props.settings.theme?.bg_soft ?? '#f6faf7',
    '--color-green-light': props.settings.theme?.green_light ?? '#dceee3',
    '--color-green': props.settings.theme?.green ?? '#8eb99f',
    '--color-green-dark': props.settings.theme?.green_dark ?? '#456b55',
    '--color-burgundy': props.settings.theme?.burgundy ?? '#6d1f2f',
    '--color-burgundy-dark': props.settings.theme?.burgundy_dark ?? '#48131f',
    '--color-text': props.settings.theme?.text ?? '#1f2421',
    '--color-text-muted': props.settings.theme?.text_muted ?? '#68726b',
    '--color-border': props.settings.theme?.border ?? '#e4e8e5',
    '--color-gold-soft': props.settings.theme?.gold_soft ?? '#c8a96a',
}));

const pageMeta = computed(() => {
    if (props.variant === 'privacy') {
        return {
            title: 'Politica de privacidad',
            eyebrow: 'Informacion legal',
            heading: 'Politica de privacidad',
            intro: 'En esta pagina se explica como se tratan los datos personales facilitados a traves de esta web o por contacto directo con el despacho.',
        };
    }

    return {
        title: 'Aviso legal',
        eyebrow: 'Informacion legal',
        heading: 'Aviso legal',
        intro: 'En esta pagina se recogen las condiciones generales de uso de la web y la informacion identificativa basica del titular del sitio.',
    };
});

const legalSections = computed(() => {
    if (props.variant === 'privacy') {
        return [
            {
                title: 'Responsable del tratamiento',
                paragraphs: [
                    `${props.settings.site_name} es el responsable del tratamiento de los datos personales que se recaben a traves de esta web o mediante comunicaciones directas relacionadas con la actividad profesional del despacho.`,
                    `Para cualquier consulta relativa a privacidad puedes escribir a ${props.settings.primary_email || 'la direccion de correo publicada en la web'} o dirigirte al domicilio profesional indicado en esta pagina cuando proceda.`,
                ],
            },
            {
                title: 'Datos que pueden tratarse',
                paragraphs: [
                    'Se pueden tratar los datos que la persona usuaria facilite voluntariamente al contactar con el despacho, incluyendo nombre, correo electronico, telefono, contenido del mensaje y cualquier otra informacion necesaria para atender la consulta.',
                    'Asimismo, pueden conservarse datos tecnicos minimos asociados al envio del formulario, como la fecha de contacto, la direccion IP o el agente de usuario, con finalidades de seguridad y trazabilidad.',
                ],
            },
            {
                title: 'Finalidad del tratamiento',
                paragraphs: [
                    'La finalidad principal del tratamiento es atender solicitudes de informacion, gestionar consultas profesionales, mantener comunicaciones relacionadas con los servicios juridicos y, en su caso, cumplir obligaciones legales aplicables.',
                    'Los datos no se utilizaran para finalidades incompatibles con las aqui descritas.',
                ],
            },
            {
                title: 'Base juridica',
                paragraphs: [
                    'La base juridica del tratamiento puede ser el consentimiento de la persona interesada al remitir su consulta, la aplicacion de medidas precontractuales solicitadas por esta, la ejecucion de una relacion profesional o el cumplimiento de obligaciones legales.',
                ],
            },
            {
                title: 'Conservacion de los datos',
                paragraphs: [
                    'Los datos se conservaran durante el tiempo necesario para atender la consulta, mantener la relacion profesional en su caso y cumplir los plazos legales o de responsabilidad que resulten aplicables.',
                ],
            },
            {
                title: 'Destinatarios y cesiones',
                paragraphs: [
                    'Con caracter general no se cederan datos a terceros salvo obligacion legal, necesidad derivada de la prestacion del servicio o intervencion de proveedores que actuen como encargados del tratamiento bajo las correspondientes garantias.',
                ],
            },
            {
                title: 'Derechos de las personas interesadas',
                paragraphs: [
                    'La persona interesada puede solicitar el acceso, rectificacion, supresion, oposicion, limitacion del tratamiento y portabilidad de sus datos cuando resulte aplicable, asi como retirar el consentimiento prestado.',
                    `Para ello puede dirigirse a ${props.settings.primary_email || 'la direccion de contacto del despacho'}. Si considera que sus derechos no han sido atendidos adecuadamente, puede acudir a la autoridad de control competente.`,
                ],
            },
            {
                title: 'Medidas de seguridad',
                paragraphs: [
                    'El despacho adopta medidas tecnicas y organizativas razonables para proteger la informacion personal frente a accesos no autorizados, perdida, alteracion o divulgacion indebida, atendiendo a la naturaleza de los datos tratados.',
                ],
            },
        ];
    }

    return [
        {
            title: 'Titular de la web',
            paragraphs: [
                `El presente sitio web pertenece a ${props.settings.site_name}.`,
                `Los datos de contacto publicados en esta web son: correo electronico ${props.settings.primary_email || 'pendiente de completar'}, telefono ${props.settings.primary_phone || 'pendiente de completar'} y direccion ${props.settings.office_address || 'pendiente de completar'}.`,
            ],
        },
        {
            title: 'Objeto',
            paragraphs: [
                'Este sitio web tiene por objeto ofrecer informacion general sobre la actividad profesional del despacho, sus areas de acompanamiento y los medios de contacto disponibles para potenciales clientes o personas interesadas.',
            ],
        },
        {
            title: 'Condiciones de uso',
            paragraphs: [
                'La persona usuaria se compromete a hacer un uso adecuado de los contenidos y servicios ofrecidos a traves de la web, absteniendose de utilizarlos para actividades contrarias a la ley, a la buena fe o al orden publico.',
            ],
        },
        {
            title: 'Propiedad intelectual e industrial',
            paragraphs: [
                'Los contenidos, textos, imagenes, diseno, estructura y demas elementos de este sitio web se encuentran protegidos por la normativa aplicable en materia de propiedad intelectual e industrial. Queda prohibida su reproduccion, distribucion o transformacion sin autorizacion, salvo que legalmente proceda.',
            ],
        },
        {
            title: 'Responsabilidad',
            paragraphs: [
                'El titular procura que la informacion del sitio sea correcta y este actualizada, pero no garantiza la ausencia absoluta de errores ni la disponibilidad permanente del sitio web.',
                'La informacion publicada en esta web tiene caracter general e informativo y no constituye asesoramiento juridico individualizado salvo que expresamente se indique lo contrario en el marco de una relacion profesional concreta.',
            ],
        },
        {
            title: 'Enlaces externos',
            paragraphs: [
                'En caso de que la web incluya enlaces a sitios de terceros, estos se facilitan unicamente a efectos informativos. El titular no asume responsabilidad por los contenidos, politicas o practicas de dichos sitios externos.',
            ],
        },
        {
            title: 'Legislacion aplicable',
            paragraphs: [
                'Este aviso legal se interpreta conforme a la legislacion espanola. Para cualquier controversia que pudiera derivarse del uso de la web, las partes se someteran a los juzgados y tribunales competentes conforme a derecho.',
            ],
        },
    ];
});
</script>

<template>
    <Head :title="`${pageMeta.title} | ${settings.site_name}`">
        <meta head-key="description" name="description" :content="pageMeta.intro" />
        <link v-if="settings.favicon_url" head-key="favicon" rel="icon" :href="settings.favicon_url" />
    </Head>

    <div class="page-shell min-h-screen" :style="themeStyle">
        <header class="sticky top-0 z-40 border-b border-[var(--color-border)] bg-white/90 backdrop-blur-xl">
            <div class="site-container flex h-20 items-center justify-between gap-6">
                <a :href="route('home')" class="flex items-center gap-4">
                    <div v-if="settings.logo_url" class="flex h-14 items-center justify-center">
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

                <nav class="hidden items-center gap-8 lg:flex">
                    <a :href="route('home')" class="text-sm font-semibold text-[var(--color-text-muted)] transition hover:text-[var(--color-burgundy)]">
                        Volver a la web
                    </a>
                    <a :href="settings.contact.privacy_url" class="text-sm font-semibold text-[var(--color-text-muted)] transition hover:text-[var(--color-burgundy)]">
                        Politica de privacidad
                    </a>
                    <a :href="settings.contact.legal_url" class="text-sm font-semibold text-[var(--color-text-muted)] transition hover:text-[var(--color-burgundy)]">
                        Aviso legal
                    </a>
                </nav>

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
                    <a :href="route('home')" class="text-sm font-semibold text-[var(--color-text-muted)]">
                        Volver a la web
                    </a>
                    <a :href="settings.contact.privacy_url" class="text-sm font-semibold text-[var(--color-text-muted)]">
                        Politica de privacidad
                    </a>
                    <a :href="settings.contact.legal_url" class="text-sm font-semibold text-[var(--color-text-muted)]">
                        Aviso legal
                    </a>
                </div>
            </div>
        </header>

        <main>
            <section class="section-shell border-b border-[var(--color-border)] bg-[var(--color-bg-soft)]">
                <div class="site-container">
                    <p class="section-kicker">
                        {{ pageMeta.eyebrow }}
                    </p>
                    <h1 class="section-title max-w-4xl">
                        {{ pageMeta.heading }}
                    </h1>
                    <p class="section-copy max-w-3xl">
                        {{ pageMeta.intro }}
                    </p>
                </div>
            </section>

            <section class="section-shell">
                <div class="site-container">
                    <div class="grid gap-6">
                        <article
                            v-for="section in legalSections"
                            :key="section.title"
                            class="surface-panel p-8 md:p-10"
                        >
                            <h2 class="font-serif text-2xl text-[var(--color-text)]">
                                {{ section.title }}
                            </h2>
                            <div class="mt-5 space-y-4">
                                <p
                                    v-for="paragraph in section.paragraphs"
                                    :key="paragraph"
                                    class="max-w-4xl text-base leading-8 text-[var(--color-text-muted)]"
                                >
                                    {{ paragraph }}
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </main>

        <SiteFooter :settings="settings" />
    </div>
</template>

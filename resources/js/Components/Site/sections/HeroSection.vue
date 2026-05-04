<script setup>
import HeroHighlightCard from '../cards/HeroHighlightCard.vue';
import HeroStat from '../content/HeroStat.vue';

defineProps({
    settings: {
        type: Object,
        required: true,
    },
    heroBackgroundStyle: {
        type: Object,
        required: true,
    },
});
</script>

<template>
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
                        <HeroStat label="Ciudad" :value="settings.site_city" />
                        <HeroStat label="Contacto" :value="settings.primary_phone" compact />
                        <HeroStat label="Enfoque" :value="settings.site_tagline" compact />
                    </div>
                </div>

                <div v-if="settings.hero.highlight_title || settings.hero.highlight_text" class="mt-10 flex lg:mt-0 lg:justify-end">
                    <HeroHighlightCard
                        :city="settings.site_city"
                        :title="settings.hero.highlight_title"
                        :text="settings.hero.highlight_text"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

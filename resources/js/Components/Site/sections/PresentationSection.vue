<script setup>
import QuotePanel from '../cards/QuotePanel.vue';
import RichParagraphs from '../content/RichParagraphs.vue';
import SectionIntro from '../content/SectionIntro.vue';
import { isSectionEnabled } from '../utils/site.js';

defineProps({
    settings: {
        type: Object,
        required: true,
    },
    paragraphs: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <section v-if="isSectionEnabled(settings.presentation)" id="presentacion" class="section-shell">
        <div class="site-container">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div>
                    <SectionIntro
                        :eyebrow="settings.presentation.eyebrow"
                        :title="settings.presentation.title"
                    />
                </div>

                <QuotePanel
                    :quote="settings.presentation.quote"
                    :signature="settings.presentation.signature"
                />
            </div>

            <div class="mt-12">
                <RichParagraphs :paragraphs="paragraphs" />
            </div>
        </div>
    </section>
</template>

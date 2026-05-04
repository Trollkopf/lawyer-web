<script setup>
import { ref } from 'vue';
import ExpandToggleButton from '../content/ExpandToggleButton.vue';

const props = defineProps({
    service: {
        type: Object,
        required: true,
    },
    allowExpand: {
        type: Boolean,
        default: false,
    },
});

const expanded = ref(false);
</script>

<template>
    <article class="surface-panel p-8">
        <h3 class="font-serif text-2xl text-[var(--color-text)]">
            {{ service.title }}
        </h3>
        <div class="mt-6">
            <dl
                class="space-y-5 text-sm text-[var(--color-text)]"
                :class="allowExpand && !expanded ? 'content-fade-panel content-fade-panel-sm' : ''"
            >
                <div>
                    <dt class="font-semibold text-[var(--color-green-dark)]">
                        Enfoque
                    </dt>
                    <dd class="mt-1 whitespace-pre-line leading-7 text-[var(--color-text-muted)]">
                        {{ service.summary }}
                    </dd>
                </div>
                <div>
                    <dt class="font-semibold text-[var(--color-green-dark)]">
                        Cliente objetivo
                    </dt>
                    <dd class="mt-1 whitespace-pre-line leading-7 text-[var(--color-text-muted)]">
                        {{ service.target_client || 'Pendiente de definir en el panel.' }}
                    </dd>
                </div>
                <div>
                    <dt class="font-semibold text-[var(--color-green-dark)]">
                        Catalogo de servicios
                    </dt>
                    <dd class="mt-1 whitespace-pre-line leading-7 text-[var(--color-text-muted)]">
                        {{ service.key_result || 'Pendiente de definir en el panel.' }}
                    </dd>
                </div>
            </dl>
        </div>
        <div v-if="allowExpand" class="mt-6">
            <ExpandToggleButton :expanded="expanded" @toggle="expanded = !expanded" />
        </div>
    </article>
</template>

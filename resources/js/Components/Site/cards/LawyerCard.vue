<script setup>
import { initialsFor } from '../utils/site.js';

defineProps({
    lawyer: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <article class="surface-panel overflow-hidden">
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
</template>

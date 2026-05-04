<script setup>
defineProps({
    service: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <article class="surface-panel p-8">
        <h3 class="font-serif text-2xl text-[var(--color-text)]">
            {{ service.title }}
        </h3>
        <dl class="mt-6 space-y-5 text-sm text-[var(--color-text)]">
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
    </article>
</template>

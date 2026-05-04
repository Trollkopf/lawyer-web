<script setup>
defineProps({
    items: {
        type: Array,
        required: true,
    },
    activeId: {
        type: [Number, String, null],
        default: null,
    },
    labelKey: {
        type: String,
        default: 'title',
    },
    secondaryKey: {
        type: String,
        default: '',
    },
});

const emit = defineEmits(['select']);
</script>

<template>
    <div class="section-tab-list">
        <button
            v-for="item in items"
            :key="item.id"
            type="button"
            class="section-tab-button"
            :class="item.id === activeId ? 'section-tab-button-active' : 'section-tab-button-idle'"
            @click="emit('select', item.id)"
        >
            <span class="block text-left font-sans text-[1.02rem] font-semibold leading-snug tracking-[-0.01em] text-[var(--color-text)]">
                {{ item[labelKey] }}
            </span>
            <span v-if="secondaryKey && item[secondaryKey]" class="mt-2 block text-left text-sm leading-6 text-[var(--color-text-muted)]">
                {{ item[secondaryKey] }}
            </span>
        </button>
    </div>
</template>

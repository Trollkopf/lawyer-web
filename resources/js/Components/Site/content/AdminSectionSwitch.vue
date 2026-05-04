<script setup>
import { computed } from 'vue';

const props = defineProps({
    modelValue: {
        type: [Boolean, Number, String],
        default: true,
    },
    label: {
        type: String,
        required: true,
    },
    hint: {
        type: String,
        default: '',
    },
});

const emit = defineEmits(['update:modelValue']);
const isOn = computed(() => ![false, 0, '0', 'false', null, undefined].includes(props.modelValue));
</script>

<template>
    <label class="admin-switch">
        <div>
            <p class="text-sm font-semibold text-stone-900">
                {{ label }}
            </p>
            <p v-if="hint" class="mt-1 text-sm text-stone-500">
                {{ hint }}
            </p>
        </div>
        <button
            type="button"
            class="admin-switch-track"
            :class="isOn ? 'admin-switch-track-on' : 'admin-switch-track-off'"
            :aria-pressed="isOn ? 'true' : 'false'"
            @click="emit('update:modelValue', !isOn)"
        >
            <span
                class="admin-switch-thumb"
                :class="isOn ? 'translate-x-5' : 'translate-x-0'"
            />
        </button>
    </label>
</template>

<script setup>
defineProps({
    navigation: {
        type: Array,
        required: true,
    },
    isScrolled: {
        type: Boolean,
        required: true,
    },
});
</script>

<template>
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
</template>

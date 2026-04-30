<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-[var(--color-bg-soft)] pt-6 sm:justify-center sm:pt-0"
    >
        <div>
            <Link href="/">
                <ApplicationLogo class="h-20 w-20 fill-current text-[var(--color-burgundy)]" />
            </Link>
        </div>

        <div
            class="mt-6 w-full overflow-hidden rounded-[2rem] border border-[var(--color-border)] bg-white px-6 py-6 shadow-[0_20px_60px_rgba(31,36,33,0.08)] sm:max-w-md"
        >
            <slot />
        </div>
    </div>
</template>

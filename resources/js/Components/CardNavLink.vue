<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'inline-flex items-center scale-125 px-5 pt-2 mx-3 bg-indigo-500 text-sm font-bold leading-5 text-white focus:outline-none focus:bg-indigo-700 transition duration-300 ease-in-out'
    : 'inline-flex items-center px-5 py-2 mx-3 bg-gray-200 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-200 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

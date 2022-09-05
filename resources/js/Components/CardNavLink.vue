<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'inline-flex sm:px-5 xs:mx-3 items-center scale-125 px-2 py-2 mx-2 bg-indigo-500 text-sm font-bold leading-5 text-white focus:outline-none focus:bg-indigo-700 transition duration-300 ease-in-out'
    : 'inline-flex sm:px-5 xs:mx-3 items-center px-2 py-2 mx-2 bg-gray-200 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-200 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>

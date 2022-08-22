<template>
    <Link :href="link" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
        <slot></slot>
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    name: "HeaderButtonComponent",
    components: {
        Link,
    },
    props: {
        link: String
    }
}
</script>

<style scoped>

</style>

<template>
    <a href="#" class="flex justify-center md:justify-end block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 hover:text-blue-400 lg:p-0 dark:text-white" aria-current="page">
        <slot></slot>
    </a>
</template>

<script>
export default {
    name: "HeaderLinkComponent"
}
</script>

<style scoped>

</style>

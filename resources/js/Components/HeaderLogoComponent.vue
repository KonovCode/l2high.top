<template>
    <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9 z-50" alt="Flowbite Logo" />
    <span class="self-center text-xl font-semibold whitespace-nowrap text-orange-500 z-50">
        <slot></slot>
    </span>
</template>

<script>
export default {
    name: "HeaderLogoComponent",
}
</script>

<style scoped>

</style>

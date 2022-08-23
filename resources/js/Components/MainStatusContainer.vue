<template>
    <div class="bg-gray-900 px-3 py-2 mb-1 mt-3">
        <h2 class="text-xl text-red-500">{{statusContainer}}</h2>
    </div>
    <slot></slot>
</template>

<script>
export default {
    name: "MainStatusContainer",
    props: {
        status: String,
    },
    computed: {
        statusContainer() {
            return this.status.trim();
        }
    }
}
</script>

<style scoped>

</style>

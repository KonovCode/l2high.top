<template>
    <div class="container mx-auto mt-3 p-1 border border-3 border-dark hidden md:block">
        <!-- img-size 450x300 -->
        <div id="slides_list">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "SliderMainIndexComponent"
}
</script>

<style scoped>
#slides_list {
    display: flex;
    width: 100%;
    min-height: 300px !important;
    max-height: 300px !important;
}
</style>

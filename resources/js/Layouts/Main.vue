<template>

    <div id="main" class="flex flex-col">
        <slider-main-index-component>
            <slider-main-item-component></slider-main-item-component>
        </slider-main-index-component>
        <h2>Main</h2>
    </div>
</template>

<script>
import SliderMainIndexComponent from "@/Components/SliderMainIndexComponent.vue";
import SliderMainItemComponent from "@/Components/SliderMainItemComponent.vue";
export default {
    name: "Main",
    components: {SliderMainIndexComponent, SliderMainItemComponent}
}
</script>

<style scoped>
    #main {
        height: calc(100vh - (60px + 100px));
    }
</style>

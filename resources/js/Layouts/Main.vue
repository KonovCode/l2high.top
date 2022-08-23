<template>

    <div id="main" class="flex flex-col">
        <slider-main-index-component>
            <slider-main-item-component></slider-main-item-component>
        </slider-main-index-component>
        <div class="grid grid-cols-2">
            <main-content-index>

            </main-content-index>
        </div>
    </div>
</template>

<script>
import SliderMainIndexComponent from "@/Components/SliderMainIndexComponent.vue";
import SliderMainItemComponent from "@/Components/SliderMainItemComponent.vue";
import MainContentIndex from "@/Components/MainContentIndex.vue";
export default {
    name: "Main",
    components: {SliderMainIndexComponent, SliderMainItemComponent, MainContentIndex}
}
</script>

<style scoped>
    #main {
        height: calc(100vh - (60px + 100px));
    }
</style>

<template>

    <div id="main" class="flex flex-col">
        <slider-main-index-component>
            <slider-main-item-component></slider-main-item-component>
        </slider-main-index-component>
        <div class="grid grid-cols-1 lg:grid-cols-2 mt-3">
            <main-content-index>
                <main-status-container :status="statusContainers.Top">
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                </main-status-container>
            </main-content-index>
            <main-content-index>
                <main-status-container :status="statusContainers.Premium">
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                </main-status-container>
            </main-content-index>
            <main-content-index>
                <main-status-container :status="statusContainers.Vip">
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                </main-status-container>
            </main-content-index>
            <main-content-index>
                <main-status-container :status="statusContainers.Today">
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                    <main-project-item></main-project-item>
                </main-status-container>
            </main-content-index>
        </div>
    </div>
</template>

<script>
import SliderMainIndexComponent from "@/Components/SliderMainIndexComponent.vue";
import SliderMainItemComponent from "@/Components/SliderMainItemComponent.vue";
import MainContentIndex from "@/Components/MainContentIndex.vue";
import MainStatusContainer from "@/Components/MainStatusContainer.vue";
import MainProjectItem from "@/Components/MainProjectItem.vue";
export default {
    name: "Main",
    components: {
        MainProjectItem,
        MainStatusContainer,
        SliderMainIndexComponent,
        SliderMainItemComponent,
        MainContentIndex
    },
    data() {
        return {
            statusContainers: {
                Top: 'Top',
                Vip: 'Vip',
                Premium: 'Premium',
                Today: 'Сегодня',
            }
        }
    }
}
</script>

<style scoped>
    #main {
        height: calc(100vh - 60px);
    }
</style>

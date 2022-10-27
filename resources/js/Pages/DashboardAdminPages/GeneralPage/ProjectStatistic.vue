<template>

    <div class="w-10/12 md:w-6/12 lg:w-5/12 mt-3 border px-10 md:px-16 py-3 bg-gray-800 rounded" style="min-width: 320px">

        <h2 class="text-white text-xl text-center">Cтатистика проектов</h2>

        <div class="flex justify-between my-3 border-b border-purple-300">
            <h5 class="font-bold text-white">Всего проектов:</h5>
            <p class="text-white text-lg">{{projects.count}}</p>
        </div>
        <div class="flex justify-between my-3 border-b border-purple-300">
            <h5 class="font-bold text-white">Запрсы на удаление:</h5>
            <p class="text-white text-lg">{{projects.deleted}}</p>
        </div>
        <div class="flex justify-between my-3 border-b border-purple-300">
            <h5 class="font-bold text-white">Опубликованных:</h5>
            <p class="text-white text-lg">{{projects.public}}</p>
        </div>
        <div class="flex justify-between my-3 border-b border-purple-300">
            <h5 class="font-bold text-white"> <span class="text-yellow-400"> Vip </span> проектов:</h5>
            <p class="text-white text-lg">{{projects.vip}}</p>
        </div>
        <div class="flex justify-between my-3 border-b border-purple-300">
            <h5 class="font-bold text-white"> <span class="text-red-500"> Top </span> проектов:</h5>
            <p class="text-white text-lg">{{projects.top}}</p>
        </div>
        <div class="flex justify-between my-3 border-b border-purple-300">
            <h5 class="font-bold text-white"> <span class="text-blue-400"> Premium </span> проектов:</h5>
            <p class="text-white text-lg">{{projects.premium}} из 7</p>
        </div>
    </div>

</template>

<script>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed, ref } from 'vue';

export default {
    name: 'ProjectStatistic',

    setup() {

        const publicProjectCount = computed(() => usePage().props.value.projects.data.filter(project => project.state_public === 1));

        const deletedProjectCount = computed(() => usePage().props.value.projects.data.filter(project => project.state_project === 1));

        const vipProjectCount = computed(() => usePage().props.value.projects.data.filter(project => project.status === 'vip'));

        const topProjectCount = computed(() => usePage().props.value.projects.data.filter(project => project.status === 'top'));

        const premiumProjectCount = computed(() => usePage().props.value.projects.data.filter(project => project.premium === 1));

        const projects = ref({
            count: usePage().props.value.projects.data.length, 
            deleted: deletedProjectCount.value.length,
            public: publicProjectCount.value.length, 
            vip: vipProjectCount.value.length,
            top: topProjectCount.value.length,
            premium: premiumProjectCount.value.length,
        });

        return { projects };

    }

}

</script>
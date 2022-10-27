<template>

    <div class="w-10/12 md:w-5/12 lg:w-3/12 mt-3 border bg-gray-800 px-10 py-3 rounded" style="min-width: 320px">
        <h2 class="text-white text-xl text-center">Статистика баннеров</h2>
        <div class="flex justify-between mt-3">
            <h4 class="text-white font-bold">Зарезервированых</h4> 
            <p class="text-lg text-white">{{banners.reserved}} из 7</p>
        </div>
        <aside class="mt-7 border border-purple-300 rounded-lg bg-gray-700">
            <h3 class="text-green-400 font-bold text-center mt-2">Из них опубликованно</h3>
            <div class="p-3 text-purple-300 font-bold text-8xl text-center">{{banners.public}}/{{banners.reserved}}</div>
        </aside>
    </div>

</template>


<script>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed, ref } from 'vue';

export default {
    name: 'BannerStatistic',

    setup() {

        const reservedBannersCount = computed(() => usePage().props.value.banners.data.filter(banner => banner.reserved === 1));

        const publicBannerCount = computed(() => usePage().props.value.banners.data.filter(banner => banner.state === 1));

        const banners = ref({reserved: reservedBannersCount.value.length, public: publicBannerCount.value.length})

        return { banners };

    }
}

</script>
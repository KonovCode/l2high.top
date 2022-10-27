<template>

    <div class="w-10/12 lg:w-3/12 mt-3 border bg-gray-800 px-10 py-3 rounded" style="min-width: 320px">
        <h2 class="text-white text-xl text-center">Пользователи</h2>
        <div class="flex justify-between mt-3">
            <h4 class="text-white font-bold">Заблокированых</h4> 
            <p class="text-lg text-white">{{users.lock}} из {{users.count}}</p>
        </div>
        <aside class="mt-7 border border-purple-300 rounded-lg bg-gray-700">
            <h3 class="text-green-400 font-bold text-center mt-2">Зарегистрировано</h3>
            <div class="p-3 text-purple-300 font-bold text-8xl text-center">{{users.count}}</div>
        </aside>
    </div>

</template>


<script>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed, ref } from 'vue';

export default {
    name: 'UserStatistic',

    setup() {

        const lockUserCount = computed(() => usePage().props.value.users.data.filter(user => user.user_state === 1));
        
        const users = ref({count: usePage().props.value.users.data.length, lock: lockUserCount.value.length});

        return { users };

    }
}

</script>
<template>

    <AuthenticatedLayout>

        <template #header>
            Баннеры
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            Страница работы с баннерами
        </div>

    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
export default {
    name: "Banner",
    components: {AuthenticatedLayout, Head},
}
</script>

<style scoped>

</style>

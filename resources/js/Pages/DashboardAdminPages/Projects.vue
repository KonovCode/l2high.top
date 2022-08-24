<template>

    <AuthenticatedLayout>

        <template #header>
            Все проекты
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            Страница всех проектов
        </div>

    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from "@inertiajs/inertia-vue3";

export default {
    name: "Projects",
    components: {AuthenticatedLayout, Head},
}
</script>

<style scoped>

</style>

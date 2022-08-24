<template>

    <AuthenticatedLayout>

        <template #header>
            Пользователи
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            Страница работы с users
        </div>

    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from "@inertiajs/inertia-vue3";

export default {
    name: "Users",
    components: {AuthenticatedLayout, Head},
}
</script>

<style scoped>

</style>

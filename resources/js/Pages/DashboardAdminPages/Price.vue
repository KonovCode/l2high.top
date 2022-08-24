<template>

    <AuthenticateLayout>

        <template #header>
            Цены
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            Страница работы с ценами
        </div>

    </AuthenticateLayout>

</template>

<script>
import AuthenticateLayout from '@/Layouts/Authenticated.vue';
import { Head } from "@inertiajs/inertia-vue3";

export default {
    name: "Price",
    components: {AuthenticateLayout, Head}
}
</script>

<style scoped>

</style>

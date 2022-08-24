<template>
    <AuthenticatedLayout>

        <template #header>
            Добавить
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            Добавить сервер (админ панель)
        </div>
    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
export default {
    name: "AddProject",
    components: {
        AuthenticatedLayout,
        Head
    }
}
</script>

<style scoped>

</style>

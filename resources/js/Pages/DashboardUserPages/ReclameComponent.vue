<template>
    <Head title="l2high/Информация о рекламе" />

    <AuthenticatedLayout>
        <template #header>
            О рекламе
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            Информация о рекламе на проект
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
export default {
    name: "ReclameComponent",
    components: {AuthenticatedLayout, Head},
}
</script>

<style scoped>

</style>

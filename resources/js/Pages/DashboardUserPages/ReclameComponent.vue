<template>
    <Head title="l2high/Купить статус" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                О рекламе
            </h2>
        </template>

        <div class="py-10">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Информация о рекламе на проекте
                    </div>
                </div>
            </div>
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

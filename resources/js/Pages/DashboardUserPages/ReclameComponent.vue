<template>
    <Head title="l2high/Информация о рекламе" />

    <AuthenticatedLayout>
        <template #header>
            О рекламе
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-center text-xl font-bold my-3">Реклама l2high.top</h2>
            <div class="flex justify-evenly w-full flex-wrap">

                <section class="w-11/12 lg:w-3/12 border rounded mt-2 h-96 bg-gray-100" style="min-width: 300px">
                    <h2 class="text-center text-xl font-lg my-2">Привелегии [Top] статуса</h2>
                </section>

                <section class="w-11/12 lg:w-4/12 border rounded mt-2 h-96 bg-gray-100" style="min-width: 300px">
                    <h2 class="text-center text-xl font-lg my-2">Привелегии Premium статуса</h2>
                </section>

                <section class="w-11/12 lg:w-3/12 border rounded mt-2 h-96 bg-gray-100" style="min-width: 300px">
                    <h2 class="text-center text-xl font-lg my-2">Привелегии [Vip] статуса</h2> 
                </section>

            </div>

            <div class="w-11/12 bg-gray-100 h-96 border rounded my-5 mx-auto">
                <h2 class="text-center text-xl font-bold my-3" >Привелегии покупки Баннера l2high.top</h2>
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

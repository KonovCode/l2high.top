<template>
    <Head title="l2high/Информация о рекламе" />

    <AuthenticatedLayout>
        <template #header>
            О рекламе
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-center text-xl font-bold my-3">Реклама l2high.top</h2>
            <div class="flex justify-evenly w-full flex-wrap">

                <section class="w-11/12 lg:w-3/12 border rounded border-red-500 mt-2 h-96 bg-gray-100" style="min-width: 300px">
                    <h2 class="text-center text-xl font-lg my-8">Привелегии <span class="text-red-600 font-bold text-2xl">[Top]</span> статуса</h2>
                    <ul class="list-disc pl-6 mt-8">
                        <li class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, dolor.</li>
                        <li class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt obcaecati minus atque ea odit totam?</li>
                        <li class="mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing.</li>
                    </ul>
                </section>

                <section class="w-11/12 lg:w-4/12 border border-blue-400 rounded mt-2 h-96 bg-gray-100" style="min-width: 300px">
                    <h2 class="text-center text-xl font-lg my-2">Привелегии  <span class="text-blue-400 font-bold text-2xl">[Premium]</span> статуса</h2>
                    <ul class="list-disc pl-6 mt-8">
                        <li class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, dolor.</li>
                        <li class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt obcaecati minus atque ea odit totam?</li>
                        <li class="mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing.</li>
                        <li class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, velit. Officiis dolorem consectetur hic, blanditiis iure inventore non veritatis.</li>
                    </ul>
                </section>

                
                <section class="w-11/12 lg:w-3/12 border border-yellow-400 rounded mt-2 h-96 bg-gray-100" style="min-width: 300px">
                    <h2 class="text-center text-xl font-lg my-2">Привелегии <span class="text-yellow-400 font-bold text-2xl">[Vip]</span> статуса</h2> 
                    <ul class="list-disc pl-6 mt-8">
                        <li class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, dolor.</li>
                        <li class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt obcaecati minus atque ea odit totam?</li>
                        <li class="mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing.</li>
                    </ul>
                </section>

            </div>

            <div class="w-11/12 bg-gray-100 h-60 border border-orange-600 rounded my-6 mx-auto">
                <h2 class="text-center text-xl font-bold my-3 text-orange-500" >Привелегии покупки Баннера l2high.top</h2>
                <ul class="list-disc pl-6 mt-8 mx-auto w-10/12">
                        <li class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, dolor.</li>
                        <li class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt obcaecati minus atque ea odit totam?</li>
                        <li class="mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing.</li>
                    </ul>
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

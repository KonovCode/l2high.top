<template>

    <div v-if="reclame.state" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity ease-out duration-300"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                <div
                    class="relative transform overflow-hidden rounded-lg text-left shadow-xl transition-all sm:my-8 sm:w-full lg:w-9/12">

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <button @click="hideReclame()" class="absolute top-2 right-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" class="w-10 h-10 text-red-500 hover:scale-125">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <h2 class="text-center text-xl font-bold mt-3">l2high.top</h2>
                        <section class="flex justify-evenly mt-1.5 flex-wrap">
                            <hr>
                            <div class="my-4 w-full md:w-6/12 bg-orange-100 rounded-lg px-4 py-3"
                                style="min-width: 300px">
                                <h2 class="font-bold text-center my-1">Преимущества</h2>
                                <section class="vip mt-1 bg-yellow-200 rounded-lg">
                                    <span
                                        class=" p-1 my-1 flex justify-center items-center w-6 font-bold rounded mx-auto">
                                        <h6> VIP </h6>
                                    </span>

                                    <p class="tracking-wider text-center text-sm rounded-lg">
                                        Описание что дает вип статус!
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem accusamus quae
                                        accusantium. Molestias velit magni labore, officiis reprehenderit aperiam
                                        dolorem
                                        eos laudantium quo consequuntur eius.
                                    </p>
                                </section>
                                <section class="top rounded-lg mt-1.5">
                                    <span
                                        class=" p-1 my-1 flex justify-center items-center w-36 font-bold rounded mx-auto">
                                        <h6> super VIP </h6>
                                    </span>

                                    <p class="tracking-wider text-center text-sm">
                                        Описание что дает super VIP статус!
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem accusamus quae
                                        accusantium. Molestias velit magni labore, officiis reprehenderit aperiam
                                        dolorem
                                        eos laudantium quo consequuntur eius.
                                    </p>
                                </section>
                                <section class="rounded-lg mt-1.5 bg-blue-200">
                                    <span
                                        class=" p-1 my-1 flex justify-center items-center w-6 font-bold rounded mx-auto">
                                        <h6 class="text-red-600"> PREMIUM </h6>
                                    </span>

                                    <p class="tracking-wider text-center text-sm">
                                        Описание что дает ПРЕМИУМ статус!
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem accusamus quae
                                        accusantium.
                                    </p>
                                </section>
                            </div>
                            <div class="w-full md:w-4/12 my-4 bg-green-100 rounded-lg px-4 py-3"
                                style="min-width: 300px">

                                <h2 class="font-bold text-center my-2">Статус прайс лист</h2>
                                <ul v-for="(vip, key) in vips" :key="key"
                                    class="flex items-center justify-between border-b mt-1.5 bg-yellow-200 pr-1">
                                    <li class="vip flex items-center justify-between w-7/12 text-sm"> <span
                                            class="p-1 flex justify-center items-center w-6 font-bold rounded">
                                            {{ vip.name.toUpperCase() }} </span> {{ vip.show_term }} </li>
                                    <li>${{ vip.price }}</li>
                                </ul>

                                <ul v-for="(top, key) in tops" :key="key"
                                    class="top flex items-center justify-between border-b mt-1.5 bg-yellow-200 pr-1">
                                    <li class="top flex items-center justify-between w-7/12 text-sm"> <span
                                            class="p-1 flex justify-center items-center w-6 font-bold rounded">
                                            <h6> VIP </h6>
                                        </span> {{ top.show_term }} </li>
                                    <li>${{ top.price }}</li>
                                </ul>
                                <ul v-for="(premium, key) in premiums" :key="key"
                                    class="premium flex items-center justify-between border-b mt-1.5 bg-blue-200 pr-1">
                                    <li class="flex items-center justify-between w-7/12 text-sm"> <span
                                            class="p-1 flex justify-center items-center w-16 font-bold rounded">
                                            <h6 class="text-xs text-red-600"> {{ premium.name.toUpperCase() }} </h6>
                                        </span> {{ premium.show_term }} </li>
                                    <li>${{ premium.price }}</li>
                                </ul>

                            </div>
                            <hr>
                        </section>

                        <section class="flex justify-evenly mt-1.5 flex-wrap">
                            <hr>
                            <div class="my-4 w-full md:w-6/12 bg-gray-200 rounded-lg px-4 py-3"
                                style="min-width: 300px">
                                <h2 class="font-bold text-center my-1">Преимущества</h2>
                                <section class="rounded-lg mt-1.5 bg-pink-200">
                                    <span
                                        class=" p-1 my-1 flex justify-center items-center w-6 font-bold rounded mx-auto">
                                        <h6 class="text-red-600"> PREMIUM </h6>
                                    </span>

                                    <p class="tracking-wider text-center text-sm py-2">
                                        Описание что дает ПРЕМИУМ статус!
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem accusamus quae
                                        accusantium.
                                    </p>
                                </section>
                            </div>
                            <div class="w-full md:w-4/12 my-4 bg-purple-100 rounded-lg px-4 py-3"
                                style="min-width: 300px">

                                <h2 class="font-bold text-center my-2">Cлайд-баннер прайс</h2>
                                <ul v-for="(banner, key) in banners" :key="key"
                                    class="premium flex items-center justify-between border-b mt-1.5 bg-green-200 pr-1">
                                    <li class="flex items-center justify-between w-7/12 text-sm"> <span
                                            class="p-1 flex justify-center items-center w-16 font-bold rounded">
                                            <h6 class="text-xs text-red-600"> {{ banner.name.toUpperCase() }} </h6>
                                        </span> {{ banner.show_term }} </li>
                                    <li>${{ banner.price }}</li>
                                </ul>

                            </div>
                            <hr>
                        </section>


                        <section class="w-10/12 mx-auto my-3 bg-blue-200 px-3 py-3 text-center rounded-xl italic">
                            <h2 class="text-center font-bold my-1">Сотруднечество</h2>
                            <p>
                                Текст про то что мы работаем не ради денег и что готовы помочь в рекламе бесплатно
                                начинающим серверам
                                так что админы пишите нам по любым вопросам по для связи с нами перейдите в раздел
                                контакты
                            </p>
                        </section>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button @click="hideReclame()" type="button"
                            class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
import { usePage } from '@inertiajs/inertia-vue3'
import { computed, ref } from 'vue';

export default {
    name: 'Reclame',

    setup() {

        const reclame = ref({state: false});

        const services = usePage().props.value.services;

        const vips = computed(() => services.filter(
            service => service.name === 'vip'
        ));

        const tops = computed(() => services.filter(
            service => service.name === 'top'
        ));

        const premiums = computed(() => services.filter(
            service => service.name === 'premium'
        ));

        const banners = computed(() => services.filter(
            service => service.name === 'banner'
        ));

        function showReclame() {
            reclame.value.state = true;
        }

        function hideReclame() {
            reclame.value.state = false;
        }

        return { vips, tops, premiums, banners, reclame, showReclame, hideReclame }

    }
}

</script>


<style scoped>
.vip span {
    background: rgb(225, 191, 0);
    color: white;
    min-width: 40px !important;
}

.top {
    background: linear-gradient(90deg, rgba(2, 1, 71, 1) 0%, rgba(180, 0, 6, 1) 62%);
    color: white;
    font-weight: bold;
}

.top span {
    min-width: 40px !important;
    max-height: 35px;
    align-self: end;
}

.top h6 {
    color: gold
}
</style>
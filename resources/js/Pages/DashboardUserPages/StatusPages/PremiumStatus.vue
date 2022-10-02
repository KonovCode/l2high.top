<template>
    
    <BuyStatusComponent :status_name="'premium'" :selected_project="select_project.data">
        <div class="w-full text-center"> <small> Осталось доступных premium: <span class="font-bold text-red-500">{{maxLimit.counter}}</span> </small> </div>
        <form @submit.prevent class="flex flex-col sm:flex-col lg:flex-row xl:flex-row md:flex-row justify-center items center my-10">
            <div class="py-12 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-blue-300 z-30">
                <h1 class="text-blue-500 font-semibold text-xl ">{{premium_services[6].name.toUpperCase()}} статус</h1>
                <div class="text-center py-4 px-10">
                    <h1 class="text-gray-700 text-4xl font-black">${{premium_services[6].price}}</h1>
                    <p class="text-gray-700 font-bold mt-2">{{premium_services[6].show_term}}</p>
                </div>
                <div class="h-px bg-gray-200"></div>
                <div class="text-center mt-3">
                    <p class="text-sm text-gray-400">
                        {{premium_services[6].description}}
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <button @click="notification(premium_services[6])" class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800">Buy Now</button>
            </div>
            <div class="py-12 my-3 md:my-0 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-purple-500 transform scale-1 sm:scale-1 md:scale-105 lg:scale-105 xl:scale-105 z-40  shadow-none sm:shadow-none md:shadow-xl lg:shadow-xl xl:shadow-xl">
                <h1 class="text-blue-700 font-bold text-2xl ">{{premium_services[8].name.toUpperCase()}} статус</h1>
                <div class="text-center py-4 px-10">
                    <h1 class="text-white text-4xl font-black">${{premium_services[8].price}}</h1>
                    <p class="text-orange-400 text-2xl font-bold  mt-2">{{premium_services[8].show_term}}</p>

                </div>
                <div class="h-px bg-white"></div>
                <div class="text-center mt-3">
                    <p class="text-sm text-white text-opacity-80">
                        {{premium_services[8].description}}
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <button @click="notification(premium_services[8])" class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-purple-400 hover:shadow-xl duration-200 hover:bg-purple-800">Buy Now</button>
            </div>
            <div class="py-12 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-green-300 z-30">
                <h1 class="text-blue-500 font-semibold text-xl ">{{premium_services[7].name.toUpperCase()}} статус</h1>
                <div class="text-center py-4 px-10">
                    <h1 class="text-gray-700 text-4xl font-black">${{premium_services[7].price}}</h1>
                    <p class="text-blue-500 font-bold text-xl mt-2">{{premium_services[7].show_term}}</p>

                </div>
                <div class="h-px bg-gray-200"></div>
                <div class="text-center mt-3">
                    <p class="text-sm text-gray-400">
                        {{premium_services[7].description}}
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <button @click="notification(premium_services[7])" class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800">Buy Now</button>
            </div>
        </form>
    </BuyStatusComponent>

</template>

<script>
import BuyStatusComponent from "@/Pages/DashboardUserPages/BuyStatusComponent.vue";
import FormErrorMessageComponent from "@/Components/FormErrorMessageComponent.vue";
import { usePage, useForm } from "@inertiajs/inertia-vue3";
import {reactive, ref, watchEffect} from "vue";
import Swal from "sweetalert2/dist/sweetalert2.js";

export default {
    name: "PremiumStatus",
    components: {BuyStatusComponent, FormErrorMessageComponent},
    props: {premium_services: Object,select_project: Object, limit: Number},

    setup(props) {

        const maxLimit = ref({counter: 0});

        watchEffect(() => {
            maxLimit.value.counter = (7 - props.limit)
        });

        const form = reactive(
                useForm({
                    buy_premium_id: null,
                    project_id: props.select_project.data.id,
                    premium_state: props.select_project.data.premium,
            })
        );

        function store(id) {
            form.buy_premium_id = id;
            form.post(route('buy-premium'), {preserveScroll: true});
        }

        function notification(service) {
            if(Number(usePage().props.value.auth.user.balance) < service.price) {
                Swal.fire({
                    title: 'Ошибка!',
                    text: 'Не достаточно денег на балансе',
                    icon: 'error',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
            } else if(props.limit === 7) {
                Swal.fire({
                    title: 'Ошибка!',
                    text: 'Максимальное количество premium уже активировано',
                    icon: 'error',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
            }

            if(Number(usePage().props.value.auth.user.balance) >= service.price && (props.limit <= 7 && props.select_project.data.premium === 1 || props.limit !== 7)) {
                switch (props.select_project.data.premium) {
                    case (1) :
                        Swal.fire({
                            title: 'У вас уже подключен Premium статус',
                            text: "При повторной покупке вы продлите его на " + service.show_term,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Купить',
                            cancelButtonText: 'Отмена',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                store(service.id);
                            }
                        })
                    break;
                    case (0) :
                        store(service.id);
                        Swal.fire({
                            title: 'Спасибо за покупку!',
                            text: 'Появится на главное странице после медерации (не больше 3 часов)',
                            icon: 'success',
                            confirmButtonText: 'Хорошо'
                        });
                }
            }
        }
        return {form, maxLimit, notification}
    }
}
</script>


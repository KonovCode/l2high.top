<template>
    <BuyStatusComponent :status_name="'vip'" :selected_project="select_project.data">
        <form @submit.prevent class="flex flex-col sm:flex-col lg:flex-row xl:flex-row md:flex-row justify-center items center my-10">
            <div class="py-12 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-blue-300 z-30">
                <h1 class="text-yellow-600 font-semibold text-xl ">{{vip_services[0].name.toUpperCase()}} Статус</h1>
                <div class="text-center py-4 px-10">
                    <h1 class="text-gray-700 text-4xl font-black">${{vip_services[0].price}}</h1>
                    <p class="text-gray-700 font-bold mt-2">{{vip_services[0].show_term}}</p>

                </div>
                <div class="h-px bg-gray-200"></div>
                <div class="text-center mt-3">
                    <p class="text-sm text-gray-400">
                        {{vip_services[0].description}}
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <button @click="notification(vip_services[0])" class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800">Buy Now</button>
            </div>
            <div class="py-12 my-3 md:my-0 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-purple-500 transform scale-1 sm:scale-1 md:scale-105 lg:scale-105 xl:scale-105 z-40  shadow-none sm:shadow-none md:shadow-xl lg:shadow-xl xl:shadow-xl">
                <h1 class="text-yellow-500 font-bold text-2xl ">{{vip_services[2].name.toUpperCase()}} статус</h1>
                <div class="text-center py-4 px-10">
                    <h1 class="text-white text-4xl font-black">${{vip_services[2].price}}</h1>
                    <p class="text-orange-400 text-2xl font-bold  mt-2">{{vip_services[2].show_term}}</p>

                </div>
                <div class="h-px bg-white"></div>
                <div class="text-center mt-3">
                    <p class="text-sm text-white text-opacity-80">
                        {{vip_services[2].description}}
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <button @click="notification(vip_services[2])" class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-purple-400 hover:shadow-xl duration-200 hover:bg-purple-800">Buy Now</button>
            </div>
            <div class="py-12 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-green-300 z-30">
                <h1 class="text-yellow-600 font-semibold text-xl ">{{vip_services[1].name.toUpperCase()}} статус</h1>
                <div class="text-center py-4 px-10">
                    <h1 class="text-gray-700 text-4xl font-black">${{vip_services[1].price}}</h1>
                    <p class="text-blue-500 font-bold text-xl mt-2">{{vip_services[1].show_term}}</p>

                </div>
                <div class="h-px bg-gray-200"></div>
                <div class="text-center mt-3">
                    <p class="text-sm text-gray-400">
                        {{vip_services[1].description}}
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <button @click="notification(vip_services[1])" class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800">Buy Now</button>
            </div>
        </form>
    </BuyStatusComponent>
</template>

<script>
import BuyStatusComponent from "@/Pages/DashboardUserPages/BuyStatusComponent.vue";
import FormErrorMessageComponent from "@/Components/FormErrorMessageComponent.vue";
import {useForm, usePage} from "@inertiajs/inertia-vue3";
import {reactive} from "vue";
import Swal from "sweetalert2/dist/sweetalert2.js";

export default {
    name: "VipStatus",
    components: {BuyStatusComponent, FormErrorMessageComponent},
    props: {vip_services: Object, select_project: Object},

    setup(props) {

        const form = reactive(
            useForm({
                buy_service_id: null,
                project_id: props.select_project.data.id,
            })
        );

        function store(id) {
            form.buy_service_id = id;
            form.post(route('buy'), {preserveScroll: true});
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
            }
            if(Number(usePage().props.value.auth.user.balance) >= service.price)
            {
                switch (props.select_project.data.status) {
                    case ('default') :
                        store(service.id);
                        Swal.fire({
                            title: 'Спасибо за покупку!',
                            text: 'Ваш проект получит все привилегии Vip статуса',
                            icon: 'success',
                            confirmButtonText: 'Хорошо'
                        });
                        break;
                    case ('vip') :
                        Swal.fire({
                            title: 'У вас уже подключен VIP статус',
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
                                Swal.fire({
                                    title: 'Спасибо за покупку!',
                                    text: 'Вы продлили Vip статус на ' + service.show_term,
                                    icon: 'success',
                                    confirmButtonText: 'Хорошо'
                                });
                            }
                        })
                        break;
                    case ('top') :
                        Swal.fire({
                            title: 'У вас уже подключен TOP статус!',
                            text: "При покупке VIP статуса TOP будет отключен!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Купить',
                            cancelButtonText: 'Отмена',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                store(service.id);
                                Swal.fire({
                                    title: 'Спасибо за покупку!',
                                    text: 'Ваш статус изменен на Vip!',
                                    icon: 'success',
                                    confirmButtonText: 'Хорошо'
                                });
                            }
                        })
                        break;
                }
            }
        }
        return {form, notification};
    }
}
</script>


<template>
    <AuthenticatedLayout>

        <template #header>
            Добавить
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            <div class="container mx-auto">
                <div class="flex justify-center px-6 my-12">
                    <!-- Row -->
                    <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                        <!-- Col -->
                        <div
                            class="w-full h-auto bg-black hidden lg:block lg:w-5/12 bg-contain bg-center bg-no-repeat rounded-l-lg"
                            style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/4/47/Lineage_2_Logo.jpg')"
                        ></div>
                        <!-- Col -->
                        <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none bg-gray-300">
                            <h3 class="pt-4 mb-3 text-2xl text-center font-semibold">Добавить проект</h3>
                            <form @submit.prevent="store(v$.$invalid)" class="px-2 md:px-8 pt-2 md:pt-6 mt-2 pb-1 md:pb-4 mb-4 bg-white rounded flex-col">
                                <div class="mb-4 md:flex md:justify-between">
                                    <div class="mb-1 md:mb-3 md:mr-2 md:mb-0 w-full flex flex-col">
                                        <label
                                            :class="{requiredNo: v$.title.$invalid , requiredYes: !v$.title.$invalid}"
                                            class="block mb-1 text-xs font-bold text-gray-700 md:text-sm" for="title">
                                            Название
                                        </label>
                                        <input
                                            v-model.trim="form.title"
                                            class="px-2 py-1 text-xs md:px-3 md:py-2 md:text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="title"
                                            type="text"
                                            name="title"
                                            placeholder="Название проекта"
                                        />
                                        <form-error-message-component v-if="form.errors.title">{{form.errors.title}}</form-error-message-component>
                                    </div>
                                    <div class="md:ml-2 w-full flex flex-col">
                                        <label
                                            :class="{requiredNo: v$.website.$invalid , requiredYes: !v$.website.$invalid}"
                                            class="block mb-1 text-xs md:text-sm font-bold text-gray-700" for="website">
                                            Ссылка на сайт
                                        </label>
                                        <input
                                            v-model.trim="form.website"
                                            class="text-xs px-2 py-1 md:px-3 md:py-2 md:text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="website"
                                            type="text"
                                            name="website"
                                            placeholder="https://l2high.top"
                                        />
                                        <form-error-message-component v-if="form.errors.website">{{form.errors.website}}</form-error-message-component>
                                    </div>
                                </div>
                                <div class="mb-1 md:mb-3 w-full flex flex-col">
                                    <label class="required block mb-1 text-xs md:text-sm font-bold text-gray-700">
                                        Хроники
                                    </label>
                                    <select
                                        v-model.trim="form.chronicles"
                                        name="chronicles" class="border w-full border-gray-300 rounded-full text-sm md:text-md h-6 py-0 md:h-10 pl-5 pr-10 text-gray-700 hover:border-gray-400 focus:outline-none appearance-none">
                                        <option value="Interlude">Interlude</option>
                                        <option value="Gracia">Gracia</option>
                                        <option value="Interlude+">Interlude+</option>
                                    </select>
                                    <form-error-message-component v-if="form.errors.chronicles">{{form.errors.chronicles}}</form-error-message-component>
                                </div>

                                <div class="md:mb-4 md:flex md:justify-between">
                                    <div class="md:mb-4 md:mr-2 md:mb-0 w-full flex flex-col">
                                        <label
                                            :class="{requiredNo: v$.rates.$invalid , requiredYes: !v$.rates.$invalid}"
                                            class="block mb-1 text-xs md:text-sm font-bold text-gray-700" for="rates">
                                            Рейты
                                        </label>
                                        <input
                                            v-model.trim="form.rates"
                                            class="w-full px-2 py-1 text-xs md:px-3 md:py-2 mb-1 md:mb-3 md:text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="rates"
                                            name="rates"
                                            type="text"
                                            placeholder="1200"
                                        />
                                        <form-error-message-component v-if="form.errors.rates">{{form.errors.rates}}</form-error-message-component>
                                    </div>
                                    <div class="md:ml-2 w-full flex flex-col">
                                        <label
                                            :class="{requiredNo: v$.date_open.$invalid, requiredYes: !v$.date_open.$invalid}"
                                            class="block mb-1 text-xs md:text-sm font-bold text-gray-700" for="date_open">
                                            Дата открытия
                                        </label>
                                        <input
                                            v-model="form.date_open"
                                            class="focus:border-blue-700 text-xs md:text-sm rounded"
                                            type="date" name="date_open" id="date_open">
                                        <form-error-message-component v-if="form.errors.date_open">{{form.errors.date_open}}</form-error-message-component>
                                    </div>
                                </div>

                                <div class="flex flex-col m-auto w-1/1">
                                    <h5 class="text-center text-sm font-bold text-gray-700">Status</h5>
                                    <div class="border-1 border rounded border-gray-700 p-2 bg-gray-300">
                                        <div class="flex justify-between">
                                            <label for="">
                                                <small class="mr-1 text-red-600 font-bold text-xs sm:text-sm">Top</small>
                                                <input
                                                    v-model="form.status"
                                                    type="radio" name="status" value="top">
                                            </label>
                                            <label for="">
                                                <small class="mr-1 text-yellow-600 font-bold text-xs sm:text-sm">Vip</small>
                                                <input
                                                    v-model="form.status"
                                                    type="radio" name="status" value="vip">
                                            </label>
                                            <label class="text-center" for="">
                                                <small class="mr-1 text-xs sm:text-sm">Default</small>
                                                <input

                                                    v-model="form.status"
                                                    type="radio" name="status" value="default" checked>
                                            </label>
                                        </div>
                                        <form-error-message-component v-if="form.errors.status">{{form.errors.status}}</form-error-message-component>
                                    </div>
                                    <label class="m-auto mt-6 text-sm font-bold text-blue-600" for="">
                                        Premium
                                        <input
                                            v-model="form.premium"
                                            class="ml-1" type="checkbox" name="premium" value="1">
                                    </label>
                                    </div>


                        <form-error-message-component v-if="form.errors.premium">{{form.errors.premium}}</form-error-message-component>

                                <div class="my-4 text-center">
                                    <button
                                        class="w-full px-4 py-1 text-sm md:text-md md:py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                        type="submit"
                                        :disabled="v$.$invalid"
                                        :class="{'opacity-50 cursor-not-allowed': v$.$invalid}"
                                    >
                                        Добавить проект
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import FormErrorMessageComponent from "@/Components/FormErrorMessageComponent.vue";
import {Head, useForm, usePage} from '@inertiajs/inertia-vue3';
import {useVuelidate} from '@vuelidate/core'
import {required, minLength, maxLength, alpha, url, helpers} from '@vuelidate/validators'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import {reactive, onBeforeUpdate} from "vue";

export default {
    name: "AddProject",
    components: {
        AuthenticatedLayout,
        Head,
        FormErrorMessageComponent,
    },

    setup() {

        onBeforeUpdate(() => {
            notification(usePage().props.value.flash.message);
        });

        const form = reactive( useForm({
            title: '',
            website: null,
            chronicles: 'Interlude',
            rates: null,
            date_open: '',
            status: 'default',
            premium: 0,
            user_id: usePage().props.value.auth.user.id,
        }));

        const regRates = helpers.regex(/^[GVE]{3}$|^[RvR]{3}$|^([1-9])(\d{1,6})$|^(\d(?:[\.,]\d)?)$/i);

        const rules = {
            title: { required, minLength: minLength(3), maxLength: maxLength(20) },
            website: { required, url, maxLength: maxLength(99) },
            chronicles: { required, minLength: minLength(4), maxLength: maxLength(20) },
            rates: { required, regRates },
            date_open: { required },
            status: { required, alpha, minLength: minLength(3), maxLength: maxLength(7) },
        }

        const v$ = useVuelidate(rules, form);

        function store(validate) {
            form.post(route('admin.projects.store'));
            if(!validate) {
                form.reset();
            }
        }

        function notification(status) {
            if(status === 'ok') {
                Swal.fire({
                    title: 'Проект успешно добавлен!',
                    icon: 'success',
                    confirmButtonText: 'Хорошо'
                });
            } else {
                Swal.fire({
                    title: 'Ошибка!',
                    text: 'Что то пошло не так!',
                    icon: 'error',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
        }
        return {form, store, v$, notification};
    }
}
</script>

<style scoped>

label.requiredNo:after
{
    color: red;
    content: " *";
}

.requiredYes
{
    color: green;
}

</style>

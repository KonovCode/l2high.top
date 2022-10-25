<template>

    <AuthenticatedLayout>

        <template #header>
            Все проекты
        </template>

        <div class="p-6 bg-white border-b border-gray-200">

            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                    <tr
                        class="bg-gray-800 flex flex-col flex-no-wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-2 text-left">Название</th>
                        <th class="p-2 text-left">Рейты</th>
                        <th class="p-2 text-left">User/Email</th>
                        <th class="p-2 text-left">Status</th>
                        <th class="p-2 text-left">Premium</th>
                        <th class="p-7 text-left" width="110px">Actions</th>
                    </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">

                    <tr v-for="project in projects.data" :key="project"
                        :class="{noState: project.state_project == 0, okState: project.state_project == 1}"
                        class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 border-b w-full">

                        <td class="border-grey-light border p-2">{{project.title}}</td>

                        <td class="border-grey-light border p-2">x{{project.rates}}</td>

                        <td class="p-2 flex flex-col items-center justify-center border sm:border-none">
                            <small class="p-0 m-0">{{project.user.name}}</small>
                            <small class="p-0 m-0">{{project.user.email}}</small>
                        </td>

                        <td class="border-gray-light border p-2">{{project.status}}</td>

                        <td class="border-gray-light border p-2">{{project.premium ? 'Yes' : 'Not'}}</td>

                        <td class="border-grey-light border p-2 flex flex-col">
                            <button type="button" @click="getOption(project.id)"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-2 text-center mt-1">Опции</button>
                            <Link preserve-scroll :href="route('admin.projects.destroy', project.id)" method="DELETE"
                                as="button"
                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-2 text-center mt-1">
                            Удалить</Link>
                        </td>

                    </tr>
                </tbody>

            </table>
            <h2 v-if="projects.data.length === 0" class="text-center">На данный момент вы не добавили не одного проекта
                =(</h2>

            <div v-if="optionState.state && optionState.project !== null" class="option_form">
                <div class="w-full">
                    <div class="flex justify-center px-2 my-3">
                        <!-- Row -->
                        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                            <!-- Col -->
                            <div class="w-full hidden bg-black lg:block lg:w-5/12 bg-contain bg-center bg-no-repeat rounded-l-lg"
                                style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/4/47/Lineage_2_Logo.jpg')">
                            </div>
                            <!-- Col -->
                            <div
                                class="w-full lg:w-7/12 bg-white p-1 md:p-5 rounded-lg lg:rounded-l-none relative bg-gray-300">
                                <small class="p-0 m-0 text-blue-500">Активных premium: {{premiumLimit.count}}</small>
                                <form @submit.prevent="updateProject(form.id)"
                                    class="px-2 md:px-8 pt-2 md:pt-6 mt-2 pb-1 md:pb-4 mb-4 bg-white rounded flex-col">
                                    <span @click="closeOption()"
                                        class="font-bold text-red-500 text-4xl absolute -top-5 -right-5 hover:rotate-90 duration-200 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-12 h-12">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>

                                    </span>
                                    <div class="mb-4 md:flex md:justify-between">
                                        <div class="mb-1 md:mb-3 md:mr-2 md:mb-0 w-full flex flex-col">
                                            <label
                                                :class="{requiredNo: v$.title.$invalid, requiredYes: !v$.title.$invalid}"
                                                class="block mb-1 text-xs font-bold text-gray-700 md:text-sm"
                                                for="title">
                                                Название
                                            </label>
                                            <input v-model.trim="form.title"
                                                class="px-2 py-1 text-xs md:px-3 md:py-2 md:text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                id="title" type="text" name="title" placeholder="Название проекта" />
                                            <form-error-message-component></form-error-message-component>
                                        </div>

                                        <div class="md:ml-2 w-full flex flex-col">
                                            <label
                                                :class="{requiredNo: v$.website.$invalid, requiredYes: !v$.website.$invalid}"
                                                class="block mb-1 text-xs md:text-sm font-bold text-gray-700"
                                                for="website">
                                                Ссылка на сайт
                                            </label>
                                            <input v-model.trim="form.website"
                                                class="text-xs px-2 py-1 md:px-3 md:py-2 md:text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                id="website" type="text" name="website"
                                                placeholder="https://l2high.top" />
                                        </div>

                                    </div>

                                    <div class="mb-1 md:mb-3 w-full flex flex-col">
                                        <label
                                            :class="{requiredNo: v$.chronicles.$invalid, requiredYes: !v$.chronicles.$invalid}"
                                            class="required block mb-1 text-xs md:text-sm font-bold text-gray-700">
                                            Хроники
                                        </label>
                                        <select name="chronicles" v-model="form.chronicles"
                                            class="border w-full border-gray-300 rounded-full text-sm md:text-md h-6 py-0 md:h-10 pl-5 pr-10 text-gray-700 hover:border-gray-400 focus:outline-none appearance-none">
                                            <option value="Interlude">Interlude</option>
                                            <option value="Gracia">Gracia</option>
                                            <option value="Interlude+">Interlude+</option>
                                        </select>
                                        <form-error-message-component></form-error-message-component>
                                    </div>

                                    <div class="md:mb-4 md:flex md:justify-between">
                                        <div class="md:mb-4 md:mr-2 md:mb-0 w-full flex flex-col">
                                            <label
                                                :class="{requiredNo: v$.rates.$invalid, requiredYes: !v$.rates.$invalid}"
                                                class="block mb-1 text-xs md:text-sm font-bold text-gray-700"
                                                for="rates">
                                                Рейты
                                            </label>
                                            <input v-model.trim="form.rates"
                                                class="w-full px-2 py-1 text-xs md:px-3 md:py-2 mb-1 md:mb-3 md:text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                id="rates" name="rates" type="text" placeholder="1200" />
                                            <form-error-message-component></form-error-message-component>
                                        </div>
                                        <div class="md:ml-2 w-full flex flex-col">
                                            <label
                                                class="block mb-1 text-xs md:text-sm font-bold text-gray-700" for="date_open">
                                                Дата открытия: <span
                                                    class="text-blue-500 font-medium">{{optionState.project[0].date_open}}</span>
                                            </label>
                                            <input v-model="form.date_open" class="focus:border-blue-700 text-xs md:text-sm rounded" type="date"
                                                name="date_open" id="date_open">
                                            <form-error-message-component></form-error-message-component>
                                        </div>
                                    </div>

                                    <div class="flex flex-col m-auto w-1/1">
                                        <h5 class="text-center text-sm font-bold text-gray-700">Status</h5>
                                        <div class="border-1 border rounded border-gray-700 p-2 bg-gray-300">
                                            <div class="flex justify-between">
                                                <label for="">
                                                    <small class="mr-1 text-red-600 font-bold text-xs sm:text-sm">Top</small>
                                                    <input type="radio" name="status" value="top" v-model="form.status"
                                                        :checked="form.status === 'top' ? true : false">
                                                </label>
                                                <label for="">
                                                    <small class="mr-1 text-yellow-600 font-bold text-xs sm:text-sm">Vip</small>
                                                    <input type="radio" name="status" value="vip" v-model="form.status"
                                                        :checked="form.status === 'vip' ? true : false">
                                                </label>
                                                <label class="text-center" for="">
                                                    <small class="mr-1 text-xs sm:text-sm">Default</small>
                                                    <input type="radio" name="status" value="default"
                                                        v-model="form.status"
                                                        :checked="form.status === 'default' ? true : false">
                                                </label>
                                            </div>
                                            <form-error-message-component></form-error-message-component>
                                        </div>
                                        <label class="m-auto mt-3 md:mt-5 text-sm font-bold text-blue-600" for="premium">
                                            Premium:

                                            <select class="text-xs h-7 py-0 rounded" v-model="form.premium"
                                                name="premium" id="premium">
                                                <option value="1">Активен</option>
                                                <option value="0">Не активен</option>
                                            </select>
                                        </label>
                                    </div>


                                    <form-error-message-component></form-error-message-component>

                                    <div class="my-3 text-center">
                                        <button
                                            class="w-full px-4 py-1 text-sm md:text-md md:py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                            :disabled="v$.$invalid"
                                            :class="{'opacity-50 cursor-not-allowed': v$.$invalid}" type="submit">
                                            Сохранить изменения
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, usePage, Link, useForm } from "@inertiajs/inertia-vue3";
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { onBeforeUpdate, ref, reactive } from 'vue';
import { useVuelidate } from '@vuelidate/core';
import { required, minLength, maxLength, alpha, url, helpers } from '@vuelidate/validators'
import FormErrorMessageComponent from '@/Components/FormErrorMessageComponent.vue';

export default {
    name: "Projects",
    components: { AuthenticatedLayout, Head, Link, FormErrorMessageComponent },
    props: {
        projects: Object,
        premiumLimit: Number,
    },

    setup() {

        const optionState = ref({ state: false, project: null });

        const premiumLimit = ref({count: usePage().props.value.premiumLimit});

        onBeforeUpdate(() => {
            notification(usePage().props.value.flash.message);
            premiumLimit.value.count = usePage().props.value.premiumLimit;
        });

        const regRates = helpers.regex(/^[GVE]{3}$|^[RvR]{3}$|^([1-9])(\d{1,6})$|^(\d(?:[\.,]\d)?)$/i);

        const form = reactive(useForm({
            id: null,
            title: '',
            website: null,
            chronicles: 'Interlude',
            rates: null,
            date_open: '',
            status: null,
            premium: null,
        }));

        const rules = {
            title: { required, minLength: minLength(3), maxLength: maxLength(20) },
            website: { required, url, maxLength: maxLength(99) },
            chronicles: { required, minLength: minLength(4), maxLength: maxLength(20) },
            rates: { required, regRates },
            status: { required, alpha, minLength: minLength(3), maxLength: maxLength(7) },
        }

        const v$ = useVuelidate(rules, form);

        function getOption(id) {
            optionState.value.project = usePage().props.value.projects.data.filter(project => project.id === id);

            form.id = optionState.value.project[0].id;
            form.title = optionState.value.project[0].title;
            form.website = optionState.value.project[0].website;
            form.chronicles = optionState.value.project[0].chronicles;
            form.rates = optionState.value.project[0].rates;
            form.date_open = optionState.value.project[0].date_open;
            form.status = optionState.value.project[0].status;
            form.premium = optionState.value.project[0].premium;

            optionState.value.state = true;
        }

        function closeOption() {
            optionState.value.project = null;
            optionState.value.state = false;
        }

        function updateProject(project_id) {
            form.put(route('admin.projects.update', project_id));
        }

        function notification(res) {
            if (res === 'update' && !v$.$invalid) {
                Swal.fire({
                    title: 'Проект был успешно обнавлен!',
                    icon: 'success',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
            } else if (res === 'delete') {
                Swal.fire({
                    title: 'Проект был успешно удален!',
                    icon: 'success',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
            }
            else {
                Swal.fire({
                    title: 'Ошибка!',
                    icon: 'error',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
            }
        }

        return { getOption, closeOption, updateProject, optionState, premiumLimit, form, v$ }
    }
}
</script>

<style scoped>
@media (min-width: 640px) {
    table {
        display: inline-table !important;
    }

    thead tr:not(:first-child) {
        display: none;
    }

}

label.requiredNo:after {
    color: red;
    content: " *";
    font-size: 18px;
}

.requiredYes {
    color: green;
}


.okState {
    color: #468EF0;
}

.noState td button {
    color: white;
}

.noState td {
    color: black;
}

td:not(:last-child) {
    border-bottom: 0;
}

th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, .1);
}

.option_form {
    width: 80%;
    height: 500px;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -40%;
    margin-top: -275px;
}
</style>

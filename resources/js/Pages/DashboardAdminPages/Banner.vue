<template>

    <AuthenticatedLayout>

        <template #header>
            Баннеры
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex flex-col lg:flex-row justify-between">
                <form v-if="banners.open_option" @submit.prevent="sendForm(banners.open_option_id)"
                             class="option_form flex flex-col bg-gray-800 rounded"
                            enctype="multipart/form-data">
                            <h3
                                class=" text-white text-xl md:text-3xl text-center my-1 md:my-5 font-bold">
                                l2high.top</h3>
                            <div class=" flex flex-col mt-6 md:mt-3 w-5/6 mx-auto">
                                <input v-model="imageForm.name_project" class="my-1" type="text" name="name_project"
                                    placeholder="Название проекта">

                                <input v-model="imageForm.src_project" class="my-1" type="text" name="url"
                                    placeholder="Ссылка на сайт">

                                <div class="flex mt-1 md:mt-3 justify-between flex-wrap mt-6 md:mt-0">
                                    <label class="w-2/5 mx-auto">
                                        <input @input="addImg($event)" class="text-sm cursor-pointer hidden" name="img"
                                            type="file" multiple />

                                        <div
                                            class="h-8 md:h-10 bg-indigo-600 text-white flex justify-center border border-gray-300 rounded font-semibold cursor-pointer p-1 md:p-2 hover:bg-indigo-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="md:w-6 md:h-6 h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                            </svg>

                                        </div>
                                    </label>
                                    <select v-model="imageForm.buy_term" class="h-8 mb-3 md:h-10 mx-auto text-xs md:text-sm rounded" name="buy_term">
                                        <option v-for="(term, key) in services" :key="key" :value="term.id">{{term.show_term}}</option>
                                    </select>
                                    <button type="submit"
                                        class="md:px-2 px-1 mb-3 py-0 mx-auto h-8 md:h-10 md:w-1/4 bg-green-400 text-white text-xs md:text-md md:text-lg hover:bg-green-500 border border-gray-300 rounded">Загрузить</button>
                                </div>
                            </div>
                            <button v-if="banners.open_option" @click="closeOption()"
                                class="w-2/4 md:w-1/4 text-xs md:text-sm text-white mx-auto py-1 px-1 md:px-3 h-8 bg-red-400 rounded hover:bg-red-500 ">Закрыть</button>
                        </form>



                <section class="pre-slide border bg-gray-200 rounded hidden m-auto md:block mb-3"
                    style="min-width: 750px; max-width:750px; height: 300px">
                    <!-- <img v-if="banners.show && banners.show[0].path_img !== null" :src="banners.show[0].path_img"
                        alt=""> -->
                        <div class="show_slide w-full h-full" v-if="banners.show && banners.show[0].path_img !== null" :style="{'background': 'url(' + banners.show[0].path_img + ')'}"></div>
                </section>
                <section class="w-full">

                    <table class="border-collapse w-11/12 mx-auto">
                        <thead>
                            <tr>
                                <th
                                    class="p-2 font-bold uppercase bg-gray-800 text-white border border-gray-500 hidden lg:table-cell">
                                    №</th>
                                <th
                                    class="p-2 font-bold uppercase bg-gray-800 text-white border border-gray-500 hidden lg:table-cell">
                                    User</th>
                                <th
                                    class="p-2 font-bold uppercase bg-gray-800 text-white border border-gray-500 hidden lg:table-cell">
                                    Status</th>
                                <th
                                    class="p-2 font-bold uppercase bg-gray-800 text-white border border-gray-500 hidden lg:table-cell">
                                    Опции</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(banner, key) in banners.all" :key="key"
                                class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">№</span>
                                    {{banner.id}}
                                </td>
                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">User</span>
                                    {{banner.user.email}}
                                </td>

                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                    <span v-if="banner.reserved === 0"
                                        class="rounded bg-red-400 py-1 px-3 text-xs font-bold opacity-60">deleted</span>
                                    <Link preserve-scroll as="button" :href="route('admin.banner.activate', banner.id)"
                                        v-if="banner.reserved === 1 && banner.state === 0" method="POST"
                                        class="rounded bg-green-500 p-1 text-xs font-bold hover:bg-green-600 text-white">
                                    Добавить
                                    </Link>
                                    <Link preserve-scroll as="button"
                                        :href="route('admin.banner.unactivate', banner.id)"
                                        v-if="banner.reserved === 1 && banner.state === 1" method="POST"
                                        class="rounded bg-orange-400 py-1 px-3 text-xs font-bold hover:bg-orange-500 text-white">
                                    Скрыть
                                    </Link>
                                </td>
                                <td class="w-full my-auto py-2.5 lg:w-auto border border-b flex justify-evenly text-center relative">

                                    <button v-if="banner.reserved === 1" type="button" @click="selected_show(banner.id)"
                                        class="hidden md:block text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-1 px-1 text-center mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </button>

                                    <a preserve-scroll :href="route('admin.banner.download', banner.id)" as="button"
                                        v-if="banner.reserved === 1"
                                        class="rounded bg-blue-400 mr-2 p-1 text-xs font-bold hover:bg-blue-500 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>

                                    </a>
                                    
                                    <button v-if="banner.reserved === 0" @click="getOption(banner.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-7 h-7 cursor-pointer rounded bg-blue-400 mr-2 p-1 text-xs font-bold hover:bg-blue-500 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    </button>

                                    <Link v-if="banner.reserved === 1" :href="route('admin.banner.reset', banner.id)" method="post" as="button"
                                        preserve-scroll
                                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-1 py-1 text-center mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>

                                    </Link>


                                </td>
                            </tr>
                        </tbody>
                    </table>

                </section>
            </div>
        </div>

    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, usePage, Link, useForm } from '@inertiajs/inertia-vue3';
import { ref, onBeforeUpdate, computed } from 'vue';
import Swal from "sweetalert2/dist/sweetalert2.js";
export default {
    name: "Banner",
    components: { AuthenticatedLayout, Head, Link },
    props: { banners: Object, services: Object },

    setup() {
        const banners = ref({ all: usePage().props.value.banners.data, show: null, open_option: false, open_option_id: null});

        const imageForm = useForm({
            file: null,
            name_project: null,
            src_project: null,
            buy_term: usePage().props.value.services[9].id,
            banner_id: null,
        });

        const services = computed(() => usePage().props.value.services.filter((banner) => {
            if (banner.name === 'banner') {
                return banner;
            }
        })
        );

        onBeforeUpdate(() => {
            banners.value.show = null;
            banners.value.all = usePage().props.value.banners.data;
            notification(usePage().props.value.flash.message);
        });

        function selected_show(id) {
            banners.value.show = usePage().props.value.banners.data.filter(banner => banner.id === id);
        }

        function addImg(e) {
            console.log(e.target.files[0]);
            if(e.target.files[0].size < 500000) {
                imageForm.file = e.target.files[0];
            } else {
                Swal.fire({
                    title: 'Ошибка',
                    text: 'Максимальный размер файла 500kb',
                    icon: 'warning',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
            }
        }

        function getOption(id) {
            banners.value.open_option = true;
            banners.value.open_option_id = id;
        }

        function closeOption() {
            banners.value.open_option = false;
            banners.value.open_option_id = null;
        }

        function sendForm(banner_id) {
            imageForm.banner_id = banner_id;
            imageForm.post(route('admin.banner.upload'));
        }

        function notification(message) {
            if(message === 'upload') {
                Swal.fire({
                    title: 'Баннер успешно загружен!',
                    icon: 'success',
                    confirmButtonText: 'Хорошо',
                });
                imageForm.reset();
                closeOption();
            } else if(message === 'error') {
                Swal.fire({
                    title: 'Ошибка =(',
                    icon: 'error',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
            } else if (message === 'reset') {
                Swal.fire({
                    title: 'Баннер успешно удален!',
                    icon: 'success',
                    confirmButtonText: 'Хорошо',
                });
            }
        }

        return { banners, services, selected_show, addImg, getOption, closeOption, sendForm, imageForm }
    }
}
</script>

<style scoped>

.option_form {
    width: 70%;
    height: 320px;
    position: fixed;
    left: 50%;
    top: 50%;
    margin-left: -35%;
    margin-top: -175px;
    z-index: 1000;
}

.show_slide {
    background-repeat: no-repeat !important;
    background-size: cover !important;
    background-position: center !important;
}

</style>


<template>

    <AuthenticatedLayout>

        <template #header>
            Баннеры
        </template>

        <div class="p-6 bg-white border-b border-gray-200">

            <div class="border flex flex-col md:flex-row w-full">

                <div class="slide h-10 md:h-80 w-7/8" v-for="(banner, key) in banners.data" :key="banner.id"
                    @click="addActive(key)" :class="key === activeState.el ? 'active' : ''"
                    :ref="banner => {if(banner) slides[key] = banner}">

                    <section v-if="!formState.state || formState.key !== key" class="h-full">

                        <p class="open_content_item opacity-0 text-blue-400 absolute top-5 left-5">Баннер #{{key + 1}}
                        </p>

                        <div class="status_title flex flex-col justify-between h-full">
                            <small class="flex justify-center border rounded md:mt-3 w-1/2 md:w-full m-auto md:m-0"
                                :class="banner.reserved === 1 ? 'text-orange-500 border-red-400' : 'text-green-500 border-green-400'"
                                v-text="banner.reserved === 1 ? 'No' : 'Ok'"></small>

                            <p class="md:flex hidden text-white text-xl font-bold justify-center">{{banner.id}}</p>

                            <small
                                class="text-blue-500 font-bold border border-blue-400 mb-3 rounded hidden md:flex justify-center">l2high</small>
                        </div>
                        <div class="h-full flex items-center justify-center">
                            <h3 v-text="banner.reserved === 1 ? banner.name_project : 'l2high.top'"
                                class="open_content_item opacity-0 text-white text-3xl font-bold"></h3>
                        </div>

                        <aside class="open_content_item opacity-0 flex flex-col absolute top-2 right-5">
                            <small class="text-red-500">Баннер занаят</small>
                            <p class="text-blue-400">До: {{banner.buy_term}}</p>
                        </aside>

                        <button v-if="banner.reserved === 0" @click="getForm(key)"
                            class="show_item py-1 px-3 bg-green-400 rounded hover:bg-green-500">Купить баннер</button>
                    </section>

                    <section>

                        <form @submit.prevent="sendForm(banner.id, $page.props.flash.message)"
                            v-if="formState.state && formState.key === key" class="flex flex-col"
                            enctype="multipart/form-data">
                            <h3
                                class="open_content_item opacity-0 text-white text-xl md:text-3xl text-center my-1 md:my-5 font-bold">
                                l2high.top</h3>
                            <div class="open_content_item opacity-0 flex flex-col md:mt-3 w-5/6 mx-auto">
                                <input v-model="form.name_project" class="my-1" type="text" name="name_project"
                                    placeholder="Название проекта">

                                <input v-model="form.url" class="my-1" type="text" name="url"
                                    placeholder="Ссылка на сайт">

                                <div class="flex mt-1 md:mt-3 justify-between">
                                    <label class="w-2/5">
                                        <input @input="getImg($event)" class="text-sm cursor-pointer hidden" name="img"
                                            type="file" multiple />

                                        <div
                                            class="h-10 bg-indigo-600 text-white flex justify-center border border-gray-300 rounded font-semibold cursor-pointer p-2 px-2 hover:bg-indigo-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                            </svg>

                                        </div>
                                    </label>
                                    <select v-model="form.buy_term" class=" h-10 rounded" name="buy_term">
                                        <option v-for="service in services" :value="service.id">{{service.show_term}}
                                        </option>
                                    </select>
                                    <button type="submit"
                                        class="md:px-2 px-1 py-0 w-1/4 bg-green-400 text-white text-md md:text-lg hover:bg-green-500 border border-gray-300 rounded">Купить</button>
                                </div>
                            </div>
                            <button @click="closeForm()"
                                class="show_item py-1 px-3 h-8 bg-green-400 rounded hover:bg-green-500 ">Отмена</button>
                        </form>
                    </section>
                </div>
            </div>

            <h1 class="text-xl my-8 font-bold text-blue-500 text-center">Инструкция по покупке баннера l2high.top</h1>

            <div class="flex justify-evenly flex-wrap">
                <section class="w-full md:w-6/12 border mt-5 md:m-0 rounded-lg px-3 py-2" style="min-width: 300px">
                    <p>Инструкция по добавлению</p>
                    <ul class="mt-2">
                        <li class="mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, magni.</li>
                        <li class="mt-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem omnis, numquam distinctio delectus natus maiores earum id at fugiat officiis!</li>
                        <li class="mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio temporibus accusantium doloremque eveniet quasi? Omnis minima amet dignissimos dolore magnam cupiditate, accusantium ipsa.</li>
                    </ul>
                </section>
                <section class="w-full md:w-4/12 border mt-5 md:m-0 rounded-lg px-3 py-2" style="min-width: 300px">
                    <p>Доп.Инфо</p>
                     <ul class="mt-2">
                        <li class="mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, non.</li>
                        <li class="mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, voluptates?</li>
                        <li class="mt-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere, quaerat voluptates!</li>
                     </ul>
                </section>
            </div>

        </div>

    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { ref, onBeforeUpdate, watchEffect } from 'vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/reactivity';
import Swal from "sweetalert2/dist/sweetalert2.js";

export default {
    name: "BannerComponent",
    components: { AuthenticatedLayout },
    props: { banners: Object },

    setup() {
        const formState = ref({ state: false, key: null });

        const activeState = ref({ el: 1 });

        const slides = ref([]);

        const services = computed(() => usePage().props.value.services.filter((banner) => {
            if (banner.name === 'banner') {
                return banner;
            }
        })
        );

        onBeforeUpdate(() => {
            slides.value = [];
            notification(usePage().props.value.flash.message);
        });

        function getForm(key) {
            formState.value.state = true;
            formState.value.key = key;
        }

        function addActive(index) {
            activeState.value.el = index;
        }

        function closeForm() {
            formState.value.state = false;
            formState.value.key = null;

        }

        watchEffect(() => {
            if (formState.value.key !== activeState.value.el) {
                closeForm();
            }
        });

        const form = useForm({
            'name_project': '',
            'url': '',
            'img': null,
            'buy_term': usePage().props.value.services[9].id,
            'user_id': usePage().props.value.auth.user.id,
            'banner_id': null,

        });

        function getImg(e) {
            if (e.target.files[0].size < 50000) {
                form.img = e.target.files[0];
            }
        }

        function notification(m) {
            if (m === 'ok') {
                Swal.fire({
                    title: 'Спасибо за покупку!',
                    text: 'Ваш баннер появится на главное странице после медерации (не больше 3 часов)',
                    icon: 'success',
                    confirmButtonText: 'Хорошо',
                });
                form.reset();
            } else if (m === 'balance') {
                Swal.fire({
                    title: 'Не достаточно денег на балансе =(',
                    icon: 'warning',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
            }
            else {
                Swal.fire({
                    title: 'Не коректный ввод.',
                    icon: 'warning',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
            }
        }

        function sendForm(id) {
            form.banner_id = id;
            form.post(route('user-banners.store'));
        }


        return { formState, getForm, closeForm, addActive, slides, activeState, sendForm, form, getImg, services };
    }


}
</script>

<style scoped>
.slide {
    flex: 1;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    margin: 5px;
    border-radius: 1rem;
    position: relative;
    transition: all 500ms ease-in-out;
    cursor: pointer;
    max-width: 120px;
    min-width: 50px;
    background-color: rgb(31 41 55);
}

.slide.active {
    flex: 10;
    max-width: 750px;
}

.slide .show_item {
    position: absolute;
    bottom: 20px;
    left: 20px;
    opacity: 0;
    text-decoration: none;
    font-size: 20px;
    color: white;
    font-weight: 600;
}

.slide.active .show_item {
    opacity: 1;
    transition: opacity 0.3s ease-in 0.4s;
}

.slide.active .open_content_item {
    opacity: 1;
    transition: opacity 0.3s ease-in 0.4s;
}

.slide.active .status_title {
    opacity: 0;
    height: 0;
}

@media screen and (max-width: 767px) {

    .slide.active {
        min-width: 240px;
        min-height: 240px;
    }

    .slide {
        min-width: none;
        max-width: none;
        max-height: 50px;
        transition: all 0.5s ease-in-out;
    }
}
</style>

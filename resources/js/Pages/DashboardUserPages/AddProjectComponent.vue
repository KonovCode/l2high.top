<template>
    <Head title="l2high/Добавить проект" />

    <AuthenticatedLayout>
        <template #header>
            Добавить проект
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            <div class="mx-auto">
                <div class="flex justify-center px-6 my-12 w-full">
                    <!-- Row -->
                    <div class="w-full flex flex-wrap">
                        <!-- Col -->
                        <div class="w-full lg:w-4/12 border rounded-l-lg" style="min-width: 300px">
                            
                            <section class="flex flex-col">
                                <div class="flex justify-evenly my-3 border rounded-lg px-1 py-2 mx-2 bg-gray-100">
                                    <img :src="linkLogotype" alt="l2high.top">
                                    <select @change="positionLogo($event)" class="h-10 rounded bg-gray-300" name="position">
                                        <option value="topR">Сверху справа</option>
                                        <option value="botR">Снизу справа</option>
                                        <option value="topL">Сверху слева</option>
                                        <option value="botL">Снизу слева</option>
                                        
                                    </select>
                                </div>
                                
                                    <textarea disabled class="mx-3 text-xs sm:text-sm md:text-lg lg:text-lg" cols="30" rows="7" style="resize: none">{{position.selected}}</textarea>

                                    <div class="border rounded-md mt-3 mx-2 pl-8 py-3 mb-2 bg-gray-100">
                                        <ul class="list-decimal text-xs sm:text-sm md:text-lg lg:text-sm">
                                            <li class="mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, ad?</li>
                                            <li class="mt-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe.</li>
                                            <li class="mt-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</li>
                                            <li class="mt-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi facere aut praesentium cupiditate cum ut?</li>
                                        </ul>
                                    </div>
                                
                            </section>

                        </div>
                        <!-- Col -->
                        <div class="w-full lg:w-8/12 bg-white p-5 rounded-lg lg:rounded-l-none bg-gray-300" style="min-width: 300px">
                            <h3 class="my-5 text-2xl font-bold text-center">Добавить проект</h3>
                            <form-error-message-component v-if="form.errors.count_control"> {{form.errors.count_control}} </form-error-message-component>
                            <form @submit.prevent="store"
                                  class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                                <div class="mb-4 md:flex md:justify-between">
                                    <div class="mb-4 md:mr-2 md:mb-0 w-full flex flex-col">
                                        <label
                                            :class="{requiredNo: v$.title.$invalid , requiredYes: !v$.title.$invalid}"
                                            class="block mb-2 text-sm font-bold text-gray-700" for="title">
                                            Название
                                        </label>
                                        <input
                                            v-model.trim="form.title"
                                            class="px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
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
                                            class="block mb-2 text-sm font-bold text-gray-700" for="website">
                                            Ссылка на сайт
                                        </label>
                                        <input
                                            v-model.trim="form.website"
                                            class="px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="website"
                                            type="text"
                                            name="website"
                                            placeholder="https://l2high.top"
                                        />
                                        <form-error-message-component v-if="form.errors.website">{{form.errors.website}}</form-error-message-component>
                                    </div>
                                </div>
                                <div class="mb-4 w-full flex flex-col">
                                    <label class="required block mb-2 text-sm font-bold text-gray-700">
                                        Хроники
                                    </label>
                                    <select
                                        v-model.trim="form.chronicles"
                                        name="chronicles" class="border w-full border-gray-300 rounded-full h-10 pl-5 pr-10 text-gray-700 hover:border-gray-400 focus:outline-none appearance-none">
                                        <option value="interlude">Interlude</option>
                                        <option value="Gracia">Gracia</option>
                                        <option value="Interlude+">Interlude+</option>
                                    </select>
                                    <form-error-message-component v-if="form.errors.chronicles">{{form.errors.chronicles}}</form-error-message-component>
                                </div>

                                <div class="mb-4 md:flex md:justify-between">
                                    <div class="mb-4 md:mr-2 md:mb-0 w-full flex flex-col">
                                        <label
                                            :class="{requiredNo: v$.rates.$invalid , requiredYes: !v$.rates.$invalid}"
                                            class="block mb-2 text-sm font-bold text-gray-700" for="rates">
                                            Рейты
                                        </label>
                                        <input
                                            v-model.trim="form.rates"
                                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
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
                                            class="block mb-2 text-sm font-bold text-gray-700" for="date_open">
                                            Дата открытия
                                        </label>
                                        <input
                                            v-model="form.date_open"
                                            class="focus:border-blue-700"
                                            type="date" name="date_open" id="date_open">
                                        <form-error-message-component v-if="form.errors.date_open">{{form.errors.date_open}}</form-error-message-component>
                                    </div>
                                </div>
                                <div class="mb-6 text-center">
                                    <button
                                        class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                        type="submit"
                                        :disabled="v$.$invalid"
                                        :class="{'opacity-50 cursor-not-allowed': v$.$invalid}"
                                    >Добавить проект
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
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import FormErrorMessageComponent from "@/Components/FormErrorMessageComponent.vue";
import {Head, useForm, usePage} from '@inertiajs/inertia-vue3';
import { useVuelidate } from '@vuelidate/core'
import {required, url, minLength, maxLength, helpers} from "@vuelidate/validators";
import Swal from 'sweetalert2/dist/sweetalert2.js';
import {reactive, computed, watchEffect, ref} from "vue";

export default {
    name: "AddProjectComponent",
    components: {AuthenticatedLayout, Head, FormErrorMessageComponent},

    setup() {

        const result = computed(() => usePage().props.value.flash.message);

        const linkLogotype = computed(() => usePage().props.value.link_logo);

        const position = ref(
            {
                selected: "<a href='http://127.0.0.1:8000' target='_blank' style='position: absolute; z-index:99999; top: 10px; right: 20px;'>" + 
                            "<img" + " src='" + linkLogotype.value +  "' alt='l2high.top' title='Рейтинг серверов Linage 2'/>" +
                        "</a>"
            });

        console.log(usePage().props.value.ziggy.routes);
        watchEffect(() => {
            success(result);
        });

        function positionLogo(e) {
            
            switch(e.target.value) {
                case('topR') : 
                     position.value.selected = 
                        "<a href='http://127.0.0.1:8000' target='_blank' style='position: absolute; z-index:99999; top: 10px; right: 20px;'>" + 
                            "<img" + " src='" + linkLogotype.value +  "' alt='l2high.top' title='Рейтинг серверов Linage 2'/>" +
                        "</a>";
                break;
                case('topL') : 
                    position.value.selected = 
                        "<a href='http://127.0.0.1:8000' target='_blank' style='position: absolute; z-index:99999; top: 10px; left: 20px;'>" + 
                            "<img" + " src='" + linkLogotype.value +  "' alt='l2high.top' title='Рейтинг серверов Linage 2'/>" +
                        "</a>";
                break;   
                case('botR') :
                    position.value.selected = 
                        "<a href='http://127.0.0.1:8000' target='_blank' style='position: fixed; z-index:99999; bottom: 10px; right: 15px;'>" + 
                            "<img" + " src='" + linkLogotype.value +  "' alt='l2high.top' title='Рейтинг серверов Linage 2'/>" +
                        "</a>"; 
                break;        
                case('botL') : 
                    position.value.selected = 
                        "<a href='http://127.0.0.1:8000' target='_blank' style='position: fixed; z-index:99999; bottom: 10px; left: 15px;'>" + 
                            "<img" + " src='" + linkLogotype.value +  "' alt='l2high.top' title='Рейтинг серверов Linage 2'/>" +
                        "</a>";
                break;            
            }
            
        }

        function success(result) {
            if(result.value) {
                form.reset();
                Swal.fire({
                    title: result.value,
                    text: 'Появится на главное странице после медерации (не больше 3 часов)',
                    icon: 'success',
                    confirmButtonText: 'Хорошо'
                })
            }
        }

        const form = reactive(useForm({
            title: null,
            website: null,
            chronicles: 'interlude',
            rates: null,
            date_open: null,
            user_id: usePage().props.value.auth.user.id,
        }));

        const regRates = helpers.regex(/^[GVE]{3}$|^[RvR]{3}$|^([1-9])(\d{1,6})$|^(\d(?:[\.,]\d)?)$/i);

        const rules = {
            title: { required, minLength: minLength(3), maxLength: maxLength(20)},
            website: { required, url, minLength: minLength(4), maxLength: maxLength(99) },
            chronicles: { required, minLength: minLength(5), maxLength: maxLength(20) },
            rates: { required, regRates },
            date_open: { required },
        }

        const v$ = useVuelidate(rules, form);

        function store() {
            form.post(route('project.store'), {preserveScroll: true});
        }

        return {form, store, v$, positionLogo, position, linkLogotype};
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

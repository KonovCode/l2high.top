<template>
    <AuthenticatedLayout>

        <template #header>
            Добавить
        </template>

        <div class="p-6 bg-white border-b border-gray-200">

            <div class="flex items-center justify-center">
                <div class="min-h-1/2 sm:w-5/6 w-4/5 bg-gray-900 px-8 border border-gray-900 rounded-2xl">
                    <form @submit.prevent="store" class="mx-auto flex items-center space-y-4 py-8 font-semibold text-gray-500 flex-col">
                        <span class=" h-5 w-13 text-white">
                            <h2 class="text-white text-1xl">L2_HIGH</h2>
                        </span>

                        <h1 class="text-white text-2xl">Добавить проэкт</h1>

                        <input
                                v-model.trim="form.title"
                                :class="{error: v$.title.$invalid, valid: !v$.title.$invalid}"
                                class="w-4/5 p-2 bg-gray-900 rounded"
                                placeholder="Название проэкта" type="text" name="title">
                        <small class="text-red-500 mt-2" v-if="form.errors.title">{{form.errors.title}}</small>

                        <input
                                v-model="form.website"
                                :class="{error: v$.website.$invalid, valid: !v$.website.$invalid}"
                                class="w-4/5 p-2 bg-gray-900 rounded-md border border-gray-700 focus:border-blue-700"
                                placeholder="https://l2high.top" type="text" name="website">
                        <small class="text-red-500 mt-2" v-if="form.errors.website">{{form.errors.website}}</small>

                        <div class="flex w-full md:flex-row sm:flex-col lg:flex-row xl:flex-row 2xl:flex-row">

                            <div class="relative inline-flex m-auto mt-1">
                                <select
                                    v-model="form.chronicles"
                                    name="chronicles" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-black text-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option value="Interlude">Interlude</option>
                                    <option value="Gracia">Gracia</option>
                                    <option value="Interlude+">Interlude+</option>
                                </select>
                            </div>

                            <small class="text-red-500 mt-2" v-if="form.errors.chronicles">{{form.errors.chronicles}}</small>

                            <div class="flex flex-col m-auto mt-1">
                                <div class="flex">
                                    <span class="text-sm text-white border border-1 rounded-l px-1 py-3 bg-black whitespace-no-wrap">X</span>
                                    <input
                                        v-model="form.rates"
                                        :class="{error: v$.rates.$invalid, valid: (!v$.rates.$invalid)}"
                                        name="rates" class="border border-1 rounded-r w-24" type="text" placeholder="Рейты" id="rates"/>
                                </div>

                            </div>
                            <small class="text-red-500 mt-2" v-if="form.errors.rates">{{form.errors.rates}}</small>


                            <div class="flex flex-col w-1/4 mt-1 m-auto">
                                <input
                                        v-model="form.date_open"
                                        class="bg-gray-900 rounded-md border border-gray-700 focus:border-blue-700"
                                        type="date" name="date_open">
                            </div>
                        </div>
                        <small class="text-red-500 mt-2" v-if="form.errors.date_open">{{form.errors.date_open}}</small>


                        <div class="flex flex-col m-auto w-1/2">
                            <h5 class="text-center">Status</h5>
                            <div class="border-1 border rounded border-white p-2">
                                <div class="flex justify-between">
                                    <label for="">
                                        <small class="mr-1">Top</small>
                                        <input
                                            v-model="form.status"
                                            type="radio" name="status" value="top">
                                    </label>
                                    <label for="">
                                        <small class="mr-1">Vip</small>
                                        <input
                                            v-model="form.status"
                                            type="radio" name="status" value="vip">
                                    </label>
                                    <label for="">
                                        <small class="mr-1">Default</small>
                                        <input
                                            v-model="form.status"
                                            type="radio" name="status" value="default" checked>
                                    </label>
                                </div>
                                <small class="text-red-500 mt-2" v-if="form.errors.status">{{form.errors.status}}</small>

                            </div>
                            <label class="m-auto mt-3 text-blue-500" for="">
                                Premium
                                <input
                                    v-model="form.premium"
                                    class="ml-1" type="checkbox" name="premium" value="1">
                            </label>
                        </div>
                        <small class="text-red-500 mt-2" v-if="form.errors.premium">{{form.errors.premium}}</small>

                        <button
                            :disabled="v$.$invalid"
                            :class="{disabled: v$.$invalid}"
                            class="w-full p-2 bg-gray-50 rounded-full font-bold text-gray-900 border border-gray-700"
                            type="submit">Добавить</button>

                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head, useForm, usePage} from '@inertiajs/inertia-vue3';
import {useVuelidate} from '@vuelidate/core'
import {required, minLength, maxLength, alpha, url, helpers} from '@vuelidate/validators'
import {reactive} from "vue";

export default {
    name: "AddProject",
    components: {
        AuthenticatedLayout,
        Head,
    },

    setup() {

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
            website: { required, url, maxLength: maxLength(30) },
            chronicles: { required, minLength: minLength(4), maxLength: maxLength(20) },
            rates: { required, regRates },
            date_open: { required },
            status: { required, alpha, minLength: minLength(3), maxLength: maxLength(7) },
        }

        const v$ = useVuelidate(rules, form);

        function store() {
            form.post(route('admin.projects.store'));
            form.reset();
        }

        return {form, store, v$};
    }
}
</script>

<style scoped>

.valid {
    color: #468EF0;
    font-weight: bolder;
}

.error {
   color: #d14d4d;
    font-weight: normal;
}

.disabled {
    opacity: 0.4 !important;
    cursor: not-allowed;
}

</style>

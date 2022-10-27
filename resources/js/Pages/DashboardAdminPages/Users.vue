<template>

    <AuthenticatedLayout>

        <template #header>
            Пользователи
        </template>

        <div class="p-6 bg-white border-b border-gray-200">

            <table class="border-collapse w-11/12 mx-auto">
                <thead>
                    <tr>
                        <th
                            class="p-2 font-bold uppercase bg-gray-800 text-white border border-gray-500 hidden lg:table-cell">
                            Email</th>
                        <th
                            class="p-2 font-bold uppercase bg-gray-800 text-white border border-gray-500 hidden lg:table-cell">
                            Name</th>
                        <th
                            class="p-2 w-3/12 font-bold uppercase bg-gray-800 text-white border border-gray-500 hidden lg:table-cell">
                            Balance</th>
                        <th
                            class="p-2 font-bold uppercase bg-gray-800 text-white border border-gray-500 hidden lg:table-cell">
                            Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, key) in users.all" :key="key"
                        class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Email</span>
                            {{ user.email }}
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                            {{ user.name }}
                        </td>

                        <td style="max-height: 50px"
                            class="w-full lg:w-auto p-3 text-gray-800 text-center flex justify-center border border-b text-center relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Balance</span>
                            <p v-if="updateBalance.state === false || updateBalance.selected_id != user.id">
                                {{ user.balance }}</p>
                            <svg v-if="updateBalance.state === false || updateBalance.selected_id != user.id"
                                @click="getUpdateBalance(user.id)" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                class="w-6 h-6 ml-2 cursor-pointer text-blue-400 hover:text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <section v-if="updateBalance.state && updateBalance.selected_id === user.id"
                                class="flex justify-center">
                                <input v-model="form.balance" type="number" :placeholder="user.balance"
                                    class="w-2/4 h-6 text-xs">

                                <Link @click="closeUpdateBalance()" as="button" preserve-scroll
                                    :href="route('admin.user.update.balance', user.id)"
                                    :data="{ balance: form.balance }" method="POST">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor"
                                    class="w-7 h-7 ml-2 text-green-400 hover:text-green-600 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>

                                </Link>

                                <svg @click="closeUpdateBalance()" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"
                                    class="w-7 h-7 text-red-400 hover:text-red-600 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>

                            </section>

                        </td>

                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                            <Link v-if="user.user_state" preserve-scroll as="button"
                                :href="route('admin.unblock.user', user.id)" style="max-width: 105px; min-width: 105px"
                                method="POST"
                                class="rounded bg-green-500 p-1 text-xs font-bold hover:bg-green-600 text-white">
                            Разблокировать
                            </Link>
                            <Link v-if="!user.user_state" preserve-scroll :href="route('admin.block.user', user.id)"
                                as="button" style="max-width: 105px; min-width: 105px" href="" method="POST"
                                class="rounded bg-orange-400 p-1 text-xs font-bold hover:bg-orange-500 text-white">
                            Заблокировать
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p v-if="users.all.length === 0" class="text-center mt-8">Зарегистрированых пользователей не существует на данный момент =(</p>

        </div>

    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link, usePage, useForm } from "@inertiajs/inertia-vue3";
import { ref, onBeforeUpdate } from 'vue';
import Swal from "sweetalert2/dist/sweetalert2.js";

export default {
    name: "Users",
    components: { AuthenticatedLayout, Head, Link },
    props: { users: Object },

    setup() {

        const users = ref({ all: usePage().props.value.users.data });

        const updateBalance = ref({ new: null, state: false, selected_id: null });

        onBeforeUpdate(() => {
            users.value.all = usePage().props.value.users.data;
            notification(usePage().props.value.flash.message);
        });

        const form = useForm({
            balance: null,
        });

        function getUpdateBalance(id) {
            updateBalance.value.state = true;
            updateBalance.value.selected_id = id;
        }

        function closeUpdateBalance() {
            updateBalance.value.state = false;
            updateBalance.value.selected_id = null;
            form.reset();
        }

        function notification(message) {
            switch (message) {
                case ('update'):
                    Swal.fire({
                        title: 'Баланс успешно изменен!',
                        icon: 'success',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    break;
                case ('block'):
                    Swal.fire({
                        title: 'Пользователь был успешно заблокирован!',
                        icon: 'success',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    break;
                case ('unblock'):
                    Swal.fire({
                        title: 'Пользователь успешно разблокирован!',
                        icon: 'success',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
            }
        }


        return { users, getUpdateBalance, closeUpdateBalance, updateBalance, form };

    }
}
</script>

<style scoped>

</style>

<template>

    <AuthenticatedLayout>

        <template #header>
            Все проекты
        </template>

        <div class="p-6 bg-white border-b border-gray-200">

            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                <tr class="bg-gray-900 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                    <th class="p-2 text-left">Название</th>
                    <th class="p-2 text-left">Рейты</th>
                    <th class="p-2 text-left">User/Email</th>
                    <th class="p-2 text-left" width="110px">Actions</th>
                </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">

                <tr v-for="project in projects.data" :key="project"
                    :class="{noState: project.state_project == 0, okState: project.state_project == 1}"
                    class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0 bg-gray-300">

                    <td class="border-grey-light border p-2">{{project.title}}</td>

                    <td class="border-grey-light border p-2">x{{project.rates}}</td>

                    <td class="border-grey-light border p-2 flex flex-col">
                        <small>{{project.user.name}}</small>
                        <small>{{project.user.email}}</small>
                    </td>

                    <td class="border-grey-light border hover:bg-blue-400 p-3 text-blue-500 hover:text-red-600 hover:font-medium cursor-pointer">
                        <button>Настройки</button>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from "@inertiajs/inertia-vue3";

export default {
    name: "Projects",
    components: {AuthenticatedLayout, Head},
    props: {
        projects: Object,
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

.okState {
    color: #468EF0;
}

.noState td button {
    color: red;
}

.noState td {
    color: orangered;
}

td:not(:last-child) {
    border-bottom: 0;
}

th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, .1);
}
</style>

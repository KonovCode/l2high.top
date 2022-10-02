<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import UserProjects from './DashboardUserPages/GeneralPage/UserProjects.vue';
import InfoContainerComponent from '@/Pages/DashboardUserPages/GeneralPage/InfoContainerComponent.vue';
import BalanceInfoComponent from '@/Pages/DashboardUserPages/GeneralPage/BalanceInfoComponent.vue';


</script>

<template>

    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout v-if="$page.props.auth.user.role === 'user'">
        <template #header>
            Главная
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex flex-col">
                <div class="flex justify-between flex-wrap">
                    <section class="w-full mt-3 md:mt-1 md:w-2/5" style="min-width: 275px">
                        <h2 class="text-xl text-center my-2">Ваши проекты</h2>
                        <UserProjects></UserProjects>
                    </section>
                    <section class="w-full mt-3 md:m-auto md:w-7/12 rounded-md" style="min-width: 300px">
                        <BalanceInfoComponent></BalanceInfoComponent>
                    </section>
                </div>
                <div class="mt-5">
                    <InfoContainerComponent></InfoContainerComponent>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>

    <BreezeAuthenticatedLayout v-if="$page.props.auth.user.role === 'admin'">
        <template #header>
            Кабинет {{$page.props.auth.user.name}}
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            Админ кабинет
        </div>
    </BreezeAuthenticatedLayout>
</template>





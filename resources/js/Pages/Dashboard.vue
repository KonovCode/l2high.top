<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import UserProjects from './DashboardUserPages/GeneralPage/UserProjects.vue';
import InfoContainerComponent from '@/Pages/DashboardUserPages/GeneralPage/InfoContainerComponent.vue';
import BalanceInfoComponent from '@/Pages/DashboardUserPages/GeneralPage/BalanceInfoComponent.vue';
import ProjectStatistic from './DashboardAdminPages/GeneralPage/ProjectStatistic.vue';
import BannerStatistic from './DashboardAdminPages/GeneralPage/BannerStatistic.vue';
import UserStatistic from './DashboardAdminPages/GeneralPage/UserStatistic.vue';

</script>

<template>

    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout v-if="$page.props.auth.user.role === 'user' && $page.props.auth.user.user_state === 0">
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

    <BreezeAuthenticatedLayout v-if="$page.props.auth.user.role === 'user' && $page.props.auth.user.user_state === 1">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-red-500 text-xl text-center my-5">Ваш аккаунт был заблокирован!</h1>
            <p class="text-blue-500 my-5 font-bold text-center">Если вы не совершали вредоносных действий в отношении l2high.top - свяжитесь с администрацией сайта</p>
            <p class="text-center text-blue-500">C ув. l2high.top</p>
        </div>
    </BreezeAuthenticatedLayout>

    <BreezeAuthenticatedLayout v-if="$page.props.auth.user.role === 'admin'">
        <template #header>
            Кабинет {{$page.props.auth.user.name}}
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="mx-auto w-10/12 md:w-4/12 text-center text-2xl bg-gray-800 text-white p-1 mb-5 border-2 border-purple-300 rounded-lg font-bold">Статистика l2high</h1>
            <section class="flex justify-evenly flex-wrap">
                <ProjectStatistic></ProjectStatistic>
                <BannerStatistic></BannerStatistic>
                <UserStatistic></UserStatistic>
            </section>

        </div>
    </BreezeAuthenticatedLayout>
</template>





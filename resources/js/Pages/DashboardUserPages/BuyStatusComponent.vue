<template>
    <Head title="l2high/Купить статус" />

    <AuthenticatedLayout>
        <template #header>
            Купить статус
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            <div>
            <nav class="flex justify-start sm:justify-center">
                <card-nav-link :href="route('status.top', selected_project.id)" :active="route().current('status.top',selected_project.id)">Top</card-nav-link>
                <card-nav-link :href="route('status.vip', selected_project.id)" :active="route().current('status.vip', selected_project.id)">Vip</card-nav-link>
                <card-nav-link :href="route('status.premium', selected_project.id)" :active="route().current('status.premium', selected_project.id)">Premium</card-nav-link>
            </nav>
                <section v-if="selected_project === null" class="flex flex-col items-center mt-5">
                    <h2 class="text-xl">Выберите проект для покупки статуса<span class="text-red-600">*</span></h2>
                    <Link :href="route('status')" class="px-4 py-2 text-xl text-white font-semibold bg-blue-500 my-3 rounded hover:bg-blue-600">Мои проекты</Link>
                </section>

                <section v-if="selected_project" class="flex flex-col items-center mt-5 w-1/1 lg:w-1/2 md:w-5/6 mx-auto">
                    <h2 class="text-blue-500 font-semibold">Покупка статуса для проекта <span class="text-red-500">{{selected_project.title}}</span></h2>
                    <ul class="mt-3 w-full">
                        <li :class="status_name" class="grid grid-cols-12 border-gray-500 rounded h-10 p-0.5">
                            <span class="grid font-bold col-span-1 rounded h-full w-full text-xs sm:text-lg flex items-center justify-center">
                                <img v-if="status_name === 'premium'" class="premium_icon" src="https://cdn-icons-png.flaticon.com/512/5642/5642665.png" alt="">
                                TOP
                            </span>
                            <p class="text-xs sm:text-sm font-bold col-span-3 xs:col-span-5 flex items-center justify-center">{{selected_project.title}}</p>
                            <p class="col-span-2 text-xs font-bold sm:text-sm flex items-center justify-center">{{selected_project.rates}}</p>
                            <p class="col-span-3 text-xs font-bold sm:text-sm xs:col-span-2 flex items-center justify-center">{{selected_project.chronicles}}</p>
                            <p class="col-span-3 text-xs font-bold sm:text-sm xs:col-span-2 flex items-center justify-center">{{selected_project.date_open}}</p>
                        </li>
                    </ul>
                </section>

                <slot></slot>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';
import CardNavLink from '@/Components/CardNavLink.vue'

export default {
    name: "BuyStatusComponent",
    components: {AuthenticatedLayout, CardNavLink, Head, Link},
    props: {status_name: String, selected_project: Object},
}
</script>

<style scoped>
    .top {
        border-bottom: 2px solid firebrick !important;
        background: linear-gradient(90deg, rgba(2,1,71,1) 0%, rgba(180,0,6,1) 62%);
        color: white;
        font-weight: bold;
    }

    .top span {
        background: firebrick;
        color: gold;
        min-width: 40px !important;
    }

    .vip {
        border-bottom: 2px solid gold !important;
        background: linear-gradient(90deg, rgba(0,6,71,0.4) 0%, rgba(235,193,41,0.6) 62%);
        color: darkslategray;
        font-weight: bold;
    }

    .vip span {
        background: gold;
        color: firebrick;
        min-width: 40px !important;
    }

    .premium {
        background-color: whitesmoke;
        border: 1px solid darkgray;
        color: dodgerblue;
        animation: flame 3s linear 1s infinite running;
        font-weight: bold;
    }

    .premium span {
        background-color: lightgray;
        min-width: 40px !important;
        height: 50px;
        max-height: 35px;
        align-self: end;
        position: relative;
    }

    .premium img {
        width: 30px;
        height: 35px;
        position: absolute;
        transform: rotate(-25deg);
        left: -8px;
        top: -23px;
    }
</style>

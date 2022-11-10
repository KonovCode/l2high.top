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
                    <ul class="my-2 w-full">
                        <li :class="status_name" class="grid grid-cols-12 border-gray-500 rounded h-10 p-0.5">
                            <span class="grid font-bold col-span-1 rounded h-full w-full text-xs sm:text-lg flex items-center justify-center">
                               <h6> VIP </h6>
                            </span>
                            <p class="text-xs sm:text-sm font-bold col-span-3 xs:col-span-5 flex items-center justify-center">{{selected_project.title}}</p>
                            <p class="col-span-2 text-xs font-bold sm:text-sm flex items-center justify-center">{{selected_project.rates}}</p>
                            <p class="col-span-3 text-xs font-bold sm:text-sm xs:col-span-2 flex items-center justify-center">{{selected_project.chronicles}}</p>
                            <p class="col-span-3 text-xs font-bold sm:text-sm xs:col-span-2 flex items-center justify-center">{{formatDate(selected_project.date_open)}}</p>
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

    setup() {
        function formatDate(date) {
            return date.split('-').reverse().join('.');
        }

        return {formatDate}
    }
}
</script>

<style scoped>

    .top {
    background: linear-gradient(90deg, rgba(2, 1, 71, 1) 0%, rgba(180, 0, 6, 1) 62%);
    border: 1px solid darkgray;
    color: white;
    font-weight: bold;
    min-height: 40px !important;
}

.top span {
    min-width: 40px !important;
    height: 50px;
    max-height: 35px;
    align-self: end;
}

.top h6 {
    color: gold
}

    .vip {
    color: rgb(200, 147, 1);
    background-color: antiquewhite;
    font-weight: bold;
    min-height: 40px !important;
}

.vip span {
    background: rgb(225, 191, 0);
    color: white;
    min-width: 40px !important;
}

    .premium {
        background-color: whitesmoke;
        border: 1px solid darkgray;
        color: dodgerblue;
        animation: flame 3s linear 1s infinite running;
        font-weight: bold;
        min-height: 40px !important;
    }

    .premium span {
        background-color: lightgray;
        min-width: 40px !important;
        height: 50px;
        max-height: 35px;
        align-self: end;
        position: relative;
    }

</style> 

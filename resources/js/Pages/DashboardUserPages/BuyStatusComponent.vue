<template>
    <Head title="l2high/Купить статус" />

    <AuthenticatedLayout>
        <template #header>
            Купить статус
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            <div>
            <nav class="flex justify-center">
                <card-nav-link :href="route('status.top')" :active="route().current('status.top')">Top</card-nav-link>
                <card-nav-link :href="route('status.vip')" :active="route().current('status.vip')">Vip</card-nav-link>
                <card-nav-link :href="route('status.premium')" :active="route().current('status.premium')">Premium</card-nav-link>
            </nav>

                <slot></slot>

            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
import CardNavLink from '@/Components/CardNavLink.vue'

export default {
    name: "BuyStatusComponent",
    components: {AuthenticatedLayout, CardNavLink, Head},
}
</script>

<style scoped>

</style>

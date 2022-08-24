<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout v-if="$page.props.auth.user.role === 'user'">
        <template #header>
            Главная
        </template>

        <div class="p-6 bg-white border-b border-gray-200">
            Главная страница
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





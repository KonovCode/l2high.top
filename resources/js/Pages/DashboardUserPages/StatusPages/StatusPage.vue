<template>

    <AuthenticatedLayout>

        <template #header>
            Купить статус
        </template>

        <div class="p-6 bg-white border-b border-gray-200">

        <section v-if="projects.data.length > 0">
            <h2 class="mt-3 mb-8 text-2xl font-semibold text-center">Выбор проекта</h2>
           <BuyStatusListItem
               v-for="project in projects.data"
               :key="project.id"
               :status="project.status"
               :title="project.title"
               :rates="project.rates"
               :chronicles="project.chronicles"
               :date_open="formatDate(project.date_open)"
               :id="project.id"
           >
           </BuyStatusListItem>
        </section>

            <section class="flex flex-col items-center" v-if="projects.data.length === 0">
                <h2 class="my-3 text-2xl font-semibold text-center">У вас пока нет не одного проекта</h2>
                <h3 class="my-5 text-xl font-semibold text-center">Что бы добавить Linage 2 проект нажите кнопку добавить</h3>
                <Link :href="route('project.create')" class="px-5 py-2 text-xl text-white font-semibold bg-blue-500 my-5 rounded hover:bg-blue-600">Добавить</Link>
            </section>

        </div>

    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BuyStatusListItem from "@/Components/BuyStatusListItem.vue";
import {Head, Link} from '@inertiajs/inertia-vue3'

export default
{
    name: "StatusPage",
    components: {AuthenticatedLayout, BuyStatusListItem, Head, Link},
    props: { projects: Object },

    setup() {

        function formatDate(date) {
            return date.split('-').reverse().join('.');
        }

        return {formatDate}

    }
}
</script>


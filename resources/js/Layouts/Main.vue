<template>

    <div id="main" class="flex flex-col">
        <slider-main-index-component>
            <slider-main-item-component></slider-main-item-component>
        </slider-main-index-component>
        <sort-panel-component></sort-panel-component>
        <div v-if="projects.all.length" class="flex flex-wrap">
            <section class="px-3 w-full md:w-6/12">
                <projects-container v-if="premium_projects_already.length" :premium="statusContainers.premium.state"
                    :status="statusContainers.premium.name">
                    <div v-if="premium_projects_already.length" class="flex items-center justify-center">
                        <h2 class="text-white text-center mt-2 text-green-400 font-bold mb-1">
                            {{ statusContainers.premiumAlready }}</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-yellow-500 ml-1 mt-1 animate-spin">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>

                    </div>
                    <project-card-item v-for="(project, key) in premium_projects_already" :key="key"
                        :status="project.status" :title="project.title" :rates="project.rates"
                        :premium="project.premium" :chronicles="project.chronicles"
                        :date_open="formatDate(project.date_open)" />
                    <div v-if="premium_projects_soon.length" class="flex items-center justify-center">
                        <h2 class="text-white text-center mt-2 text-orange-400 font-bold mb-1">
                            {{ statusContainers.premiumSoon }}</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-red-500 ml-1 mt-1 animate-bounce">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>

                    </div>
                    <project-card-item v-for="(project, key) in premium_projects_soon" :key="key" :status="project.status"
                        :title="project.title" :rates="project.rates" :chronicles="project.chronicles"
                        :premium="project.premium" :date_open="formatDate(project.date_open)" />
                </projects-container>

                <projects-container v-if="projects_previous_seven_days.length"
                    :status="statusContainers.previousSevenDays">
                    <project-card-item v-for="(project, key) in projects_previous_seven_days" :key="key"
                        :status="project.status" :premium="project.premium" :title="project.title"
                        :rates="project.rates" :chronicles="project.chronicles"
                        :date_open="formatDate(project.date_open)" />
                </projects-container>

                <projects-container v-if="projects_week_ago_and_more.length" :status="statusContainers.weekAgoAndMore">
                    <project-card-item v-for="(project, key) in projects_week_ago_and_more" :key="key"
                        :status="project.status" :title="project.title" :rates="project.rates"
                        :premium="project.premium" :chronicles="project.chronicles"
                        :date_open="formatDate(project.date_open)" />
                </projects-container>
            </section>
            <section class="px-3 w-full md:w-6/12">
                <projects-container v-if="projects_today_open.length" :status="statusContainers.today">
                    <project-card-item v-for="(project, key) in projects_today_open" :key="key" :status="project.status"
                        :title="project.title" :rates="project.rates" :chronicles="project.chronicles"
                        :date_open="formatDate(project.date_open)" />
                </projects-container>
                <projects-container v-if="projects_yesterday_open.length" :status="statusContainers.yesterday">
                    <project-card-item v-for="(project, key) in projects_yesterday_open" :key="key"
                        :status="project.status" :title="project.title" :rates="project.rates"
                        :premium="project.premium" :chronicles="project.chronicles"
                        :date_open="formatDate(project.date_open)" />
                </projects-container>
                <projects-container v-if="projects_tomorrow_open.length" :status="statusContainers.tomorrow">
                    <project-card-item v-for="(project, key) in projects_tomorrow_open" :key="key"
                        :premium="project.premium" :status="project.status" :title="project.title"
                        :rates="project.rates" :chronicles="project.chronicles"
                        :date_open="formatDate(project.date_open)" />
                </projects-container>

                <projects-container v-if="projects_next_seven_days.length" :status="statusContainers.nextSevenDays">
                    <project-card-item v-for="(project, key) in projects_next_seven_days" :key="key"
                        :status="project.status" :title="project.title" :rates="project.rates"
                        :premium="project.premium" :chronicles="project.chronicles"
                        :date_open="formatDate(project.date_open)" />
                </projects-container>

                <projects-container v-if="projects_week_leater_and_more.length"
                    :status="statusContainers.weekLeaterAndMore">
                    <project-card-item v-for="(project, key) in projects_week_leater_and_more" :key="key"
                        :premium="project.premium" :status="project.status" :title="project.title"
                        :rates="project.rates" :chronicles="project.chronicles"
                        :date_open="formatDate(project.date_open)" />
                </projects-container>
            </section>
        </div>
        <aside v-if="!projects.all.length">
            <h3 class="text-center font-bold text-xl mt-8">Активных серверов по данному запросу не найдено =(</h3>
        </aside>
    </div>
</template>

<script>
import SliderMainIndexComponent from "@/Components/SliderMainIndexComponent.vue";
import SliderMainItemComponent from "@/Components/SliderMainItemComponent.vue";
import SortPanelComponent from "@/Components/SortPanelComponent.vue";
import ProjectsContainer from "@/Components/ProjectsContainer.vue"
import ProjectCardItem from "@/Components/ProjectCardItem.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { computed, ref } from "vue";

export default {
    name: "Main",
    components: {
        SliderMainIndexComponent,
        SliderMainItemComponent,
        SortPanelComponent,
        ProjectsContainer,
        ProjectCardItem,
    },
    props: { projects: Object },
    data() {
        return {
            statusContainers: {
                premiumAlready: 'Уже открылись',
                premiumSoon: 'Скоро откроются',
                tomorrow: 'Завтра',
                premium: {name: '[ Топ ] сервера', state: 1},
                today: 'Сегодня',
                yesterday: 'Вчера',
                previousSevenDays: 'Предидущие 7 дней',
                nextSevenDays: 'Ближайшие 7 дней',
                weekLeaterAndMore: 'Через неделю и более',
                weekAgoAndMore: 'Неделю назад и более',
            }
        }
    },

    setup() {

        const date = new Date();

        const projects = ref({ all: usePage().props.value.projects.data });

        const dateFlags = ref({
            tomorrow_date: new Date(new Date().setDate(date.getDate() + 1)).setHours(0, 0, 0, 0),
            yesterday_date: new Date(new Date().setDate(date.getDate() - 1)).setHours(0, 0, 0, 0),
            today: new Date().setHours(0, 0, 0, 0),
            soon: Date.parse(date),
            already: Date.parse(date),
            weekLeaterAndMore: new Date(new Date().setDate(date.getDate() + 7)).setHours(0, 0, 0, 0),
            weekAgoAndMore: new Date(new Date().setDate(date.getDate() - 7)).setHours(0, 0, 0, 0),
        });

        const premium_projects_already = computed(() =>
            projects.value.all.filter(
                project => project.premium === 1 && new Date(project.date_open).setHours(20) < Date.parse(date)
            ));

        const premium_projects_soon = computed(() =>
            projects.value.all.filter(
                project => project.premium === 1 && dateFlags.value.soon < new Date(project.date_open).setHours(20, 0, 0, 0)
            ));

        const projects_tomorrow_open = computed(() =>
            projects.value.all.filter(
                project => new Date(project.date_open).setHours(0, 0, 0, 0) == dateFlags.value.tomorrow_date
            ));

        const projects_yesterday_open = computed(() =>
            projects.value.all.filter(
                project => new Date(project.date_open).setHours(0, 0, 0, 0) === dateFlags.value.yesterday_date
            ));

        const projects_today_open = computed(() =>
            projects.value.all.filter(
                project => new Date(project.date_open).setHours(0, 0, 0, 0) === dateFlags.value.today
            ));

        const projects_week_leater_and_more = computed(() =>
            projects.value.all.filter(
                project => new Date(project.date_open).setHours(0, 0, 0, 0) >= dateFlags.value.weekLeaterAndMore
            ));

        const projects_week_ago_and_more = computed(() =>
            projects.value.all.filter(
                project => new Date(project.date_open).setHours(0, 0, 0, 0) < dateFlags.value.weekAgoAndMore
            ));

        const projects_previous_seven_days = computed(() =>
            projects.value.all.filter(
                project =>
                    new Date(project.date_open).setHours(0, 0, 0, 0) >= dateFlags.value.weekAgoAndMore &&
                    new Date(project.date_open).setHours(0, 0, 0, 0) < new Date().setHours(0, 0, 0, 0)
            ));

        const projects_next_seven_days = computed(() =>
            projects.value.all.filter(
                project =>
                    Date.parse(project.date_open) > new Date().setHours(23, 59, 59, 0) &&
                    Date.parse(project.date_open) <= dateFlags.value.weekLeaterAndMore
            ));

        function formatDate(date) {
            switch(new Date(date).setHours(0,0,0,0)) {
                case(dateFlags.value.today) : 
                    return 'Cегодня'
                case(dateFlags.value.tomorrow_date) :
                    return 'Завтра'
                case(dateFlags.value.yesterday_date) :
                    return 'Вчера'
                default :
                    return date.split('-').reverse().join('.');
            }
        }

        return {
            projects,
            premium_projects_already,
            premium_projects_soon,
            projects_tomorrow_open,
            projects_yesterday_open,
            projects_today_open,
            projects_week_leater_and_more,
            projects_week_ago_and_more,
            projects_previous_seven_days,
            projects_next_seven_days,
            formatDate
        }

    }
}
</script>


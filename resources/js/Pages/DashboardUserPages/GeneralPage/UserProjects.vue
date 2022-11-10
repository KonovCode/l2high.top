<template>

  <div v-for="(project, key) in $page.props.projects.data" :key="key" class="shadow rounded-lg py-3 px-5 bg-white mt-2">
    <div class="flex flex-row justify-between items-center">
      <div>
        <h6 class="text-2xl">{{project.title}}</h6>
        <h4 class="text-black text-4xl font-bold text-left">x{{project.rates}}</h4>
      </div>
      <div class="flex flex-col justify-between h-full">

        <p :class="project.status" class="border-gray-500 rounded h-10 p-0.5 cursor-pointer">
          <span class="rounded h-full text-xs sm:text-lg flex items-center justify-center">
            {{project.status === 'default' ? 'L2' : project.status.toUpperCase()}}
          </span>
        </p>

      </div>
    </div>
    <div class="text-left flex flex-row justify-between items-center">
      <p>{{formatDate(project.date_open)}}</p>
      <section class="flex flex-col">
        <Link preserve-scroll :href="route('status.top', project.id)"
          class="h-6 cursor-pointer text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-3 text-center mr-2 mb-2 ">
        Купить
        статус</Link>
        <Link preserve-scroll v-if="project.state_project === 0" :href="route('project.delete', project.id)"
          class="h-6 cursor-pointer text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-3 text-center mr-2 mb-2">
        Удалить</Link>
      </section>
    </div>
    <blockquote class="text-xs text-orange-600" v-if="!project.state_public && !project.state_project">Ваш проект будет доступен на главной странице после модерации </blockquote>
    <section class="flex justify-between">
      <p v-if="project.state_project === 1" class="text-red-500">Заявка на удаление принята</p>
      <Link preserve-scroll v-if="project.state_project === 1" :href="route('project.un.delete', project.id)" type="button" class="h-6 cursor-pointer text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-3 text-center mr-2 mb-2">Отменить</Link>
  </section>
  </div>

  <aside v-if="$page.props.projects.data.length === 0" class="flex flex-col items-center">
   <h3 class="text-orange-500">У вас пока нет не одного проекта</h3>
    <Link preserve-scroll :href="route('project.create')" as="button" class="bg-blue-500 text-white font-bold px-1.5 py-1 rounded mt-3 hover:bg-blue-700">Добавить проект</Link>
  </aside>

</template>


<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  name: 'UserProject',
  components: { Link },

  setup() {

    function formatDate(date) {
            return date.split('-').reverse().join('.');
        }

        return {formatDate}

  }
}

</script>


<style>

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

    .premium span {
        background-color: lightgray;
        min-width: 40px !important;
        height: 50px;
        max-height: 35px;
        align-self: end;
        position: relative;
    }

    .default span{
      font-weight: 700;
      font-size: 25;
      background-color: rgb(206, 204, 204);
      padding-left: 10px;
      padding-right: 10px;
    }

</style>
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
            <img v-if="project.premium === 1" src="https://cdn-icons-png.flaticon.com/512/5642/5642665.png" alt="">
            {{project.status === 'default' ? 'L2' : project.status.toUpperCase()}}
          </span>
        </p>

      </div>
    </div>
    <div class="text-left flex flex-row justify-between items-center">
      <p>{{project.date_open}}</p>
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
    <section class="flex justify-between">
      <p v-if="project.state_project === 1" class="text-red-500">Заявка на удаление принята</p>
      <Link preserve-scroll v-if="project.state_project === 1" :href="route('project.un.delete', project.id)" type="button" class="h-6 cursor-pointer text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-3 text-center mr-2 mb-2">Отменить</Link>
  </section>
  </div>

</template>


<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  name: 'UserProject',
  components: { Link }
}

</script>


<style>
.top {
  border-bottom: 2px solid firebrick !important;
  background: linear-gradient(90deg, rgba(2, 1, 71, 1) 0%, rgba(180, 0, 6, 1) 62%);
  color: white;
  font-weight: bold;
  position: relative;
}

.top span {
  background: firebrick;
  color: gold;
  min-width: 40px !important;
}

.top img {
  width: 30px;
  height: 35px;
  position: absolute;
  transform: rotate(-25deg);
  left: -8px;
  top: -23px;
}

.vip {
  border-bottom: 2px solid gold !important;
  background: linear-gradient(90deg, rgba(0, 6, 71, 0.4) 0%, rgba(235, 193, 41, 0.6) 62%);
  color: darkslategray;
  font-weight: bold;
  position: relative;
}

.vip span {
  background: gold;
  color: firebrick;
  min-width: 40px !important;
}

.premium,
.default {
  background-color: whitesmoke;
  border: 1px solid darkgray;
  color: dodgerblue;
  animation: flame 3s linear 1s infinite running;
  font-weight: bold;
}

.premium,
.default span {
  background-color: lightgray;
  min-width: 40px !important;
  height: 50px;
  max-height: 35px;
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

.default img {
  width: 30px;
  height: 35px;
  position: absolute;
  transform: rotate(-25deg);
  left: -8px;
  top: -23px;
}

.vip img {
  width: 30px;
  height: 35px;
  position: absolute;
  transform: rotate(-25deg);
  left: -8px;
  top: -23px;
}
</style>
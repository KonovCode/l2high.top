<template>

    <div v-if="about.state" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity ease-out duration-300"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                <div
                    class="relative transform overflow-hidden rounded-lg text-left shadow-xl transition-all sm:my-8 sm:w-full lg:w-9/12">

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <button @click="hideAbout()" class="absolute top-2 right-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" class="w-10 h-10 text-red-500 hover:scale-125">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <h2 class="text-center text-xl font-bold mt-3">l2high.top</h2>
                        <section class="flex justify-evenly flex-wrap">
                            <hr>
                            <div class="my-4 w-full md:w-6/12 bg-orange-100 rounded-lg px-4 py-3" style="min-width: 300px">
                                <h2 class="font-bold text-center my-1">Общая информация</h2>
                                <p class="tracking-wider text-center">
                                    Проект был создан в поддержу легендарной MMORPG lineage 2
                                    (текс про то что можно легко и просто найти себе хорошый сервер для игры
                                    какая линейка крутая игра и т.д )
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque
                                    temporibus corporis
                                    nesciunt consequatur recusandae quae deleniti deserunt cupiditate enim impedit
                                    dolores quam,
                                    amet quia numquam debitis? Rem optio nihil eos, perferendis aperiam quaerat
                                    repudiandae
                                    ullam iure ipsum necessitatibus laboriosam maxime nam modi commodi ea enim beatae
                                    temporibus
                                    consectetur praesentium numquam.
                                </p>
                            </div>
                            <div class="w-full md:w-4/12 my-4 bg-green-100 rounded-lg px-4 py-3" style="min-width: 300px">
                                <h2 class="font-bold text-center my-1">Преимущества</h2>
                                <p class="tracking-wider text-center">
                                    Текст про то как легко и просто можно добавить проект на сайт всего в пару кликов
                                    как бесплатно так и платно
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem nemo deleniti ad
                                    facilis sunt
                                    ea odio, temporibus laboriosam, id asperiores ut non inventore adipisci dolores?
                                    Dolorem
                                    obcaecati facilis voluptatum quo.
                                </p>
                            </div>
                            <hr>
                        </section>

                        <section class="w-10/12 mx-auto my-3 bg-blue-200 px-3 py-3 text-center rounded-xl italic">
                            <h2 class="text-center font-bold my-1">Сотруднечество</h2>
                            <p>
                                Текст про то что мы работаем не ради денег и что готовы помочь в рекламе бесплатно
                                начинающим серверам
                                так что админы пишите нам по любым вопросам по для связи с нами перейдите в раздел
                                контакты
                            </p>
                        </section>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" @click="hideAbout()"
                            class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    name: 'About',

    setup() {

        const about = ref({state: false});

        function showAbout() {
           about.value.state = true;
           console.log('true');
        }

        function hideAbout() {
            about.value.state = false;
            console.log('false');
        }

        return { showAbout, hideAbout, about }

    }
}

</script>
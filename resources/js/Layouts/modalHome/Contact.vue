<template>

<div v-if="contact.state" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity ease-out duration-300"></div>

<div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

        <div
            class="relative transform overflow-hidden rounded-lg text-left shadow-xl transition-all sm:my-8 w-full md:w-7/12">

            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <button @click="hideContact()" class="absolute top-2 right-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="w-10 h-10 text-red-500 hover:scale-125">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h2 class="text-center text-xl font-bold mt-3">l2high.top</h2>
                <div class="flex justify-between flex-wrap">
                <section class="flex flex-col w-full lg:w-5/12" style="min-width: 300px">
                        <h2 class="font-bold text-center text-xl mb-3">Наши Контакты</h2>
                    <ul class="flex xs:text-xs sm:text-sm md:text-md lg:text-xl justify-between mt-1">
                        <li class="font-bold">Skype:</li>
                        <li>l2high_skype</li>
                    </ul>
                    <ul class="flex xs:text-xs sm:text-sm md:text-md lg:text-xl justify-between mt-1">
                        <li class="font-bold">Telegram:</li>
                        <li>l2high_tel</li>
                    </ul>
                    <ul class="flex xs:text-xs sm:text-sm md:text-md lg:text-xl justify-between mt-1">
                        <li class="font-bold">Gmail:</li>
                        <li>l2high.top@gmail.com</li>
                    </ul>
                
                </section>
                <blockquote class="w-full lg:w-5/12 bg-green-100 m-auto p-3 rounded-xl" style="min-width: 300px">
                    Пишите нам по любым вопросам и предложениям, мы всегда идем на встречу нашим пользователям!
                </blockquote>
                </div> 
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="button" @click="hideContact()"
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
        name: 'Contact',

        setup() {

            const contact = ref({state: false});

            function showContact() {
                contact.value.state = true;
            }

            function hideContact() {
                contact.value.state = false;
            }

            return {contact, showContact, hideContact};

        }  
    }

</script>
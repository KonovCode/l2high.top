<template>

<div class="flex justify-between bg-gray-800 align-center px-5 py-3 rounded-t-md">
                            <h2 class="text-xl font-bold text-white">Кошелек</h2>
                            <h5 class="text-orange-500 font-bold m-0 p-0">l2high.top</h5>
                        </div>
                        <div class="flex justify-evenly bg-blue-100 border-t-2 border-b-2 py-3 px-2 border-yellow-500">
                            <h3 class="text-xl font-bold">Ваш баланс:</h3>
                            <p class="text-2xl">$ {{$page.props.auth.user.balance}} </p>
                        </div>
                        <div class="bg-gray-800 py-3 px-2 rounded-b-md">
                            <p class="text-white text-center border-b my-2 pb-3">
                                Покупайте <span class="text-yellow-500 font-bold">[VIP]</span> <span
                                    class="text-red-500 font-bold">[TOP]</span> и <span
                                    class="text-blue-400 font-bold">[Premium]</span> Status
                                а так же баннеры на главную страницу сайта!
                            </p>
                                <h5 class="text-lg text-white my-3 font-bold text-center">Другие реквизиты для оплаты</h5>
                            <div class="flex justify-between text-white w-3/5 mx-auto">
                                <p>Web-money:</p>
                                <p>0345393427347234</p>
                            </div>
                            <div class="flex justify-between text-white w-3/5 mx-auto">
                                <p>Bank card:</p>
                                <p>4149483748934895</p>
                            </div>
                            <p class="text-white m-auto border w-4/5 text-sm rounded p-2 my-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat ex accusantium quae
                                sed, voluptates quia velit. Soluta hic mollitia laborum ea magnam quae rerum
                                quo.</p>
                                <button type="button" class="w-full text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-bold rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Пополнить баланс</button>

                            </div>

</template>

<script>

    export default {
        name: 'BalanceInfoComponent',
    }

</script>
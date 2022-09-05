<template>
    <BuyStatusComponent :status_name="'vip'">
        <div class="flex flex-col sm:flex-col lg:flex-row xl:flex-row md:flex-row justify-center items center my-10">
            <div class="py-12 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-blue-300 z-30">
                <h1 class="text-yellow-600 font-semibold text-xl ">Vip статус</h1>
                <div class="text-center py-4 px-10">
                    <h1 class="text-gray-700 text-4xl font-black">$2.00</h1>
                    <p class="text-gray-700 font-bold mt-2">10 дней</p>

                </div>
                <div class="h-px bg-gray-200"></div>
                <div class="text-center mt-3">
                    <p class="text-sm text-gray-400">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <button class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800">Buy Now</button>
            </div>
            <div class="py-12 mx-6 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-purple-500 transform scale-1 sm:scale-1 md:scale-105 lg:scale-105 xl:scale-105 z-40  shadow-none sm:shadow-none md:shadow-xl lg:shadow-xl xl:shadow-xl">
                <h1 class="text-yellow-500 font-bold text-2xl ">Vip статус</h1>
                <div class="text-center py-4 px-10">
                    <h1 class="text-white text-4xl font-black">$12.00</h1>
                    <p class="text-orange-400 text-2xl font-bold  mt-2">90 дней</p>

                </div>
                <div class="h-px bg-white"></div>
                <div class="text-center mt-3">
                    <p class="text-sm text-white text-opacity-80">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <button class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-purple-400 hover:shadow-xl duration-200 hover:bg-purple-800">Buy Now</button>
            </div>
            <div class="py-12 sm:py-12 md:py-6 lg:py-6 xl:py-6 px-8 w-full md:max-w-min sm:w-full bg-green-300 z-30">
                <h1 class="text-yellow-600 font-semibold text-xl ">Vip статус</h1>
                <div class="text-center py-4 px-10">
                    <h1 class="text-gray-700 text-4xl font-black">$5.00</h1>
                    <p class="text-blue-500 font-bold text-xl mt-2">30 Дней</p>

                </div>
                <div class="h-px bg-gray-200"></div>
                <div class="text-center mt-3">
                    <p class="text-sm text-gray-400">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <button class="w-full mt-6 mb-3 py-2 text-white font-semibold bg-gray-700 hover:shadow-xl duration-200 hover:bg-gray-800">Buy Now</button>
            </div>
        </div>
    </BuyStatusComponent>
</template>

<script>
import BuyStatusComponent from "@/Pages/DashboardUserPages/BuyStatusComponent.vue";
export default {
    name: "VipStatus",
    components: {BuyStatusComponent}
}
</script>


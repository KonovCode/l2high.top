<template>
    <header :onresize="windowWidth">
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="#" class="flex items-center">
                    <header-logo-component>L2high.top</header-logo-component>
                </a>
                <div class="flex items-center lg:order-2">
                    <header-button-component :link="route('register')">Регистрация</header-button-component>
                    <header-button-component :link="route('login')">Вход</header-button-component>
                    <button v-on:click="mobileNav" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                                <header-link-component>О нас</header-link-component>
                        </li>
                        <li>
                                <header-link-component>Реклама</header-link-component>
                        </li>
                        <li>
                                <header-link-component>Контакты</header-link-component>
                        </li>
                    </ul>
                </div>
            </div>
            <div v-bind:class="navToggle ? 'hidden -translate-y-20 z-10 lg:hidden' : 'translate-y-0 z-10 lg:hidden'">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <header-link-component>О нас</header-link-component>
                    </li>
                    <li>
                        <header-link-component>Реклама</header-link-component>
                    </li>
                    <li>
                        <header-link-component>Контакты</header-link-component>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
import HeaderLinkComponent from "@/Components/HeaderLinkComponent.vue";
import HeaderLogoComponent from "@/Components/HeaderLogoComponent.vue";
import HeaderButtonComponent from "@/Components/HeaderButtonComponent.vue";
export default {
    name: "Header",
    components: {HeaderLinkComponent, HeaderLogoComponent, HeaderButtonComponent},
    data() {
        return {
            navToggle: false,
            width: '',
        }
    },
    methods: {
        mobileNav() {
            this.navToggle = !this.navToggle;
        },
        windowWidth() {
            this.width = document.body.innerWidth;
            console.log('ky');
           return  console.log(this.width);
        }

    }
}
</script>

<style scoped>
.header {
    min-height: 60px;
}
</style>

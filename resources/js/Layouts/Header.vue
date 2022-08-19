<template>
    <div class="header container-fluid bg-gray-900 flex justify-between h-14 px-6">

        <header-logo-component></header-logo-component>

        <section class="w-1/3 flex justify-between items-center">

            <nav class="mx-auto">
                <header-link-component>О нас</header-link-component>
                <header-link-component>Контакты</header-link-component>
                <header-link-component>Реклама</header-link-component>
            </nav>

            <header-button-component>Личный кабинет</header-button-component>

        </section>

    </div>
</template>

<script>
import HeaderLinkComponent from "@/Components/HeaderLinkComponent.vue";
import HeaderLogoComponent from "@/Components/HeaderLogoComponent.vue";
import HeaderButtonComponent from "@/Components/HeaderButtonComponent.vue";
export default {
    name: "Header",
    components: {HeaderLinkComponent, HeaderLogoComponent, HeaderButtonComponent}

}
</script>

<style scoped>
.header {
    min-height: 60px;
}
</style>

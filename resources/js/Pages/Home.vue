<template>

    <div class="container-fluid p-0 d-flex flex-column wrapper">

    <Header></Header>

        <Main></Main>

    <!-- <Footer></Footer> -->
    
    </div>
</template>

<script>
import Header from "@/Layouts/Header.vue";
import Main from "@/Layouts/Main.vue";
import Footer from "@/Layouts/Footer.vue";

export default {
    name: "Home",
    components: {
        Header,
        Main,
        Footer,
    }
}
</script>

<style scoped>

.wrapper {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

</style>

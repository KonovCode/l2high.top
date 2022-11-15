<template>


    <div @click="active(slide.id)" v-for="(slide, key) in banners.all" :key="key"  :class="activeSlide.id === slide.id ? 'slide overflow-hidden active' : 'slide overflow-hidden'">
        <img class="slide_img" :src="slide.reserved ? slide.path_img : 'http://127.0.0.1:8000/storage/banners/1.png'" alt="">
        <div class=" project_name absolute top-0 flex items-start justify-center md:-left-0 md:text-lg" style="width: 100%; height:100%">
            <h5 :class="slide.reserved ? '' : 'rotate-0 lg:text-xl'" v-text="slide.reserved ? slide.name_project.toUpperCase() : 'l2tops.fun'" class="text-red-500 my-auto font-bold mx-auto rotate-90 whitespace-nowrap"/>
        </div>
        <a class="slide_href bg-blue-500 px-2 py-0.5 rounded hover:bg-blue-600" target="_blank" :href="slide.reserved ? slide.project_url : route('register')" v-text="slide.reserved ? 'Перейти на сайт' : 'Регистариция'"/>
    </div>

</template>
<script>
import { usePage } from "@inertiajs/inertia-vue3";
import { ref } from 'vue';
export default {

    name: "SliderMainItemComponent",
    
    setup() {

        const banners = ref({all: usePage().props.value.banners});

        const activeSlide = ref({id: 1});

        const delay = ref({time: 3000, pressed: false});

        let timer;

        startTimer();

        function active(slide) {
            activeSlide.value.id = slide;
            delay.value.time = 5000;
            clearTimeout(timer);
            startTimer();
        }

        function moveSlide() {
            startTimer();
            if(activeSlide.value.id < banners.value.all.length) {
                activeSlide.value.id++;
            } else {
                activeSlide.value.id = 1;
            }
        }

        function startTimer() {
            timer = setTimeout(moveSlide, delay.value.time);
            delay.value.time = 3000;
        }

        return { banners, activeSlide, active };
    }
}
</script>

<style scoped>
.slide {
    flex: 1;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    margin: 0 5px;
    border-radius: 1rem;
    position: relative;
    transition: all 500ms ease-in-out;
    cursor: pointer;
    max-width: 120px;
    min-width: 40px;
    background-color: rgb(31 41 55);
}

.slide .slide_href {
    position: absolute;
    bottom: 20px;
    left: 20px;
    opacity: 0;
    text-decoration: none;
    font-size: 20px;
    color: white;
    font-weight: 600;
}

.project_name {
    opacity: 1;
}

.slide.active .project_name {
    opacity: 0 !important;
    transition: opacity 0.3s ease-in 0.1s;
}

.slide.active {
    flex: 10;
    max-width: 750px;
}

.slide_img {
    width: 100%;
    height: 100%;
    opacity: 0 !important;
}

.slide.active .slide_href {
    opacity: 1 !important;
    transition: opacity 0.3s ease-in 0.4s;
}

.slide.active .slide_img {
    opacity: 1 !important;
    transition: opacity 0.2s ease-in 0.3s;
}
</style>

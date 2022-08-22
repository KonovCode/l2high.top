<template>


    <div v-on:click="showSlide(key)" v-for="(slide, key) in slidesState" :key="key"  :class="slide ? 'slide overflow-hidden active' : 'slide overflow-hidden'" style="background-image: url('#')">
        <div class="pre_slide">
            <h5 class="pre_link"></h5>
        </div>
        <a class="slide_href" href="#" v-on:click="startSlider">Перейти на сайт</a>
    </div>


<!--    <div class="slide border border-2 overflow-hidden hidden">-->
<!--        <h5 class="prev_img_slide">L2_HIGH.com</h5>-->
<!--        <div class="hide_content h-100 text-center">-->
<!--            <h3 class="text-2xl text-danger p-5">L2_HIGH</h3>-->
<!--            <p class="text-warning">Зарегистрируйся, войди в свой личный кабинет, и розмести баннер своего проэкта!</p>-->
<!--            <p class="text-white">Больше просмотров, больше переходов, больше <span class="text-success">online</span>!</p>-->
<!--            <div class="d-flex m-auto w-50 justify-content-between">-->
<!--                <a href="#">Зарегистрироватся</a>-->
<!--                <a href="#">Войти</a>-->
<!--            </div>-->
<!--        </div>-->

<!--    </div>-->

</template>

<script>
export default {
    name: "SliderMainItemComponent",
    data() {
        return {
            slidesState: {
                One: true,
                Two: false,
                Three: false,
                Four: false,
                Five: false,
                Six: false,
                Seven: false,
            },
            counter: 0,
            timer: null,
            interval: 2800,
        }
    },
    methods: {
        /* При клике по слайду */
        showSlide(key) {
            clearTimeout(this.timer); // сбрасываем таймер
            this.hideSlide(); // сбрасываем все активные слайды
            this.interval = 5500; // увеличиваю время перезарядки таймера
            this.startTimer(); // запуская таймер с новым интервалом
            this.slidesState[key] = true;
        },

        hideSlide() { // зброс всех active слайдов
            let slides = this.slidesState;
            for(let slideKey in slides) {
                slides[slideKey] = false;
            }
        },
        /* Запуск слайдера */
        startSlider() {
            const slideKeys = Object.keys(this.slidesState); // получаем ключи всех слайдов
            this.counter < (slideKeys.length - 1) ? this.counter++ : this.counter = 0; // проверяем что б прокрутов было меньше чем слайдов
            this.hideSlide();
            this.slidesState[slideKeys[this.counter]] = true;
            this.startTimer();
        },
        startTimer() {
            this.timer = setTimeout(this.startSlider, this.interval);
            this.interval = 2800;
        }
    },
    mounted() {
        setTimeout(() =>{
            this.startSlider()
        }, 2000)
    },

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
    min-width: 50px;
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

.slide.active {
    flex: 10;
    max-width: 750px;
}

.slide.active .slide_href {
    opacity: 1;
    transition: opacity 0.3s ease-in 0.4s;
}
</style>

<template>

    <ul class="my-2 w-full px-2">
        <li :class="status" class="grid grid-cols-12 border-gray-500 rounded h-10 p-0.5 relative">
            <span
                class="grid font-bold col-span-1 rounded h-full w-full text-xs sm:text-lg flex items-center justify-center">
                <h6 v-if="status !== 'default'" v-text="status === 'top' ? 'VIP' : status.toUpperCase()"></h6>
                <h6 v-if="status === 'default'">L2</h6>
            </span>
            <p class="text-xs sm:text-sm font-bold col-span-3 xs:col-span-5 flex items-center justify-center">{{ title.toUpperCase() }}
            </p>
            <p class="col-span-2 text-xs font-bold sm:text-sm flex items-center justify-center">x{{ rates }}</p>
            <p class="col-span-3 text-xs font-bold sm:text-sm xs:col-span-2 flex items-center justify-center">
                {{ chronicles }}</p>
            <p :class="'text-'+dayOpenFormat(date_open)" class="col-span-3 text-xs font-bold sm:text-sm xs:col-span-2 flex items-center justify-center">
                {{ date_open }}</p>
            
        </li>
    </ul>

</template>


<script>

export default {
    name: 'ProjectCardItem',

    props: { status: String, premium: Number, title: String, rates: String, chronicles: String, date_open: String },

    methods: {
        dayOpenFormat(data) {
            console.log(data);
            switch(data) {
                case('Cегодня') :
                return 'white animate-bounce bg-green-500 h-6 w-16 rounded mx-auto mt-2'
                break; 
                case('Завтра') :
                return 'blue-400'
                break;
                case('Вчера') : 
                return 'orange-400'
                break; 
                default :
                return '';
            }
        }
    }
}

</script>


<style scoped>
.top {
    background: linear-gradient(90deg, rgba(2, 1, 71, 1) 0%, rgba(180, 0, 6, 1) 62%);
    border: 1px solid darkgray;
    color: white;
    font-weight: bold;
    min-height: 40px !important;
}

.top span {
    min-width: 40px !important;
    height: 50px;
    max-height: 35px;
    align-self: end;
}

.top h6 {
    color: gold
}

.vip {
    color: rgb(200, 147, 1);
    background-color: antiquewhite;
    font-weight: bold;
    min-height: 40px !important;
}

.vip span {
    background: rgb(225, 191, 0);
    color: white;
    min-width: 40px !important;
}

.premium svg {
    position: absolute;
    right: 10px;
    top: 5px;
    color: gold;
}

.default {
    background-color: whitesmoke;
    color: grey;
}

.default span {
    border: 1px solid rgb(211, 202, 202);
    min-width: 40px !important;
    height: 50px;
    max-height: 35px;
    align-self: end;
}
</style>
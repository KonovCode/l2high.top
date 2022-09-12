<template>

    <Link :href="route('status.top', {id})" class="grid grid-cols-12 border-gray-500 rounded border py-2 hover:bg-green-300 my-1.5">
        <span class="grid col-span-1 text-center">{{status}}</span>
        <h2 class="font-bold col-span-5 text-center">{{title}}</h2>
        <p class="col-span-2">{{rates}}</p>
        <p class="col-span-2">{{chronicles}}</p>
        <p class="col-span-2">{{date_open}}</p>
    </Link>

</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "BuyStatusListItem",
    components: {Link},
    props: {
        status: String,
        title: String,
        rates: String,
        chronicles: String,
        date_open: String,
        id: Number,
    }
}
</script>

<style scoped>

</style>

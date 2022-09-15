<template>

    <Link :href="route('status.top', {id})" class="grid grid-cols-12 border-gray-500 rounded border py-5 hover:bg-green-300 my-2">
        <span class="grid col-span-1 text-center text-xs md:text-xl">{{status}}</span>
        <h2 class="font-bold col-span-4 text-center text-blue-600 text-sm md:text-xl">{{title}}</h2>
        <p class="col-span-2 text-xs md:text-lg">{{rates}}</p>
        <p class="col-span-3 text-xs md:text-lg">{{chronicles}}</p>
        <p class="col-span-2 text-xs md:text-lg">{{date_open}}</p>
    </Link>

</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "BuyStatusListItem",
    components: {Link},
    props: ['status', 'title', 'rates', 'chronicles', 'date_open', 'id'],
}
</script>


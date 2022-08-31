<template>
    <div
        :class="state"
        class="bg-blue-100 px-5 py-3 top-3 absolute right-3 ">
        <h2 class="text-green-300 text-center">
            {{state}}
            <slot></slot>
        </h2>
    </div>
</template>

<script>


export default {
    name: "ModalMessage",
    props: {
        state: {
            type: String,
            default: 'modal',
        },
    }
}
</script>

<style scoped>

.modal {
    transform: translateX(1000px);
    width: 40%;
    animation-duration: 4.5s;
    animation-delay: 150ms;
    animation-iteration-count: 1;

}

.action {
    animation-name: show;
}

@keyframes show {
    to {
        transform: translateX(-25%);

    }

    30% {
        transform: translateX(-40%);
        opacity: 1;

    }

    80% {
        transform: translateX(-40%);
        opacity: 1;

    }

    90% {
        opacity: 0.3;

    }

    to {
        opacity: 0;
        transform: translateX(1000px);
    }
}

</style>

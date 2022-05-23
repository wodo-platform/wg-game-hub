<script setup>
import { reactive } from 'vue';

let props = defineProps({
    type: {
        type: String,
        required: true,
        validator(value) {
            return ['purple', 'whiteBorderPurple', 'red', 'gray'].includes(
                value
            );
        },
    },
});
let outerDivClasses = reactive({
    purple: 'border-wgh-purple-3 bg-wgh-purple-3',
    red: 'border-wgh-red-3 bg-wgh-red-3',
    gray: 'border-wgh-gray-3 bg-wgh-gray-3',
    whiteBorderPurple: 'border-white bg-white',
});
let innerDivClasses = reactive({
    purple: 'border-wgh-purple-3 bg-wgh-purple-2 hover:bg-wgh-purple-1 active:border-wgh-purple-4 active:bg-wgh-purple-3 text-white',
    red: 'border-wgh-red-3 bg-wgh-red-2 hover:bg-wgh-red-1 active:border-wgh-red-4 active:bg-wgh-red-3 text-white',
    gray: 'border-wgh-gray-3 bg-white hover:bg-wgh-gray-0.5 active:border-wgh-gray-4 active:bg-wgh-gray-0.5 text-wgh-gray-6',
    whiteBorderPurple: 'border-white bg-wgh-purple-2 text-white',
});
</script>

<template>
    <div
        class="rounded-lg border-b-6 transition-all duration-100 active:mt-1.5 active:border-b-0"
        :class="outerDivClasses[props.type]"
    >
        <div
            class="flex flex-row space-x-2.5 rounded-lg border-3 px-4 py-2 text-center font-grota text-white outline-none transition-all duration-100"
            :class="innerDivClasses[props.type]"
        >
            <slot />
        </div>
    </div>
</template>

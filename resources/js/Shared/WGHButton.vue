<script setup>
import { defineProps, reactive } from 'vue';

import { Link } from '@inertiajs/inertia-vue3';

let classesForType = reactive({
    purple: 'border-wgh-purple-3 bg-wgh-purple-2 hover:bg-wgh-purple-1 active:border-wgh-purple-4 active:bg-wgh-purple-3 text-white',
    red: 'border-wgh-red-3 bg-wgh-red-2 hover:bg-wgh-red-1 active:border-wgh-red-4 active:bg-wgh-red-3 text-white',
    gray: 'border-wgh-gray-3 bg-white hover:bg-wgh-gray-0.5 active:border-wgh-gray-5 active:bg-wgh-gray-1 text-wgh-gray-6',
});

let props = defineProps({
    type: {
        type: String,
        required: true,
        validator(value) {
            return ['purple', 'red', 'gray'].includes(value);
        },
    },
});
</script>
<template>
    <Link
        class="flex flex-row space-x-2.5 rounded-2xl border-t-4 border-r-4 border-l-4 border-b-10 px-4 py-2 text-center font-grota transition-all duration-150 active:border-b-4"
        :class="classesForType[props.type]"
    >
        <slot />
    </Link>
</template>

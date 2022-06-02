<script setup>
import { onBeforeUnmount, onMounted, defineProps } from 'vue';

let props = defineProps({
    user: Object,
});
onMounted(() => {
    if (props.user) {
        window.echo.private(`user.${props.user.id}`);
    }
});

onBeforeUnmount(() => {
    if (props.user) {
        window.echo.leave(`user.${props.user.id}`);
    }
});
</script>
<template>
    <slot />
</template>

<script setup>
let props = defineProps({
    config: Object,
});
</script>
<template>
    <div
        id="wrapper"
        class="flex min-h-screen w-full flex-col bg-wgh-purple-2 bg-[length:20%_25%]"
        :style="{
            backgroundImage: `url(${props.config.game_lobby_pattern})`,
            backgroundRepeat: `repeat`,
            backgroundPosition: `center`,
            backgroundOrigin: `content-box`,
        }"
    >
        <slot />
    </div>
</template>

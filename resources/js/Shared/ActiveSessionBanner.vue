<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';
import BorderedContainer from '@/Shared/BorderedContainer';
import { Link } from '@inertiajs/inertia-vue3';

let activeSession = computed(() => {
    return usePage()?.props?.value?.user?.current_lobby_session;
});
</script>
<template>
    <BorderedContainer
        v-if="activeSession"
        class="mb-8 flex flex-col space-y-6 border-wgh-red-3 bg-wgh-red-2 p-6 md:flex-row md:space-x-6 md:space-y-0"
    >
        <p class="font-grota text-2xl font-extrabold text-white">
            You have an active session for "{{ activeSession.name }}",
            <Link :href="`/game-lobbies/${activeSession.id}`">
                <span class="underline"> Click here </span></Link
            >
            to go back to lobby
        </p>
    </BorderedContainer>
</template>

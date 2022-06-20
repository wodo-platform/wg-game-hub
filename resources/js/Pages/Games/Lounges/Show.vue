<script setup>
import BorderedContainer from '@/Shared/BorderedContainer';
import KiteArrow from '@/Shared/SVG/KiteArrow';
import ChatMessage from '@/Shared/Chat/ChatMessage';
import { onBeforeUnmount, onMounted, defineProps, reactive, ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import LogoRed from '@/Shared/SVG/LogoRed';

let props = defineProps({
    user: Object,
    lounge: Object,
    config: Object,
});
let chatMessages = reactive([]);
let chatMessageInput = ref('');
let players = reactive([]);
onMounted(() => {
    if (props.user) {
        window.echo
            .join(`chat.${props.lounge.id}`)
            .here(channelConnectedUsers)
            .joining(channelUserJoined)
            .leaving(channelUserLeaving)
            .error(channelError)
            .listen('.chat.message', channelNewChatMessage);
    }
});

onBeforeUnmount(() => {
    if (props.user) {
        window.echo.leave(`chat.${props.lounge.id}`);
    }
});

function channelConnectedUsers(users) {
    players.push(...users);
}

function channelUserJoined(user) {
    players.push(user);
}

function channelUserLeaving(user) {
    _.remove(players, user);
}

function channelError(error) {
    console.error('channel error: ', error);
}

function sendChatMessage() {
    Inertia.post(
        `/chat/${props.lounge.id}/message`,
        {
            message: chatMessageInput.value,
        },
        {
            preserveScroll: true,
        }
    );
    chatMessageInput.value = '';
}

function channelNewChatMessage(message) {
    chatMessages.push(message);
}
</script>
<script>
import BaseLayout from '@/Layouts/_BaseLayout';
import GameLoungeLayout from '@/Layouts/GameLoungeLayout';

export default {
    layout: [BaseLayout, GameLoungeLayout],
};
</script>
<template>
    <div class="pt-12 pb-24">
        <LogoRed class="mx-auto h-14" />
    </div>
    <div
        class="mx-auto grid w-full max-w-7xl gap-y-6 p-2 lg:grid-cols-12 lg:gap-x-6"
    >
        <div class="col-span-12 lg:col-span-4">
            <p
                class="invisible mb-2 font-grota text-lg font-extrabold uppercase text-white"
            >
                Timer
            </p>
            <BorderedContainer class="border-wgh-purple-3 bg-white p-4">
                <div
                    class="flex flex-row justify-between rounded bg-wgh-gray-0.5 px-4 py-3"
                >
                    <p
                        class="font-grota text-sm font-normal uppercase text-wgh-gray-6"
                    >
                        SNAKE IO
                    </p>
                    <p
                        class="font-grota text-sm font-semibold uppercase text-wgh-gray-6"
                    >
                        RESTRICTED GAME
                    </p>
                </div>
                <div class="w-full py-16">
                    <img
                        class="mx-auto w-40"
                        :src="config.game_lounge_loading_gif"
                        alt="Loading.."
                    />
                    <p
                        class="text-center font-inter text-xs font-normal uppercase text-wgh-gray-2"
                    >
                        WAITING TIME
                    </p>
                    <p
                        class="mt-2 text-center font-grota text-3xl font-extrabold text-wgh-red-2"
                    >
                        3m 25s
                    </p>
                </div>
            </BorderedContainer>
        </div>
        <div
            class="relative col-span-12 flex h-96 grow flex-col lg:col-span-4 lg:h-auto"
        >
            <p
                class="mb-2 font-grota text-lg font-extrabold uppercase text-white"
            >
                Chat
            </p>
            <div class="relative h-full w-full w-full">
                <BorderedContainer
                    class="absolute inset-0 flex h-full w-full grow flex-col justify-between border-wgh-purple-3 bg-white p-4"
                >
                    <div
                        id="chat-messages"
                        class="flex flex-col space-y-2 overflow-y-scroll px-2 pb-2"
                    >
                        <ChatMessage
                            v-for="chatMessage in chatMessages"
                            :from-me="chatMessage.sender.id === props.user.id"
                            :user-image-url="chatMessage.sender.image"
                            :time="chatMessage.created_at_human_readable"
                            :username="chatMessage.sender.username"
                            :message="chatMessage.message.message"
                        />
                    </div>
                    <div
                        class="flex w-full flex-row space-x-2 rounded-md border-2 border-wgh-gray-1 p-px"
                    >
                        <input
                            type="text"
                            class="shrink grow p-2 outline-none ring-0"
                            placeholder="Type your message here"
                            v-model="chatMessageInput"
                            @keyup.enter="sendChatMessage"
                        />
                        <button
                            @click.prevent="sendChatMessage"
                            class="rounded-md bg-wgh-purple-2 py-2 px-4"
                        >
                            <KiteArrow class="h-4 w-4" />
                        </button>
                    </div>
                </BorderedContainer>
            </div>
        </div>
        <div
            class="relative col-span-12 flex h-96 grow flex-col lg:col-span-4 lg:h-auto"
        >
            <p
                class="mb-2 font-grota text-lg font-extrabold uppercase text-white"
            >
                Players ({{ lounge.players_in_lounge_count }} /
                {{ lounge.max_players }})
            </p>
            <div class="relative h-full w-full w-full">
                <BorderedContainer
                    class="absolute inset-0 flex h-full w-full grow flex-col justify-between border-wgh-purple-3 bg-white p-2"
                >
                    <div
                        id="players-list"
                        class="divider-wgh-gray-0.5 flex flex-col divide-y overflow-y-scroll px-2 pb-2"
                    >
                        <div
                            class="flex flex-row justify-between py-2"
                            v-for="player in players"
                        >
                            <div class="flex flex-row items-center space-x-4">
                                <img
                                    class="h-8 w-8 rounded-full"
                                    :src="player.image"
                                    :alt="`${player.name}avatar`"
                                />
                                <p
                                    class="font-grota text-sm font-bold uppercase text-wgh-gray-6"
                                >
                                    {{ player.name }}
                                </p>
                            </div>
                            <div class="flex flex-row items-center">
                                <p
                                    class="font-grota text-sm font-bold uppercase text-wgh-yellow-3"
                                >
                                    3x Winner
                                </p>
                            </div>
                        </div>
                    </div>
                </BorderedContainer>
            </div>
        </div>
    </div>
</template>
<style scoped>
div::-webkit-scrollbar {
    display: none;
    scrollbar-width: none;
}
</style>

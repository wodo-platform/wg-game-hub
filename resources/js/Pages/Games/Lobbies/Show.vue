<script setup>
import BorderedContainer from '@/Shared/BorderedContainer';
import KiteArrow from '@/Shared/SVG/KiteArrow';
import ChatMessage from '@/Shared/Chat/ChatMessage';
import {
    onBeforeUnmount,
    onMounted,
    defineProps,
    reactive,
    ref,
    computed,
} from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';
import dayjs from 'dayjs';
import LogoRed from '@/Shared/SVG/LogoRed';

let props = defineProps({
    user: Object,
    lobby: Object,
    config: Object,
});

console.log(props.lobby);

let data = reactive({
    timeToStart: '',
    users: props.lobby.users,
});

let usersInLobby = computed(() => {
    return data.users.length;
});

let chatMessages = reactive([]);
let chatMessageInput = ref('');
let players = reactive([]);
let relativeTime = require('dayjs/plugin/relativeTime');
let duration = require('dayjs/plugin/duration');

onMounted(() => {
    dayjs.extend(relativeTime);
    dayjs.extend(duration);
    if (props.user) {
        window.echo
            .join(`chat-rooms.${props.lobby.id}`)
            .error(channelError)
            .listen('.chat.message', channelNewChatMessage)
            .listen('.user.joined', channelUserJoined)
            .listen('.user.left', channelUserLeft);

        countDownTimer();
    }
});

onBeforeUnmount(() => {
    if (props.user) {
        window.echo.leave(`chat-rooms.${props.lobby.id}`);
    }
});

function channelError(error) {
    console.error('channel error: ', error);
}

function sendChatMessage() {
    if (chatMessageInput.value.length <= 0) {
        return;
    }
    Inertia.post(
        `/chat-rooms/${props.lobby.id}/message`,
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

function countDownTimer() {
    if (props.lobby.sceduled_at_w3c_string === null) {
        return;
    }

    setInterval(function () {
        let now = dayjs();
        let scheduledAt = dayjs(props.lobby.scheduled_at_utc_string);
        let diff = dayjs.duration(scheduledAt.diff(now));
        // let formatted = diff.format('HH:mm:ss');
        let days = `${diff.get('days')}d`;
        let hours = `${diff.get('hours')}h`;
        let minutes = `${diff.get('minutes')}m`;
        let seconds = `${diff.get('seconds')}s`;
        data.timeToStart = `${days} ${hours} ${minutes} ${seconds}`;
    }, 1000);
}

function channelUserJoined(payload) {
    data.users.push(payload.user);
}

function channelUserLeft(payload) {
    _.remove(data.users, function (user) {
        return user.id === payload.user.id;
    });
}
</script>
<script>
import BaseLayout from '@/Layouts/_BaseLayout';
import GameLobbyLayout from '@/Layouts/GameLobbyLayout';

export default {
    layout: [BaseLayout, GameLobbyLayout],
};
</script>
<template>
    <div
        class="mx-auto grid w-full max-w-7xl gap-y-6 p-2 pt-12 pb-24 lg:grid-cols-12 lg:gap-x-6"
    >
        <div class="col-span-12 flex inline-flex lg:col-span-5">
            <Link
                method="delete"
                as="button"
                type="button"
                :href="`/game-lobbies/${lobby.id}/leave`"
                replace
            >
                <div
                    class="cursor-pointer rounded-lg border-b-6 border-wgh-red-3 bg-wgh-red-3 transition-all duration-100 active:mt-1.5 active:border-b-0"
                >
                    <div
                        class="flex flex-row space-x-2.5 rounded-lg border-3 border-wgh-red-3 bg-wgh-red-2 px-4 py-2 text-center font-grota text-white text-white outline-none transition-all duration-100 hover:bg-wgh-red-1 active:border-wgh-red-4 active:bg-wgh-red-3"
                    >
                        Leave Lobby
                    </div>
                </div>
            </Link>
        </div>

        <div class="col-span-12 lg:col-span-7">
            <LogoRed class="h-14" />
        </div>
    </div>
    <div
        class="mx-auto grid w-full max-w-7xl gap-y-6 p-2 lg:grid-cols-12 lg:gap-x-6"
    >
        <div class="col-span-12 lg:col-span-4">
            <p
                class="invisible mb-2 font-grota text-lg font-extrabold uppercase text-white"
            >
                Time remaining
            </p>
            <BorderedContainer class="border-wgh-purple-3 bg-white p-4">
                <div
                    class="flex flex-row justify-between rounded bg-wgh-gray-0.5 px-4 py-3"
                >
                    <p
                        class="font-grota text-sm font-normal uppercase text-wgh-gray-6"
                    >
                        {{ props.lobby.game.name }}
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
                        :src="config.game_lobby_loading_gif"
                        alt="Loading.."
                    />
                    <p
                        class="text-center font-inter text-xs font-normal uppercase text-wgh-gray-2"
                    >
                        WAITING TIME
                    </p>
                    <p
                        v-if="!data.timeToStart"
                        class="mt-2 text-center font-grota text-3xl font-extrabold text-wgh-red-2"
                    >
                        Loading...
                    </p>
                    <p
                        v-if="data.timeToStart"
                        class="mt-2 text-center font-grota text-3xl font-extrabold text-wgh-red-2"
                    >
                        {{ data.timeToStart }}
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
                            :disabled="chatMessageInput.length <= 0"
                            @click.prevent="sendChatMessage"
                            class="rounded-md bg-wgh-purple-2 py-2 px-4 disabled:cursor-no-drop"
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
                Players ({{ usersInLobby }} / {{ lobby.max_players }})
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
                            v-for="user in data.users"
                        >
                            <div class="flex flex-row items-center space-x-4">
                                <img
                                    class="h-8 w-8 rounded-full"
                                    :src="user.image"
                                />
                                <p
                                    class="font-grota text-sm font-bold uppercase text-wgh-gray-6"
                                >
                                    {{ user.full_name }}
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

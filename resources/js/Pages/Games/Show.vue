<script setup>
import GameOptionsIcon from '@/Shared/SVG/GameOptionsIcon';
import GameLiveIcon from '@/Shared/SVG/GameLiveIcon';
import BorderedContainer from '@/Shared/BorderedContainer';
import ButtonShape from '@/Shared/ButtonShape';
import ChevronLeft from '@/Shared/SVG/ChevronLeft';
import { Link } from '@inertiajs/inertia-vue3';

let props = defineProps({
    game: Object,
});
</script>

<template>
    <div>
        <BorderedContainer
            class="mb-10 flex flex-col justify-between border-wgh-purple-3 bg-wgh-purple-2 p-7 md:flex-row"
        >
            <div class="mb-4 flex flex-row space-x-6 lg:mb-0">
                <Link href="/dashboard">
                    <ButtonShape type="whiteBorderPurple">
                        <ChevronLeft class="text-white" />
                    </ButtonShape>
                </Link>
                <div class="flex flex-col space-y-2">
                    <h1
                        class="font-grota text-3xl font-extrabold uppercase text-white"
                    >
                        {{ game.name }}
                    </h1>
                    <p class="font-inter text-sm font-normal text-white">
                        {{ game.description }}
                    </p>
                </div>
            </div>
            <div class="flex flex-row divide-x divide-wgh-gray-0.5">
                <div
                    class="flex flex-row items-center space-x-2 pr-4 md:space-x-4"
                >
                    <GameOptionsIcon class="h-6 w-6 text-white" />
                    <div class="flex flex-col">
                        <span
                            class="font-inter text-[10px] font-semibold uppercase text-wgh-gray-2"
                            >Game Options</span
                        >
                        <span
                            class="font-grota text-sm font-normal uppercase text-white"
                            >{{
                                game.game_options_count.toLocaleString('en')
                            }}
                            Options</span
                        >
                    </div>
                </div>
                <div
                    class="flex flex-row items-center space-x-2 pl-4 md:space-x-4"
                >
                    <GameLiveIcon class="h-6 w-6 text-white" />
                    <div class="flex flex-col">
                        <span
                            class="font-inter text-[10px] font-semibold uppercase text-wgh-gray-2"
                            >Online Players</span
                        >
                        <span
                            class="font-grota text-sm font-normal uppercase text-white"
                        >
                            {{ game.total_online_players.toLocaleString('en') }}
                            Players</span
                        >
                    </div>
                </div>
            </div>
        </BorderedContainer>

        <div
            class="flex grid grid-cols-1 flex-row flex-wrap gap-6 md:grid-cols-2 lg:grid-cols-3 lg:px-12"
        >
            <borderedContainer
                v-for="option in game.options"
                :key="option.id"
                class="max-w-3xl bg-white p-6"
            >
                <img
                    :src="option.image"
                    :alt="`${game.name} - ${option.title} Art`"
                    class="mb-4"
                />
                <div class="mb-4 flex flex-row justify-between">
                    <h2
                        class="font-grota text-xl font-extrabold uppercase text-wgh-gray-6"
                    >
                        {{ option.title }}
                    </h2>
                    <div class="text-bold font-grota text-base text-wgh-gray-6">
                        <span>{{ option.price }}</span>
                    </div>
                </div>
                <button class="mb-6 w-full uppercase">
                    <ButtonShape type="red">
                        <span class="w-full">Start Playing</span>
                    </ButtonShape>
                </button>

                <div>
                    <p
                        class="mb-2 font-inter text-sm font-semibold text-wgh-gray-6"
                    >
                        Game Rules
                    </p>
                    <ul
                        class="list-inside list-disc font-inter text-sm font-normal text-wgh-gray-4"
                    >
                        <li v-for="rule in option.rules">{{ rule }}</li>
                    </ul>
                </div>
            </borderedContainer>
        </div>
    </div>
</template>

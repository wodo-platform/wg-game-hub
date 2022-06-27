<script setup>
import GameOptionsIcon from '@/Shared/SVG/GameOptionsIcon';
import GameLiveIcon from '@/Shared/SVG/GameLiveIcon';
import BorderedContainer from '@/Shared/BorderedContainer';
import ButtonShape from '@/Shared/ButtonShape';
import ChevronLeft from '@/Shared/SVG/ChevronLeft';
import { Inertia } from '@inertiajs/inertia';

import { Link } from '@inertiajs/inertia-vue3';
import { reactive, ref } from 'vue';
import { isEmpty } from 'lodash';
import TentModal from '@/Shared/Modals/TentModal';

let props = defineProps({
    game: Object,
    game_options: Object,
});

let startGameConfirmationModalIsOpen = ref(false);
let selectedGameOption = reactive({});

// Open Modal and set the selected game option
function startGameButtonClicked(gameOption) {
    selectedGameOption = gameOption;
    startGameConfirmationModalIsOpen.value = true;
}

function modalStartGameButtonClicked() {
    if (isEmpty(selectedGameOption)) {
        return;
    }

    Inertia.post(`/game-lobbies/${selectedGameOption.id}/join`);
    // Participate in session
    // and redirect to Lobby

    startGameConfirmationModalIsOpen.value = false;
    // initialize the game
}

function modalCancelGameButtonClicked() {
    startGameConfirmationModalIsOpen.value = false;
    selectedGameOption = {};
}
</script>

<template>
    <TentModal :open="startGameConfirmationModalIsOpen">
        <template v-slot:header><p>Hello!</p></template>
        <template v-slot:title>
            <p>A small description about the first section.</p>
        </template>
        <template v-slot:subtitle>
            <p class="wgh-gray-6 font-inter text-base font-normal">
                A small description about the first section explaining about the
                platform.
            </p>
        </template>
        <template v-slot:actions>
            <button @click.prevent="modalCancelGameButtonClicked">
                <ButtonShape type="gray">
                    <span>Cancel</span>
                </ButtonShape>
            </button>
            <button @click.prevent="modalStartGameButtonClicked">
                <ButtonShape type="red">
                    <span>Start</span>
                </ButtonShape>
            </button>
        </template>
    </TentModal>

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
                    <p
                        class="max-w-3xl font-inter text-sm font-normal text-white"
                    >
                        {{ game.description }}
                    </p>
                </div>
            </div>
            <div class="flex shrink-0 flex-row divide-x divide-wgh-gray-0.5">
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
                                game_options.total.toLocaleString('en')
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
                            1000 Players</span
                        >
                    </div>
                </div>
            </div>
        </BorderedContainer>

        <div
            class="flex grid grid-cols-1 flex-row flex-wrap gap-6 md:grid-cols-2 lg:grid-cols-3 lg:px-12"
        >
            <borderedContainer
                v-for="option in game_options.data"
                :key="option.id"
                class="max-w-3xl bg-white p-6"
                :style="{ 'border-color': `${option.theme_color}` }"
            >
                <div class="aspect-w-16 aspect-h-9 mb-4">
                    <img
                        :src="option.image"
                        :alt="`${game.name} - ${option.name} Art`"
                    />
                </div>
                <div class="mb-4 flex flex-row justify-between">
                    <h2
                        class="font-grota text-xl font-extrabold uppercase text-wgh-gray-6"
                    >
                        {{ option.name }}
                    </h2>
                    <div class="text-bold font-grota text-base text-wgh-gray-6">
                        <span
                            >{{ option.base_entrance_fee }}
                            {{ option.asset.symbol }}</span
                        >
                    </div>
                </div>
                <button
                    class="mb-6 w-full uppercase"
                    @click.prevent="startGameButtonClicked(option)"
                >
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
                    <div
                        class="list-inside list-disc font-inter text-sm font-normal text-wgh-gray-4"
                    >
                        {{ option?.rules }}
                    </div>
                </div>
            </borderedContainer>
        </div>
    </div>
</template>

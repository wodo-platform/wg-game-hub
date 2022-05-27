<script setup>
import GameCard from '@/Shared/GameCard';
import DashboardBalanceCard from '@/Shared/DashboardBalanceCard/DashboardBalanceCard';
import DashboardBalanceCardCreateAccount from '@/Shared/DashboardBalanceCard/DashboardBalanceCardCreateAccount';
import BorderedContainer from '@/Shared/BorderedContainer';

let props = defineProps({
    dashboard_art: String,
    games: Object,
    balance: Array,
});
</script>

<template>
    <div class="flex h-full flex-col lg:flex-row lg:space-x-6">
        <div class="w-full lg:w-3/4">
            <BorderedContainer
                class="mb-8 flex flex-col space-y-6 border-wgh-red-3 bg-wgh-red-2 p-6 md:flex-row md:space-x-6 md:space-y-0"
            >
                <div class="w-full md:w-1/2">
                    <img :src="props.dashboard_art" alt="Dashboard Art" />
                </div>
                <div class="flex w-full flex-col justify-center md:w-1/2">
                    <h2 class="font-grota text-2xl font-extrabold text-white">
                        The First Retro Gaming Playground Competitions!
                    </h2>
                    <p class="mt-4 font-inter text-base font-normal text-white">
                        A small description about the first section explaining
                        about the platform.
                    </p>
                </div>
            </BorderedContainer>

            <h1 class="mb-6 font-grota text-2xl font-extrabold text-wgh-gray-6">
                Games
            </h1>
            <div>
                <GameCard
                    :key="game.id"
                    v-for="game in props.games.data"
                    :game="game"
                />
            </div>
        </div>
        <div class="h-full w-full space-y-6 lg:w-1/4">
            <DashboardBalanceCard :balance="balance" />
            <DashboardBalanceCardCreateAccount />
        </div>
    </div>
</template>

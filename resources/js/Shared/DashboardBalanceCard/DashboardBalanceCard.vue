<script setup>
import ButtonShape from '@/Shared/ButtonShape';
import DashboardBalanceCardCoin from '@/Shared/DashboardBalanceCard/DashboardBalanceCardCoin';

let props = defineProps({
    balance: Array,
});
</script>
<template>
    <div
        class="rounded-lg border-x-4 border-t-4 border-b-10 border-wgh-gray-1.5 bg-white p-6"
    >
        <div class="mb-4 flex flex-col space-y-4">
            <DashboardBalanceCardCoin
                v-for="account in props.balance"
                :account="account"
            />
        </div>
        <div>
            <button class="w-full outline-none">
                <ButtonShape type="gray">
                    <span class="w-full text-center font-bold uppercase"
                        >Top UP</span
                    >
                </ButtonShape>
            </button>
        </div>
    </div>
</template>

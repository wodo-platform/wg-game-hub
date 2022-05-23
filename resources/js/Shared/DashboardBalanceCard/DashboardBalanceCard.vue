<script setup>
import ButtonShape from '@/Shared/ButtonShape';
import DashboardBalanceCardCoin from '@/Shared/DashboardBalanceCard/DashboardBalanceCardCoin';
import BorderedContainer from '@/Shared/BorderedContainer';

let props = defineProps({
    balance: Array,
});
</script>
<template>
    <BorderedContainer class="border-wgh-gray-1.5 bg-white p-6">
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
    </BorderedContainer>
</template>

<script setup>
import BananoBalanceIcon from '@/Shared/SVG/BananoBalanceIcon';
import CopyIcon from '@/Shared/SVG/CopyIcon';
let props = defineProps({
    account: Object,
});
</script>
<template>
    <div>
        <p
            class="mb-1 font-inter text-xs font-semibold uppercase text-wgh-gray-2"
        >
            {{ account.name }} Balance
        </p>
        <div class="flex flex-row items-center space-x-4">
            <BananoBalanceIcon class="h-14 w-14 shrink-0" />
            <div class="flex shrink grow-0 flex-col truncate">
                <p class="font-grota text-lg font-extrabold text-wgh-gray-6">
                    {{ account.pivot.balance.toLocaleString('US') }}
                </p>
                <!--                <p-->
                <!--                    class="overflow-hidden text-ellipsis font-inter text-xs font-normal text-wgh-gray-2"-->
                <!--                >-->
                <!--                    {{ account.address }}-->
                <!--                </p>-->
            </div>
            <!--            <button class="shrink-0 grow-0">-->
            <!--                <CopyIcon />-->
            <!--            </button>-->
        </div>
    </div>
</template>

<script setup>
import ExclamationCircleIcon from '@/Shared/SVG/ExclamationCircleIcon';
import WGHButton from '@/Shared/WGHButton';
import BananoLogo from '@/Shared/SVG/BananoLogo';
</script>
<template>
    <div
        class="flex flex-col items-center rounded-2xl border-x-4 border-t-4 border-b-10 border-wgh-gray-1.5 bg-white p-6"
    >
        <ExclamationCircleIcon class="mb-4 h-10 w-10" />
        <p class="font mt-1 font-grota text-lg font-extrabold text-wgh-gray-6">
            My Wallet
        </p>
        <p
            class="mb-4 text-center font-inter text-sm font-normal text-wgh-gray-4"
        >
            In order to create a Banano wallet you need to create an account.
        </p>
        <WGHButton type="gray" class="mb-5 font-bold" as="button"
            >Create an Account
        </WGHButton>
        <div class="flex flex-row space-x-4">
            <p class="font-inter text-xs font-normal uppercase text-[#909399]">
                Powered By
            </p>
            <BananoLogo />
        </div>
    </div>
</template>

<script setup>
import Logo from '@/Shared/SVG/Logo';
import TextInput from '@/Shared/Inputs/TextInput';
import { ref } from 'vue';
import InputError from '@/Shared/InputError';
import WGHButton from '@/Shared/WGHButton';

let isRegister = ref(false);

defineProps({
    login_art: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div
        class="mx-auto flex min-h-screen max-w-6xl flex-col justify-around px-4"
    >
        <div class="flex flex-row items-center justify-between space-x-12">
            <div class="w-full lg:w-4/12">
                <Logo class="mx-auto mb-8 w-32" />

                <div
                    class="relative relative mb-8 flex flex-row rounded-lg rounded-lg border-t-4 border-r-4 border-l-4 border-b-10 border-[#B7BAC6] bg-white p-1"
                >
                    <span
                        class="block w-1/2 cursor-pointer rounded py-2 text-center font-grota text-sm font-bold uppercase transition-all duration-200"
                        :class="{
                            'bg-wgh-gray-3 text-white': !isRegister,
                            'text-wgh-gray-3': isRegister,
                        }"
                        @click.prevent="isRegister = false"
                        >Sign in</span
                    >
                    <span
                        class="block w-1/2 cursor-pointer rounded py-2 text-center font-grota text-sm font-bold uppercase transition-all duration-200"
                        :class="{
                            'bg-wgh-gray-3 text-white': isRegister,
                            'text-wgh-gray-3': !isRegister,
                        }"
                        @click.prevent="isRegister = true"
                        >Sign up</span
                    >
                </div>

                <form action="" class="mb-5">
                    <TextInput placeholder="Email" type="email" />
                    <InputError class="mt-2">Something went wrong</InputError>

                    <TextInput
                        placeholder="Password"
                        type="password"
                        class="mt-4"
                    />
                    <InputError class="mt-2">Something went wrong</InputError>

                    <TextInput
                        v-show="isRegister"
                        placeholder="Confirm Password"
                        type="password_confirmation"
                        class="mb-6"
                        :class="{ 'mt-6': !isRegister, 'mt-4': isRegister }"
                    />
                    <div class="mb-6 mt-4 flex flex-row justify-between">
                        <div class="flex flex-row items-center space-x-2">
                            <input
                                type="checkbox"
                                id="remember_me"
                                class="rounded border border-wgh-gray-3"
                            />
                            <label
                                for="remember_me"
                                class="font-grota uppercase text-wgh-gray-6"
                                >REMEMBER ME</label
                            >
                        </div>
                        <a
                            class="font-grota text-sm font-normal uppercase text-wgh-gray-6 underline"
                            href="#"
                            >forgot password</a
                        >
                    </div>
                    <WGHButton
                        type="purple"
                        class="block w-full text-center"
                        as="button"
                    >
                        <span v-if="isRegister" class="w-full uppercase"
                            >Sign up</span
                        >
                        <span v-if="!isRegister" class="w-full uppercase"
                            >Sign in</span
                        >
                    </WGHButton>
                </form>
                <p
                    class="text-center font-inter text-sm capitalize text-[#909399]"
                >
                    By Signing In you’re agreeing to the
                    <a href="#" class="underline">Terms & Conditions</a> and
                    <a href="#" class="underline">Privacy Policy.</a>
                </p>
            </div>
            <img
                :src="login_art"
                alt="Login Art"
                class="hidden lg:block lg:w-7/12"
            />
        </div>
    </div>
</template>

<script>
import AuthLayout from '@/Layouts/AuthLayout';

export default {
    layout: AuthLayout,
};
</script>

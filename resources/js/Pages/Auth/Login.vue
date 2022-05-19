<script setup>
import Logo from "@/Shared/SVG/Logo";
import TextInput from "@/Shared/Inputs/TextInput";
import {ref} from "vue";
import PrimaryButton from "@/Shared/Buttons/PrimaryButton";
import InputError from "@/Shared/InputError";

let isRegister = ref(false);

defineProps({
  login_art: {
    type: String,
    required: true,
  }
})
</script>

<template>
  <div class="max-w-6xl mx-auto min-h-screen flex flex-col justify-around px-4">
    <div class="flex flex-row justify-between space-x-12 items-center">
      <div class="w-full lg:w-4/12">
        <Logo class="w-32 mb-8 mx-auto"/>

        <div class="bg-white border-t-4 border-r-4 border-l-4 border-b-10 rounded-lg border-[#B7BAC6] mb-8 relative flex flex-row relative p-1 rounded-lg">
          <span class="w-1/2 block text-center py-2 transition-all duration-200 cursor-pointer rounded text-sm font-grota font-bold uppercase" :class="{'bg-wgh-gray-3 text-white' : !isRegister, 'text-wgh-gray-3': isRegister}" @click.prevent="isRegister = false">Sign in</span>
          <span class="w-1/2 block text-center py-2 transition-all duration-200 cursor-pointer rounded text-sm font-grota font-bold uppercase" :class="{'bg-wgh-gray-3 text-white' : isRegister, 'text-wgh-gray-3': !isRegister}" @click.prevent="isRegister = true">Sign up</span>
        </div>

        <form action="" class="mb-5">
          <TextInput placeholder="Email" type="email"/>
          <InputError class="mt-2">Something went wrong</InputError>

          <TextInput placeholder="Password" type="password" class="mt-4"/>
          <InputError class="mt-2">Something went wrong</InputError>

          <TextInput v-show="isRegister" placeholder="Confirm Password" type="password_confirmation" class="mb-6" :class="{'mt-6' : !isRegister, 'mt-4' : isRegister}"/>
          <div class="flex flex-row justify-between mb-6 mt-4">
            <div class="flex flex-row items-center space-x-2">
              <input type="checkbox" id="remember_me" class="border border-wgh-gray-3 rounded"/>
              <label for="remember_me" class="uppercase text-wgh-gray-6 font-grota ">REMEMBER ME</label>
            </div>
            <a class="underline font-grota text-wgh-gray-6 uppercase font-normal text-sm" href="#">forgot password</a>
          </div>
          <PrimaryButton class="w-full block uppercase" as="button">
            <span v-if="isRegister">Sign up</span>
            <span v-if="!isRegister">Sign in</span>
          </PrimaryButton>
        </form>
        <p class="font-inter text-center text-[#909399] capitalize text-sm">By Signing In you’re agreeing to the <a href="#" class="underline">Terms & Conditions</a> and <a href="#" class="underline">Privacy Policy.</a></p>
      </div>
      <img :src="login_art" alt="Login Art" class="hidden lg:block lg:w-7/12"/>
    </div>
  </div>
</template>

<script>
import AuthLayout from "@/Layouts/AuthLayout";

export default {
  layout: AuthLayout
}
</script>

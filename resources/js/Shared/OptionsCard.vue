<script setup>
import WGHButton from '@/Shared/WGHButton';

let props = defineProps({
    game_option_info: Object,
});
</script>
<template>
    <div
        class=" m-3  sm:w-[384px] mb-5 w-11/12 h-96	 block justify-center rounded-2xl border-t-4 border-r-4 border-l-4 border-b-10  border-wgh-gray-1.5 bg-white p-3 "
    >
        <div class=" w-full justify-center  " >
            <img :src="game_option_info.image" class="md:max-h-[10.25rem] w-full"/>
            
        </div>

        <div class=" flex flex-row ">
        <div class=" font-grota text-sm font-extrabold text-wgh-gray-6 w-3/6 uppercase ">{{game_option_info.price}}</div>
        <div class=" w-2/4"></div>
        <div class=" font-grota text-xs  text-wgh-gray-6 uppercase "> {{game_option_info.price}}</div>
        </div >
            
         

        <div
            class="mt-4 h-10	mb-4"
        >
            <WGHButton type="red" class="font-grota p-4 uppercase justify-center" >START PLAYING</WGHButton>
        </div>

        <div class=" flex flex-col">
         <div class=" font-inter text-sm  text-wgh-gray-6 uppercase">game rules</div>
         <div  class=" font-inter text-xs text-wgh-gray-6"  >{{game_option_info.rules[0]}}</div>
         </div>

    </div>
</template>

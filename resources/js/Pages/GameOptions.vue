<script setup>
import GameOptionsIcon from '@/Shared/SVG/GameOptionsIcon';
import OptionsCard from '@/Shared/OptionsCard';
import GameLiveIcon from '@/Shared/SVG/GameLiveIcon';
import PreviousButton from '@/Shared/Buttons/Shift';



let props = defineProps({
    dashboard_art: String,
    games: Array,
    balance: Array,
    game_info:Object,
    game_options_info:Array,
});
</script>

<template>
<div class="block h-full w-full justify-center">
   <!-- header -->
   <div class=" 	">
     <div class=" w-11/12  lg:w-[1280px] h-28 relative rounded-lg bg-wgh-purple-2 border-2 border-wgh-purple-3 my-4 mx-auto px-10">
         <div class="absolute  inline-block w-28 h-5 top-5 left-28 text-xl font-grota uppercase font-extrabold not-italic leading-tight text-white	">{{game_info.name}}</div>
         <div class="absolute inline-block w-28 h-3 bottom-10 left-28 text-xs font-grota uppercase  not-italic leading-tight text-white	">{{game_info.small_description}}</div>
           <PreviousButton>            
               <span class="text-white text-xl px-4">&lt</span>
           </PreviousButton>

       <div
                    class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-10"
                >
                    <div
                        class=" absolute hidden lg:flex right-44 top-8  flex-row items-center space-x-2 md:space-x-4"
                    >
                        <GameOptionsIcon class="h-6 w-6" />
                        <div class="flex flex-col">
                            <span
                                class="font-inter text-[10px] font-semibold uppercase text-wgh-gray-2"
                                >Game Options</span
                            >
                            <span
                                class="font-grota text-sm font-normal uppercase text-wgh-gray-6"
                                >{{
                                    game_info.count_game_options.toLocaleString(
                                        'en'
                                    )
                                }}
                                Options</span
                            >
                        </div>
                    </div>
                          <div class=" absolute hidden lg:flex right-40 top-8 h-9 w-px	bg-wgh-gray-0.5 border-0 m-0"></div>

                    <div
                        class=" absolute  hidden lg:flex flex-row right-6 top-8 items-center space-x-2 md:space-x-4 m-0"
                    >
                        <GameLiveIcon class="h-6 w-6" />
                        <div class="flex flex-col">
                            <span
                                class="font-inter text-[10px] font-semibold uppercase text-wgh-gray-2"
                                >Online Players</span
                            >
                            <span
                                class="font-grota text-sm font-normal uppercase text-wgh-gray-6"
                            >
                                {{
                                    game_info.online_players.toLocaleString(
                                        'en'
                                    )
                                }}
                                Players</span
                            >
                        </div>
                    </div>
                </div>

      
       </div>
     </div>
 <!-- body -->
      <div class=" container mx-auto">
           <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
             <OptionsCard 
             v-for="game_option_info in game_options_info"
             :game_option_info="game_option_info"/>
            </div>
     </div>
  
</div>
</template>

<script setup>


</script>


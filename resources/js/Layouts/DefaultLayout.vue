<script setup>
import LogoRed from '@/Shared/SVG/LogoRed';
import NavigationItem from '@/Shared/Navigation/NavigationItem';
import RocketIcon from '@/Shared/SVG/RocketIcon';
import SearchIcon from '@/Shared/SVG/SearchIcon';
import BellIcon from '@/Shared/SVG/BellIcon';
import AccountIcon from '@/Shared/SVG/AccountIcon';
import Footer from '@/Shared/Footer/Footer';
import ButtonShape from '@/Shared/ButtonShape';
import { Link } from '@inertiajs/inertia-vue3';

let props = defineProps({
    config: Object,
});
</script>
<template>
    <div
        id="wrapper"
        class="flex min-h-screen w-full flex-col justify-between bg-[#F6F6F7]"
        :style="{
            backgroundImage: `url(${props.config.main_pattern})`,
            backgroundRepeat: `repeat`,
            backgroundPosition: `center`,
        }"
    >
        <div class="mb-6 w-full bg-white">
            <nav
                class="container mx-auto flex flex-row justify-between px-4 lg:px-0"
            >
                <div class="flex flex-row items-center space-x-14 py-5">
                    <Link href="/dashboard">
                        <LogoRed class="w-32" />
                    </Link>
                    <div class="flex flex-row space-x-6">
                        <!--                        <NavigationItem as="link"-->
                        <!--                            ><RocketIcon class="h-6 w-6" /><span-->
                        <!--                                >Games</span-->
                        <!--                            ></NavigationItem-->
                        <!--                        >-->
                        <!--                        <NavigationItem as="link"-->
                        <!--                            ><RocketIcon class="h-6 w-6" /><span-->
                        <!--                                >Games</span-->
                        <!--                            ></NavigationItem-->
                        <!--                        >-->
                    </div>
                </div>
                <div class="flex flex-row items-center space-x-8">
                    <!--                    <SearchIcon class="h-6 w-6 cursor-pointer" />-->
                    <!--                    <BellIcon class="h-6 w-6 cursor-pointer" />-->
                    <Link href="/profile">
                        <ButtonShape type="purple">
                            <span class="flex flex-row space-x-2.5">
                                <AccountIcon class="h-6 w-6" />
                                <span class="font-bold">Danyel</span>
                            </span>
                        </ButtonShape>
                    </Link>
                </div>
            </nav>
        </div>
        <div class="container mx-auto h-full flex-1">
            <slot />
        </div>
        <div class="mx-auto mt-8 w-full bg-white py-2">
            <Footer />
        </div>
    </div>
</template>

<style scoped>
.page-enter-active,
.page-leave-active {
    transition: all 0.3s;
}

.page-enter,
.page-leave-active {
    opacity: 0;
}
</style>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
</script>
<template>
  <Link class="bg-wgh-purple-2 text-center text-white px-4 py-2 font-grota  border-t-4 border-r-4 border-l-4 border-b-10 rounded-lg border-wgh-purple-3 hover:bg-wgh-purple-1 active:bg-wgh-purple-3 active:border-wgh-purple-4 transition-all duration-150">
    <slot />
  </Link>
</template>

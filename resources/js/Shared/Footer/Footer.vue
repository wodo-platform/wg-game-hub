<template>
    <div
        class="container mx-auto flex w-full flex-col items-center space-y-2 md:flex-row md:space-y-0 md:space-x-4"
    >
        <FooterLink>Terms & Conditions</FooterLink>
        <FooterLink>Privacy Policy</FooterLink>
        <FooterLink>Contact Us</FooterLink>
        <FooterLink>About Us</FooterLink>
    </div>
</template>
<script>
import FooterLink from '@/Shared/Footer/FooterLink';
export default {
    components: { FooterLink },
};
</script>

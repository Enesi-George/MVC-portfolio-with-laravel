<template>
    <div class="bg-slate-200 dark:bg-slate-900">
        <!-- Header -->
        <Header />

        <main class="min-h-screen">
            <slot />
        </main>

        <!-- footer -->
         <Footer />
    </div>
</template>

<script setup>
import Header from "@/Components/Frontend/Header.vue";
import Footer from "@/Components/Frontend/Footer.vue";

</script>

<style lang="scss" scoped></style>

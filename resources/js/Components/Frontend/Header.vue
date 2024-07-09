<template>
    <div>
        <nav
            class="fixed w-full z-20 bg-light-primary shadow-sm dark:bg-dark-primary"
            :class="{
                'bg-light-primary dark:bg-dark-primary': scrollBg,
                'bg-white dark:bg-slate-800': !scrollBg,
            }"
        >
            <div class="max-w-screen mx-4 py-2 flex flex-wrap items-center justify-between md:mx-20">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="images/portfolio.png" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Portfolio</span>
                </a>
                <button
                    @click="toggleMobileMenu"
                    data-collapse-toggle="navbar-default"
                    type="button"
                    class="inline-flex items-center p-2 w-16 h-10 border justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 transition-all duration-300 "
                    aria-controls="navbar-default"
                    aria-expanded="false"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg
                        class="w-10 h-5 "
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 17 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15"
                        />
                    </svg>
                </button>
                <div class="w-full md:block md:w-auto" :class="{ hidden: !showMobileMenu }" id="navbar-default">
                    <ul class="font-medium flex flex-col  p-4 mt-4 rounded-lg border border-light-tail-500 dark:border-dark-navy-100 md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0">
                        <li v-for="(navigation, index) in navigations" :key="index">
                            <a
                                :href="navigation.href"
                                class="block py-2 text-light-tail-500 rounded dark:text-dark-navy-100 hover:text-light-tail-100 dark:hover:text-dark-navy-100 transition-all duration-300"
                                aria-current="page"
                                @click="closeMobileMenu"
                            >{{ navigation.name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const showMobileMenu = ref(false);
const scrollBg = ref(false);

const navigations = ref([
    { name: "Home", href: "/" },
    { name: "About", href: "#about" },
    { name: "Services", href: "#services" },
    { name: "Portfolio", href: "#portfolio" },
    { name: "Contact", href: "#contact" },
]);

const setScrollBg = (value) => {
    scrollBg.value = value;
};

const toggleMobileMenu = () => {
    showMobileMenu.value = !showMobileMenu.value;
};

const closeMobileMenu = () => {
    showMobileMenu.value = false;
};

onMounted(() => {
    window.addEventListener("scroll", () => {
        return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
    });
});
</script>

<style>
/* Your CSS styles */
</style>

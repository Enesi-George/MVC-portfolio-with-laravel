<template>
    <div >
        <nav
            class="fixed w-full z-20 bg-light-primary shadow-sm dark:bg-dark-primary"
            :class="{
                'bg-light-primary dark:bg-dark-primary': scrollBg,
                'bg-white dark:bg-slate-800': !scrollBg,
            }"
        >
            <div
                class="max-w-screen mx-4 py-1 flex flex-wrap items-center justify-between md:mx-20"
            >
                <a
                    href="/"
                    class="flex items-center space-x-3 rtl:space-x-reverse"
                >
                    <img
                        src="images/portfolio.png"
                        class="h-8"
                        alt="Flowbite Logo"
                    />
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                        >Portfolio</span
                    >
                </a>
                <button
                    @click="toggleMobileMenu"
                    data-collapse-toggle="navbar-default"
                    type="button"
                    class="inline-flex items-center p-2 w-16 h-10 border justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 transition-all duration-300"
                    aria-controls="navbar-default"
                    aria-expanded="false"
                >
                    <!-- <span class="sr-only">Open main menu</span> -->
                    <svg
                        class="w-10 h-5"
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

                <div
                    class="w-full md:block md:w-auto"
                    :class="{ hidden: !showMobileMenu }"
                    id="navbar-default"
                >
                    <ul
                        class="font-medium max-w-screen-md flex flex-col p-4 mt-4 rounded-lg border border-light-tail-500 dark:border-dark-navy-100 md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0"
                    >
                        <li
                            v-for="(navigation, index) in navigations"
                            :key="index"
                        >
                            <a
                                :href="navigation.href"
                                class="block p-2 text-light-tail-500 rounded dark:text-gray-100 hover:text-light-tail-100 dark:hover:text-light-tail-100 dark:hover:bg-slate-700 transition-all duration-300"
                                aria-current="page"
                                @click="closeMobileMenu"
                                >{{ navigation.name }}</a
                            >
                        </li>
                        <li>
                            <!-- Dark Mode Toggle Icon -->
                            <button
                                @click="toggleDarkMode"
                                class="flex flex-1  p-2 rounded-lg text-dark-navy-100 dark:text-white transition-all duration-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="size-6"
                                >
                                    <path
                                        d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z"
                                    />
                                </svg>
                                <span v-if="isDarkMode">Light </span>
                                <span v-else>Dark </span>
                            </button>
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
const isDarkMode = ref(false);

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

const toggleDarkMode = () => {
    isDarkMode.value = !isDarkMode.value;
    if (isDarkMode.value) {
        document.documentElement.classList.add("dark");
        localStorage.setItem("theme", "dark");
    } else {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
    }
};

onMounted(() => {
    window.addEventListener("scroll", () => {
        return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
    });

    // Set the initial theme based on localStorage
    if (localStorage.getItem("theme") === "dark") {
        isDarkMode.value = true;
        document.documentElement.classList.add("dark");
    } else {
        isDarkMode.value = false;
        document.documentElement.classList.remove("dark");
    }
});
</script>

<style>
/* Your CSS styles */
</style>

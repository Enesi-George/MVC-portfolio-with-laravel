<template>
    <section id="skills" class="bg-light-tail-100 dark:bg-dark-navy-500 py-8">
        <div class="container mx-auto">
            <marquee behavior="scroll" direction="left" scrollamount="10">
                <div class="flex items-center justify-center space-x-4">
                    <div
                        v-for="skill in skills.data"
                        :key="skill.id"
                        class="flex items-center sm:min-w-28 justify-center"
                    >
                        <img
                            :src="skill.image"
                            :alt="skill.name"
                            class=" w-28 h-20 object-fit"
                        />
                    </div>
                </div>
            </marquee>
        </div>
    </section>
</template>

<script setup>
defineProps({
    skills: Object,
});
</script>

<style></style>

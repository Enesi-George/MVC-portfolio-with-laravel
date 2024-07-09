<template>
    <section
        id="portfolio"
        class="section bg-light-primary dark:bg-dark-primary min-h-[1100px] py-20"
        v-motion
        :initial="{
            opacity: 0,
            y: 100,
        }"
        :visible="{
            opacity: 1,
            y: 0,
        }"
    >
        <div class="container mx-auto">
            <div class="flex flex-col items-center text-center">
                <h2 class="section-title">My Latest Work</h2>
                <p class="subtitle mb-10">
                    Explore my recent projects showcasing innovative solutions
                    and cutting-edge technology. Each project reflects my
                    commitment to quality and excellence in web development and
                    design.
                </p>
            </div>
        </div>
        <Projects
            :skills="skills"
            :projects="projects"
            :majorSkills="majorSkills"
        />
    </section>
</template>

<script setup>
import Projects from "@/Components/Frontend/Projects.vue";
defineProps({
    skills: Object,
    projects: Object,
    majorSkills: Object,
});
</script>

<style lang="scss" scoped></style>

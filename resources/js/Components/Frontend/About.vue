<template>
    <section
        id="about"
        class="section bg-light-secondary dark:bg-dark-secondary py-24"
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
            <div class="flex flex-col xl:flex-row gap-24">
                <img
                    src="images/about-me.jpeg"
                    alt="about-me"
                    class="object-cover h-full w-[566px] md:mx-auto lg:mx-0 rounded-2xl"
                />
                <div
                    class="flex flex-col items-center text-center lg:items-start lg:text-left"
                >
                    <div class="flex flex-col">
                        <h2
                            class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3"
                        >
                            About Me
                        </h2>
                        <p class="mb-4 text-accent">Software developer</p>
                        <hr class="mb-8 opacity-90 dark:opacity-5" />
                        <p class="mb-8 text-md">
                            I am a passionate software developer with a
                            specialization in backend technologies. My core
                            strengths lie in creating robust, scalable, and
                            efficient server-side solutions and comprehensive
                            database management. While backend development is my
                            forte, I am also proficient in frontend
                            technologies, enabling me to seamlessly integrate
                            both ends of a project for a cohesive user
                            experience.
                            <br /><br />
                            I also have experience with cloud services such as
                            AWS and Cloudinary, as well as other technologies
                            including MySQL, PostgreSQL, Redis, and Docker.
                            <br /><br />
                            I am continuously learning and staying abreast of
                            the latest technological trends. I am committed to
                            delivering high-quality, innovative software
                            solutions that not only meet but exceed user
                            expectations. Let's collaborate and create something
                            extraordinary!
                        </p>
                    </div>
                    <a href="#contact" class="btn btn-md rounded-md"
                        >Contact me</a
                    >
                </div>
            </div>
        </div>
    </section>
</template>

<script></script>

<style></style>

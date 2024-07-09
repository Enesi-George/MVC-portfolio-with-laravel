<template>
    <section
        id="home"
        class="lg:h-[85vh] border fles items-center bg-light-primary dark:bg-dark-primary py-32 lg:py-24"
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
            <div class="flex flex-col md:flex-row items-center h-full">
                <div class="flex-1 flex flex-col items-center lg:items-start">
                    <p class="text-lg text-accent text-md mb-22px">
                        Hey, i'm George! 👋
                    </p>
                    <h1
                        class="text-4xl leading-[44px] md-text-5xl md:leading-tight lg:text-7xl lg:heading-[1.2] font-bold md:tracking-[-2px]"
                    >
                        I Build & Design <br />
                        Web Interfaces.
                    </h1>
                    <p
                        class="pt-4 pb-8  max-w-[480px] text-lg text-center lg:text-left"
                    >
                        Passionate and motivated software developer with
                        experience in designing, developing, and implementing
                        web applications. Adept at working across software
                        development lifecycle to deliver innovative solutions.
                    </p>
                    <a href="#contact"
                        class="btn btn-md font-bold bg-accent hover:bg-light-secondary hover:text-light-tail-100 dark:hover:bg-dark-secondary dark:hover:text-dark-navy-500 rounded-md md:btn-lg transition-all duration-300"
                    >
                        Work with me
                    </a>
                    <div class="pt-4">
                        <h5
                            class="text-lg justify-center md:justify-start flex items-center text-black dark:text-white mb-2"
                        >
                            Follow me now
                        </h5>
                        <div class="flex items-center mb-6">
                            <a
                                href="https://web.facebook.com/omoanibaba/"
                                class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-black dark:text-white hover:bg-light-secondary hover:border-light-secondary dark:hover:bg-dark-secondary dark:hover:border-dark-secondary mr-3 sm:mr-4 transition-all duration-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    x="0px"
                                    y="0px"
                                    width="100"
                                    height="100"
                                    viewBox="0 0 30 30"
                                >
                                    <path
                                        d="M12,27V15H8v-4h4V8.852C12,4.785,13.981,3,17.361,3c1.619,0,2.475,0.12,2.88,0.175V7h-2.305C16.501,7,16,7.757,16,9.291V11 h4.205l-0.571,4H16v12H12z"
                                    ></path>
                                </svg>
                            </a>
                            <a
                                href="https://x.com/EnesiGeorge1"
                                class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-black dark:text-white hover:bg-light-secondary hover:border-light-secondary dark:hover:bg-dark-secondary dark:hover:border-dark-secondary mr-3 sm:mr-4 transition-all duration-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    x="0px"
                                    y="0px"
                                    width="100"
                                    height="100"
                                    viewBox="0 0 32 32"
                                >
                                    <path
                                        d="M 4.0175781 4 L 13.091797 17.609375 L 4.3359375 28 L 6.9511719 28 L 14.246094 19.34375 L 20.017578 28 L 20.552734 28 L 28.015625 28 L 18.712891 14.042969 L 27.175781 4 L 24.560547 4 L 17.558594 12.310547 L 12.017578 4 L 4.0175781 4 z M 7.7558594 6 L 10.947266 6 L 24.279297 26 L 21.087891 26 L 7.7558594 6 z"
                                    ></path>
                                </svg>
                            </a>
                            <a
                                href="https://www.linkedin.com/in/enesi-george-techy/"
                                class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-black dark:text-white hover:bg-light-secondary hover:border-light-secondary dark:hover:bg-dark-secondary dark:hover:border-dark-secondary mr-3 sm:mr-4 transition-all duration-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    x="0px"
                                    y="0px"
                                    width="100"
                                    height="100"
                                    viewBox="0 0 50 50"
                                >
                                    <path
                                        d="M25,2C12.3,2,2,12.3,2,25s10.3,23,23,23s23-10.3,23-23S37.7,2,25,2z M19,35c0,0.6-0.4,1-1,1h-4c-0.6,0-1-0.4-1-1V20	c0-0.6,0.4-1,1-1h4c0.6,0,1,0.4,1,1V35z M16,18c-1.6,0-3-1.4-3-3s1.4-3,3-3s3,1.4,3,3S17.6,18,16,18z M38,35c0,0.6-0.4,1-1,1h-4	c-0.6,0-1-0.4-1-1v-7.5c0-1.4-1.1-2.5-2.5-2.5S27,26.1,27,27.5V35c0,0.6-0.4,1-1,1h-4c-0.6,0-1-0.4-1-1V20c0-0.6,0.4-1,1-1h4	c0.5,0,1,0.5,1,1c1.1-0.6,2.2-1,3.5-1c4.1,0,7.5,3.4,7.5,7.5V35z"
                                    ></path>
                                </svg>
                            </a>
                            <a
                                href="https://github.com/Enesi-George?tab=repositories"
                                class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-black dark:text-white hover:bg-light-secondary hover:border-light-secondary dark:hover:bg-dark-secondary dark:hover:border-dark-secondary mr-3 sm:mr-4 transition-all duration-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    x="0px"
                                    y="0px"
                                    width="100"
                                    height="100"
                                    viewBox="0 0 72 72"
                                >
                                    <path
                                        d="M36,12c13.255,0,24,10.745,24,24c0,10.656-6.948,19.685-16.559,22.818c0.003-0.009,0.007-0.022,0.007-0.022	s-1.62-0.759-1.586-2.114c0.038-1.491,0-4.971,0-6.248c0-2.193-1.388-3.747-1.388-3.747s10.884,0.122,10.884-11.491	c0-4.481-2.342-6.812-2.342-6.812s1.23-4.784-0.426-6.812c-1.856-0.2-5.18,1.774-6.6,2.697c0,0-2.25-0.922-5.991-0.922	c-3.742,0-5.991,0.922-5.991,0.922c-1.419-0.922-4.744-2.897-6.6-2.697c-1.656,2.029-0.426,6.812-0.426,6.812	s-2.342,2.332-2.342,6.812c0,11.613,10.884,11.491,10.884,11.491s-1.097,1.239-1.336,3.061c-0.76,0.258-1.877,0.576-2.78,0.576	c-2.362,0-4.159-2.296-4.817-3.358c-0.649-1.048-1.98-1.927-3.221-1.927c-0.817,0-1.216,0.409-1.216,0.876s1.146,0.793,1.902,1.659	c1.594,1.826,1.565,5.933,7.245,5.933c0.617,0,1.876-0.152,2.823-0.279c-0.006,1.293-0.007,2.657,0.013,3.454	c0.034,1.355-1.586,2.114-1.586,2.114s0.004,0.013,0.007,0.022C18.948,55.685,12,46.656,12,36C12,22.745,22.745,12,36,12z"
                                    ></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div
                    class="flex flex-1 justify-center items-center h-full mt-8 md:mt-0"
                >
                    <img
                        class="rounded-lg self"
                        src="images/profile.png"
                        alt="profile"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {};
</script>

<style></style>

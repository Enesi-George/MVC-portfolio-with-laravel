<template>
    <Head title="New Project" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Project
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white rounded-md">
                <form class="p-4 py-8" @submit.prevent="submit">
                    <div>
                        <InputLabel for="skill_id" value="Skill" />

                        <select
                            v-model="form.skill_id"
                            id="skill_id"
                            name="skill_id"
                            class="mt-2 block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                        >
                            <option
                                v-for="skill in skills"
                                :key="skill.id"
                                :value="skill.id"
                            >
                                {{ skill.name }}
                            </option>
                            <InputError
                                class="mt-2"
                                :message="$page.props.errors.skill_id"
                            />
                        </select>
                    </div>

                    <div class="mt-2">
                        <InputLabel for="name" value="Name" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 px-4 block w-full"
                            v-model="form.name"
                            autocomplete
                        />

                        <InputError
                            class="mt-2"
                            :message="$page.props.errors.name"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="project_url" value="URL" />

                        <TextInput
                            id="project_url"
                            type="text"
                            class="mt-1 px-4 block w-full"
                            v-model="form.project_url"
                            autocomplete
                        />

                        <InputError
                            class="mt-2"
                            :message="$page.props.errors.project_url"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="image" value="Image" />

                        <input
                            type="file"
                            class="mt-2"
                            @input="form.image = $event.target.files[0]"
                        />
                        <br />
                        <span class="text-xs text-gray-400"
                            >*supported file include: jpeg, png, jpg, max-size:
                            5MB</span
                        >
                        <progress
                            v-if="form.progress"
                            :value="form.progress.percentage"
                            max="100"
                        >
                            {{ form.progress.percentage }}%
                        </progress>

                        <InputError
                            class="mt-2"
                            :message="$page.props.errors.image"
                        />
                    </div>
                    <button
                        type="submit"
                        class="rounded-md px-4 py-2 mt-4 bg-indigo-500 hover:bg-indigo-700 text-white p-6"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Save
                    </button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

defineProps({
    skills: Array,
});

//form initial state
const form = useForm({
    name: "",
    image: null,
    skill_id: "",
    project_url: "",
});

// submit form data
const submit = () => {
    form.post(route("projects.store"));
};
</script>

<style lang="scss" scoped></style>

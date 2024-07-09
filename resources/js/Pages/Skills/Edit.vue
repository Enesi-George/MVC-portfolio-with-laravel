<template>
    <Head title="Edit Skill" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Skill
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white rounded-md">
                <form class="p-4 py-8" @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="Name" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 px-4 block w-full"
                            v-model="form.name"
                            required
                        
                        />

                        <InputError class="mt-2" :message="$page.props.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="image" value="Image" />

                        <input
                            type="file"
                            class="mt-2"
                            @input="form.image = $event.target.files[0]"
                        />
                        <span class="text-xs text-gray-400">*supported file include: jpeg, png, jpg, max-size: 5MB</span>
                        <progress
                            v-if="form.progress"
                            :value="form.progress.percentage"
                            max="100"
                        >
                            {{ form.progress.percentage }}%
                        </progress>

                        <InputError class="mt-2" :message="$page.props.errors.image" />
                    </div>
                    <button
                        type="submit"
                        class="rounded-md px-4 py-2 mt-4 bg-indigo-500 hover:bg-indigo-700 text-white p-6"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Update
                    </button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";

//define props
const props = defineProps({
    skill: Object,
});

//form initial state
const form = useForm({
    name: props.skill?.name,
    image: null,
});

// submit form data
const submit = () => {
    router.post(`/skills/${props.skill.id}`, {
        _method: "put",
        name: form.name,
        image: form.image,
    });
};
</script>

<style lang="scss" scoped></style>

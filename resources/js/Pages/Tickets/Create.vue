<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    content: '',
});

</script>
<template>
    <AuthenticatedLayout>
    <Head title="Ticket" />
      <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Ticket Information</h2>
        
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Enter the details of your ticket below
                    </p>
                </header>
        
                <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
                    <div>
                        <InputLabel for="title" value="Title" />
        
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.title"
                            required
                            placeholder="Enter the title of the ticket"
                            autocomplete="title"
                        />
        
                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>
                    {{ form.content }}
                    <div>
                        <InputLabel for="content" value="Content" />

                        <Editor v-model="form.content" editorStyle="height: 320px" />

                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>
        
                    <div class="flex items-center gap-4">
                        <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
        
                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                            <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                        </Transition>
                    </div>
                </form>
            </section>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
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

const submit = () => {
    form.post(route('tickets.store'), {
        onFinish: () => {
            form.reset('content');
        },
    });
};

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
        
                <form @submit.prevent="submit" class="mt-6 space-y-6">
                    <div>
                        <InputLabel for="title" value="Title" />
        
                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.title"
                            placeholder="Enter the title of the ticket"
                        />
        
                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>
                    {{ form.content }}
                    <div>
                        <Editor v-model="form.content" editorStyle="height: 320px" />
                        <InputError class="mt-2" :message="form.errors.content" />
                    </div>
        
                    <div class="flex items-center gap-4">
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">Create Ticket
                        </PrimaryButton>
                    </div>
                </form>
            </section>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  